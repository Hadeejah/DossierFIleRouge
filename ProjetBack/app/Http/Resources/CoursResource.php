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
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "nbre_heure"=>$this->nbre_heure,
            "prof_id"=>$this->profs->name,
            "module_id"=>$this->modules,
            "classe_id"=>$this->classes->libelle,
            "semestre_id"=>$this->semestres,
            "etatCours"=>$this->etatCours,
        ];
    }
}
