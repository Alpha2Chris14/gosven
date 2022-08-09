<?php

namespace App\Http\Controllers\FrontendController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
use Session;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $data['title'] = "About Us Page";
        $data['abouts'] = About::all();
        return view('admin.about.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Create About Us";
        return view('admin.about.create',$data);
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
            'description' => 'required'
        ));
        $about = new About();
        $about->description = $request->description;
        $about->save();
        Session::flash('success','About Page Was Created Successfully...');
        return redirect()->route('about.index');
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
        $data['title'] = "Edit About Page";
        $data['about'] = About::find($id);
        return view('admin.about.edit',$data);
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
        $this->validate($request, array(
            'description' => 'required',
        ));
        $about = About::find($id);
        $about->description = $request->description;
        $about->save();
        Session::flash('success','Your Changes Has Been Saved');
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        $about->delete();
        Session::flash('success','About was deleted successfully.'); 
        return redirect()->route('about.index');
    }
}
