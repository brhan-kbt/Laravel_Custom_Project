<?php

namespace App\Http\Controllers;

use App\Models\Offering;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\QueryMessage;

class OfferingController extends Controller
{
    use QueryMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function __construct()
    {
        $this->middleware('financeadmin');
    }
     

    public function index()
    {
        $messages=$this->getAllMessage();
        $offering= Offering::all();
        return view('financeAdmin.offering_mgt.index')->with('offerings', $offering)->with('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $messages=$this->getAllMessage();
        return view('financeAdmin.offering_mgt.create')->with('messages', $messages);
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
            'memberName'=>'required',
            'phone'=>'required',
            'date'=>'required',
            'amount'=>'required',
            'reason'=>'required',
        ]);

        $offering= new Offering();
        $offering->memberName=$request->input('memberName');
        $offering->phone=$request->input('phone');
        $offering->date=$request->input('date');
        $offering->amount=$request->input('amount');
        $offering->reason=$request->input('reason');
        $offering->admin_id=Auth::user()->admin_id;
        $offering->save();
        
        return redirect('financeAdmin/offering');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offering  $offering
     * @return \Illuminate\Http\Response
     */
    public function show(Offering $offering)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offering  $offering
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $messages=$this->getAllMessage();
        $offering=Offering::find($id);
        return view('financeAdmin.offering_mgt.edit')->with('offering', $offering)->with('messages',$messages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offering  $offering
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
          $this->validate($request,[
            'memberName'=>'required',
            'phone'=>'required',
            'date'=>'required',
            'amount'=>'required',
            'reason'=>'required',
        ]);

        $offering= Offering::find($id);
        $offering->memberName=$request->input('memberName');
        $offering->phone=$request->input('phone');
        $offering->date=$request->input('date');
        $offering->amount=$request->input('amount');
        $offering->reason=$request->input('reason');
        $offering->admin_id=Auth::user()->admin_id;
        $offering->save();
        
        return redirect('financeAdmin/offering');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offering  $offering
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offering $offering)
    {
        //
    }
}