<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inv_reg extends Model
{
    //
    public function inv_aff()
    {
        return $this->belongsTo(inv_aff::class);
    }

    public function stat()
    {
        return $this->belongsTo(inv_stat::class,'s_id');
    }

    public function user()
    {
        return $this->belongsTo(inv_reg::class,'user_id');
    }
}
