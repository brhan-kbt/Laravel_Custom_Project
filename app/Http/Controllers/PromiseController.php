<?php

namespace App\Http\Controllers;

use App\Models\Promise;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\QueryMessage;

class PromiseController extends Controller
{
    use QueryMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function __construct()
    {
        $this->middleware('financeadmin', ['except'=>'store']);
    }
     
    
    public function index()
    {
        $messages=$this->getAllMessage();
        $promises= Promise::all();
        return view('financeAdmin.promise_mgt.index')->with('promises', $promises)->with('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $messages=$this->getAllMessage();
        return view('financeAdmin.promise_mgt.create')->with('messages', $messages);
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
            // 'memberName'=>'required',
            'promisedAmount'=>'required',
            'paidAmount'=>'required',
            'balance'=>'required',
            'promisedDate'=>'required',
            'reason'=>'required',
        ]);


        $promise = new Promise();
        if($request->input('memberName') != null){
                $promise->memberName=$request->input('memberName');
        }
        else{
                $promise->memberName=Auth::user()->member->fullName;
        }
        $promise->promisedAmount=$request->input('promisedAmount');
        $promise->paidAmount=$request->input('paidAmount');
        $promise->balance=$request->input('balance');
        $promise->promisedDate=$request->input('promisedDate');
        $promise->reason=$request->input('reason');
        if (Auth::user()->userType !='member') {
            $promise->admin_id=Auth::user()->admin_id;
            $promise->member_id=0;
        }
         else if (Auth::user()->userType ==='member') {
            $promise->member_id=Auth::user()->id;
            $promise->admin_id=0;
        }
        $promise->save();
        
        return redirect(url()->previous())->with('success', 'Thank You for Ur donation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promise  $promise
     * @return \Illuminate\Http\Response
     */
    public function show(Promise $promise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promise  $promise
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $messages=$this->getAllMessage();
        $promise=Promise::find($id);
        return view('financeAdmin.promise_mgt.edit')->with('promise',$promise)->with('messages', $messages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promise  $promise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'memberName'=>'required',
            'promisedAmount'=>'required',
            'paidAmount'=>'required',
            // 'balance'=>'required',
            'promisedDate'=>'required',
            'reason'=>'required',
        ]);

        

        $promise = Promise::find($id);
        if($request->has('memberName')){
             $promise->memberName=$request->input('memberName');
        }
        else{
            $promise->memberName=Auth::user()->member->fullName;
        }
        $promise->promisedAmount=$request->input('promisedAmount');
        $promise->paidAmount=$request->input('paidAmount');
        $promise->balance=$promise->promisedAmount-$promise->paidAmount;
        // $promise->balance=$request->input('balance');
        $promise->promisedDate=$request->input('promisedDate');
        $promise->reason=$request->input('reason');
        $promise->save();
        
        return redirect('financeAdmin/promise');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promise  $promise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promise $promise)
    {
        //
    }
}