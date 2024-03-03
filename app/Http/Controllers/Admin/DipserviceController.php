<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DipserviceRequest;
use App\Models\Dipservice;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DipserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $dip = Dipservice::query()
            ->when($request->search, function ($query, $search){
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->select('id', 'name', 'email')
            ->latest()
            ->paginate(10)
            ->withQueryString();
        $searchlist = $request->only(['search']);
        return Inertia::render('Admin/dipservice/Index', [
            'dip'=>$dip,
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
        return Inertia::render('Admin/dipservice/Add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DipserviceRequest $request)
    {
         Dipservice::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'dastgoh'=>intval($request->dastgoh)
        ]);

        return redirect()->route('dip.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $dip = Dipservice::findOrFail($id);
        return Inertia::render('Admin/dipservice/Edit', [
            'dip'=>$dip
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
        $dip=Dipservice::findOrFail($id);
        $dip->update([
            'name' => $request->name,
            'email'=>$request->email,
        ]);

        return redirect()->route('dip.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $dip = Dipservice::findOrFail($id);

        $dip->delete();
        return redirect()->back();
    }
}
