<?php

namespace App\Http\Controllers\MainPage;

use App\Http\Controllers\Controller;
use App\Models\Dipservice;
use App\Models\Embassy;
use App\Models\Kormandon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DipserviceController extends Controller
{
    public function index(Request $request){
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
            ->with('departmentD:id,name')
            ->where('dastgoh', '2')
            ->latest()
            ->paginate(20)
            ->withQueryString();
        $dip=Dipservice::query()
            ->select('id', 'name')
            ->get();
        $searchlist = $request->only(['search']);
        return Inertia::render('Mains/Dipservice', [
            'kor'=>$kor,
            'dip'=>$dip,
            'searchlist'=>$searchlist
        ]);
    }

    public function show($id)
    {
        $kor = Kormandon::with('dipservices:id,name')->findOrFail($id);

        return Inertia::render('Mains/DUser', [
           'kor'=>$kor,
        ]);
    }
}
