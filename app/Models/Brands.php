<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $fillable = ['name'];

    public function models()
    {
        return $this -> hasMany( Models::class, 'id');
    }

}
