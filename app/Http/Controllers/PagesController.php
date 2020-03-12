<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Post;
use App\Bid;
use App\User;

class PagesController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $Categories= Category::all();
        return view('pages.index')->with('Categories', $Categories);
    }
    public function createpost(){
        $Categories= Category::all();
        return view('pages.create_post')->with('Categories', $Categories);
    }

    public function showCategory($category_item)
    {
        $Categories= Category::all();
        if($category_item== 0 || $category_item== '0' )
        $posts= Post::all();
        else
        $posts= Post::where('category_id', $category_item )->get();
        
        return view('pages.show_category', compact('posts','Categories'));
    
    }
    public function showProductDetails($product_id)
    {
        $Categories= Category::all();
        $posts= Post::where('id', $product_id )->get();
        $bids= DB::select("SELECT  b.user_id as wid, b.bid_amount as bid_amount, u.name as name, u.email as email FROM bids as b, users as u, posts as p WHERE b.user_id=u.id and p.id=b.post_id and p.id=".$product_id." order by b.bid_amount desc");
        $post_creator= User::where('id', $posts[0]->user_id)->get();
        //return $post_creator;
        return view('pages.product_details', compact('Categories','posts','bids','post_creator'));
    
    }
    public function showMyPosts($user_id){
        $Categories= Category::all();
        $posts= Post::where('user_id', $user_id )->get();
        
        return view('pages.myposts', compact('posts','Categories'));

    }
    public function showMyBids($user_id){
        $Categories= Category::all();
        $posts= DB::select("SELECT * FROM bids as b, users as u, posts as p WHERE b.user_id=".$user_id." and p.id=b.post_id and u.id=".$user_id." group by b.post_id order by b.updated_at desc");
        
        return view('pages.mybids', compact('posts','Categories'));

    }

    public function showMyProfile(){
        $Categories= Category::all();
        $users= User::where('id', auth()->user()->id )->get();
        $user= $users[0];
        return view('pages.myprofile', compact('user','Categories'));

    }
   
}
