<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
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
            "cours_id"=>CoursResource::make($this->cours),
            "date"=>$this->date,
            "hDebut"=>$this->hDebut,
            "hFin"=>$this->hFin,
            "etatAnnule"=>$this->etatAnnule,
            "etatValide"=>$this->etatValide,
            "salle_id"=>SalleResource::make($this->salle),
            "attache_id"=>$this->attache_id
        ];
    }
}
