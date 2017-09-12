<?php

namespace App\Http\Controllers;

use App\Deal;
use App\DealApp;
use App\Earning;
use App\Helper\Logger;
use App\inv_aff;
use App\news;
use App\Product;
use App\Transactions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private function getID($id)
    {
        return ($id/(8009*8009));
    }
    private function Logger()
    {
        return new Logger();
    }
    public function dashboard()
    {
        return view('User.dashboard')->with(['title' => 'Dashboard']);
    }
    public function profile()
    {
        return view('User.profile')->with(['title' => 'Profile','user' => Auth::user()]);
    }

    //News
    public function news()
    {
        return view('User.News.list')->with(['title' => 'Latest News','news' => news::where(['is_active' => true])->orderBy('created_at','DESC')->paginate(10)]);
    }
    public function news_view($id){
        $id = $this->getID($id);
        $news = news::find($id);
        //dd($id,$news );
        return view('User.News.view')->with(['title' => 'Latest News','m' => $news]);
    }


    public function Invest()
    {
        $inv = inv_aff::where([ 'is_active' => true])->orderBy('created_at','DESC')->get();
        return view('User.f_invest')->with(['title' => 'Club Investment','inv' => $inv]);
    }

    public function fInvestReg($id)
    {
        $id = $this->getID($id);
        return view('User.inv_reg')->with(['title' => 'Investment Registration','inv' => inv_aff::find($id)]);
    }


    //Market
    public function market()
    {
        return view('User.OM.market')->with(['title' => 'Market','mar' => Product::where(['is_active' => true])->orderBy('created_at','DESC')->paginate(10)]);
    }
    public function marketAdd()
    {
        return view('User.OM.add')->with(['title'=>'Add Goods','t' => 1]);
    }
    public function marketEdit($id)
    {
        $e =  ($id )/( 8009 * 8009);
        return view('User.OM.add')->with(['title' => 'Edit Product','m'=>Product::find($e),'t' => 2]);
    }
    public function marketContact($id)
    {
        $e =  ($id)/( 8009 * 8009);
        return view('User.OM.contact')->with(['title' => 'Edit Product','u'=>User::find($e)]);
    }
    public function marketDelete($id)
    {
        $e =  ($id)/( 8009 * 8009);
        $u = Product::find($e);
        $u->is_active = false;
        try{
            $u->save();
            Session::flash('success','Product has been successfully taken off the market');
            return redirect()->action('UserController@market');
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('Delete Product: Unable to Delete Product',$ex,['prod' => $u]);
            return redirect()->back();
        }
    }


    //Finance
    public function finance()
    {
        return view('User.Finance.finance')->with(['title' => 'Finance']);
    }
    public function loans()
    {
        $inv = inv_aff::where(['trade_id' => 8, 'is_active' => true])->orderBy('created_at','DESC')->get();
        return view('User.Finance.loans')->with(['title' => 'Loans','inv' => $inv]);
    }

    public function trans()
    {
        $trans = Transactions::where(['user_id' => Auth::id()])->orderBy('created_at','DESC')->get();
        return view('User.Finance.trans')->with(['title' => 'Transactions | Users','trans' => $trans]);
    }

    public function earn(){
        $earn = Earning::where(['user_id' => Auth::id()])->orderBy('created_at','DESC')->get();
        return view('User.Finance.earn')->with(['title' => 'Earnings','earn' => $earn]);
    }
    public function earn_id($id){
        $earn = Earning::where(['t_id' => $id,'user_id' => Auth::id()])->orderBy('created_at','DESC')->get();
        return view('User.Finance.earn')->with(['title' => 'Earnings','earn' => $earn]);
    }


    //Deals
    public function deals()
    {
        $inv = Deal::where(['is_active' => true])->orderBy('created_at','DESC')->get();
        return view('User.deals')->with(['title' => 'Deals','inv' => $inv]);
    }

    public function dealsReg($id){
        //dd($id);
        $id = $this->getID($id);
        return view('User.d_reg')->with(['title' => 'Deals Application','inv' => Deal::find($id)]);
    }

    //Awards
    public function awards()
    {
        $inv = inv_aff::where(['trade_id' => 6, 'is_active' => true])->orderBy('created_at','DESC')->get();
        return view('User.Finance.loans')->with(['title' => 'Awards','inv' => $inv]);
    }

    //ICJ
    public function icj()
    {
        $inv = inv_aff::where(['trade_id' => 7, 'is_active' => true])->orderBy('created_at','DESC')->get();
        return view('User.Finance.loans')->with(['title' => 'International Job Contract','inv' => $inv]);
    }
}
