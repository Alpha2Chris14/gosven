<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Product;
use App\Verify;
use App\Pod;
use App\Admin;
use App\Category;
use Session;
use Mail;
use App\Notifications\EmailNotification;
use Illuminate\Notifications\Notification;
class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['title'] = "Admin Dashboard";
        $data['user'] = User::all();
        $data['products'] = Product::all();
        $data['pod'] = Pod::all();
        $data['podStatus'] = Pod::whereStatus(1);
        //$admin = Admin::find(1);
        //return view('admin',$data)->with('notifications', $admin->notifications);
        return view('admin',$data);
    }

    public function roles(){
        $data['title'] = "Assign New Role";
        return view('admin.roles.adminrole',$data);
    }

    public function storeroles(Request $request){
        // validate the data
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
       ));

       $admin = new Admin();
       $admin->name = $request->name;
       $admin->email = $request->email;
       $admin->password = Hash::make($request->password);
       $admin->save();
       Session::flash('success','New Admin Has Been Created');
       return view('admin.roles.index');
    }

    public function indexroles(){
        return view('admin.roles.index');
    }

    public function message($id){
        $data['title'] = "Send A Message";
        $data['user'] = User::find($id);
        return view('admin.user.message',$data);
    }
    public function mail(Request $request,$id){
        $user = User::find($id);
        $to_name = $user->name;
        $to_email = $user->email;
        $data = array('name'=>"Gosven Admin", "body" => $request->message);
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Message From Gosven');
        $message->from('gosvenng@gmail.com','Gosven Admin');
        });
        Session::flash('success','New Admin Has Been Created');
            $details = [
                'greeting' => 'Hello There!!!',
                'body' => 'You Got A New From Us In Your Inbox @'.$to_email.' Check Your Email Account',
                'thanks' => 'Thank you!',
            ];

            $user->notify(new EmailNotification($details));
            Session::flash('success','Mail Has Been Sent To '.$to_email);
            return redirect()->route('user.index');
    }
    

}
