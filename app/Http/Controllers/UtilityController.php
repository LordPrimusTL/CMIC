<?php

namespace App\Http\Controllers;

use App\inv_aff;
use App\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilityController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            Auth::logout();
        }
        $news = news::where(['is_active' => true])->get();
        $fv = inv_aff::where(['is_active' => true])->orderBy('created_at','DESC')->get();
        return view('Utilities.index')->with(['title' => 'Home','news' => $news,'fv' => $fv]);
    }

    public function login(){
        if(Auth::check())
        {
            Auth::logout();
        }
        return view('Utilities.login')->with(['title' => 'Login']);
    }

    public function register()
    {
        if(Auth::check())
        {
            Auth::logout();
        }
        return view('Utilities.register')->with(['title' => 'Register']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->action('UtilityController@login');
    }

    public function contact()
    {
        return view('Utilities.contact')->with(['title' => 'Contact Us']);
    }
    public function about()
    {
        return view('Utilities.about')->with(['title' => 'About Us']);
    }

    public function listings()
    {
        return view('Utilities.listing')->with(['title' => 'Listing','inv' => inv_aff::where(['is_active' => true])->get()]);
    }
}
