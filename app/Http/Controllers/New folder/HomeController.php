<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Verify;
use App\Cart;
use App\Product;
use App\User;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['user'] = User::find(Auth::user()->id);
        $data['categories'] = Category::all();
        $data['ver_status'] = Verify::where('user_id','=',Auth::user()->id)->first();
        $data['carts'] = Cart::where('user_id','=',Auth::user()->id);
        $data['products'] = Product::where('userInfo','=',Auth::user()->id)->get();
        if($data['user']->status == 2){
            return view('home',$data);
        }
        else if($data['user']->status == 1){
            return view('user.dashboard',$data); 
        }
        else{
            // return view('user.dashboard',$data); 
            return redirect()->route('verify.create');
        }
    }
}
