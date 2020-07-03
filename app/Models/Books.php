<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = ['NameBook','description','yearW'];

    public function autors()
    {
        return $this -> belongsTo(Autors::class, 'id_author');
    }
}
