<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * 
     */
    public function create(array $data)
    {
        $job = Job::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'typeContrat' => $data['typeContrat'],
        ]);
        return $job;
    }    
    
    /**
    * Create a new controller instance.
    *
    * 
    */
   public function delete($id)
   {
        Job::find($id)->delete();
        return redirect('/admin');
   }
}