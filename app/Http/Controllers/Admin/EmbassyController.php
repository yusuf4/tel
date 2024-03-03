<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmbassyRequest;
use App\Models\Embassy;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmbassyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $emb = Embassy::query()
            ->when($request->search, function ($query, $search){
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->select('id', 'name', 'email')
            ->latest()
            ->paginate(10)
            ->withQueryString();
        $searchlist = $request->only(['search']);
        return Inertia::render('Admin/embassy/Index', [
            'emb'=>$emb,
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
        return Inertia::render('Admin/embassy/Add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmbassyRequest $request)
    {
        Embassy::create([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        return redirect()->route('emb.list');
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
        $emb = Embassy::findOrFail($id);

        return Inertia::render('Admin/embassy/Edit', [
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
    public function update(Request $request, $id)
    {
        $emb = Embassy::findOrFail($id);
        $emb->update([
            'name' => $request->name,
            'email'=> $request->email,
        ]);
        return redirect()->route('emb.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $emb=Embassy::findOrFail($id);

        $emb->delete();
        return redirect()->back();
    }
}
