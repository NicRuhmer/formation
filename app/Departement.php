<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table = "departements";
    protected $fillable = [
        'nom_departement'
    ];
}
