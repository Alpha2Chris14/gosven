<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use App\Notifications\ProductNotification;
use App\Product;
use App\Category;
use App\Payonline;
use App\Pod;
use App\Unit;
use App\Verify;
use App\Cart;
use App\User;
use App\Admin;
use Auth;
use Session;
use Image;
use Storage;
use File;

class UserProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(){
        $data['product'] = Payonline::where('seller_name','=',Auth::user()->id)->get();
        $data['all'] = Product::where('userInfo','=',Auth::user()->id)->get();
        $data['categories'] = Category::all();
        $data['carts'] = Cart::where('user_id','=',Auth::user()->id);
        return view('user.product.onlineorder',$data);
    }

    public function offlineorder(){
        $data['product'] = Pod::where('seller_name','=',Auth::user()->id)->get();
        $data['all'] = Product::where('userInfo','=',Auth::user()->id)->get();
        $data['categories'] = Category::all();
        $data['carts'] = Cart::where('user_id','=',Auth::user()->id);
        return view('user.product.offlineorder',$data);
    }

    public function index()
    {
        $data['title'] = "All Products";
        
         //Get All Verification Submitted
         $data['ver_status'] = Verify::where('user_id','=',Auth::user()->id)->first();
         $data['carts'] = Cart::where('user_id','=',Auth::user()->id);
         $data['categories'] = Category::all();

        //  //Loops Through Verification Database
        //  $num = 0;
        //  foreach($verification_info as $ver){
        //      //Check If Verification Was Summited By A Particular User
        //      if(($ver->user_email) == (Auth::user()->email)){
        //          $num = $ver->id;
        //          break;
        //      }
 
        //  }
        //  $data['control'] = 0;
        //  if($num > 0){
        //      $data['verify'] = Verify::find($num);
        //      $data['control'] = $data['verify']->status;
        //  }
         
        $data['product'] = Product::all();
        return view('user.product.index',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categorys'] = Category::all();
        $data['categories'] = Category::all();
        $data['units'] = Unit::all();
        $data['carts'] = Cart::all();
        return view('user.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'name' => 'required|max:255',
            'price' => 'required|max:20',
            'previous' => 'required|max:20',
            'category' => 'required',
            'unit' => 'required',
            'image' => 'required',
            'featured_video' => 'required',
            'quantity' => 'required',
            'description' => 'required'
       ));

       
       $product = new Product();
       //Store The Request
       if ($request->hasFile('image')) {
            # code...
            $image = $request->file('image');
            $filename = 'Gosven'.date('d-m-Y').time().'.'.$image->getClientOriginalExtension();
            $location = public_path('/products/images/'.$filename);
            Image::make($image)->resize(500,500)->save($location);
            $product->image = $filename;
            
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->previous = $request->previous;
        $product->category = $request->category;
        $product->weight = $request->weight;
        $product->unit = $request->unit;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->userInfo = Auth::user()->id;
        $product->farmName = User::find(Auth::user()->id)->verify->name;
        $product->status = 0;
        
        //This save The Video
        if ($request->hasFile('featured_video')) {
            # code...
            $featured_video = $request->file('featured_video');
            $filename = 'Gosven'.date('d-m-Y').time()."-".$featured_video->getClientOriginalName();
            $location = $request->featured_video->storeAs('public/products/video/',$filename);
            $mimeType = Storage::mimeType($location);
            $product->mime = $mimeType;
            //$video->move($location,$filename);
            $product->featured_video = $filename;
        }
        $product->save();
        
        //Notify Admin About New Registered User;
        $user = Admin::first();

            $details = [
                'body' => 'A New Product Was Uploaded',
            ];

        $user->notify(new ProductNotification($details));
        

        Session::flash('success','Product Has Been Uploaded Successfully...Awaiting Confirmation From Admin');

        //Redirect To Another Page
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categorys'] = Category::all();
        $data['categories'] = Category::all();
        $data['units'] = Unit::all();
        $data['carts'] = Cart::all();
        $data['product'] = Product::find($id);
        return view('user.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the data
        $this->validate($request, array(
            'name' => 'required|max:255',
            'price' => 'required|max:20',
            'previous' => 'required|max:20',
            'category' => 'required',
            'unit' => 'required',
            'image' => 'required',
            'featured_video' => 'required',
            'quantity' => 'required',
            'description' => 'required'
       ));

       
       $product = Product::find($id);
       //Store The Request
       if ($request->hasFile('image')) {
            # code...
            $image = $request->file('image');
            $filename = 'Gosven'.date('d-m-Y').time().'.'.$image->getClientOriginalExtension();
            $location = public_path('/products/images/'.$filename);
            Image::make($image)->resize(500,500)->save($location);
            $product->image = $filename;
            
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->previous = $request->previous;
        $product->category = $request->category;
        $product->weight = $request->weight;
        $product->unit = $request->unit;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->userInfo = Auth::user()->id;
        $product->farmName = User::find(Auth::user()->id)->verify->name;
        $product->status = 1;
        
        //This save The Video
        if ($request->hasFile('featured_video')) {
            # code...
            $featured_video = $request->file('featured_video');
            $filename = 'Gosven'.date('d-m-Y').time()."-".$featured_video->getClientOriginalName();
            $location = $request->featured_video->storeAs('public/products/video/',$filename);
            $mimeType = Storage::mimeType($location);
            $product->mime = $mimeType;
            //$video->move($location,$filename);
            $product->featured_video = $filename;
        }
        $product->save();
        
        //Notify Admin About New Registered User;
        $user = Admin::first();

            $details = [
                'body' => 'The Product '.$product->name.' Was Updated By '.Auth::user()->name,
            ];

        $user->notify(new ProductNotification($details));
        

        Session::flash('success','Product Has Been Updated Successfully...Awaiting Confirmation From Admin');

        //Redirect To Another Page
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $file_path = public_path('/products/images/'.$product->image);
        $vid_path = storage_path().'/app/public/products/video/'.$product->featured_video; 
        if (File::exists($file_path)) {
            File::delete($file_path);
        }

        if(File::exists($vid_path)){
            File::delete($vid_path);
        }
        $product->delete();
        Session::flash('success','Product was deleted successfully.'); 
        return redirect()->route('product.index');
    }
}
