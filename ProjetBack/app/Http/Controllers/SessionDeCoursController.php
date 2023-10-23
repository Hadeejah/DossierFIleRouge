<?php

namespace App\Http\Controllers;

use App\Http\Resources\SessionResource;
use App\Models\Cours;
use Illuminate\Http\Request;
use App\Models\SessionDeCours;
use Exception;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;
use PhpParser\Node\Stmt\TryCatch;

class SessionDeCoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return SessionDeCours::all();
        return SessionResource::collection(SessionDeCours::all());
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
        $heureEnSec = explode(':', $heure);
        $hours = $heureEnSec[0];
        $min = $heureEnSec[1];
        $secTotal = ($hours * 3600) + ($min * 60);
        return $secTotal;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        return DB::transaction(function () use ($request) {
            try {
                $hD = $request->hDebut;
                $hF = $request->hFin;


                $verif = SessionDeCours::where(['date' => $request->date, 'salle_id' => $request->salle_id])->get();

                $verif1 = SessionDeCours::where(['date' => $request->date, 'cours_id' => $request->cours_id])->get();



                // return $verif1;
                foreach ($verif as $value) {
                    if ($value->hDebut <= $request->hDebut && $value->hFin > $request->hDebut) {
                        return [
                            "message" => "Salle occupé..."
                        ];
                    }
                }

                foreach ($verif1 as $value) {
                    if ($value->hDebut <= $request->hDebut && $value->hFin > $request->hDebut) {
                        return [
                            "message" => "Prof occupé..."
                        ];
                    }
                }

                $hDsec = $this->convertirSeconde($hD);
                $hFsec = $this->convertirSeconde($hF);
                $dureeSec = $hFsec - $hDsec;

                // return $nbrEff;


                // $dureeH = $dureeSec / 3600;

                if ($dureeSec < 3600) {
                    return [
                        "message" => "Heure de debut ne doit pas etre inferieur à l'heure de fin"
                    ];
                }
                if ($dureeSec > 14400) {
                    return [
                        "message" => "Impossible duree supérieure à 4H"
                    ];
                }
                $nbrEff = Cours::find($request->cours_id);

                if ($nbrEff->nbre_heure == $nbrEff->nbreEffectue) {

                    return response()->json([
                        "message" => "Cours terminé"
                    ]);
                }
                if ($nbrEff->nbre_heure == $nbrEff->nbreEffectue + $dureeSec) {
                    
                    $nbrEff->update(['etatCours' => 'Termine']);
                    $nbrEff->save();
                }
                if ($nbrEff->nbre_heure < $nbrEff->nbreEffectue + $dureeSec) {
                    return response()->json([
                        "message" => "Heure global dépassé"
                    ]);
                }

                $nbrEff->increment('nbreEffectue', $dureeSec);

                $session = SessionDeCours::create([
                    "cours_id" => $request->cours_id,
                    "date" => $request->date,
                    "hDebut" => $hD,
                    "hFin" => $hF,
                    "dureeSession" => $dureeSec,
                    "salle_id" => $request->salle_id,
                ]);

                // "etatAnnule"=>$request->etatAnnule,
                // "etatValide"=>$request->etatValide,
                // "attache_id"=>$request->attache_id
                return response()->json([
                    "success" => "true",
                    "data" => SessionResource::make($session),
                    "dureeSession" => $dureeSec,
                    "message" => "Session créé avec succés"

                ]);
            } catch (UniqueConstraintViolationException $th) {
                return response()->json([
                    "message" => "Cet combinaison existe  dejà"
                ]);
            } catch (Exception $th) {
                return response()->json([
                    "message" => $th
                ]);
            }
        });
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
