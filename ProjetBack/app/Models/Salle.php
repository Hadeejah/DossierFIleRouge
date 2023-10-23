<?php

namespace App\Models;

use App\Models\SessionDeCours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salle extends Model
{
    use HasFactory;
    protected $guarded=[
        
    ];
    protected $hidden=[
        "created_at",
        "updated_at"
    ];
    public function sessions()
    {
        return $this->hasMany(SessionDeCours::class,'salle_id');
    }
    
}
