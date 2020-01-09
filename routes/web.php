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

Route::get('/','Postcontroller@display');
Route::get('/signup','Postcontroller@displaySignup');
// Route::get('/insert',function(){
//     $post = new Post;
//     $post->name="MMMMMMMM";
//     $post->email="slfj@gmail.com";
//     $post->password="slfj@gmail.com";
//     $post->code="slfjcom";
//     $post->referral="slfj@gmail.com";
//     $post->pic_url="slfj@gmail.com";
//     $post->save();
// });
Route::post('/welcome','Postcontroller@insert');

// Route::get('/', function () {
//     //$arr = ["BMW","MERCEDES","AUDI"];
//     return view('welcome');
// });

// Route::get('/contact.blade.php', function () {
//     $arr = ["BMW","MERCEDES","AUDI"];
//     return view('contact',['tasks'=>$arr,'foo'=>'foobar']);
// });

// Route::get('/about','Postcontroller@display');
