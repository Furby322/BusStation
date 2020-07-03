<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $fillable = ['name','id_brand'];

    public function car_park()
    {
        return $this -> hasMany( CarPark::class, 'id');
    }

    public function write_off()
    {
        return $this -> hasMany( WriteOff::class, 'id');
    }

    public function brands()
    {
        return $this -> belongsTo(Brands::class, 'id_brand');
    }
}
