<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $fillable = ['id_car','type','date'];

    public function car_park()
    {
        return $this -> belongsTo( CarPark::class, 'id_car');
    }
}
