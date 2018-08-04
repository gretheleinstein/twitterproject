<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('active', 1)
              ->orderBy('id','desc')
              ->get();

        $collection = collect();
        foreach ($posts as $post) {
          $user = User::find($post->user_id);
          $posts_array['name'] = $user->full_name;
          $posts_array['username'] = $user->username;
          $posts_array['post_id'] = $post->id;
          $posts_array['content'] = $post->content;
          $posts_array['posted_time'] = Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans();
          ($post->user_id == Auth::id()) ? $posts_array['my_posts'] = "Yes" : $posts_array['my_posts'] = "No";
          $collection->push($posts_array);
        }

        // dd($posts);
        return response()->json($collection);
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
      $data = $request->all();
      $data['user_id'] = Auth::id();
      $post = Post::create($data);

      return response()->json($post);
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
      $post = Post::find($id);
      if($post){
        $post->delete();
        
        return response()->json(['done']);
      }
    }
}
