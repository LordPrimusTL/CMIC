<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{

    public static function findByT_ID($t_id)
    {
        $checkTid = Earning::where(['t_id' => $t_id])->get();
        if(count($checkTid) > 0)
        {
            return false;
        }
        else{
            return true;
        }
    }
    public function trans()
    {
        return $this->belongsTo(Transactions::class,'t_id','t_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
