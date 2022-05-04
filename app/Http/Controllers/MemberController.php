<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Traits\QueryMessage;
use App\Models\Family;
use App\Models\Promise;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class MemberController extends Controller
{
    use QueryMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
   public function __construct()
    {
        $this->middleware('memberadmin')->except(['store','register','donate','status','edit']);
    }
    
     public function home(){
        $messages=$this->getAllMessage();
         return view('memberadmin.home')->with('messages', $messages);
         
     }
     
    public function index( Request $request)
    {
         $members=Member::all();
         $messages=$this->getAllMessage();

         return view('memberadmin.indexMember')->with('members', $members)->with('messages', $messages);

        // if ($request->ajax()) {
        //     $data = Member::latest()->get();
        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){
        //                 $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
        //                 return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }

        // return view('memberadmin.indexMember');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $messages=$this->getAllMessage();
        return view('memberadmin.registerform')->with('messages', $messages);
    }
     public function register(){
        return view('pages.register');
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'title'=> 'required',
        //     'body'=> 'required',
        //     'cover_image'=>'image|nullable|max:1999',
        // ]);



             $this->validate($request, [
               'mfullname'=>'required',
               'member-age'=>'required',
               'member-sex'=>'required|in:Male,Female',
               'gfathername'=>'required',
               'mothername'=>'required',
               'baptismalName'=>'required',
               'churchBaptized'=>'required',
               'repetanceFname'=>'required',
               'birthplace'=>'required',
               'phone'=>'required|unique:members,phone',
               'address'=>'required',
               'profileImg'=>'required|image',
               'username'=>'required|unique:user_accounts,username',
               'password'=>'required|min:6|max:12',


        //     'gender'=>'required',
        //     'birthDate'=>'required',
        //     'relationShip'=>'required',
         ]);

        //handle the file upload
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


       $member=new Member();
       $member->fullName=$request->input('mfullname');
       $member->age=$request->input('member-age');
       $member->sex=$request->input('member-sex');
       $member->grandName=$request->input('gfathername');
       $member->motherName=$request->input('mothername');
       $member->baptismalName=$request->input('baptismalName');
       $member->churchBaptize=$request->input('churchBaptized');
       $member->repetanceFatherName=$request->input('repetanceFname');
       $member->birthPlace=$request->input('birthplace');
       $member->phone=$request->input('phone');
       $member->address=$request->input('address');
       $member->profileImg=$fileNameToStore;
       $member->status='Not Active';
       $member->save();



       $pass=$request->input('password');
       $password=Hash::make($pass);

       $userAccount= new UserAccount();
       $userAccount->username=$request->input('username');
       $userAccount->password= $password;
       $userAccount->userType='member';
       $userAccount->member_id=$member->id;
       $userAccount->admin_id=0;//We can not register from user side so we don't have admin->id
       $userAccount->save();

       if ($request->has(['familyfullname1', 'familyage1', 'familysex1', 'familydob1', 'relationship'])) {
           $family= new Family();
           $family->fullName=$request->input('familyfullname1');
           $family->age=$request->input('familyage1');
           $family->gender=$request->input('familysex1');
           $family->birthDate=$request->input('familydob1');
           $family->relationShip=$request->input('relationship');
           $family->member_id=$member->id;
           $family->save();
       }

       return redirect(url()->previous())->with('success',"Registered Successfully!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $messages=$this->getAllMessage();
        $member= Member::find($id);
        $url=$this->dashboardSelectorForUserProfile();

        if ($member) {
            if ($member->id=== Auth::user()->member_id or Auth::user()->userType==='memberadmin') {
                return view($url)->with('member', $member)->with('messages', $messages);
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
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
               'mfullname'=>'required',
               'member-age'=>'required',
               'member-sex'=>'required|in:Male,Female',
               'gfathername'=>'required',
               'mothername'=>'required',
               'baptismalName'=>'required',
               'churchBaptized'=>'required',
               'repetanceFname'=>'required',
               'birthplace'=>'required',
               'phone'=>'required',
               'address'=>'required',
               'profileImg'=>'image|nullable',



        //     'gender'=>'required',
        //     'birthDate'=>'required',
        //     'relationShip'=>'required',
         ]);

        //handle the file upload
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


       $member=Member::find($id);

       $member->fullName=$request->input('mfullname');
       $member->age=$request->input('member-age');
       $member->sex=$request->input('member-sex');
       $member->grandName=$request->input('gfathername');
       $member->motherName=$request->input('mothername');
       $member->baptismalName=$request->input('baptismalName');
       $member->churchBaptize=$request->input('churchBaptized');
       $member->repetanceFatherName=$request->input('repetanceFname');
       $member->birthPlace=$request->input('birthplace');
       $member->phone=$request->input('phone');
       $member->address=$request->input('address');
       if($request->hasFile('profileImg')){
                  $member->profileImg=$fileNameToStore;
       }
    //   dd($member->families);

       $member->save();




        //  foreach ($member->families as $family) {
        //      $family= new Family();
        //      $family->fullName=$request->input('familyfullname1');
        //      $family->age=$request->input('familyage1');
        //      $family->gender=$request->input('familysex1');
        //      $family->birthDate=$request->input('familydob1');
        //      $family->relationShip=$request->input('relationship');
        //      $family->member_id=$member->id;
        //      $family->save();
        //  }
        // }

       return redirect('member/manage-members/')->with('success',"Registered Successfully!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }

    public function donate(){
        $messages=$this->getAllMessage();
        return view('user.donate')->with('messages', $messages);
    }

      public function status(){

        $promises= Promise::where('member_id', Auth::user()->id)->get();
        $messages=$this->getAllMessage();
        return view('user.status')->with('messages', $messages)->with('promises', $promises);
    }
}