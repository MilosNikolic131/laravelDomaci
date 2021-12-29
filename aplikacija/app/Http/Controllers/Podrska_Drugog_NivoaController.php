<?php

namespace App\Http\Controllers;

use App\Http\Resources\DrugiNivoResource;
use App\Models\Podrska_drugog_nivoa;
use Illuminate\Http\Request;

class Podrska_Drugog_NivoaController extends Controller
{
    public function index()
    {
        $podrska = Podrska_drugog_nivoa::all();
        return DrugiNivoResource::collection($podrska);
    }

    public function store(Request $request)
    {
        return Podrska_drugog_nivoa::create($request->all());
    }

    public function show($id)
    {
        $podrska = Podrska_drugog_nivoa::find($id);
        return new DrugiNivoResource($podrska);
    }

    public function update(Request $request, $id)
    {
        $podrska = Podrska_drugog_nivoa::find($id);
        $podrska->update($request->all());
        return $podrska;
    }

    public function delete($id)
    {
        return Podrska_drugog_nivoa::destroy($id);
    }

    public function search($ime)
    {
        return Podrska_drugog_nivoa::where('ime', 'like', '%' . $ime . '%')->get();
    }
}
