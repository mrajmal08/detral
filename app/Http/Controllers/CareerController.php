<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CareerController extends Controller
{
    public function index()
    {

        $jobs = Post::where('type','job')->latest()->get();

        $todayDate = date("Y/m/d");
        foreach ($jobs as $job) {

            $job_expiry_date = date("Y/m/d", $job->job_expire_at);
            if (strtotime($todayDate) >= strtotime($job_expiry_date)) {
                $job->delete();
            }
        }
        return view('public.career', compact('jobs'));
    }
}
