<?php

namespace App\Http\Controllers;

use App\Award;
use App\Deal;
use App\DealApp;
use App\Earning;
use App\FileEntry;
use App\Helper\Logger;
use App\inv_aff;
use App\inv_reg;
use App\inv_tut;
use App\mailers\AppMailer;
use App\news;
use App\paw;
use App\Product;
use App\Role;
use App\Trade;
use App\Transactions;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ValidationController extends Controller
{
    private function getID($id)
    {
        return ($id/(8009*8009));
    }
    private function Logger()
    {
        return new Logger();
    }
    public function login(Request $request)
    {
        //dd($request->all());
        if(Auth::attempt(['email' => $request->email,'password' => $request->password]))
        {
            if(Auth::user()->role_id == 3)
            {
                return redirect()->action('UserController@dashboard');
            }
            if(Auth::user()->role_id < 3){
                return redirect()->action('AdminController@dashboard');
            }

        }
        Session::flash('error','Email/Password Incorrect');
        return redirect()->back();

    }
    public function register(Request $request, AppMailer $mailer)
    {
        //dd($request->all(), Input::all(),$request->hasFile('user_image'));

        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email',
            'phone_number' => 'required',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'address' => 'required',
            'password' => 'required',
            'conf_password' => 'required|same:password'
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email =$request->email;
        $user->phone_number = $request->phone_number;
        $user->address =$request->address;
        $user->password = Hash::make($request->password);
        $user->image = null;
        /*if($request->hasFile('image')) {
            $file = $request->file('image');
            $imagename = $user->firstname . '-' . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();

            Storage::disk('uploads')->put($imagename, File::get($file));
            $fe = new FileEntry();
            $fe->mime = $file->getClientMimeType();
            $fe->original_filename = $file->getClientOriginalName();
            $fe->filename = $imagename;
            try {
                $fe->save();
                Log::info('Register: File Entry Saved', ['Entry' => $fe]);
                $user->image = $imagename;
                //dd('Success');
            } catch (\Exception $ex) {
                $this->Logger()->LogError('Unable To Save File Entry',$ex,['File' => $fe, 'user' => $user]);
            }
        }
        else{

        }*/

        $user->image = 'avatar.png';
        try{
            //$user->save();
            $mailer->activateUser($user);
            Session::flash('success','Hurray!!! Registration Completed Successfully, You Can Sign In Now');
            return redirect()->route('login');
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('Registration Error: Unable to register user',$ex,['User' => $user]);
            Session::flash('error','Oops, An Error Occurred and We Could Not Register You, Please try again or chat with an customer care service by clicking on the green button below. Thank you');
        }
        //dd($request->all(), Input::all(),$request->hasFile('user_image'));

    }
    public function getFile($filename)
    {
        $entry = FileEntry::where('filename', '=', $filename)->first();
        Log::info(['entry' => $entry]);
        if($entry != null)
        {
            Log::info('Not Null');
            $name  = $entry->filename;
            $mime  = $entry->mime;
        }
        else{
            Log::info('Null');
            $name = $filename;
            $mime  = 'image/png';
        }


        $file = Storage::disk('uploads')->get($name);


        return (new Response($file, 200))
            ->header('Content-Type', $mime);
    }

    //------------------------Users Post --------------------------//
    public function AllReg($id, Request $request)
    {
        $id = $this->getID($id);
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        $reg = new inv_reg();
        $reg->inv_id = $id;
        $reg->user_id = Auth::id();
        $reg->firstname = $request->firstname;
        $reg->lastname = $request->lastname;
        $reg->gender = $request->gender;
        $reg->dob = Carbon::parse($request->dob);
        $reg->country = $request->country;
        $reg->city = $request->city;
        $reg->state = $request->state;
        $reg->address = $request->address;
        $reg->email = $request->email;
        $reg->phone_number = $request->phone_number;
        $reg->s_id = 2;

        try{
            $reg->save();
            //mail
            Session::flash('success', 'You have successfully registered for this Investment');
            return redirect()->back();
        }
        catch (\Exception $ex)
        {
            $this->Logger()->LogError('Investment Reg: Unable to add investment', $ex,['reg' => $reg,'by' => Auth::id()]);
            //dd($ex->getMessage());
            Session::flash('error','Oops an error occurred, please try again.  If error persists, kindly chat with us by clicking on the chat button below');
            return redirect()->back();
        }

    }
    public function marketView(Request $request)
    {
        return view('User.OM.view')->with(['title' => 'View Product','m' => Product::find($request->id)]);
    }
    public function marketAdd(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $prod = new Product();
        $prod->user_id = Auth::id();
        $prod->name = $request->name;
        $prod->description = $request->desc;
        $prod->image = null;
        $prod->is_active = true;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $imagename = $prod->name . '-' .Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();
            Storage::disk('uploads')->put( $imagename,  File::get($file));
            $fe = new FileEntry();
            $fe->mime = $file->getClientMimeType();
            $fe->original_filename = $file->getClientOriginalName();
            $fe->filename = $imagename;
            try{
                $fe->save();
                Log::info('Register: File Entry Saved',['Entry' => $fe]);
                $prod->image = $imagename;
                //dd('Success');
            }
            catch(\Exception $ex)
            {
                $this->Logger()->LogError('Unable To Add Files',$ex,['inv' => $prod, 'FileEntry' => $fe,'by' =>Auth::id()]);
            }
        }
        try{
            $prod->save();
            Session::flash('success','Product has been successfully added to CIMC\' Market. ');
            return redirect()->action('UserController@market');
        }
        catch(\Exception $ex){
            $this->Logger()->LogError('Add Product: Unable to add product.',$ex,['prod' => $prod]);
            Session::flash('error','Oops, An error occurred, Please try again and if problem persists, kindly talk to our Customer Representative');
            return redirect()->back();
        }
    }
    public function marketEdit(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $e = ($id)/(8009*8009);
        //dd($e,$request->all());
        $prod = Product::find($e);
        $prod->name = $request->name;
        $prod->description = $request->desc;
        $prod->image = null;
        $prod->is_active = true;
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $prod->image = $prod->name. '-' . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products/');
            $image->move($destinationPath, $prod->image);
        }
        try{
            $prod->save();
            Session::flash('success','Product has been successfully Editted. ');
            return redirect()->action('UserController@market');
        }
        catch(\Exception $ex){
            $this->Logger()->LogError('Edit Product: Unable to Edit product.',$ex,['prod' => $prod]);
            Session::flash('error','Oops, An error occurred, Please try again and if problem persists, kindly talk to our Customer Representative');
            return redirect()->back();
        }
    }
    public function marketSearch(Request $request)
    {
        //$prod = Product::where('name','LIKE','%'.$request->search.'%')->where(['is_active'=>true])->get();
        return view('User.OM.market')->with(['title' => 'Market','mar' => Product::where('name','LIKE','%'.$request->search.'%')->where(['is_active'=>true])->orderBy('id','DESC')->paginate(10)]);
    }
    public function profileEdit(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone_number' => 'required',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'address' => 'required',
            'password' => 'required',
        ]);

        //dd($request->all());
        try {
            $user = User::find(Auth::id());
            $user_old = $user;
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->phone_number = $request->phone_number;
            $user->address = $request->address;
            if ($request->hasFile('image')) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
                ]);
                $file = $request->file('image');
                $imagename = $user->firstname . '-' . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();

                Storage::disk('uploads')->put($imagename, File::get($file));
                $fe = new FileEntry();
                $fe->mime = $file->getClientMimeType();
                $fe->original_filename = $file->getClientOriginalName();
                $fe->filename = $imagename;
                try {
                    $fe->save();
                    Log::info('Register: File Entry Saved', ['Entry' => $fe]);
                    $user->image = $imagename;
                    //dd('Success');
                } catch (\Exception $ex) {
                    $this->Logger()->LogError('Unable To Save File Entry', $ex, ['File' => $fe, 'user' => $user]);
                }


                //dd($request->all(), 'image');
            }
            try {
                if(Hash::check($request->password,$user->password))
                {
                    $user->save();
                    Log::info('User Profile Updated', ['Old Data' => json_encode($request->all()),'New Data' => json_encode($user)]);
                    Session::flash('success','Profile Updated Succeccfully.');
                    return redirect()->back();
                }
                else{
                    Session::flash('error','Password Mismatch, Please input the correct password');
                    return redirect()->back();
                }
            } catch (\Exception $ex) {
                $this->Logger()->LogError('Profile Edit Error: Unable to edit profile', $ex, ['old' => $user_old,'User' => $user,'by' => Auth::id()]);
                Session::flash('error', 'Oops, An Error Occurred and We Could Not Edit your Profile, Please try again or chat with an customer care service by clicking on the Red button below. Thank you');
            }
        }
        catch (\Exception $ex){

        }
    }
    public function dealsReg(Request $request, $id)
    {
        $id = $this->getID($id);
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        $reg = new DealApp();
        $reg->d_id = $id;
        $reg->user_id = Auth::id();
        $reg->firstname = $request->firstname;
        $reg->lastname = $request->lastname;
        $reg->gender = $request->gender;
        $reg->dob = Carbon::parse($request->dob);
        $reg->country = $request->country;
        $reg->city = $request->city;
        $reg->state = $request->state;
        $reg->address = $request->address;
        $reg->email = $request->email;
        $reg->phone_number = $request->phone_number;

        try{
            $reg->save();
            //mail
            Session::flash('success', 'You have successfully registered for this Investment');
            return redirect()->action('UserController@deals');
        }
        catch (\Exception $ex)
        {
            $this->Logger()->LogError('Investment Reg: Unable to add investment', $ex,['reg' => $reg,'by' => Auth::id()]);
            //dd($ex->getMessage());
            Session::flash('error','Oops an error occurred, please try again.  If error persists, kindly chat with us by clicking on the chat button below');
            return redirect()->back();
        }
    }





    //----------------------Admin Posts--------------------------------//
    public function inv_add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'text' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

                $inv = new inv_aff();
        $inv->name = $request->name;
        $inv->text = $request->text;
        $inv->image = null;
        $inv->link = $request->link;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $imagename = $inv->name . '-' .Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();
            Storage::disk('uploads')->put( $imagename,  File::get($file));
            $fe = new FileEntry();
            $fe->mime = $file->getClientMimeType();
            $fe->original_filename = $file->getClientOriginalName();
            $fe->filename = $imagename;
            //dd($request->all(), $request->allFiles(), $inv);
            try{
                $fe->save();
                Log::info('Register: File Entry Saved',['Entry' => $fe]);
                $inv->image = $imagename;
                //dd('Success');
            }
            catch(\Exception $ex)
            {
                $this->Logger()->LogError('Unable To Add Files',$ex,['inv' => $inv, 'FileEntry' => $fe]);
            }
        }
        try{
            $inv->save();
            Session::flash('success','Data Added Successfully');
            Log::info('Add-INV: Investment Added Successfully',['inv' => $inv,'added-by' => Auth::id()]);
            return redirect()->action('AdminController@invest');
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('Add-INV: an error occurred when trying to upload data', $ex,['inv' => $inv,'added-by' => Auth::id()]);
            Session::flash('error','Oops, A minor error occurred, Please check Log files');

            return redirect()->back()->withInput();
        }

    }
    public function invest_edit($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'text' => 'required',
        ]);
        try{
            $inv = inv_aff::find($this->getID($id));
            $inv->name = $request->name;
            $inv->text = $request->text;
            $inv->link = $request->link;
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $imagename = $inv->name . '-' .Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();
                Storage::disk('uploads')->put( $imagename,  File::get($file));
                $fe = new FileEntry();
                $fe->mime = $file->getClientMimeType();
                $fe->original_filename = $file->getClientOriginalName();
                $fe->filename = $imagename;
                try{
                    $fe->save();
                    Log::info('Register: File Entry Saved',['Entry' => $fe]);
                    $inv->image = $imagename;
                    //dd('Success');
                }
                catch(\Exception $ex)
                {
                    $this->Logger()->LogError('Unable To Add Files',$ex,['inv' => $inv, 'FileEntry' => $fe]);
                }
            }

            try{
                $inv->save();
                Session::flash('success','Data Updated Successfully');
                return redirect()->action('AdminController@invest');
            }
            catch(\Exception $ex)
            {
                $this->Logger()->LogError('INV Edit: an error occurred when trying to upload data', $ex,['inv' => $inv]);
                Session::flash('error','Oops, A minor error occurred, Please check Log files');

                return redirect()->back()->withInput();
            }
            //dd($this->getID($id), $request->all(), $inv);
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('INV Edit: an error occurred when trying to update data',$ex, ['inv' => $inv]);
            return redirect()->back()->withInput();
        }

    }
    public function invest_tut($id, Request $request )
    {
        $this->validate($request,[
            'tut' => 'required'
        ]);

        $tut = new inv_tut();

        if($request->hasFile('tut'))
        {
            $file = $request->file('tut');
            $tut->name = inv_aff::find($this->getID($id))->name . '-' . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();
            $tut->inv_id = $this->getID($id);
            Storage::disk('uploads')->put( $tut->name,  File::get($file));
            $fe = new FileEntry();
            $fe->mime = $file->getClientMimeType();
            $fe->original_filename = $file->getClientOriginalName();
            $fe->filename = $tut->name;
            try{
                $fe->save();
                Log::info('Register: File Entry Saved',['Entry' => $fe]);
            }
            catch(\Exception $ex)
            {
                $this->Logger()->LogError('Unable To Add Files',$ex,['tut' => $tut, 'FileEntry' => $fe]);
            }
            $tut->is_active = true;
        }
        else
        {
            //dd($request->all());
            Session::flash('error','an Error occured, Please try again');
            return redirect()->back();
        }

        try{
            $tut->save();
            Log::info('Add Invest Tutorial: Tutorial Added successfully.',['tut' => $tut, 'by' => Auth::id()]);
            Session::flash('success','File successfully uploaded');
            return redirect()->back();
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('Add Invest tut: Unable to Upload tut', $ex, ['tut' => $tut, 'by' => Auth::id()]);
            Session::flash('error','An error occurred, Please check log files');
            return redirect()->back();
        }
    }
    public function user_upgrade($id,Request $request)
    {
        try{
            $user = User::find($this->getID($id));
            $old_user = $user;
            $user->level_id = $request->level_id;
            try{
                $user->save();
                Session::flash('success','User Has been Upgraded to Preferred Status');
                Log::info('User Upgrade: User has been upgraded',['user' => $user,'old' => $old_user, 'by' => Auth::id()]);
                return redirect()->action('AdminController@dashboard');
            }
            catch(\Exception $ex)
            {
                $this->Logger()->LogError('Level Upgrade: Upgrade not successful', $ex, ['user' => $user,'old' => $old_user, 'by' => Auth::id()]);
                Session::flash('error','Level Upgrade: An error occurred, Please check Log.');
                return redirect()->back();
            }
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('User Upgrade: An Error Occurred', $ex, ['user' => $user, 'id' =>$this->getID($id),'Data' => $request->all()]);
            Session::flash('error','User Upgrade: An error occurred, Please check Log.');
            return redirect()->back();
        }
    }
    //Admin
    public function addAdmin(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'conf_password' => 'required|same:password'
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone_number = 'empty';
        $user->role_id = 2;
        $user->is_active = true;
        $user->address = 'empty';
        $user->image = 'image';
        try{
            $user->save();
            Session::flash('success','Administrator Added Successfully');
            Log::info('Add Admin: Admin has been added',['Admin' => $user, 'by' => Auth::user()]);
            return redirect()->back();
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError(' Admin Registration Error: Unable to register Admin',$ex,['User' => $user]);
            Session::flash('error','Oops, An Error Occurred and We Could Not Complete the request, Please Try Again');
            return redirect()->back();
        }
        //dd($request->all());
    }
    //News
    public function news_add(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'text' => 'required',
        ]);

        $nw = new news();
        $nw->title = $request->title;
        $nw->text = $request->text;
        $nw->is_active = true;
        try{
            $nw->save();
            Session::flash('success','News Successfully Added to Timeline');
            Log::info('News: Data Added To Timeline',['news' => $nw,'by' => Auth::id()]);
            return redirect()->back();
        }
        catch(\Exception $ex)
        {
            Session::flash('error','News: An Error Occurred, Please check Log');
            $this->Logger()->LogError('News: Unable to add News',$ex, ['news' => $nw, 'by' => Auth::id()]);
            return redirect()->back();
        }
    }

    public function cat_add(Request $request)
    {

        $this->validate($request,[
            'name' => 'required'
        ]);


        $nw = new Trade();
        $nw->name = $request->name;
        $nw->is_active = true;
        try{
            $nw->save();
            Session::flash('success','Category Successfully Added');
            Log::info('Category: Data Added To DB',['by' => Auth::id()]);
            return redirect()->back();
        }
        catch(\Exception $ex)
        {
            Session::flash('error','Category: An Error Occurred, Please check Log');
            $this->Logger()->LogError('Category: Unable to add News',$ex, ['cat' => $nw, 'by' => Auth::id()]);
            return redirect()->back();
        }
    }


    //Both Admin and User
    public function regDelete($id)
    {
        $id = $this->getID($id);
        try{
            $in = inv_reg::findOrFail($id);
            $in->is_active = false;
            $in->s_id = 3;
            $in->save();
            Session::flash('success','Operation Successfully Carried Out.');
            Log::info('Investment Reg: Registration Successfully Denied',['reg' => $in,'by' => Auth::id()]);
        }
        catch(\Exception $ex){
            $this->Logger()->LogError('Unable to declined Registration',$ex,['reg' => $in,'by' => Auth::id()]);
        }

        return redirect()->back();


    }


    //Earnings
    public function earn_add(Request $req)
    {
        $this->validate($req,[
            't_id' => 'required',
            'user_id' => 'required',
            'amount' => 'required',
            'desc' => 'required',
        ]);

        $earn = new Earning();
        $earn->t_id = $req->t_id;
        $earn->e_id = $this->GenerateEID();
        $earn->user_id = $req->user_id;
        $earn->amount = $req->amount;
        $earn->descn = $req->desc;
        try{
            $earn->save();
            Session::flash('success', 'Earnings has Been Added');
            Log::info('Earnings Has Been Added',['earn ' => $earn]);
        }
        catch(\Exception $ex)
        {
            Session::flash('error','An Error Has ocurred, Please check log');
            $this->Logger()->LogError('Unable to add earnings',$ex,['earn' => $earn, 'by' => Auth::id()]);
        }

        return redirect()->back();
    }

    //Awards
    public function awards_add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $aw = new Award();
        $aw->name = $request->name;
        $aw->HTW = $request->htw;
        $aw->sus = false;
        $aw->is_active = true;
        if ($request->hasFile('image')) {
            //dd($request->all());
            $file = $request->file('image');
            $aw->image = $aw->name . '-' . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();
            //dd($aw->image);
            Storage::disk('uploads')->put($aw->image, File::get($file));
            $fe = new FileEntry();
            $fe->mime = $file->getClientMimeType();
            $fe->original_filename = $file->getClientOriginalName();
            $fe->filename = $aw->image;
            try {
                $fe->save();
                Log::info('Register: File Entry Saved', ['Entry' => $fe]);
            } catch (\Exception $ex) {
                $this->Logger()->LogError('Unable To Add Files', $ex, ['awd' => $aw, 'FileEntry' => $fe, 'bby' => Auth::id()]);
            }
        }
        //dd(false);
        try {
            $aw->save();
            Session::flash('success', 'Awards Add Successfully');
            Log::info('ADD AWARD: Award has added to the list', ['award' => $aw, 'by' => Auth::id()]);
        } catch (\Exception $ex) {
            $this->Logger()->LogError('ADD AWARD: Unable to add award', $ex, ['award' => $aw, 'by' => Auth::id()]);
        }

        return redirect()->back();
        //  dd($aw);
    }
    public function awards_win_wadd(Request $req,$id){
        $this->validate($req,[
            'name' => 'required',
        ]);

        $p = new paw();
        $p->a_id = $id;
        $p->name = $req->name;
        $p->testm = $req->testm;
        try{
            $p->save();
            Session::flash('success','Data Successfully added');
            Log::info('Award Winners: Data added successfully',['paw' => $p,'by' => Auth::id()]);
        }
        catch(\Exception $ex)
        {
            $this->Logger()->LogError('Award Winner:  Unable TO Add Data',$ex,['paw' => $p,'by' => Auth::id()]);
            Session::flash('error','Unable to Add Data, Please check Logs');
        }
        return redirect()->back();
        //dd($req->all(), $id);
    }

    //Deals
    public function deals_add(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'descn' => 'required',
        ]);
        $d = new Deal();
        $d->name = $request->name;
        $d->descn = $request->descn;
        $d->image = null;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $d->image = $d->name . '-' . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();
            Storage::disk('uploads')->put( $d->image,  File::get($file));
            $fe = new FileEntry();
            $fe->mime = $file->getClientMimeType();
            $fe->original_filename = $file->getClientOriginalName();
            $fe->filename = $d->image;
            try{
                $fe->save();
                Log::info('Register: File Entry Saved',['Entry' => $fe]);
            }
            catch(\Exception $ex)
            {
                $this->Logger()->LogError('Unable To Add Files',$ex,['deal' => $d, 'FileEntry' => $fe,'bby' => Auth::id()]);
            }
        }
        try{
            $d->save();
            Session::flash('success','Deal Successfully Added...');
            Log::info('Deal Add: Deal added to db',['deal' => $d,'by' => Auth::id()]);
        }

        catch(\Exception $ex)
        {
            $this->Logger()->LogError('Deal Add: Unable To Add Deal',$ex,['deal' => $d, 'FileEntry' => $fe,'by' => Auth::id()]);
        }

        return redirect()->back();

    }
    //Searches and Filters
    public function userSearch(Request $request)
    {
        $this->validate($request,[
            'filt' => 'required',
            'key' => 'required',
        ]);
        $c = null;
        $c2 = null;
        $col = $request->filt;
        $s = $request->key;

        if($col == 0)
        {
            $c = 'id';
        }
        if($col == 1)
        {
            $c = 'firstname';
            $c2 = 'lastname';
        }
        if($col == 2)
        {
            $c = 'email';
        }

        /*if($col == 3)
        {
            $c = 'country';
        }*/
        /*if($col == 4)
        {
            $c = 'state';
        }*/
        /*if($col == 5)
        {
            $c = 'city';
        }*/
        if($col == 6)
        {
            $c = 'level';
        }
        if($col == 7)
        {
            $c = 'is_active';
        }

        //dd($col,$request->all());

        if($col == 1)
        {
            $user = User::where($c,'LIKE','%'.$s.'%')->orWhere($c2,'LIKE','%'.$s.'%')->where(['role_id'=>3])->orderBy('created_at','DESC')->get();
        }
        else{
            $user = User::where($c,'LIKE','%'.$s.'%')->where(['role_id'=>3])->orderBy('created_at','DESC')->get();
        }
        return view('Admin.dashboard')->with(['title' => 'Admin Dashboard','users' => $user]);
    }
    public function newsSearch(Request $request)
    {
        $this->validate($request,[
            'filt' => 'required',
        ]);

        $c = null;
        $c2 = null;
        $col = $request->filt;
        $s = $request->key;

        if($col == 0)
        {
            $c = 'id';
        }
        elseif($col == 1)
        {
            $c = 'title';
        }
        elseif($col == 2)
        {
            $c = 'text';
        }

        $query = news::where($c,'LIKE','%'.$s.'%')->where(['is_active'=>1])->orderBy('created_at','DESC')->get();

        //dd($col,$request->all());

        return view('Admin.news')->with(['title' => 'News - Admin','news' => $query]);
    }
    public function invSearch(Request $request)
    {
        $this->validate($request,[
            'filt' => 'required',
        ]);

        $c = null;
        $c2 = null;
        $col = $request->filt;
        $s = $request->key;

        if($col == 0)
        {
            $c = 'id';
        }
        elseif($col == 1)
        {
            $c = 'name';
        }
        elseif($col == 2)
        {
            $c = 'text';
        }

        $query = inv_aff::where($c,'LIKE','%'.$s.'%')->where(['is_active'=>1])->orderBy('created_at','DESC')->get();
        //dd($col,$request->all());

        return view('Admin.inv')->with(['title' => 'Investment - Admin','inv' => $query]);
    }
    public function invsSearch(Request $request)
    {
        $this->validate($request,[
            'filt' => 'required',
            'key' => 'required',
        ]);

        $c = null;
        $c2 = null;
        $col = $request->filt;
        $s = $request->key;

        if($col == 0)
        {
            $c = 'id';
            $query = inv_reg::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();

        }
        elseif($col == 1)
        {
            $c = 'user_id';
            $query = inv_reg::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();
        }
        elseif($col == 2)
        {
            $c = 'inv_id';
            $query = inv_reg::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();
        }

        //dd($col,$request->all());

        return view('Admin.inv_reg')->with(['title' => 'Investors - Admin','reg' => $query]);
    }
    public function transSearch(Request $request)
    {
        $this->validate($request,[
            'filt' => 'required',
            'key' => 'required',
        ]);

        $c = null;
        $c2 = null;
        $col = $request->filt;
        $s = $request->key;

        if($col == 0)
        {
            $c = 't_id';
            $query = Transactions::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();

        }
        elseif($col == 1)
        {
            $c = 'user_id';
            $query = Transactions::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();
        }
        elseif($col == 2)
        {
            $c = 'inv_id';
            $query = Transactions::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();
        }

        //dd($col,$request->all());

        return view('Admin.trans')->with(['title' => 'Transactions','trans' => $query,'t' => 1]);
    }
    public function earnSearch(Request $request)
    {
        $this->validate($request,[
            'filt' => 'required',
            'key' => 'required',
        ]);

        $c = null;
        $c2 = null;
        $col = $request->filt;
        $s = $request->key;

        if($col == 0)
        {
            $c = 't_id';
            $query = Earning::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();

        }
        elseif($col == 1)
        {
            $c = 'e_id';
            $query = Earning::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();
        }
        elseif($col == 2)
        {
            $c = 'user_id';
            $query = Earning::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();
        }
        elseif($col == 3)
        {
            $c = 'inv_id';
            $query = Earning::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();
        }

        //dd($col,$request->all());

        return view('Admin.trans')->with(['title' => 'Transactions','trans' => $query,'t' => 1]);
    }
    public function awardSearch(Request $request)
    {
        $this->validate($request,[
            'filt' => 'required',
            'key' => 'required',
        ]);
        $c = null;
        $c2 = null;
        $col = $request->filt;
        $s = $request->key;

        if($col == 0)
        {
            $c = 'id';
            $query = Award::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();

        }
        elseif($col == 1)
        {
            $c = 'name';
            $query = Award::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();
        }
        elseif($col == 2)
        {
            $c = 'HTW';
            $query = Award::where($c,'LIKE','%'.$s.'%')->orderBy('created_at','DESC')->get();
        }

        //dd($col,$request->all());

        return view('Admin.awards')->with(['title' => 'Awards Search','awa' => $query]);
    }

    public function dinvSearch(Request $req){

        $query = inv_aff::where('name','LIKE','%'.$req->Search.'%')->where(['is_active'=>1])->orderBy('created_at','DESC')->get();
        return  view('Utilities.listing',['title' => 'Search | Investment','inv' => $query]);
    }


    //deals


    public function dealSearch(Request $req)
    {

    }



    //Utilities
    private function GenerateEID()
    {
        $t_id = str_random(15);
        if(Earning::findByT_ID($t_id))
        {
            return $t_id;
        }
        else
        {
            $this->GenerateEID();
        }
    }


}
