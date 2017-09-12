<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inv_aff extends Model
{
    //

    public function trade()
    {
        return $this->belongsTo(Trade::class,'trade_id');
    }

    public function tut()
    {
        return $this->hasMany(inv_tut::class,'inv_id');
    }

    public function reg()
    {
        return $this->hasMany(inv_reg::class,'inv_id');
    }

    public function trans()
    {
        return $this->hasMany(Transactions::class,'inv_id');
    }

}
