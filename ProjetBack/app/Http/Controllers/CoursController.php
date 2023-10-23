<?php

namespace App\Http\Controllers;

use App\Http\Resources\CoursResource;
use App\Models\Cours;
use Illuminate\Http\Request;


class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CoursResource::collection(Cours::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    public static function convertirSeconde($heure)
    {
        $heureGlob = $heure * 3600;
        return $heureGlob;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $cours = Cours::create([
            "nbre_heure" => $this->convertirSeconde($request->nbre_heure),
            // "prof_id" => $request->prof_id,
            // "module_id" => $request->module,
            "classe_id" => $request->classe_id,
            "module_prof_id"=>$request->module_prof_id ,
        ]);

        return response()->json([
            "success" => "true",
            "data" => CoursResource::make($cours),
            "message" => "Cours créé avec succés"

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cours $cours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cours $cours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cours $cours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cours $cours)
    {
        //
    }
}
