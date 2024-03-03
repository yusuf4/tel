<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\Dipservice;
use App\Models\Embassy;
use App\Models\Kormandon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $kor = Kormandon::query()
            ->when($request->search, function ($query, $search){
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('lastname', 'LIKE', "%{$search}%");
            })
            ->when($request->dipservice, function ($query) use ($request) {
                $query->whereHas('dipservices', function ($query) use ($request) {
                    $query->where('dipservices_id', '=', intval($request->dipservice['id']));
                });
            })
            ->when($request->namoyandagi, function ($query) use ($request) {
                $query->whereHas('embassy', function ($query) use ($request) {
                    $query->where('embassies_id', '=', intval($request->namoyandagi['id']));
                });
            })
            ->when($request->departfilter, function ($query) use ($request) {
                $query->whereHas('departmentD', function ($query) use ($request) {
                    $query->where('department_id', '=', intval($request->departfilter['id']));
                });
            })
            ->with('departmentD:id,name', 'embassy:id,name', 'dipservices:id,name')
            ->select('id','department_id','embassies_id', 'dipservices_id','name', 'lastname','nasab','dastgoh')
            ->where('sobiq', 0)
            ->latest()
            ->paginate(10)
            ->withQueryString();
        $dip= Dipservice::query()
            ->select('id','name')
            ->get();
        $emb = Embassy::query()
            ->select('id','name')
            ->get();
        $dep = Department::query()
            ->select('id','name')
            ->get();
        $searchlist = $request->only(['search']);
        return Inertia::render('Admin/users/Index', [
            'kor'=>$kor,
            'searchlist'=>$searchlist,
            'dip'=>$dip,
            'emb'=>$emb,
            'dep'=>$dep
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $dip = Dipservice::query()
            ->select('id','name')
            ->get();
        $dep = Department::query()
            ->select('id','name')
            ->get();
        $emb = Embassy::query()
            ->select('id', 'name')
            ->get();
        return Inertia::render('Admin/users/Add', [
            'dep'=>$dep,
            'dip'=>$dip,
            'emb'=>$emb
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        //dd($request->dastgoh);
        $embassy='';
        $dipservice='';
        $markaz='';
        if($request->dastgoh==='3'){
            $embassy = $request->department['id'];
        }elseif($request->dastgoh==='2'){
             $dipservice = $request->department['id'];
        }elseif($request->dastgoh==='1'){
             $markaz = $request->department['id'];
        }
        //dd((!empty($markaz)) ? $markaz : null);
        $data = Kormandon::create([
           'name'=>$request->name,
           'lastname'=>$request->lastname,
           'nasab'=>$request->nasab,
           'vazifa'=>$request->vazifa,
           'shoxis'=>$request->shoxis,
           'utoq'=>$request->utoq,
           'doxili'=>$request->doxili,
           'xizmati'=>$request->xizmati,
           'mobili'=>$request->mobili,
           'sobiq'=>false,
           'email'=>$request->email,
           'teleg'=>$request->teleg,
            'dastgoh'=>$request->dastgoh,
            'department_id'=> (!empty($markaz)) ? $markaz : null,
            'embassies_id'=>(!empty($embassy)) ? $embassy : null,
            'dipservices_id'=>(!empty($dipservice)) ? $dipservice : null,
        ]);
        return redirect()->route('user.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        $kor=Kormandon::with('departmentD:id,name,email', 'embassy:id,name,email', 'dipservices:id,name')->findOrFail($id);

        return Inertia::render('Admin/users/Card', [
            'kor'=>$kor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $kor = Kormandon::with('departmentD:id,name', 'embassy:id,name', 'dipservices:id,name')->findOrFail($id);
        $dep = Department::query()
            ->select('id', 'name')
            ->get();
        $dip=Dipservice::query()
            ->select('id', 'name')
            ->get();
        $emb = Embassy::query()
            ->select('id', 'name')
            ->get();
        return Inertia::render('Admin/users/Edit', [
            'kor'=>$kor,
            'dep'=>$dep,
            'dip'=>$dip,
            'emb'=>$emb
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $embassy='';
        $dipservice='';
        $markaz='';

        if($request->dastgoh=='3' && isset($request->department)){
            $embassy = $request->department['id'];
        }elseif($request->dastgoh=='2' && isset($request->department)){
            $dipservice = $request->department['id'];
        }elseif($request->dastgoh=='1' && isset($request->department)){
            $markaz = $request->department['id'];
        }
        //dd($embassy);
        $kor = Kormandon::with('departmentD', 'embassy', 'dipservices')->findOrFail($id);
        //dd($kor);
        $kor->update([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'nasab'=>$request->nasab,
            'vazifa'=>$request->vazifa,
            'shoxis'=>$request->shoxis,
            'utoq'=>$request->utoq,
            'doxili'=>$request->doxili,
            'xizmati'=>$request->xizmati,
            'mobili'=>$request->mobili,
            'sobiq'=>$request->sobiq,
            'email'=>$request->email,
            'teleg'=>$request->teleg,
            'dastgoh'=>$request->dastgoh,
            'department_id'=> (!empty($markaz)) ? $markaz : $kor->department_id,
            'embassies_id'=>(!empty($embassy)) ? $embassy : $kor->embassies_id,
            'dipservices_id'=>(!empty($dipservice)) ? $dipservice : $kor->dipservices_id,
        ]);

        return redirect()->route('user.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $emb=Kormandon::findOrFail($id);

        $emb->delete();
        return redirect()->back();
    }
}
