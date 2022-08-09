<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use App\Notifications\UserNotification;
use App\Payonline;
use App\User;
use App\Product;
use App\Category;
use App\Admin;
use Session;
class OnlineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $data['title'] = "All Online Orders";
        $data['transactions'] = Payonline::all();
        $data['categories'] = Category::all();
        return view('admin.online.index',$data);
    }

    public function single($id){
        $data['title'] = "Single Order";
        $data['p'] = Payonline::find($id);
        $data['categories'] = Category::all();
        if($data['p']->seller_name > 0){
            $data['user'] = User::find($data['p']->seller_name);
        }
        else{
            // $pointer = 3;
            $data['user'] = Admin::first();
        }
        return view('admin.online.single',$data);
    }

    public function getByTrx($trx){
        $data['title'] = "Order By Transaction";
        $data['categories'] = Category::all();
        $data['transactions'] = Payonline::where('buyer_name','=',$trx);
        return view('admin.online.trx',$data);
    }

    public function approve($id){
        $p = Payonline::find($id);
        $product = Product::find($p->cart_id);
        $product->quantity = $product->quantity - $p->quantity;
        $product->save();
        $data['categories'] = Category::all();
        $p->status = 1;
        $p->save();
        Session::flash('success','This Order With Transaction ID: '.$p->buyer_name.' Was Approved.'); 
        //Send Notification To User

        if($p->seller_name >= 1 ){
            $user = User::find($p->seller_name);
    
                $details = [
                    'greeting' => 'Hello There!!!',
                    'body' => 'A New Order Was Made For Your Product',
                    'thanks' => 'Thank you!',
                ];
    
            $user->notify(new UserNotification($details));
            } 
        //Redirect To Another Page
        return redirect()->route("admin.online");
    }

    public function decline($id){
        $p = Payonline::find($id);
        $data['categories'] = Category::all();
        $p->status = 0;
        $p->save();
        Session::flash('success','This Order With Transaction ID: '.$p->buyer_name.' Was Declined.'); 
        //Redirect To Another Page
        return redirect()->route("admin.online");
    }

    public function destroy($id)
    {
        $p = Payonline::findorFail($id); 
        $data['categories'] = Category::all();   
        $p->delete();
        Session::flash('success','This Order was deleted successfully.'); 
        return redirect()->route("admin.online");
    }
}
