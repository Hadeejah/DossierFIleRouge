<?php

namespace App\Http\Controllers;

use App\Http\Resources\DemandeResource;
use App\Http\Resources\SessionResource;
use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DemandeResource::collection(Demande::all());
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
        $demande = Demande::create([
            "motifDemande" => $request->motifDemande,
            "session_de_cours_id" => $request->session_de_cours_id
        ]);
        return response()->json([
            "success" => true,
            "data" => DemandeResource::make($demande),
            // "data" => $demande,
            "message" => "Demande envoyé",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
