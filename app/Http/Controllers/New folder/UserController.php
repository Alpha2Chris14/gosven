<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Verify;
use App\Category;
use Session;
use Image;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //This is For Profile
    public function profile(){
        $data['carts'] = session()->get('cart');
        $data['categories'] = Category::all();
        $data['user'] = Auth::user();
        return view('user.profile',$data);
    }

    public function update_avatar(Request $request){
        $data['carts'] = session()->get('cart');
        $data['categories'] = Category::all();
        //Handle The User Upload Of Avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/images/uploads/avatars/'.$filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

        }
        $data['user'] = Auth::user();
        return view('user.profile',$data);
        //return view('user.profile',array('user'=>Auth::user(),$data));
    }

    public function approve(){
        $num = 0;
        $verifys = Verify::all();
        $users = User::all();
        foreach($users as $user){
            foreach($verifys as $verify){
                if($user->id == $verify->user_id){
                    $num = $verify->id;
                }
            }
        }
        $data['verify'] = Verify::find($num);
        return view('admin.user.approved',$data);
    }

}
