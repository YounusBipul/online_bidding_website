<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

    //
      /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $this->validate($request,[
            'title'=>'required',
            'category'=>'required',
            'starting_bid'=>'required',
            'ending_time'=>'required',
            'product_picture'=> 'image'
            
        ]);

        if($request->hasfile('product_picture'))
        {
            //get file name with extension
            $fileNameWithExt= $request->file('product_picture')->getClientOriginalName();
            //get jsut file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just ext
            $fileExt= $request->file('product_picture')->getClientOriginalExtension();
            //fine name to store
            $fileNameToStore= $fileName.'_'.time().'.'.$fileExt;
            // store the file
            $path= $request->file('product_picture')->storeAs('public/img/product_images', $fileNameToStore);

        }
        else
        {
            $fileNameToStore= "noimage.jpg";
        }

        $post= new Post();
        $post->user_id= auth()->user()->id;
        $post->title= $request->input('title');
        $post->details= $request->input('details');
        $post->starting_bid= $request->input('starting_bid');
        $post->ends_at= $request->input('ending_time');
        $post->category_id= $request->input('category');
        $post->pic_name= $fileNameToStore;
        
        $post->save();

        return redirect('category/'.$post->category_id); 
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
