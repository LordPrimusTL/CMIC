<?php
/**
 * Created by PhpStorm.
 * User: GacPedroBranch
 * Date: 8/28/2017
 * Time: 2:19 AM
 */

namespace App\Helper;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    public static function AuthUserCheck()
    {
        if(Auth::check() && Auth::user()->role_id == 3)
        {
            if(Auth::user()->is_active)
            {
                return true;
            }
            else{
                Session::flash('error','Your Account has been deactivated. Please contact our customer representative. Thanks');
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function AuthAdminCheck()
    {
        if(Auth::check() && Auth::user()->role_id < 3 && Auth::user()->is_active)
        {
            return true;
        }
        else{
            return false;
        }
    }
}