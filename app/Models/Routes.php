<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    protected $fillable = ['id_car','number_rout'];

    public function car_park()
    {
        return $this -> belongsTo( CarPark::class, 'id_car');
    }
}
