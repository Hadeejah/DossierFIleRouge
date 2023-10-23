<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    use HasFactory;
    protected $hidden=[
        "created_at",
        "updated_at"
    ];
    public function classes()
    {
        return $this->belongsToMany(Classe::class);
    }
}
