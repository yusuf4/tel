<?php

namespace App\Http\Controllers\MainPage;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Kormandon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Vazorat extends Controller
{
    public function index(Request $request)
    {
        $kor = Kormandon::query()
            ->when($request->search, function ($query, $search){
                $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('lastname', 'LIKE', "%{$search}%");
            })
            ->when($request->departfilter, function ($query, $departfilter){
                $query->where('department_id', '=', "{$departfilter}");
            })
            ->where('dastgoh', '1')
            ->latest()
            ->paginate(20)
            ->withQueryString();
        $searchlist = $request->only(['search']);
        $dep = Department::query()
            ->select('id', 'name')
            ->get();
        //dd($kor);
        return Inertia::render('Mains/Vazorat',[
            'kor'=>$kor,
            'searchlist'=> $searchlist,
            'dep'=>$dep
        ]);
    }

    public function show($id)
    {
        $kor = Kormandon::with('departmentD:id,name,email')->findOrFail($id);

        return Inertia::render('Mains/VUser', [
           'kor'=>$kor,
        ]);
    }
}
