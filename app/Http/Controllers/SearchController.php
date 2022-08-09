<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Cart;
use App\Category;

class SearchController extends Controller
{
    public function search(){
        $data['categories'] = Category::all();
        $data['carts'] = Cart::all();
        $q = Input::get ( 'q' );
        if(empty($q) || !isset($q) || trim($q) == '')
        {
            return redirect()->back();
        }
        // if(Route::is('price_filter')){

        // }
        // elseif(Route::is()){

        // }
        // else{

        // }
        $searchResult = Product::orderBy('name', 'desc')->where('name','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')
        ->orWhere('price','LIKE','%'.$q.'%')
        ->orWhere('previous','LIKE','%'.$q.'%')
        ->orWhere('category','LIKE','%'.$q.'%')
        ->orWhere('weight','LIKE','%'.$q.'%')
        ->orWhere('unit','LIKE','%'.$q.'%')
        ->orWhere('userInfo','LIKE','%'.$q.'%')->get();
        //$posts = Post::orderBy('id', 'desc');
        if(count($searchResult) > 0){
        return view('search',$data)->withDetails($searchResult)->withQuery ( $q );
        }
        else return view ('search',$data)->withMessage('Item Not found. Try to search again !');
    }
}
