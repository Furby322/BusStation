<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    protected $fillable = ['name','name_manager'];

    public function services()
    {
        return $this -> hasMany( ServiceWorkshop::class, 'id');
    }

    public function garages()
    {
        return $this -> hasMany( Garage::class, 'id');
    }

    public function masters()
    {
        return $this -> hasMany( Masters::class, 'id');
    }
}
