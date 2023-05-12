<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;


class AdminController extends Controller
{
    public function dashboard()
    {

        $posts = Post::all();


        return view('admin-views.posts-table', [
            'posts' => $posts,
        ]);
    }
}
