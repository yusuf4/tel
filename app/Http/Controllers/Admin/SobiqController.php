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

class SobiqController extends Controller
{
    public function index(Request $request)
    {
        $kor = Kormandon::query()
            ->when($request->search, function ($query, $search){
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->with('departmentD:id,name', 'embassy:id,name', 'dipservices:id,name')
            ->select('id','department_id','embassies_id', 'dipservices_id','name', 'lastname','nasab','dastgoh')
            ->where('sobiq', 1)
            ->latest()
            ->paginate(10)
            ->withQueryString();
        $searchlist = $request->only(['search']);
        return Inertia::render('Admin/sobiq/Index', [
            'kor'=>$kor,
            'searchlist'=>$searchlist
        ]);
    }

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
        return Inertia::render('Admin/sobiq/Edit', [
            'kor'=>$kor,
            'dep'=>$dep,
            'dip'=>$dip,
            'emb'=>$emb
        ]);
    }

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

        return redirect()->route('sobiq.index');
    }

    public function destroy($id)
    {
        $kor=Kormandon::findOrFail($id);

        $kor->delete();
        return redirect()->back();
    }
}
