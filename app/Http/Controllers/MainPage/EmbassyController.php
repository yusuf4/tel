<?php

namespace App\Http\Controllers\MainPage;

use App\Http\Controllers\Controller;
use App\Models\Embassy;
use App\Models\Kormandon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;
use function Termwind\render;

class EmbassyController extends Controller
{
    public function index(Request $request)
    {
        $kor = Kormandon::query()
            ->when($request->search, function ($query, $search){
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('lastname', 'LIKE', "%{$search}%");
            })
            ->when($request->namoyandagi, function ($query) use ($request) {
                $query->whereHas('embassy', function ($query) use ($request) {
                    $query->where('embassies_id', '=', intval($request->namoyandagi['id']));
                });
            })
            ->with('embassy:id,name')
            ->where('dastgoh', '3')
            ->latest()
            ->paginate(20)
            ->withQueryString();
        $emb=Embassy::query()
            ->select('id', 'name')
            ->get();
        $searchlist = $request->only(['search']);
        return Inertia::render('Mains/Embassy', [
            'kor'=>$kor,
            'emb'=>$emb,
            'searchlist'=>$searchlist
        ]);
    }

    public function show($id)
    {
        $kor=Kormandon::with('embassy:id,name,email')->findOrFail($id);

        return Inertia::render('Mains/EUser', [
           'kor'=>$kor
        ]);
    }
}
