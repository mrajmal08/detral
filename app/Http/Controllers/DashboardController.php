<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Lead;
use App\Models\Team;

class DashboardController extends Controller
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

    public function dashbaord(){

        $contact = Contact::all()->count();
        $post = Post::all()->count();
        $team = Team::all()->count();
        $lead = Lead::all()->count();
        return view('home', compact('contact', 'post', 'team', 'lead'));
    }
}
