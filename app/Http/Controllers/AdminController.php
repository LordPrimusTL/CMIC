<?php

namespace App\Http\Controllers;

use App\Award;
use App\Deal;
use App\DealApp;
use App\Earning;
use App\ErrorLog;
use App\Helper\Logger;
use App\inv_aff;
use App\inv_reg;
use App\inv_stat;
use App\inv_tut;
use App\level;
use App\news;
use App\PAW;
use App\Product;
use App\Role;
use App\Trade;
use App\Transactions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private function Logger()
    {
        return new Logger();
    }
    private function getID($id)
    {
        return ($id/(8009*8009));
    }
    public function dashboard()
    {
        $user = User::where(['role_id' => 3,'is_active' => true])->orderBy('created_at','DESC')->get();
        return view('Admin.dashboard')->with(['title' => 'Admin Dashboard','users' => $user]);
    }

    //User
    public function user_view($id)
    {
        $user = User::find($this->getID($id));
        return view('Admin.user_view') -> with(['title' => 'Upgrade User', 'u' => $user, 'lvl' => level::all()]);
    }
    public function user_delete($id)
    {
        try{
            $user = User::find($this->getID($id));
            $user->is_active = false;
            try{
                $user->save();
                Session::flash('success','User Has been Upgraded to Preferred Status');
                return redirect()->action('AdminController@dashboard');
            }
            catch(\Exception $ex)
            {
                $this->Logger()->LogError('User Delete: Delete not successful', $ex, ['user' => $user]);
                Session::flash('error','Delete User: An error occurred, Please check Log.');
                return redirect()->back();
            }
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('User Delete Method: An Error Occurred', $ex, ['user' => $user, 'id' =>$this->getID($id)]);
            Session::flash('error','User Delete: An error occurred, Please check Log.');
            return redirect()->back();
        }
    }

    //Admin
    public function admin()
    {
        $admin = User::where(['role_id' => 2,'is_active' => true])->orderBy('created_at','DESC')->get();
        //$user = Role::find(2)->users()->where(['is_active' => true])->get();sort later
        return view('Admin.admin')->with(['title' => 'List Admins','adm' => $admin]);
        dd( $admin);
    }
    public function admin_delete($id)
    {
        $id = $this->getID($id);
        if(Auth::user()->role_id == 1)
        {

            try{
                $adm = User::where(['role_id' => 2, 'id' => $id])->first();
                $adm->is_active = false;
                $adm->save();
                Session::flash('success','Operation was successfully carried out');
                Log::info('Delete Admin: Admin Successfully Deleted. ', ['admin' => $adm,'Super_admin' => Auth::id()]);
            }
            catch(\Exception $ex)
            {
                $this->Logger()->LogError('Delete Admin: Unable to delete admin',$ex,['admin' => $adm]);
                Session::flash('error','Unable to carry out operation. Please check log files');
            }
        }
        else{
            Session::flash('error','You don\'t have the necessary permission to carry out this operation.');
            Log::error('Tyring to Delete an admin with out proper access', ['Admin' => $id, 'by' => Auth::id()]);
        }
        return redirect()->back();

    }


    //categories
    public function cat()
    {
        return view('Admin.cat')->with(['title' => 'Categories','cat' => Trade::where(['is_active' => true])->orderBy('created_at','DESC') -> get(),'t' => 1]);
    }
    public function cat_delete($id)
    {
        $id = $this->getID($id);
        $news = Trade::find($id);
        $news->is_active = false;
        try{
            $news->save();
            Session::flash('success','Category Successfully Deleted');
            Log::info('Category Successfully deleted',['cat' => $news,'by' => Auth::id()]);
            return redirect()->back();
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('Category was unable to be deleted',$ex,['news' => $news,'by' => Auth::id()]);
            Session::flash('error','Unable to Complete this operation, Check Log');
            return redirect()->back();
        }
    }

    //News
    public function news()
    {

        //dd(news::where(['is_active' => true])->orderBy('id','DESC')->get());
        return view('Admin.news')->with(['title' => 'News - Admin','news' => news::where(['is_active' => true])->orderBy('created_at','DESC')->get()]);
    }
    public function news_delete($id)
    {
        $id = $this->getID($id);
        $news = news::find($id);
        $news->is_active = false;
        try{
            $news->save();
            Session::flash('success','News Successfully Deleted');
            Log::info('News Successfully deleted',['news' => $news,'by' => Auth::id()]);
            return redirect()->back();
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('News was unable to be deleted',$ex,['news' => $news,'by' => Auth::id()]);
            Session::flash('error','Unable to Complete this operation, Check Log');
            return redirect()->back();
        }

    }


    //Investment
    public function invest()
    {
        $inv = inv_aff::where(['is_active' => true])->orderBy('created_at','DESC')->get();
        return view('Admin.inv')->with(['title' => 'Investment: Admin', 'inv' => $inv,]);
    }
    public function invest_add()
    {
        return view('Admin.inv_add')->with(['title' => 'Add Foreign Investment','e' => 1]);
    }
    public function invest_edit($id)
    {
        //dd($this->getID($id));
        $inv = inv_aff::find($this->getID($id));
        return view('Admin.inv_add')->with(['title' => 'Add Foreign Investment','e' => 2,'inv' => $inv]);
    }
    public function invest_tut($id){
        //dd($this->getID($id));
        $int = inv_aff::find($this->getID($id))->tut()->where(['is_active' => true]) ->orderBy('created_at','DESC')->get();
        return view('Admin.inv_tut')->with(['title' => 'Tutorials Investment','inv' => $int,'inn_id' => $this->getID($id)]);
    }
    public function invest_delete($id)
    {
        try{
            $inv = inv_aff::find($this->getID($id));
            $inv->is_active = false;
            try{
                $inv->save();
                Session::flash('success','Operation Successfully Carried Out!!!');
                return redirect()->action('AdminController@invest');
            }
            catch(\Exception $ex)
            {
                $this->Logger()->LogError('INV Delete: Unable to delete data',$ex,['inv' => $inv,'by'=>Auth::id()]);
                Session::flash('error','Oops, An Error Occurred, Please Check Log.');
                return redirect()->back();
            }
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('INV Delete: An error Occurred',$ex,['inv' => $inv,'by' => Auth::id()]);
            Session::flash('error','Oops, An Error Occurred, Please Check Log.');
            return redirect()->back();
        }
    }
    public function delete_tut($id)
    {
        $id = $this->getID($id);
        try{
            $data = inv_tut::find($id);
            $data->is_active = false;
            try{
                $data->save();
                Log::info('Delete Tut: Tutorial deleted successfully',['tut' => $data, 'by' => Auth::id()]);
                Session::flash('success','Tutorial successfully deleted');
            }
            catch(\Exception $ex)
            {
                $this->Logger()->LogError('TUT Delete: Unable to delete data',$ex,['tut' => $data,'by'=>Auth::id()]);
                Session::flash('error','Oops, An Error Occurred, Please Check Log.');
            }
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('TUTDelete: An error Occurred',$ex,['tut' => $data,'by' => Auth::id()]);
            Session::flash('error','Oops, An Error Occurred, Please Check Log.');
        }


        return redirect()->back();
    }
    public function invest_cr($id)
    {
        $id = $this->getID($id);
        $reg = inv_aff::find($id)->reg;
        //dd($reg);
        return view('Admin.inv_reg')->with(['title' => 'Registered Investor','reg' => $reg,'inv_id' => $id]);
    }


    //Investors
    public function invs()
    {
        return view('Admin.inv_reg')->with(['title' => 'Investors','reg' => inv_reg::orderBy('created_at','DESC')->get()]);
    }
    public function invs_auth($id)
    {
        $id = $this->getID($id);
        try{
            $in = inv_reg::findOrFail($id);
            $trans = new Transactions();
            $trans->t_id = $this->GenerateTID();
            $trans->user_id = $in->user_id;
            $trans->inv_id = $in->inv_id;
            //$trans->amount = $in->amount;
            $trans->amount = 0;
            $trans->ts_id = 1;
            $trans->descn = "Investment";
            $trans->t_type = 1;
            $trans->tn_id = 1;
            try{
                $trans->save();
                Log::info('Approve Inv: Data Added to transaction Table',['trans' => $trans,'by' => Auth::id()]);
                $in->s_id = 4;
                $in->save();
                Session::flash('success','Operation Carried out successfully');
                Log::info('Investment Registration Approved',['reg' => $in,'by' => Auth::id()]);
            }
            catch(\Exception $ex)
            {
                $this->Logger()->LogError('Approve Inv: Data was not addad to transaction Table',$ex,['trans' => $trans,'by' => Auth::id()]);
                Session::flash('error','Unable To Authorize, please check Log');
            }

        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('Unable to Approve Investment Registration',$ex,['reg' => $in,'by' => Auth::id()]);
            //dd($ex->getMessage());
        }

        return redirect()->back();
    }


    //Transactions
    public function trans()
    {
        return view('Admin.trans')->with(['title' => 'Transactions','trans' => Transactions::orderBy('created_at','DESC')->get(),'t' => 1]);
    }

    //Earn
    public function earn()
    {
        return view('Admin.trans')->with(['title' => 'Earnings','earn' => Earning::orderBy('created_at','DESC')->get(),'t' => 2,'e' => null]);
    }
    public function earn_id($id)
    {
        $earn = Transactions::where(['t_id'=> $id])->first();
        return view('Admin.trans')->with(['title' => 'Earnings','earn' => Earning::where(['t_id'=> $id])->orderBy('created_at','DESC')->get(),'t' => 2,'e' => $earn]);
    }

    //status
    public function status()
    {
        return view('Admin.cat')->with(['title' => 'Status','stat' => inv_stat::all(), 't' => 2]);
    }

    //Error
    public function error()
    {
        return view('Admin.error')->with(['title' => 'Stack Error','err' => ErrorLog::all()]);
    }
    public function errorEdit($id)
    {
        $id = $this->getID($id);
        $err = ErrorLog::find($id);
        $err->solved = true;
        try{
            $err->save();
            Session::flash('success','Error Log has been updated');
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('Error Log Could Not BE Updated',$ex, ['Error' => $err]);
            Session::flash('error','Error Log Could Not Be Updated');
        }
        return redirect()->back();

    }

    //Market
    public function market()
    {
        return view('Admin.market')->with(['title' => 'Market | Admin','prod' => Product::where(['is_active' => true])->orderBy('created_at','DESC')->get()]);
    }
    public function market_del($id){
        $id = $this->getID($id);
        try{
            $pr = Product::find($id);
            $pr->is_active = false;
            $pr->save();
            Session::flash('success','Product Deleted Successfully');
            Log::info('Prod: Product Deleted from db',['prod' => $pr,'by' => Auth::id()]);
        }
        catch(\Exception $ex){
            $this->Logger()->LogError('Prod: Unable to delete error message',$ex,['prod' => $pr,'by' => Auth::id()]);
            Session::flash('error', 'Unable To Delete Product, Please check Log files');
        }

        return redirect()->back();
    }


    //Awards
    public function awards()
    {
        return view('Admin.awards',['awa' => Award::where(['is_active' => true])->orderBy('created_at','DESC')->get(),
            'title' => 'Awards']);
        //dd(Award::where(['is_active' => true,'sus' => false])->orderBy('created_at','DESC')->get());
    }
    public function awards_sus($id,$val)
    {
        $id = $this->getID($id);
        try{
            $aw = Award::find($id);
            if($val == false)
                $aw->sus = true;
            if($val == true)
                $aw->sus = false;

            $aw->save();
            Session::flash('success','Operation Successful');
            Log::info('Award SUS: Data Toggled',['aw' => $aw,'by' => Auth::id()]);
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('AWARD SUS: Unable to toggle data',$ex,['award' => $aw,'by' => Auth::id()]);
            Session::flash('error', 'Unable To Toggle, Please check Log files');
        }
        return redirect()->back();

        dd($id, $val);
        //dd(Award::where(['is_active' => true,'sus' => false])->orderBy('created_at','DESC')->get());
    }
    public function awards_del($id)
    {
        $id = $this->getID($id);
        try{
            $aw = Award::find($id);
            $aw->is_active = false;
            $aw->save();
            Session::flash('success','Operation Successful');
            Log::info('Award Del: Data Deleted',['aw' => $aw,'by' => Auth::id()]);
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('AWARD Del: Unable to Del data',$ex,['award' => $aw,'by' => Auth::id()]);
            Session::flash('error', 'Unable To Delete, Please check Log files');
        }
        return redirect()->back();

        //dd(Award::where(['is_active' => true,'sus' => false])->orderBy('created_at','DESC')->get());
    }
    public function awards_win($id)
    {
        $id = $this->getID($id);
        $paw = Award::find($id)->paw()->orderBy('created_at','DESC')->get();
        return view('Admin.paw',['title' =>  'Award Winners','paw' => $paw,'a_id' => $id]);
        //dd($id,$paw);
    }
    public function awards_win_del($id)
    {
        $id = $this->getID($id);
        $p = paw::find($id);
        try{
            $p->delete();
            Session::flash('success','Operation Completed Successfully');
            Log::info('Del Paw: Data deleted from DB',['p' => $p,'by' => Auth::id()]);
        }
        catch (\Exception $ex){
            $this->Logger()->LogError('Dele PAW: An Error Occured while Deleting',$ex,['p' => $p,'by' => Auth::id()]);
        }
        return redirect()->back();
    }


    //Deals
    public function deals()
    {
        return view('Admin.deals',['title'=>'Deals','dea' => Deal::where(['is_active' => true])->orderBy('created_at','DESC')->get()]);
    }
    public function deal_cr($id)
    {
        $id = $this->getID($id);
        $reg = Deal::find($id)->dealApp()->orderBy('created_at','DESC')->get();
        //dd($reg);
        return view('Admin.dealApp')->with(['title' => 'Registered Investor','deal' => $reg,'inv_id' => $id]);
    }
    public function dealAuth($id)
    {
        $id = $this->getID($id);
        try{
            $in = DealApp::findOrFail($id);
            try{
                //Send mail Containing Details
                $in->s_id = 4;
                $in->save();
                Session::flash('success','Operation Completed successfully');
                Log::info('Deal Application Completed',['reg' => $in,'by' => Auth::id()]);
            }
            catch(\Exception $ex)
            {
                $this->Logger()->LogError('Approve Inv: Data was not addad to transaction Table',$ex,['deal' => $in,'by' => Auth::id()]);
                Session::flash('error','Unable To Authorize, please check Log');
            }

        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('Unable to Approve Investment Registration',$ex,['reg' => $in,'by' => Auth::id()]);
            //dd($ex->getMessage());
        }

        return redirect()->back();
    }


    public function deals_del($id)
    {
        $id = $this->getID($id);
        try{
            $d = Deal::find($id);
            $d->is_active = false;
            $d->save();
            Session::flash('success','Deal Deleted Successfully');
            Log::info('Del Deal: Deal Deleted Successfully',['deal' => $d,'by' =>  Auth::id()]);
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('Del Deal: Unable to delete deal',$ex, ['deal' => $d,'by' =>  Auth::id()]);
        }
        return redirect()->back();
    }
    public function dealApp()
    {
        $d = DealApp::all();
        return view('Admin.dealApp',['deal' => $d, 'title' => 'Deals Applicant']);
    }

    //Utilities
    private function GenerateTID()
    {
        $t_id = str_random(15);
        if(Transactions::findByT_ID($t_id))
        {
            return $t_id;
        }
        else
        {
            $this->GenerateTID();
        }
    }
}
