<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    protected $guarded=[
        'id'
    ];
    protected $hidden=[
        "created_at",
        "updated_at"
    ];

    public function profs()  {
        return $this->belongsTo(User::class,'prof_id');
    }

    public function modules()  {
        return $this->belongsTo(Module::class,'module_id');
    }

    public function classes()  {
        return $this->belongsTo(Classe::class,'classe_id');
    }

}
