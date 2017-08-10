<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Purifier;
use Session;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
        $posts = Post::orderBy('id','desc')->paginate(2);

        return view ('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request,array(
            "title"=> "required|max:255",
            "slug"=>"required|alpha_dash|unique:posts,slug|min:5|max:255",
            "category_id"=>"required|integer",
            "body"=> "required"
        ));

        //store in database
        $post = new Post;

        $post->title = $request->title;
        $post->body = Purifier::clean($request->body);
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;

        $post->save();

        $post->tags()->sync($request->tags,false);

        Session::flash('success','the blog post was successfuly save');

        //redirect another page
        return redirect()->route('posts.show',$post->id);



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
        $post= Post::find($id);
        return view('posts.show')->withPost($post);
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

        $post = Post::find($id);
        $categories = Category::all();
        $cats= array();

        foreach ($categories as $category){
            $cats[$category->id]=$category->name;
        }

        $tags = Tag::all();
        $tags2= array();

        foreach ($tags as $tag){
            $tags2[$tag->id]=$tag->name;
        }


        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);

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
        //validate
        $post = Post::find($id);
        if($request->input('slug') == $post->slug){
            $this->validate($request,array(
                "title"=> "required|max:255",
                "category_id" => "required|integer",

                "body"=> "required"
            ));
        }else{
            $this->validate($request,array(
                "title"=> "required|max:255",
                "category_id" => "required|integer",
                "slug"=>"required|alpha_dash|unique:posts,slug|min:5|max:255",
                "body"=> "required"
            ));
        }



        //save


        $post->title =$request->input('title');
        $post->slug =$request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));

        $post->save();



        //set flash data
        Session::flash('success', 'this post  was successfully saved');
        //redirect with flash  posts.show

        return  redirect()->route('posts.show',$post->id);
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
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();

        Session::flash('success','The post was successfully deleted');

        return redirect()->route('posts.index');

    }
}
