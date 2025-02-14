<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable = [
        "path",
        "nom",
        "code",
        "status"
    ];
}
