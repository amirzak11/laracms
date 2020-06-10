<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Article;
use App\Models\Information;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

        public function index($id)
    {
        $information = Information::find(1);
        $articles = Article::find($id);
        $all_articles= Article::all();
        return view('frontend.article.view', compact('all_articles','information','articles'));
    }
}
