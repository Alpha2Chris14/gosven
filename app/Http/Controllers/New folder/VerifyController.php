<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Verify;
use App\Category;
use App\Cart;
use Session;

class VerifyController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            $data['carts'] = Cart::where('user_id','=',Auth::user()->id)->get();
        }
        $data['user'] = User::find(Auth::user()->id);
        $data['title'] = "Verification Process";
        $data['categorys'] = Category::all();
        $data['categories'] = Category::all();
        if($data['user']->status == 0){
            return view('user.verify.create',$data);
        }else{
            echo "Nothing Here";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'phone' => 'required|max:20',
            'phone2' => 'required|max:20',
            'address' => 'required',
            'address2' => 'required',
            'nationality' => 'required',
            'state' => 'required',
            'lga' => 'required',
            'tog' => 'required'
       ));
        $user = User::find(Auth::user()->id);
        $verify = new Verify();
        $verify->name = $request->name;
        $verify->phone = $request->phone;
        $verify->phone2 = $request->phone2;
        $verify->address = $request->address;
        $verify->address2 = $request->address2;
        $verify->nationality = $request->nationality;
        $verify->state = $request->state;
        $verify->lga = $request->lga;
        $verify->tog = json_encode($request->tog);
        $verify->username = Auth::user()->name;
        $verify->user_email = Auth::user()->email;
        $verify->user_id = Auth::user()->id;
        $verify->status = 1;
        $user->status = 1;
        $verify->save();
        Session::flash('success','Your Request Has Been Recieved And Will Be Processed Shortly');
        return redirect()->route('home');
        //return redirect->view('home');
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
        $data['title'] = "Edit Response";
        $data['categorys'] = Category::all();
        $data['verify'] = Verify::find($id);
        return view('user.verify.edit',$data);
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
        $verify = Verify::find($id);
        $verify->name = $request->name;
        $verify->phone = $request->phone;
        $verify->phone2 = $request->phone2;
        $verify->address = $request->address;
        $verify->address2 = $request->address2;
        $verify->nationality = $request->nationality;
        $verify->state = $request->state;
        $verify->lga = $request->lga;
        $verify->tog = json_encode($request->tog);
        $verify->username = Auth::user()->name;
        $verify->user_email = Auth::user()->email;
        $verify->user_id = Auth::user()->id;
        $verify->save();
        Session::flash('success','Your Response Was Updated Successfully');
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
