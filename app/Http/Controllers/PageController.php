<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;
use Mail;
use Session;

class PageController extends Controller
{
    //

       public function  getIndex(){

           $posts = Post::orderBy('created_at','desc')->limit(5)->get();

           return view('pages.welcome')->withPosts($posts);


       }

       public function postContact(Request $request){

            $this->validate($request,[
                'email' => 'required|email',
                'subject' => 'min:3',
                'message' => 'min:10'
            ]);

            $data = array(
                'email' => $request->email,
                'subject' => $request->subject,
                'bodyMessage' => $request->message
            );
            Mail::send('emails.contact',$data , function($message) use ($data) {
                $message->from($data['email']);
                $message->to('muzaffer727@hotmail.com');
                $message->subject($data['subject']);

            });

            Session::flash('success','your email was sent');

            return redirect('contact');
       }
}
