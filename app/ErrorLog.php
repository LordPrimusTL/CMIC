<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    //

    public static function findByT_ID($t_id)
    {
        $checkTid = ErrorLog::where(['error_id' => $t_id])->get();
        if(count($checkTid) > 0)
        {
            return false;
        }
        else{
            return true;
        }
    }
}
