<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Create a new controller instance.
     *
     * 
     */
    public function all()
    {
        $news = Post::all();
        return view('pages/news', [
            'news' => $news,
            'paginate' => false,
        ]);
    }

    /**
     * Create a new controller instance.
     *
     * 
     */
    public function getPaginate()
    {
        $news = Post::paginate(2);
        return view('pages/news', [
            'news' => $news, 
            'paginate' => true,
        ]);
    }

    /**
     * Create a new controller instance.
     *
     * 
     */
    public function find($slug)
    {
        $new = Post::get()->where('slug', $slug);
        return view('pages/news', [
            'new' => $new,
        ]);
    }

    /**
     * Create a new controller instance.
     *
     * 
     */
    public function delete($id)
    {
        Post::find($id)->delete();
        // return redirect('/admin');    
        return response()->json(['success' => 'Record has been deleted successfully!']);
    }
}
