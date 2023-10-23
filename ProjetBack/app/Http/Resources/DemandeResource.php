<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DemandeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "motifDemande" => $this->motifDemande,
            "etatDemande" => $this->etatDemande,
            "session_de_cours_id" =>SessionResource::make($this->sessions)
        ];
    }
}
