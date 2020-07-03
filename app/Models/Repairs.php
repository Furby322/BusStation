<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repairs extends Model
{
    protected $fillable = ['id_car','id_worker','price','detail','date'];

    public function car_park()
    {
        return $this -> belongsTo( CarPark::class, 'id_car');
    }

    public function workers()
    {
        return $this -> belongsTo( Workers::class, 'id_worker');
    }
}
