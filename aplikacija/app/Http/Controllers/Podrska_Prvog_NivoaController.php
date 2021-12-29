<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrviNivoResource;
use Illuminate\Http\Request;
use App\Models\Podrska_prvog_nivoa;

class Podrska_Prvog_NivoaController extends Controller
{
    public function index()
    {
        $podrska = Podrska_prvog_nivoa::all();
        return PrviNivoResource::collection($podrska);
    }

    public function store(Request $request)
    {
        return Podrska_Prvog_Nivoa::create($request->all());
    }

    // public function show($id)
    // {
    //     return Podrska_Prvog_Nivoa::find($id);
    // }
    public function show($id)
    {
        $zalba = Podrska_prvog_nivoa::find($id);
        return new PrviNivoResource($zalba);
    }
    public function update(Request $request, $id)
    {
        $podrska = Podrska_Prvog_Nivoa::find($id);
        $podrska->update($request->all());
        return $podrska;
    }

    public function delete($id)
    {
        return Podrska_Prvog_Nivoa::destroy($id);
    }

    public function search($ime)
    {
        return Podrska_Prvog_Nivoa::where('ime', 'like', '%' . $ime . '%')->get();
    }
}
