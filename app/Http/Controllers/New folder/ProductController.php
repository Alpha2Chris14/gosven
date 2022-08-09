<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Unit;
use App\Admin;
use App\Count;
use Image;
use Session;
use Storage;
use File;
use Illuminate\Notifications\Notification;
use App\Notifications\UserProductNotification;
class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "All Products";
        $data['product'] = Product::all();
        $data['count'] = Count::find(1);
        return view('admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Create New Product";
        $data['categorys'] = Category::all();
        $data['units'] = Unit::all();
        return view('admin.product.create',$data);
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
        $product->userInfo = "Admin";
        $product->farmName = "Gosven Farm";
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
        Session::flash('success','Product Has Been Saved Successfully...');
        //Redirect To Another Page
        return redirect()->route('products.index',$product->id);
    }

    public function approve($id){
        $product = Product::find($id);
        $product->status = 1;
        $product->save();
        Session::flash('success','Product Was Approved.'); 
        //Redirect To Another Page
        return redirect()->route('products.index',$product->id);
    }

    public function decline($id){
        $product = Product::find($id);
        $product->status = 0;
        $product->save();
        Session::flash('success','Product Was Decline.'); 
        //Redirect To Another Page
        return redirect()->route('products.index',$product->id);
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
        $data['title'] = "Edit Product";
        $data['categorys'] = Category::all();
        $data['units'] = Unit::all();
        $data['product'] = Product::find($id);
        return view('admin.product.edit',$data);
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
        $product->userInfo = "Admin";
        $product->farmName = "Gosven Farm";
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
        Session::flash('success','Product Was Updated Successfully...');
        //Redirect To Another Page
        return redirect()->route('products.index',$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorFail($id);
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
        return redirect()->route('products.index');
    }
}
