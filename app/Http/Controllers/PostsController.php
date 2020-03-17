<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Post';
        $posts = Post::paginate(10);
        return view('admin.post.index', compact('title','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Make a Post';
        $category = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('title','category','tags'));
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
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required'
        ]);

        $newGambar = time().$request->gambar->getClientOriginalName();

        $post = Post::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => 'public/uploads/posts/'. $newGambar,
            'slug' => Str::slug($request->judul),
            'users_id' => Auth::id()
        ]);

        $post->tag()->attach($request->tags);


        $request->gambar->move('public/uploads/posts/', $newGambar);
        return redirect()->back()->with('status', 'Berhasil membuat Postingan baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $title = 'Edit Post';
        $tags = Tag::all();
        $category = Category::all();
        return view('admin.post.edit', compact('post','tags','title','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        if($request->has('gambar')){
            $newGambar = time().$request->gambar->getClientOriginalName();
            $request->gambar->move('public/uploads/posts/', $newGambar);

            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'gambar' => 'public/uploads/posts/'. $newGambar,
                'slug' => Str::slug($request->judul)
            ];
        }else{
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->judul)
            ];
        }

        $post->tag()->sync($request->tags);
        Post::where('id', $post->id)
            ->update($post_data);

        return redirect()->route('post.index')->with('status', 'Berhasil membuat Postingan baru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect()->back()->with('status', 'Berhasil Menghapus Data! (cek trashed post');
    }

    public function trash()
    {
        $title = 'Trashed Post';
        $posts = Post::onlyTrashed()->paginate(10);
        return view('admin.post.trashed', compact('posts','title'));
    }

    public function restore($id)
    {
        Post::withTrashed()->where('id', $id)->restore();

        return redirect()->back()->with('status', 'Restore data berhasil (Cek Daftar Post)');
    }

    public function kill($id)
    {
        Post::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->with('status', 'Data berhasil dihapus sepenuhnya!');
    }
}
