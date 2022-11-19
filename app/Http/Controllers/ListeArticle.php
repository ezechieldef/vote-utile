<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Lecture;
use App\Models\Categorie;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ListeArticle extends Controller
{
    public function index()
    {
        //
        if ($message = Session::get('error')) {
            Alert::toast($message, 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('error');
        }
        if ($message = Session::get('success')) {
            Alert::toast($message, 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('success');
        }
        $articles = Article::where('isActive', true)->paginate(10);
        //dd($articles);
        return view('public/articles', compact('articles'));
    }

    public function lectureCode(Request $request, string $code)
    {
        if ($message = Session::get('error')) {
            Alert::toast($message, 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('error');
        }
        if ($message = Session::get('success')) {
            Alert::toast($message, 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('success');
        }

        $article = Article::where('code', $code)->first() ?? null;

        if ($article == null) {
            return abort(403, 'Article introuvable');
        }
        try {
            Lecture::create(['IP' => $request->ip(), 'article_id' => $article->id]);
        } catch (\Throwable $th) {
            //throw $th;
            //dd($th);
        }

        return view('public.un_article', compact('article'));
    }
    public function accueil()
    {
        if ($message = Session::get('error')) {
            Alert::toast($message, 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('error');
        }
        if ($message = Session::get('success')) {
            Alert::toast($message, 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('success');
        }
        $articles = Article::last4()->get();

        return view('public.accueil', compact('articles'));
    }
    public function apropos()
    {
        return view('public.apropos');
    }
    public function contact()
    {
        return view('public.contact');
    }

    public function commenter(int $article_id)
    {
        $article = Article::findOrFail($article_id);

        request()->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'commentaire' => 'required'
        ]);
        $all = request()->all();
        $all['IP'] = request()->ip();
        $all['article_id'] = $article_id;

        Commentaire::create($all);
        return redirect('/articles/' . $article->code)->with('success', 'Commentaire posté avec succès !');
    }
    public function supprimer_commentaire(int $com_id)
    {
        $comment = Commentaire::findOrFail($com_id);
        $article = Article::findOrFail($comment->article_id);
        if ($comment->IP == request()->ip() || !(is_null(Auth::user()))) {
            $comment->delete();
        }
        return redirect('/articles/' . $article->code)->with('success', 'Commentaire supprimé avec succès !');
    }
    public function recherche()
    {
        $mot =(request()->all()['search'] ?? '');
        $mot= str_replace(' ','%',$mot);
        $articles = Article::where('isActive', true)
        ->where('tags','LIKE', '%'.$mot.'%')
        ->orWhere('contenu','LIKE', '%'.$mot.'%')
        ->orWhere('titre','LIKE', '%'.$mot.'%')
        ->orderby('id','DESC')->get();
        //->paginate(10);
        //dd($articles);
        return view('public/articles', compact('articles'));
    }

    public function filtre_categorie(string $cat_title)
    {
        $categ = Categorie::where('titre', $cat_title)->first() ?? null;
        if ($categ == null) {
            //return abort(403, 'Article introuvable');
            return redirect('/articles')->with('error','Désolé, cette catégorie n\'a pas été retrouvé');
        }

        $articles = $categ->articles()->where('isActive',true)->paginate(10);
        //dd($articles);
        return view('public/articles', compact('articles', 'categ'));
    }
}
