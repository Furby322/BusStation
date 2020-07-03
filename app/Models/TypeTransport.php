<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTransport extends Model
{
    protected $fillable = ['type','characteristic'];

    public function car_park()
    {
        return $this -> hasMany( CarPark::class, 'id');
    }
}
