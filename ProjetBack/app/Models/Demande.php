<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $guarded=[

    ];
    protected $hidden=[
        "updated_at",
        "created_at"
    ];

    public function sessions()  {
        return $this->belongsTo(SessionDeCours::class,'session_de_cours_id');
    }
}
