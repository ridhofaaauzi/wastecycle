<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArtikelCreateRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminKelolaArtikelController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.kelolaArtikel.kelolaArtikel', compact('posts'));
    }

    public function create()
    {
        return view('admin.kelolaArtikel.create');
    }

    public function store(ArtikelCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
            }

            $user_id = Auth::user()->id;

            Post::create([
                'user_id' => $user_id,
                'title' => $request->input("title"),
                'content' => $request->input("content"),
                'image' => $imagePath,
            ]);
            DB::commit();
            return redirect()->route('admin.kelolaArtikel')->with('success', 'Post added successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Failed to add post', ['error' => $th->getMessage()]);

            return redirect()->back()->with([
                'error' => 'Failed to add Post',
                'info' => $th->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.kelolaArtikel.edit', compact('post'));
    }

    public function update(ArtikelCreateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $post = Post::findOrFail($id);

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($post->image);
                $imagePath = $request->file('image')->store('images', 'public');
                $post->image = $imagePath;
            }

            $post->title = $request->input("title");
            $post->content = $request->input("content");
            $post->save();

            DB::commit();
            return redirect()->route('admin.kelolaArtikel')->with('success', 'Post updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Failed to update post', ['error' => $th->getMessage()]);

            return redirect()->back()->with([
                'error' => 'Failed to update Post',
                'info' => $th->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $post->delete();

            return redirect()->route('admin.kelolaArtikel')->with('success', 'Post deleted successfully');
        } catch (\Throwable $th) {
            Log::error('Failed to delete post', ['error' => $th->getMessage()]);

            return redirect()->back()->with([
                'error' => 'Failed to delete Post',
                'info' => $th->getMessage()
            ]);
        }
    }
}