<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
    
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        return view('post/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'image' => '',
            'tags' => 'required',
        ]);

        $post = new Post();
        $post->content = $validatedData['content'];
        $post->image = $validatedData['image'];
        $post->tags = $validatedData['tags'];
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect()->to('/post');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post/edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'nullable|string',
            'image' => 'nullable|string',
            'tags' => 'nullable|string'
        ]);
    
        //Modify post data
        $post->content = $request ->input('content');
        $post->image = $request->input ('image');
        $post->tags = $request->input ('tags');

        //save to bdd
        $post->save();

        //redirect with message
        return redirect()->route('post.show', $post)->with('message', 'Le message a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, User $user)
    {
        $user = auth()->user();

        if ($post->user_id == $user->id || $user->role_id == 2) {
            $post->delete();
            return redirect()->route('home')->with('message', 'Le post a été supprimé avec succès.');
        } else {
            return back()->with('message', 'Vous n\'etes pas autorisé à supprimer ce post.');
        }
    }
}


