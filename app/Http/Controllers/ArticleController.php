<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate();

        return view('article.index', compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * $articles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Article::$rules);

        $all = $request->all();

        foreach ($request->allFiles() as  $fname => $v) {

            request()->validate([$fname => 'mimes:jpg,jpeg,png,gif,svg|max:2048']);

            $emp = $v->store('images', 'public');
            $request->all()[$fname] = $emp;
            $all[$fname] = $emp;
        }



        $article = Article::create($all);


        return redirect()->route('admin-articles.index')
            ->with('success', 'Article créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $article_id)
    {
        $article = Article::findOrFail($article_id);

        $all = $request->all();

        foreach ($request->allFiles() as  $fname => $v) {

            request()->validate([$fname => 'mimes:jpg,jpeg,png,gif,svg|max:2048']);
            if ($article->$fname != '') {
                Storage::delete('public/' . $article->$fname);

            }
            $emp = $v->store('images', 'public');
            $all[$fname] = $emp;
        }


        $article->update($all);

        return redirect()->route('admin-articles.index')
            ->with('success', 'Article mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $article = Article::find($id)->delete();

        return redirect()->route('admin-articles.index')
            ->with('success', 'Article supprimé avec succès');
    }


}
