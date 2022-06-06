<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ServiceController extends Controller
{
    public function index()
    {
        $blogs = Post::where('type','blog')->latest()->take(3)->get();
        $services = Post::where('type','service')->latest()->take(6)->get();

        return view('public.service', compact('blogs', 'services'));
    }
}
