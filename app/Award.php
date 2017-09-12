<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    //


    public function paw()
    {
        return $this->hasMany(paw::class,'a_id');
    }
}
