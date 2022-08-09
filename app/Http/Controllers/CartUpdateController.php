<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Pod;
use App\Admin;
use App\Category;
use Illuminate\Notifications\Notification;
use App\Notifications\DeliveryNotification;
class CartUpdateController extends Controller
{
    public function addToCart(Request $request,$id){
        //$id.time().uniqid(mt_rand(),true)
        if($request->quantity == 0){
            $request->quantity = 1;
        }
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "id"=>$product->id,
                        "name" => $product->name,
                        "quantity" => $request->quantity,
                        "price" => $product->price,
                        "photo" => $product->image,
                        "userInfo" => $product->userInfo,                     
                        "category" => $product->category,
                        "weight" => $product->weight,
                        "unit" => $product->unit,
                        "featured_video" => $product->featured_video,
                        'refId' => $product->id.time().uniqid(mt_rand(),true),
                        "mime" => $product->mime,
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            //$cart[$id]['quantity']++;
            $cart[$id]['quantity']+=$request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id"=>$product->id,
            "name" => $product->name,
            //"quantity" => 1,
            "quantity" => $request->quantity,
            "price" => $product->price,
            "photo" => $product->image,
            "userInfo" => $product->userInfo,                     
            "category" => $product->category,
            "weight" => $product->weight,
            "unit" => $product->unit,
            "featured_video" => $product->featured_video,
            "mime" => $product->mime,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart()
    {
        $data['categories']= Category::all();
        $data['carts'] = session()->get('cart');
        return view('cart',$data);
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function clearItems(Request $request){
        $request->session()->forget('cart');
        return redirect()->back();
    }

    //return view The Cart For Delivery
    public function payOnDelivery(){
        $data['carts'] = session()->get('cart');
        $data['categories'] = Category::all();
        return view('checkout',$data);
    }

    public function storeDelivery(Request $request){
        // validate the data
        $this->validate($request, array(
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required',
            'address' => 'required',
            'city' => 'required|max:20',
            // 'state' => 'required|max:20',
            'phone' => 'required',
       ));
       
       $refId = "Gosven_TRx".$request->firstName.time().uniqid(mt_rand(),true);
       $time = time();
       $time_format = strftime("%d-%m-%y",$time);
        foreach (session('cart') as $id => $cart) {
            $pod = new Pod();
            $pod->firstName = $request->firstName;
            $pod->lastName = $request->lastName;
            $pod->email = $request->email;
            $pod->company = $request->company;
            $pod->product_id = $cart['id'];
            $pod->name = $cart['name'];
            $pod->price = $cart['price'];
            $pod->image = $cart['photo'];
            $pod->phone = $request->phone;
            $pod->address = $request->address;
            $pod->weight = $cart['weight'];
            $pod->lga = $request->city;
            $pod->state = "Rivers";
            $pod->date = $time_format;
            $pod->unit = $cart['unit'];
            $pod->quantity = $cart['quantity'];
            $pod->seller_name = $cart['userInfo'];
            $pod->buyer_name = $refId;
            $pod->cart_id = $id;
            $pod->status = 0;
            $pod->save();
        }
        $data['name'] = $request->firstName." ".$request->lastName;
        $data['email'] = $request->email;
        $data['address'] = $request->address." ".$request->lga.", ".$request->state;
        $data['ref_id'] = $refId;
        $data['date'] = date('d-m-Y');
        $data['time'] = time();
        $data['transaction'] = Pod::where('buyer_name','=',$data['ref_id'])->get();
        //$user = Admin::first();
        $users = Admin::all();

            $details = [
                'greeting' => 'Hello There!!!',
                'body' => 'A New Order Was Created',
                'thanks' => 'Thank you!',
            ];

        foreach($users as $user){
            $user->notify(new DeliveryNotification($details));
        }
        $request->session()->forget('cart');
        
        return view('success',$data);
    }
    
    //Pay Online
    public function online(){
        $data['carts'] = session()->get('cart');
        $data['categories'] = Category::all();
        return view('online',$data);
    }

}
