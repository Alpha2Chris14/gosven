<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pod;
use App\User;
use App\Admin;
use App\Category;
use App\Product;
use Illuminate\Notifications\Notification;
use App\Notifications\UserNotification;
use Session;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function all(){
        $data['title'] = "All Delivery";
        $data['categories'] = Category::all();
        $data['pod'] = Pod::all();
        return view("admin.delivery.index",$data);
    }

    public function single($id){
        $data['p'] = Pod::find($id);
        $data['categories'] = Category::all();
        $data['title'] = "Transaction For ".$data['p']->firstName;
        if($data['p']->seller_name > 0){
            $data['user'] = User::find($data['p']->seller_name);
        }
        else{
            $data['user'] = Admin::first();
        }
        //$data['buyer'] = User::find($data['p']->buyer_name);
        return view('admin.delivery.single',$data);
       //echo $data['p'] ;
    }

    public function approve($id){
        $p = Pod::find($id);
        $product = Product::find($p->product_id);
        $product->quantity = $product->quantity - $p->quantity;
        $product->save();
        $data['categories'] = Category::all();
        $p->status = 1;
        $p->save();
        Session::flash('success','This Delivery With Transaction ID: '.$p->buyer_name.' Was Approved.');
        //Send Notification To User

        if($p->seller_name >= 1 ){
        $user = User::find($p->seller_name);

            $details = [
                'greeting' => 'Hello There!!!',
                'body' => 'A New Order Was Created',
                'thanks' => 'Thank you!',
            ];

        $user->notify(new UserNotification($details));
        } 
        //Redirect To Another Page
        return redirect()->route("admin.delivery",$p->id);
    }

    public function decline($id){
        $p = Pod::find($id);
        $data['categories'] = Category::all();
        $p->status = 0;
        $p->save();
        Session::flash('success','This Delivery With Transaction ID: '.$p->buyer_name.' Was Declined.'); 
        //Redirect To Another Page
        return redirect()->route("admin.delivery",$p->id);
    }

    public function destroy($id)
    {
        $p = Pod::findorFail($id); 
        $data['categories'] = Category::all();   
        $p->delete();
        Session::flash('success','Delevery was deleted successfully.'); 
        return redirect()->route("admin.delivery",$p->id);
    }
}
