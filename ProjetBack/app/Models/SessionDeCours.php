<?php

namespace App\Models;

use App\Models\Cours;
use App\Models\Salle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SessionDeCours extends Model
{
    use HasFactory;
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
    protected $guarded = [];

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    public function demande()  {
        return $this->hasMany(Demande::class);
    }
}
