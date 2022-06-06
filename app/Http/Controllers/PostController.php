<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use Validator;
use Redirect;

class PostController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $post = post::all();
        return view('admin.post.index', compact('post'));

    }
    public function create(){
        return view('admin.post.create');
    }

    public function public($slug){

        $list = Post::where('type','blog')->latest()->take(3)->get();
        $b = post::where('slug',$slug)->get()->first();
        if($b == null)
            abort(404);
        return view('public.blog',compact('b','list'));
    }

    public function insert(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }


        $post = new Post();
        if($request->hasFile('image'))
        {

            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('Admin/images'), $imageName);
            $post->image = $imageName;
        }
        else
        {
            $post->image = '';
        }
        $post->title = $request->input('title');
        $post->keyword = $request->input('keyword');
        $post->description = $request->input('description');
        $post->slug = Str::slug($request->input('title')) . "-" . Str::random(10);

        $post->content = $request->input('content');
        $post->type =  $request->type;

        $post->save();
        return redirect()->route('admin.blogs')->with('message','Blog Added sucessfully.');

    }
    public function edit($id)
  {
      $post = Post::find($id);
      return view('admin.post.edit', compact('post'));

  }

  public function update(Request $request, $id)
    {
        $post = post::find($id);

        if($request->hasFile('image'))
        {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('Admin/images'), $imageName);
            $post->image = $imageName;
        }

        if($request->input('title')){
            $post->title = $request->input('title');
        }
        if($request->input('keyword')){
            $post->keyword = $request->input('keyword');
        }

        if($request->input('description')){
            $post->description = $request->input('description');
        }
        if($request->input('content')){
            $post->content = $request->input('content');
        }

        if($request->input('type')){
            $post->type = $request->input('type');
        }

        $post->save();

        return redirect()->route('admin.blogs')->with('message','Blog updated sucessfully.');
    }

    public function destroy($id)
    {
        $post = post::find($id);
        $post->delete();
        return redirect()->route('admin.blogs')->with('message','Blog Deleted sucessfully.');
    }

}
