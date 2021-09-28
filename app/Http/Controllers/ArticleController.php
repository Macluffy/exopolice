<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Article::all();
        return view('backoffice.backarticle.modif',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.backarticle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "titre"=>["required","min:1" , "max:200" ],
            "img"=>["required","min:1" , "max:200" ],
            "description"=>["required","min:1" , "max:200" ],
        ]);
        $data = new Article();
        $data->titre = $request->titre;
        $data->description = $request->description;
        $data->img = $request->file('image')->hashName();
        $data->save();
        $request->file('img')->storePublicly('img','public');

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('backoffice.backarticle.showarticle',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('backoffice.backarticle.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        request()->validate([
            "titre"=>["required","min:1" , "max:200" ],
            "img"=>["required","min:1" , "max:200" ],
            "description"=>["required","min:1" , "max:200" ],
        ]);
       
        $request->file('img')->storePublicly('img','public');
        Storage::disk('public')->delete('img/'. $article->img);
        $article->titre = $request->titre;
        $article->description = $request->description;
        $article->img = $request->file('image')->hashName();
        $article->save();
        

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Storage::disk('public')->delete('img/'. $article->img);
        $article->delete();
        return redirect()->route('articles.index');

    }
}
