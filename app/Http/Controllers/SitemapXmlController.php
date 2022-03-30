<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Shopcategory;
use App\Models\Product;

class SitemapXmlController extends Controller
{
    public function index() {
        $posts = Post::all();
        $blogcategories = Category::all();
        $products = Product::all();
        $shopcategories = Shopcategory::all();
        return response()->view('sitemap', [
            'posts' => $posts,
            'blogcategories' => $blogcategories,
            'products' => $products,
            'shopcategories' => $shopcategories,

        ])->header('Content-Type', 'text/xml');
      }
}
