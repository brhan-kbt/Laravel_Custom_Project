<?php

namespace App\Http\Controllers;
use App\Models\ChurchProfile;
use Illuminate\Http\Request;
use App\Http\Traits\QueryMessage;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class ChurchProfileController extends Controller
{
  
    use QueryMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('pradmin');
    }
    
    public function index()
    {
        $messages=$this->getAllMessage();
        $posts=ChurchProfile::all();
        return view('pradmin.church_profile.churchProfile')->with('posts',$posts)->with('messages', $messages);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $messages=$this->getAllMessage();
        return view('pradmin.church_profile.createProfile')->with('messages',$messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'churchName'=>'required',
            	'photo'=>'required',
                'address'=>'required',
                	'email'=>'required',
                    	'phone'=>'required',
        ]);


        

         //handle the file upload
        if($request->hasFile('photo')){
            //get file name extension

            $fienamewithExt=$request->file('photo')->getClientOriginalName();
                //get file name
            $filename=pathinfo($fienamewithExt,PATHINFO_FILENAME);
                //get file extension
            $extension=$request->file('photo')->getClientOriginalExtension();
                //file name to store
            $fileNameToStore=$filename .'_'.time().'.'.$extension;

            $path=$request->file('photo')->storeAs('public/churchP_images',$fileNameToStore);


        }else{
            $fileNameToStore='noimage.jpg';
        }

        $posts=new ChurchProfile;
        $posts->churchName=$request->input('churchName');
        $posts->address=$request->input('address');
        $posts->email=$request->input('email');
        $posts->phone=$request->input('phone');
        $posts->admin_id=Auth::user()->admin_id;
        $posts->photo=$fileNameToStore;
        $posts->save();
        return redirect('pradmin/church_profile')->with('success', 'Church profile created');


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
        $messages=$this->getAllMessage();
        $posts=ChurchProfile::find($id);
        return view('pradmin.church_profile.editprofile')->with('posts',$posts)->with('messages',$messages);
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
        $this->validate($request,[
            'churchName'=>'required',
            	'photo'=>'required',
                'address'=>'required',
                	'email'=>'required',
                    	'phone'=>'required',
        ]);
       
        //handle the file upload
        if($request->hasFile('photo')){
            //get file name extension

            $fienamewithExt=$request->file('photo')->getClientOriginalName();
                //get file name
            $filename=pathinfo($fienamewithExt,PATHINFO_FILENAME);
                //get file extension
            $extension=$request->file('photo')->getClientOriginalExtension();
                //file name to store
            $fileNameToStore=$filename .'_'.time().'.'.$extension;

            $path=$request->file('photo')->storeAs('public/churchP_images',$fileNameToStore);


        }else{
            $fileNameToStore='noimage.jpg';
        }

        $posts= ChurchProfile::find($id);
        $posts->churchName=$request->input('churchName');
        $posts->address=$request->input('address');
        $posts->email=$request->input('email');
        $posts->phone=$request->input('phone');
        $posts->photo=$fileNameToStore;
        $posts->save();
        return redirect('/churchprofile')->with('success', 'cuhrch profile created');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

    }
}