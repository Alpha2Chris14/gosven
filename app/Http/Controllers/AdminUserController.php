<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Verify;
use App\Category;
class AdminUserController extends Controller
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
        $data['title'] = "All Users";
        $data['users'] = User::all();
        // $data['verifys'] = Verify::all();
        // $num = 0;
        // foreach($data['users'] as $user){
        //     foreach($data['verifys'] as $ver){
        //         if($user->id == $ver->user_id){
        //             $num = $ver->id;
        //         }
        //     }
        // }
        // $data['verify'] = Verify::find($num);
        //echo $data->Verify->status;
        return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //echo "A Beautiful World";
       $data['title'] = "Verify User";
       $data['user'] = User::find($id);
       $num = 0;
       $verifys = Verify::all();
       foreach($verifys as $verify){
           if($data['user']->id == $verify->user_id){
                $num = $verify->id;
                $data['verify'] = Verify::find($num);
                break;
           }
       }
       return view('admin.user.single',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
