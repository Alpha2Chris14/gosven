<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\About;
use App\Cart;
use App\User;
use App\Category;
use App\Count;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function welcome(){
        // //auth()->check()
        // if(Auth::check()){
        //     $data['carts'] = Cart::where('user_id','=',Auth::user()->id)->get();
        // }
        $data['carts'] = session()->get('cart');
        $data['categories'] = Category::all();
        $data['products'] = Product::orderBy('id', 'desc')->get();
        $data['pros'] = Product::orderBy('id', 'asc')->get();
        return view('welcome',$data);
    }

    public function about(){
        $data['about'] = About::first();
        $data['categories'] = Category::all();
        // if(Auth::check()){
        //     $data['carts'] = Cart::where('user_id','=',Auth::user()->id)->get();
        // }
        $data['carts'] = session()->get('cart');
        return view('about',$data);
    }

    public function contact(){
        // if(Auth::check()){
        //     $data['carts'] = Cart::where('user_id','=',Auth::user()->id)->get();
        // }
        $data['carts'] = session()->get('cart');
        $data['categories'] = Category::all();
        return view('contact',$data);
    }

    public function terms(){
        $data['carts'] = session()->get('cart');
        $data['categories'] = Category::all();
        return view('terms',$data);
    }

    public function return_policy(){
        $data['carts'] = session()->get('cart');
        $data['categories'] = Category::all();
        return view('return_policy',$data);
    }

    public function privacy_policy(){
        $data['carts'] = session()->get('cart');
        $data['categories'] = Category::all();
        return view('privacy_policy',$data);
    }
    
    public function product(Request $request){
        $data['products'] = Product::all();
        $data['categories'] = Category::all();
        // if(Auth::check()){
        //     $data['carts'] = Cart::where('user_id','=',Auth::user()->id)->get();
        // }
        $data['carts'] = session()->get('cart');
        //$data['category'] = Category::find($id->id);
        if($request->route('id') > 0)
        $data['category'] = Category::find($request->route('id'));
        else{
            $data['category'] = Category::find(1);  
        }
        $count = Count::find(1);
        if($count == null){
            $count = new Count();
            $count->incrementReadCount();
        }
        else{
        $count->incrementReadCount();
        }
        return view('product',$data);
        
        //echo json_encode($request);
    }

    public function productDetails(Request $request){
        $data['pro'] = Product::find($request->route('id'));
        $data['categories'] = Category::all();
        $data['category'] = $data['pro']->category;
        // if(Auth::check()){
        //     $data['carts'] = Cart::where('user_id','=',Auth::user()->id)->get();
        // }
        $data['carts'] = session()->get('cart');
        //echo $data['pro']->category;
        return view('productsingle',$data);
    }

    public function back(){
        return redirect()->back();
    }

    public function success(){
        return view('success');
    }

    public function failed(){
        return view('failed');
    }

    public function payStack(){
        return view('pay');
    }

}
