<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;





class Postcontroller extends Controller
{
    public function display(){  
        return view('welcome');  
      }
      public function displaySignup(){  
        return view('signup');  
      }
      public function random_strings() 
            { 
              $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
              return substr(str_shuffle($str_result), 0, 10); 
            }
    
    public function insert(){
        
        $post = new Post;
        $post->name =  request('name');
        $post->email = request('email');
        $post->password = request('password');
        $code = self::random_strings();
        $post->code = "$code";
        $post->referral = '';
        $post->pic_url = '';
        $post->save();
        

    }

    

   

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
