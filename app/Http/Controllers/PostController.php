<?php

namespace App\Http\Controllers;


use DOMDocument;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }
    public function data()
    {
        $posts = Post::all();
        return view('/post/data', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('/post/create', compact('categories'));
    }

    public function store(Request $request)
    {
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads', 'public');
        }

        $description = $request->description;

        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');

            // Check if the image is base64-encoded
            if (strpos($src, 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $src)[1])[1]);
                $image_name = "/uploads/" . time() . $key . '.png';
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $description = $dom->saveHTML();

        Post::create([
            'title' => $request->title,
            'image' => $image,
            'description' => $description,
            'category_id' => $request->category_id, // Tambahkan ini
        ]);

        return redirect('/post/data');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('/post/show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all(); // Ambil semua kategori
        return view('/post/edit', compact('post', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            // Store new image
            $image = $request->file('image')->store('uploads', 'public');
            $post->image = $image;
        }

        $description = $request->description;

        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');

            // Check if the image is base64-encoded
            if (strpos($src, 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $src)[1])[1]);
                $image_name = "/uploads/" . time() . $key . '.png';
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $description = $dom->saveHTML();

        $post->update([
            'title' => $request->title,
            'image' => $post->image, // Tetap menggunakan gambar yang diperbarui
            'description' => $description,
            'category_id' => $request->category_id, // Tambahkan ini
        ]);

        return redirect('/');
    }


    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML($post->description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            if ($img instanceof \DOMElement) {
                $src = $img->getAttribute('src');
                $path = public_path(Str::after($src, '/'));

                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        }

        $post->delete();

        return redirect('/post/data')->with('success', 'Post deleted successfully.');
    }
}
