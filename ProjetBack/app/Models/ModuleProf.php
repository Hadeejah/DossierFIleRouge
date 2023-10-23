<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleProf extends Model
{
    use HasFactory;
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
    public function module()
    {
       return $this->belongsTo(Module::class);
    }
    public function prof()
    {
       return $this->belongsTo(User::class);
    }
    public function cours()
    {
       return $this->belongsTo(Cours::class,'module_prof_id');
    }
}
