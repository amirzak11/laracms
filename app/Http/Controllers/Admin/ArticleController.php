<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Article;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function list()
    {
        $articles = Article::all();
        return view('admin.article.list', compact('articles'));
    }
    public function create()
    {
        return view('admin.article.create');
    }
    public function store(Request $request)
    {
        if (request()->input('article-ckeditor')) {
            $input = [
                'title' => request()->input('title'),
                'content' => request()->input('article-ckeditor'),
            ];
        }
        $new_product_object = Article::create($input);
        /*create relation image and article*/
        $files = request()->file('product_item');
        if (isset($files) && $files !== null) {
            foreach ($files as $file) {
                $random = Str::random(20);
                $new_article_name = $random . '.' . $file->getClientOriginalExtension();
                /*Product_storeAs*/
                $result = $file->storeAs('images', $new_article_name);
                /*If Result True*/
                if ($result) {
                    /*insert to Array Input*/
                    $image_input = [
                        'name' => $new_article_name,
                        'size' => $file->getSize(),
                        'type' => $file->getMimeType(),
                    ];
                }
                $new_image_object = Image::create($image_input);
                if ($new_product_object instanceof Article) {
                    $new_product_object->images()->attach($new_image_object);
                }
            }
        }
        return redirect()->route('admin.article.list')->with('success', 'مقاله ایجاد گردید');
    }
    public function edit($article_id){
        $article_items = Article::find($article_id);
        $image = $article_items->images;
        if ($article_items && $article_items instanceof Article) {
            return view('admin.article.edit', compact('article_items','image'));
        }
    }
    public function update(Request $request, $article_id){
        $article_item = Article::find($article_id);
        /*Insert Request form data*/
        $input = [
            'title' => request()->input('title'),
            'content' => request()->input('article-ckeditor'),
        ];
        $files = request()->file('product_item');
        if (isset($files) && $files !== null) {
            foreach ($files as $file) {
                $random = Str::random(20);
                $new_product_name = $random . '.' . $file->getClientOriginalExtension();
                /*Product_storeAs*/
                $result = $file->storeAs('images', $new_product_name);
                /*If Result True*/
                if ($result) {
                    /*insert to Array Input*/
                    $image_input = [
                        'name' => $new_product_name,
                        'size' => $file->getSize(),
                        'type' => $file->getMimeType(),
                    ];
                }
                $new_image_object = Image::create($image_input);
                if ($article_item) {
                    $article_item->images()->attach($new_image_object->id);
                }
            }
        }

    }
}
