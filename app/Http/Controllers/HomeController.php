<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Mission;
use App\Models\Funder;
use App\Models\Job;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = Post::all();
        $missions = Mission::all();
        $funders = Funder::all();
        $jobs = Job::all();
        return view('pages/home', [
            'news' => $news,
            'missions' => $missions,
            'funders' => $funders,
            'jobs' => $jobs,
        ]);
    }
}