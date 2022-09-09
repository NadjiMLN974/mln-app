<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    //// BRUT
    // $post = DB::select('SELECT * FROM posts')[0];
    // dd($post->title);
    // VALUES (:title, :body) ==> VALUES (?, ?)
    // $title = 'Super titre';
    // $body = 'Super contenu';
    // DB::insert('INSERT INTO posts(title, body) VALUES (:title, :body)', [
    //     'title' => $title,
    //     'body' => $body
    // ]);

    // FLUENT QUERY BUILDER

    // //renommer un attribut
    // dump(DB::table('posts')->get(['id', 'title as heading']));
    
    // //récupère le premier élément
    // $post = DB::table('posts')->first();
    // dd($post->title);
    
    // dump(DB::table('posts')->where('id', '>', '2')->get());

    // //take permet de limiter le nombre (LIMIT) ///// take ou limit fonctionne.
    // dump(DB::table('posts')->take(2)->orderBy('title', 'desc')->get());
    // //Condition "ou"
    // dump(DB::table('posts')->whereTitleOrBody('un titre', 'un contenu')->get());
    // //compter le nombre d'élement count()
    // dump(DB::table('posts')->count());

    //INSERT
    // DB::table('posts')->insert([
    //     'title' => 'Magnifique tiutre',
    //     'body' => 'Magnifique conteunu',
    // ]);
    //UPDATE
    // dump( DB::table('posts')->whereId(5)->update(['title' => 'titre 1', 'body' => 'contenu 1 ']) );
    //DELETE
    // dump(DB::table('posts')->whereId(6)->delete());

    //AVEC ELOQUENT
    // $post = Post::find(1);
    // dd($post->title);


    //INSERT
    // $post = new Post;
    // $post->title = 'Mon joli titre';
    // $post->body = 'Mon joli contenu';
    // $post->save();
    // dd(Post::all());
    //ou Post::create afin de faire un save() automatiquement
    // $post = new Post(['title' => 'tttitre', 'body' => 'mamamia']);
    // $post->save();


    ///migrations
    // DB::statement('DROP TABLE posts');
    //créer un ficher de migration : php artisan make:migration <name>
    //pousser dans la bdd : php artisan migrate
    //rollback php artisan migrate:rollback


// BEGIN HOME

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return redirect('/');
});
// END HOME

// BEGIN ABOUT

Route::get('/a-propos', function () {
    return view('pages/about');
})->name('about');

//END ABOUT

// BEGIN YOUTHS

Route::get('/jeunes', function () {
    return view('pages/youths');
})->name('youths');

// END YOUTHS

Route::get('/pros', function () {
    return view('pages/pros');
})->name('pros');

// BEGIN POSTS

Route::controller(PostController::class)->group(function(){
    Route::get('/actualites', 'getPaginate')->name('news');
    Route::get('actualites/{slug}','find');
});

// END POSTS

Route::get('/offre-emploi', function () {
    return view('pages/jobs');
})->name('jobs');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');

// BEGIN ACCOUNT

Route::get('/admin', [AccountController::class, 'index'])->name('account');

Route::get('/admin/actualites/delete/{id}', [PostController::class, 'delete'])->name('accountPostDelete');
Route::get('/admin/offre-emploi/delete/{id}', [JobController::class, 'delete'])->name('accountJobDelete');

//END ACCOUNT




Route::get('/credit-et-mentions-legales', function () {
    return view('pages/legalNotice');
})->name('legalNotice');

Route::get('/politique-de-confidentialite', function () {
    return view('pages/privacyPolicy');
})->name('privacyPolicy');

Route::get('/politique-cookies', function () {
    return view('pages/cookiePolicy');
})->name('cookiePolicy');

Route::get('/gestion-des-cookies', function () {
    return view('pages/cookieManagement');
})->name('cookieManagement');

Auth::routes();


