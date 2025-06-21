<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function test(Request $request){
        $fields = $request->validate([
            'keyword' => ['required']
        ]);
        return redirect('/search/'. $fields['keyword']);
    }

    function products(){
        $categories = Category::all();
        $products = Product::paginate(3);
        return view('search', compact('categories', 'products'));
    }

    function search($keyword){
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->paginate(3);
        $categories = Category::all();
        return view('search', compact('categories', 'products'));
    }

    function searchByCat($search, Category $category){
        $product_cats = ProductCategory::where("category_id", $category->id)->get();
        $productIds = $product_cats->pluck("product_id");
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->whereIn("id", $productIds)->paginate(3);
        $categories = Category::all();
        return view('search', compact('categories', 'products')); 
    }

    function viewByCat(Category $category){
        $product_cats = ProductCategory::where("category_id", $category->id)->get();
        $productIds = $product_cats->pluck("product_id");
        $products = Product::whereIn("id", $productIds)->paginate(3);
        $categories = Category::all();
        return view('search', compact('categories', 'products'));
    }

    function productpage(Product $product){
        $categoryIds = $product->product_categories()->pluck('category_id'); 
        $similarProductsCategories = ProductCategory::whereIn("category_id", $categoryIds)->get();
        $similarProductsIds = $similarProductsCategories->pluck("product_id")->unique(); 
        $similarProducts = Product::whereIn('id', $similarProductsIds)
        ->where('id', '!=', $product->id)
        ->inRandomOrder()
        ->limit(6)
        ->get();
        return view('product', compact('product', 'similarProducts'));
    }
    
    function homePage(){
        //Pagination
        $carousels = Carousel::all();
        $products = Product::paginate(3);
        return view('home', compact('carousels', 'products'));
    }
}
