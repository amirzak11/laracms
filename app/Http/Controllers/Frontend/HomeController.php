<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Article;
use App\Models\Admin\Banner;
use App\Models\Admin\Bannersable;
use App\Models\Admin\SlideShop;
use App\Models\Brand;
use App\Models\Category;

use App\Models\Information;
use App\Models\Product;
use App\Models\Slideshow;
use App\Traits\categories;
use App\Traits\categoriesable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use categories;

    public function index()
    {
        $brands = Brand::get();
        $information = Information::find(1);
        $banners = Banner::find('17');
        $banners->categories()->pluck('title');
        $slideShop = SlideShop::get()->pluck('category_id');
        $cat = Category::find($slideShop);
        if (count($cat) > 0) {
            for ($i = 0;
                 $i < count($cat);
                 $i++) {
                if ($cat[$i]->products) {
                    $products = $cat[$i]->products;
                }
            }
        } else {
            $products = null;
        }
        $categories = $this->category();
        $product = Product::all();
        $slideShow = Slideshow::get();
        $articles = Article::get();
        $i = 0;
        return view('frontend.home.index', compact('banners', 'i', 'brands', 'products', 'cat', 'slideShow', 'categories', 'information', 'articles'));
    }

    public function contact()
    {
        $categories = $this->category();
        $information = Information::find(1);
        return view('frontend.home.contact', compact('information', 'categories'));
    }

    public
    function about()
    {
        $categories = $this->category();
        $information = Information::find(1);
        return view('frontend.home.about', compact('information', 'categories'));
    }
}
