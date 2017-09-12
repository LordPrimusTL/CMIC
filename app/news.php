<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    //
    public function trade()
    {
        return $this->belongsTo(Trade::class);
    }
}
