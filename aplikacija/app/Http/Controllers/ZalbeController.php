<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zalbe;
use App\Http\Resources\ZalbeResource;

class ZalbeController extends Controller
{
   
    public function index()
    {
        $zalbe = Zalbe::all();
        return ZalbeResource::collection($zalbe);
    }

    public function store(Request $request)
    {
       return Zalbe::create($request->all());
    }

    // public function show($id)
    // {
    //     return Zalbe::find($id);
    // }
    public function show($id)
    {
        $zalba = Zalbe::find($id);
        return new ZalbeResource($zalba);
    }

    public function update(Request $request, $id)
    {
        $zalba = Zalbe::find($id);
        $zalba->update($request->all());
        return $zalba;
    }

    public function delete($id)
    {
        return Zalbe::destroy($id);
    }

    public function search($tip_problema)
    {
        return Zalbe::where('tip_problema','like','%'.$tip_problema.'%')->get();
    }
}
