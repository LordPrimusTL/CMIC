<?php

/**
 * Created by PhpStorm.
 * User: GacPedroBranch
 * Date: 8/27/2017
 * Time: 4:49 AM
 */
namespace App\Helper;

use App\ErrorLog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class Logger
{
    private function SaveError($error_id)
    {
        $ae = new ErrorLog();
        $ae->error_id = 'Error - '. $error_id;
        $ae->user_id = Auth::id();
        $ae->save();
        Session::flash('error','minor error occured, Please check Log');
        Log::info('New Error saved in database to be treated');
    }

    public function LogError($errormsg,$ex,$other){
        $error_id = $this->ErrorID();
        if($other == null)
        {
            Log::error($errormsg,['error_id'=>$error_id,'error'=> $ex->getMessage().$ex->getLine().$ex->getTraceAsString()]);
        }
        else{
            Log::error($errormsg,['error_id'=>$error_id,'error'=> $ex->getMessage().$ex->getLine().$ex->getTraceAsString(), $other]);
        }

        $this->SaveError($error_id);
    }

    private function ErrorID()
    {
        $t_id = str_random(20);
        if(ErrorLog::findByT_ID($t_id))
        {
            return $t_id;
        }
        else
        {
            var_dump(false);
            $this->ErrorID();
        }
        return $t_id;
    }
}