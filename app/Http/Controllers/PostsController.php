<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shopcategory;
use App\Models\Team;


class PostsController extends Controller
{
 

    public function index($slug){
       
        $post = Post::where('slug', $slug)->first();
        $product = Product::where('slug', $slug)->first();

            if(!$post){
                // Условие 1
                
                $category = Category::where('slug', $slug)->first();
                if($category){
                $category = Category::where('slug', $slug)->firstOrFail();
                $pcategory = Category::where('slug', $slug)->firstOrFail();
                    $posts = $category->posts;
                    
                   
                    $categories = Category::whereNull('parent_id')
                    ->with('childrenCategories');
            
                    $breadcrumbs = [];
                        $breadcrumbs[] = $this->getBreadcrumbsElement($category);
            
                            // if ($category) {
                            // $breadcrumbs[] = $this->getBreadcrumbsElement($category);
                            // }
                            if ($category->parent) {
                            $breadcrumbs[] = $this->getBreadcrumbsElement($category->parent);
                        
                    }
                    $breadcrumbs[0]['link'] = '';
            
                    
                   
                    return view('categories', compact('categories', 'category', 'pcategory', 'breadcrumbs' ))
                    ->with('categories', Category::orderBy('position')
                    ->where('parent_id', $category->id)
                    ->get())
                    ->with('posts', Post::orderBy('position')
                    ->where('category_id', $category->id)->paginate(12)
                    );
                }
                if(!$category){
                    $category = Shopcategory::where('slug', $slug)->firstOrFail();
                    $pcategory = Shopcategory::where('slug', $slug)->firstOrFail();
                    $products = $category->products;

                    $categories = Shopcategory::whereNull('parent_id')
                    ->with('childrenCategories');

                    $breadcrumbs = [];
                        $breadcrumbs[] = $this->getBreadcrumbsElement($category);
            
                            // if ($category) {
                            // $breadcrumbs[] = $this->getBreadcrumbsElement($category);
                            // }
                            if ($category->parent) {
                            $breadcrumbs[] = $this->getBreadcrumbsElement($category->parent);
                        
                    }
                    $breadcrumbs[0]['link'] = '';

                    return view('catalog', compact('category', 'pcategory', 'breadcrumbs' ))
                    ->with('categories', Shopcategory::orderBy('position')
                    ->where('parent_id', $category->id)
                    ->get())
                    ->with('products', Product::orderBy('position')
                    ->where('shop_category_id', $category->id)->paginate(12)
                    );
                    
                }
                

        }
        if($post){
            if(!$post->category){

           
            $post = Post::where('slug', $slug)->firstOrFail();
            $teams = Team::orderBy('position_second')->get();
            $block = Block::all();
            $blocks = $post->blocks;
        

            $breadcrumbs = [];
            $breadcrumbs[] = $this->getBreadcrumbsElement($post);

                if ($post->category) {
                $breadcrumbs[] = $this->getBreadcrumbsElement($post->category);
                }
            
        $breadcrumbs[0]['link'] = '';


            return view('post', compact('post', 'breadcrumbs', 'blocks'))
            ;

            }
            else{
                
                return response(view('errors.404'), 404);
            }
        }
        
    }










      //Объекты
    public function object($slug1, $slug2){


        $category = Category::where('slug', $slug1)->first();

        if($category){
       
            $category = Category::where('slug', $slug1)->firstOrFail();
        
            $post = Post::where('slug', $slug2)->where('category_id', $category->id)->firstOrFail(); 
       
        

        $breadcrumbs = [];
            $breadcrumbs[] = $this->getBreadcrumbsElement($post);

                if ($post->category) {
                $breadcrumbs[] = $this->getBreadcrumbsElement($post->category);
                }
                if ($post->category->parent) {
                $breadcrumbs[] = $this->getBreadcrumbsElement($post->category->parent);
            
        }
        $breadcrumbs[0]['link'] = '';
        return view('post', compact('category','post', 'breadcrumbs'));
        
        
    }
    if(!$category){
        $category = Shopcategory::where('slug', $slug1)->firstOrFail();
        
        $product = Product::where('slug', $slug2)->where('shop_category_id', $category->id)->firstOrFail(); 
   
    

    $breadcrumbs = [];
        $breadcrumbs[] = $this->getBreadcrumbsElement($product);

            if ($product->category) {
            $breadcrumbs[] = $this->getBreadcrumbsElement($product->category);
            }
            if ($product->category->parent) {
            $breadcrumbs[] = $this->getBreadcrumbsElement($product->category->parent);
        
    }
    $breadcrumbs[0]['link'] = '';

    $productCustom = Product::find(3);

    $first = Product::latest()->first();
    $last = Product::oldest()->first();
    $next = Product::where('id', '>', $product->id)
    ->oldest('id')
    ->first();


    $prev = Product::where('id', '<', $product->id)
    ->latest('id')
    ->first();

    return view('shopProduct', compact('category','product', 'breadcrumbs', 'prev', 'next', 'first', 'last'));
    }
}

    public function getBreadcrumbsElement($item)
    {
        
        $crumb['link'] = $item->slug;
        $crumb['title'] = $item->title;
        return $crumb;
    }

    public function mainpage(){
        $post = Post::where('id','=',1)->first();
        $block = Block::all();
        $blocks = $post->blocks;
        return view('homepage', compact('post', 'blocks'));
    }
}
