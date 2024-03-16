<?php

namespace App\Http\Controllers\MainPage;

use App\Http\Controllers\Controller;
use App\Models\Kormandon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $kor = Kormandon::query()
            ->when($request->search, function ($query, $search){
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('lastname', 'LIKE', "%{$search}%");
            })
            ->with('departmentD:id,name', 'embassy:id,name', 'dipservices:id,name')
            ->select('id','department_id','embassies_id', 'dipservices_id','name', 'lastname','nasab','dastgoh','mobili')
            ->where('sobiq', '0')
            ->latest()
            ->paginate(10)
            ->withQueryString();
        $searchlist = $request->only(['search']);
        return Inertia::render('Mains/Main', [
            'kor'=>$kor,
            'searchlist'=>$searchlist
        ]);
    }

    public function show($id)
    {
        $kor=Kormandon::with('departmentD:id,name,email', 'embassy:id,name,email', 'dipservices:id,name')->findOrFail($id);

        return Inertia::render('Mains/Item', [
            'kor'=>$kor,
        ]);
    }
}

