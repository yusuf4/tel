<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $dep = Department::query()
            ->when($request->search, function ($query, $search){
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->select('id', 'name', 'email')
            ->latest()
            ->paginate(10)
            ->withQueryString();
        $searchlist = $request->only(['search']);
        return Inertia::render('Admin/department/Index', [
            'dep'=>$dep,
            'searchlist'=> $searchlist,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Admin/department/Add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DepartmentRequest $request)
    {
        Department::create([
           'name'=>$request->name,
            'email'=>$request->email,
            'dastgoh'=>intval($request->dastgoh)
        ]);

        return redirect()->route('dep.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $dep = Department::findOrFail($id);

        return Inertia::render('Admin/department/Edit', [
           'dep'=>$dep
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $dep = Department::findOrFail($id);
        $dep->update([
           'name' => $request->name,
           'email'=>$request->email,
        ]);

        return redirect()->route('dep.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $dep = Department::findOrFail($id);

        $dep->delete();
        return redirect()->back();
    }
}
