<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at','desc')->paginate(5);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['post'] = [];
        $data['edit_url'] =null;
        return view('posts.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
        ]);
        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->user_id = Auth::id(); 
        $post->save();
        $request->session()->flash('success','Post Added Successfully!!!');
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $data['post'] = POST::find($id);
        if($data['post'] && $data['post']->user->id != Auth::id()) {
            $request->session()->flash('error','Invalid User');
            return redirect('/posts');
        }
        $data['edit_url'] = '/update';
        return view('posts.create')->with($data);
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
        $post =  Post::find($id);
        if($post && $post->user_id != Auth::id()) {
            return redirect('/posts');
        }
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();
        $request->session()->flash('success','Post Updated Successfully!!!');
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $post =  Post::find($id);
        if($post && $post->user_id != Auth::id()) {
            $request->session()->flash('error','Invalid Authentication!!!');
            return redirect('/posts');
        }
        $post->delete();
        $request->session()->flash('success','Post Deleted Successfully!!!');
        return redirect('/posts');
    }
}
