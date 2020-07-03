<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceWorkshop extends Model
{
    protected $fillable = ['name','id_plot'];

    public function car_park()
    {
        return $this -> hasMany( CarPark::class, 'id');
    }

    public function plots()
    {
        return $this -> belongsTo(Plot::class, 'id_plot');
    }
}
