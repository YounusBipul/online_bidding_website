<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');

Route::get('/category/{category_item}', 'PagesController@showCategory');

/*Route::get('/category/{category_item}', function($category_item){
    return view('pages.show_category', compact('category_item'));
});*/

Route::get('/show_product/{product_id}', 'PagesController@showProductDetails');

/*Route::get('/category/{category_item}/{product_name}', function($category_item,$product_name){
    return view('pages.product_details', compact('category_item','product_name'));
});*/

Route::get('/create_post', 'PagesController@createpost');
Route::get('/myposts/{user_id}', 'PagesController@showMyPosts');
Route::get('/mybids/{user_id}', 'PagesController@showMyBids');
Route::get('/myprofile', 'PagesController@showMyprofile');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');
Route::resource('bids', 'BidsController');
