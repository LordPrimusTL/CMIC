<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    //

    public $fillable =['name','is_active'];

    public function inv_aff()
    {
        return $this->hasMany(inv_aff::class,'trade_id');
    }
    public function news()
    {
        return $this->hasMany(news::class);
    }

}
