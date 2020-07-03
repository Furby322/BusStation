<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mileage extends Model
{
    protected $fillable = ['id_car','mileage','date'];

    public function car_park()
    {
        return $this -> belongsTo( CarPark::class, 'id_car');
    }

}
