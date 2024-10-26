<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Menampilkan semua posts
    public function index() {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Form untuk membuat post baru
    public function create() {
        return view('posts.create');
    }

    // Menyimpan post baru
    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Membuat post baru
        Post::create($request->all());
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    // Menampilkan detail post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Form untuk mengedit post
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Menyimpan perubahan post
    public function update(Request $request, Post $post)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        // Update post
        $post->update($request->all());
        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    // Menghapus post
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}

