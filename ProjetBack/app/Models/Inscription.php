<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'classe_annee_id'
    ];
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
    public function classeAnnee() {
        return $this->belongsTo(ClasseAnnee::class);
    }
}
