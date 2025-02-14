<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        "nom",
        "status",
    ];

    public function users(){
        return $this->belongsToMany(User::class, "user_role","user_id");
    }
}
