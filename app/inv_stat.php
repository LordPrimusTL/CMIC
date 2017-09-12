<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inv_stat extends Model
{
    //

    public function reg()
    {
        return $this->hasMany(inv_reg::class,'s_id');
    }

    public function deal()
    {
        return $this->hasMany(DealApp::class,'s_id');
    }


}
