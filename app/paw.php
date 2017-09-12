<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paw extends Model
{
    //

    public function award(){
        return $this->belongsTo(Award::class,'a_id');
    }
}
