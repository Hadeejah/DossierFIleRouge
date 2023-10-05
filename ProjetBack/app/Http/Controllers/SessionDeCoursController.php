<?php

namespace App\Http\Controllers;

use App\Models\SessionDeCours;
use Illuminate\Http\Request;

class SessionDeCoursController extends Controller
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
        $session=SessionDeCours::create([
            "cours_id"=>$request->cours_id,
            "date"=>$request->date,
            "hDebut"=>$request->hDebut,
            "hFin"=>$request->hFin,
            "Duree"=>$request->Duree,
            // "etatAnnule"=>$request->etatAnnule,
            // "etatValide"=>$request->etatValide,
            "salle_id"=>$request->salle_id,
            "attache_id"=>$request->attache_id
        ]);
        return response()->json([
            "success" => "true",
            "data" =>$session,
            "message" => "Session créé avec succés"

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SessionDeCours $sessionDeCours)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SessionDeCours $sessionDeCours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SessionDeCours $sessionDeCours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SessionDeCours $sessionDeCours)
    {
        //
    }
}
