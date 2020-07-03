<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foremans extends Model
{
    protected $fillable = ['name','id_master'];

    public function workers()
    {
        return $this -> hasMany( Workers::class, 'id');
    }

    public function masters()
    {
        return $this -> belongsTo(Masters::class, 'id_master');
    }
}
