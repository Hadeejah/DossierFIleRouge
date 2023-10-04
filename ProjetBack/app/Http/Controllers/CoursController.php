<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cours = Cours::create([
            "nbre_heure" => $request->nbre_heure,
            "etatCours" => $request->etatCours,
            "prof_id" => $request->prof_id,
            "semestre_id" => $request->semestre_id
        ]);
        return response()->json([
            "success" => "true",
            "data" => $cours,
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
