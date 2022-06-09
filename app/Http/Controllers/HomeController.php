<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Team;

class HomeController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $list = Post::where('type','blog')->latest()->take(3)->get();
        return view('public.index', compact('list'));
    }

    public function blogs()
    {
        $list = Post::where('type','blog')->latest()->get();
        return view('public.blogs', compact('list'));
    }

    public function public($slug){

        $list = Post::where('type','blog')->latest()->take(3)->get();
        $b = post::where('slug',$slug)->get()->first();
        if($b == null)
            abort(404);
        return view('public.blog',compact('b','list'));
    }

    public function ourteam()
    {
        $developers = Team::where('department','developer')->get();
        $designers = Team::where('department','designing')->get();
        $marketers = Team::where('department','marketing')->get();

        return view('public.ourteam', compact('developers','designers','marketers'));
    }
}
