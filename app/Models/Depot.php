<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    //
    protected $fillable = [
        "partenaire",
        "ref",
        "montant",
        "date_depot",
        "comptable",
        "pdg",
        "photo",
    ];

    public function users(){
        return $this->belongsTo(User::class, "partenaire");
    }
}
