<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Message;
use App\Http\Traits\QueryMessage;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;



class AdminController extends Controller
{
    use QueryMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function __construct()
    {
        $this->middleware('super')->except('edit');
    }
    
    
    public function home(){
        $messages = $this->getAllMessage();
        return view('super-admin.home')->with('messages', $messages);
    }
    
   public function index(){

      /**$posts=Event::orderBy('created_at','desc')->get();
        
      return view('event_museum_record_admin.posts.event')->with('posts',$posts);*/

      $mgrs=Admin::all();
      $messages = $this->getAllMessage();


      return view('super-admin.indexAdmin')->with('mgrs', $mgrs)->with('messages', $messages);

        //  dd($mgrs->user->username);

   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $messages = $this->getAllMessage();
       return view('super-admin.createAdmin')->with('messages', $messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'adminName'=>'required',
            'username'=>'required',
            'password'=>'required|min:8|max:12',
            // 'profileImg'=>'required|image',
            'adminRole'=>'required',
        ]);

         if($request->hasFile('profileImg')){
             //get file name extension

             $fienamewithExt=$request->file('profileImg')->getClientOriginalName();
                 //get file name
             $filename=pathinfo($fienamewithExt,PATHINFO_FILENAME);
                 //get file extension
             $extension=$request->file('profileImg')->getClientOriginalExtension();
                 //file name to store
            $fileNameToStore=$filename .'_'.time().'.'.$extension;

             $path=$request->file('profileImg')->storeAs('public/images',$fileNameToStore);


         }else{
             $fileNameToStore='noimage.jpg';
         }

         $admin=new Admin();
         $admin->adminName=$request->input('adminName');
         $admin->adminRole=$request->input('adminRole');
         $admin->profileImg=$fileNameToStore;
         $admin->save();


         $pass=$request->input('password');
         $password=Hash::make($pass);
       
         $user=new UserAccount();
         $user->username=$request->input('username');
         $user->password=$password;
         $user->userType=$request->input('adminRole');
         $user->member_id=0;
         $user->admin_id=$admin->id;
         $user->save();

       return redirect('/admin')->with('success',"Registered Successfully!");

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
        $messages = $this->getAllMessage();
        $admin=Admin::find($id);
        $to=$this->dashboardSelectorForProfile();
        
        if ($admin) {
            if ($admin->id=== Auth::user()->admin_id or Auth::user()->userType==='super') {
                return view($to.'EditAdminProfile')->with('admin', $admin)->with('messages', $messages);
            } else {
                return Redirect::to(url()->previous());
            }
        }
        else{
                return Redirect::to(url()->previous());
        }
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
               
        // $this->validate($request, [
        //     'profileImg'=>'image|nullable',
        // ]);

         if($request->hasFile('profileImg')){
             //get file name extension

             $fienamewithExt=$request->file('profileImg')->getClientOriginalName();
                 //get file name
             $filename=pathinfo($fienamewithExt,PATHINFO_FILENAME);
                 //get file extension
             $extension=$request->file('profileImg')->getClientOriginalExtension();
                 //file name to store
            $fileNameToStore=$filename .'_'.time().'.'.$extension;

             $path=$request->file('profileImg')->storeAs('public/images',$fileNameToStore);


         }else{
             $fileNameToStore='noimage.jpg';
         }

         $admin=Admin::find($id);
         $admin->adminName=$request->input('adminName');
         $admin->adminRole=$request->input('adminRole');

         if($request->hasFile('profileImg')){
                $admin->profileImg=$fileNameToStore;
         }
         $admin->save();

         $user=UserAccount::where('admin_id', $id);
         $user->username=$request->input('username');
         $user->userType=$request->input('adminRole');
       

       return redirect('/admin/managemgrs')->with('success',"Registered Successfully!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin=Admin::find($id);
        
          if($admin->profileImg!= 'noimage.jpg'){
                  Storage::delete('public/images/'.$admin->profileImg);
          }

        $admin->user->delete();
        $admin->delete();
        return redirect('/admin/managemgrs')->with('success',"Deleted Successfully!");


    }
}