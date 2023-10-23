<?php

namespace App\Models;

use App\Models\SessionDeCours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cours extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        "created_at",
        "updated_at"
    ];

    public function moduleProf()
    {
        return $this->belongsTo(ModuleProf::class,'module_prof_id');
    }

    // public function modules()
    // {
    //     return $this->belongsTo(Module::class, 'module_id');
    // }

    public function classes()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }


    public function sessions()
    {
        return $this->hasMany(SessionDeCours::class,'cours_id');
    }
    
}
