<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    protected $fillable = ['name','id_foreman'];

    public function repairs()
    {
        return $this -> hasMany( Repairs::class, 'id');
    }

    public function foremans()
    {
        return $this -> belongsTo(Foremans::class, 'id_foreman');
    }
}
