<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inv_tut extends Model
{
    //

    public function inv_aff()
    {
        return $this->belongsTo(inv_aff::class);
    }
}
