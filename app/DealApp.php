<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealApp extends Model
{
    //

    public function deal()
    {
        return $this->belongsTo(Deal::class,'d_id');
    }
    public function stat()
    {
        return $this->belongsTo(inv_stat::class,'s_id');
    }
}
