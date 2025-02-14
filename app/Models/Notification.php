<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $fillable = [
        "depot",
        "message",
        "is_read"
    ];
    public function depots(){
        return $this->hasOne(Depot::class,"id","depot");
    }
}
