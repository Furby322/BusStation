<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    protected $fillable = ['name','id_car'];

    public function car_park()
    {
        return $this -> belongsTo( CarPark::class, 'id_car');
    }

}
