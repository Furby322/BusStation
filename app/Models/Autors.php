<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autors extends Model
{

    protected $fillable = ['FIO', 'dateB', 'dateD'];

    public function books()
    {
        return $this -> hasMany( Books::class, 'id_author');
    }
}
