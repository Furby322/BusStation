<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masters extends Model
{
    protected $fillable = ['name','id_plot'];

    public function foremans()
    {
        return $this -> hasMany( Foremans::class, 'id');
    }

    public function plots()
    {
        return $this -> belongsTo(Plot::class, 'id_plot');
    }
}
