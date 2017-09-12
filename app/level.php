<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    //

    public function user()
    {
        return $this->hasMany(User::class,'level_id');
    }
}
