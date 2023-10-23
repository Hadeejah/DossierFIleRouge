<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoursResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static function convertirHeure($seconde)
    {
        $heureGlob = $seconde / 3600;
        $minGlob = ($seconde % 3600) / 60;
        return sprintf("%02d:%02d",$heureGlob,$minGlob) ;
    }
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nbre_heure" => $this->convertirHeure($this->nbre_heure),
            "module_prof_id"=>ModuleProfResource::make($this->moduleProf),
            // "module_prof_id"=>$this->moduleProf,
            "classe_id" => $this->classes->libelle,
            "semestre_id" => $this->semestres,
            "etatCours" => $this->etatCours,
        ];
    }
}
