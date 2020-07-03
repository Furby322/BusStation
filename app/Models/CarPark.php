<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarPark extends Model
{
    protected $fillable = ['id_model','id_type','id_garage','id_service','date'];

    protected $table = 'car_park';

    public function mileages()
    {
        return $this -> hasMany( Mileage::class, 'id');
    }

    public function drivers()
    {
        return $this -> hasMany( Drivers::class, 'id');
    }

    public function routes()
    {
        return $this -> hasMany( Routes::class, 'id');
    }

    public function transportations()
    {
        return $this -> hasMany( Transportation::class, 'id');
    }

    public function repairs()
    {
        return $this -> hasMany( Repairs::class, 'id');
    }

    public function models()
    {
        return $this -> belongsTo(Models::class, 'id_model');
    }

    public function types()
    {
        return $this -> belongsTo(TypeTransport::class, 'id_type');
    }

    public function garages()
    {
        return $this -> belongsTo(Garage::class, 'id_garage');
    }

    public function services()
    {
        return $this -> belongsTo(ServiceWorkshop::class, 'id_service');
    }

}
