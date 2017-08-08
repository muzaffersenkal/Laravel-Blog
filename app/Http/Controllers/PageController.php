<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

       public function  getIndex(){

           $posts = Post::orderBy('created_at','desc')->limit(5)->get();

           return view('pages.welcome')->withPosts($posts);


       }
}
