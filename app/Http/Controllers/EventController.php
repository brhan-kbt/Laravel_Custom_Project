<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Traits\QueryMessage;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    use QueryMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pradmin');
    }
    
    public function index()
    {
        $messages=$this->getAllMessage();
        $posts=Event::orderBy('created_at','desc')->get();
        
        return view('event_museum_record_admin.posts.event')->with('posts',$posts)->with('messages',$messages);
   
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $messages=$this->getAllMessage();
        return view('event_museum_record_admin.posts.post')->with('messages', $messages);
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
            'title'=>'required',
            'description'=>'required' ,
            'post_image'=>'image|nullable'
            ]);

        if($request->hasFile('post_image')){


             $fienamewithExt=$request->file('post_image')->getClientOriginalName();
                 //get file name
             $filename=pathinfo($fienamewithExt,PATHINFO_FILENAME);
                 //get file extension
             $extension=$request->file('post_image')->getClientOriginalExtension();
                 //file name to store
             $fileNameToStore=$filename .'_'.time().'.'.$extension;

             $path=$request->file('post_image')->storeAs('public/post_images',$fileNameToStore);
            
        }
        
        else{
            
            $fileNameToStore='noimage.jpg';
        }



        $posts=new Event;
        $posts->title=$request->input('title');
        $posts->description=$request->input('description');
        //  $post->user_id=auth()->user()->id;
        $posts->post_image=$fileNameToStore;
        $posts->save();
            
        
        return redirect('/posts')->with('success','post created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages=$this->getAllMessage();
        $posts=Event::find($id);
        return view('event_museum_record_admin.posts.show')->with('posts',$posts)->with('messages', $messages);
  
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
        $posts=Event::find($id);
        return view('event_museum_record_admin.posts.edit')->with('posts',$posts)->with('messages', $messages);
  
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
        'title'=>'required',
        'description'=>'required' ,
        'post_image'=>'image|nullable'
     ]);
     
        if($request->hasFile('post_image')){
            
            //handle filename
        $filenamewithext=$request->file('post_image')->getClientOriginalName();

            // get filename
        $filename=pathinfo('$filenamewithext',PATHINFO_FILENAME);

            //get extension
        $extension=$request->file('post_image')->getClientOriginalExtension();
        
            //merge filename and extension
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        
        $request->file('post_image')->storeAs('public/post_images',$fileNameToStore);
        }
 
     $post= Event::find($id);
     $post->title=$request->input('title');
     $post->description=$request->input('description');
     
     if($request->hasFile('post_image')){
        $post->post_image=$fileNameToStore;
    }
    
    $post->save();
    
     return redirect('/posts')->with('success','post updated');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Event::find($id);
        $posts->delete();
        
        if($posts->post_image!='noimage.jpg'){
          Storage::delete('public/post_images/'.$posts->post_image);
        }
        return redirect('posts')->with('success','post removed');
   
    }
}