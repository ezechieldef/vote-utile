<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(["auth",'role:super-admin'])->group(function () {
    Route::resource('/admin-articles', App\Http\Controllers\ArticleController::class);
    Route::resource('/admin-categories', App\Http\Controllers\CategorieController::class);
});

Route::any('/accueil',[\App\Http\Controllers\ListeArticle::class, 'accueil'])->name('home');
Route::any('/a-propos',[\App\Http\Controllers\ListeArticle::class, 'apropos'])->name('a-propos');
Route::any('/contact',[\App\Http\Controllers\ListeArticle::class, 'contact'])->name('contact');
Route::any('/articles',[\App\Http\Controllers\ListeArticle::class, 'index'])->name('articles');
Route::any('/articles/{code}',[\App\Http\Controllers\ListeArticle::class, 'lectureCode'])->name('article-reading');
Route::post('/articles/{article_id}/commenter',[\App\Http\Controllers\ListeArticle::class, 'commenter'])->name(('article-commenter'));
Route::any('/supprimer-commentaire/{com_id}',[\App\Http\Controllers\ListeArticle::class, 'supprimer_commentaire'])->name(('article-commenter'));
Route::any('/recherche',[\App\Http\Controllers\ListeArticle::class, 'recherche']);

Route::any('/categorie/{cat_title}',[\App\Http\Controllers\ListeArticle::class, 'filtre_categorie']);
Route::any('/tags/{mot}',[\App\Http\Controllers\ListeArticle::class, 'recherche']);
Route::get('/sudo/admin',function(){
    Auth::user()->assignRole("super-admin");
    return redirect('/admin-articles');
})->middleware('auth');


Route::redirect('/','/accueil');
Route::redirect('/home','/accueil');

