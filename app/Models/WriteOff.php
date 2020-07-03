<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WriteOff extends Model
{
    protected $fillable = ['id_model','date'];

    public function models()
    {
        return $this -> belongsTo( Models::class, 'id_model');
    }
}
