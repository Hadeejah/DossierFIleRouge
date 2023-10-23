<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasseAnnee extends Model
{
    use HasFactory;
    protected $guarded = [

    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class,'classe_id');
    }
    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class,'annee_scolaire_id');
    }
}
