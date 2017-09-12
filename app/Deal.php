<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    //
    public function dealApp()
    {
        return $this->hasMany(DealApp::class,'d_id');
    }
}
