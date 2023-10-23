<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClasseAnneeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
            [
                "classe_id" => ClasseResource::make($this->classe),
                "annee_scolaire_id" => AnneeScolaireResource::make($this->anneeScolaire),
                "nbreEtu" => $this->nbreEtu,

                // "classe_id" =>$this->classe,
                // "annee_scolaire_id" =>$this->annee_scolaire_id,
                // "nbreEtu" => $this->nbreEtu,
            ];
    }
}
