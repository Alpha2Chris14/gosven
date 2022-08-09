<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Pod;
use Session;
use Auth;
use App\User;
use App\Http\Controllers\CartController;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($id){
        $cart = new Cart();
        $product = Product::find($id);


        $cart->name = $product->name;
        $cart->price = $product->price;
        $cart->previous = $product->previous;
        $cart->category = $product->category;
        $cart->weight = $product->weight;
        $cart->unit = $product->unit;
        $cart->quantity = 2;
        $cart->description = $product->description;
        $cart->userInfo = $product->userInfo;
        $cart->image = $product->image;
        $cart->mime = $product->mime;
        $cart->featured_video = $product->featured_video;
        $cart->user_Id = Auth::user()->id;
        Session::flash('success','Item Has Been Added To Cart');
        $cart->save();
        return redirect()->route('welcome','$cart->id');

    }

    public function index(){
        $data['carts'] = Cart::where('user_id','=',Auth::user()->id)->get();
        return view('user.cart.checkout',$data);
        // srand(microtime() * 1000000);
        // $ran = rand(1,100);
        // echo $ran;
    }

    public function pay(Request $request){
        // validate the data
        $this->validate($request, array(
            'address' => 'required',
            'city' => 'required|max:20',
            'state' => 'required|max:20',
            'phone' => 'required',
       ));

        $cart_item = Cart::where('user_id','=',Auth::user()->id)->get();
        foreach ($cart_item as $cart) {
            $pod = new Pod();
            $pod->firstName = $request->firstName;
            $pod->lastName = $request->lastName;
            $pod->company = $request->company;
            $pod->name = $cart->name;
            $pod->price = $cart->price;
            $pod->image = $cart->image;
            $pod->phone = $request->phone;
            $pod->address = $request->address;
            $pod->weight = $cart->weight;
            $pod->lga = $request->city;
            $pod->state = $request->state;
            $pod->unit = $cart->unit;
            $pod->quantity = $cart->quantity;
            $pod->seller_name = $cart->userInfo;
            $pod->buyer_name = Auth::user()->id;
            $pod->cart_id = $cart->id;
            $pod->status = 0;
            $pod->save();
            CartController::remove($cart->id);
        }
        return redirect()->route('welcome');
        //echo $pod;
    }
    public function onlinePayment(){
        $carts = User::find(Auth::user()->id)->carts;
        $count = 0;
        $descriptions = [];
        $index = 0;
        foreach ($carts as $key) {
            $count+=$key->price;
            $descriptions[$index] = $key->description;
            $index++;
        }
        $data['amount'] = $count;
        $data['description'] = implode(",",$descriptions);
        return view('user.cart.onlinePay',$data);
    }
    public function remove($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('user.cart.index');
    }
    public function delete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        Session::flash('success','Item Was Succesfully Removed From Cart..'); 
        return redirect()->route('user.cart.index');
    }

    

}
