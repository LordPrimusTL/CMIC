<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //

    public static function findByT_ID($t_id)
    {
        $checkTid = Transactions::where(['t_id' => $t_id])->get();
        if(count($checkTid) > 0)
        {
            return false;
        }
        else{
            return true;
        }
    }

    public static function FindByTID($t_id)
    {
        $checkTid = Transactions::where(['t_id' => $t_id])->get();
        if(count($checkTid) > 0)
        {
            return $checkTid;
        }
        else{
            return null;
        }
    }

    public function earn()
    {
        return $this->hasMany(Earning::class,'t_id','t_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function aff()
    {
        return $this->belongsTo(inv_aff::class,'inv_id');
    }

    public function stat()
    {
        return $this->belongsTo(inv_stat::class,'ts_id');
    }
}
