<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    public function profs()  {
        return $this->belongsToMany(User::class,'module_profs','module_id','prof_id');
    }
    protected $hidden=[
        "created_at",
        "updated_at"
    ];
    
}
