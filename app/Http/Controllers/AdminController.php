<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Carousel;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class AdminController extends Controller
{
    function addProductImage(Product $product, Request $request){
        $fields = $request->validate([
            'image' => ['required', 'image', 'max:1024', 'mimes:jpg,jpeg,png']
        ]);
        $imageName = time() . "." . $fields['image']->extension();
        $fields['image']->move(public_path('assets/uploads'), $imageName);
        $fields['image'] = $imageName;
        $fields['product_id'] = $product->id;
        Image::create($fields);
        return redirect()->back();

    }

    function addCarouselPage(){
        return view ('admin.addCarousel');
    }

    function addProductImagePage(Product $product){
        return view('admin.addimage', compact('product'));
    }

    function addCarousel(Request $request){
        $fields = $request->validate([
            'title' => ['required', 'string', 'min:1', 'max:255'],
            'description' => ['required', 'string', 'min:1', 'max:255'],
            'image' => ['required', 'image', 'max:1024', 'mimes:jpg,jpeg,png']
        ]);
        $imageName = time() . "." . $fields['image']->extension();
        $fields['image']->move(public_path('assets/carousel'), $imageName);
        $fields['image'] = $imageName;
        Carousel::create($fields);
        return redirect('/');

    }

    function carouselPage(){
        $carousels = Carousel::all();
        return view("admin.carousel", compact('carousels'));
    }

    function editProductPage(Product $product){
        return view('admin.editProduct', compact("product"));
    }

    function editProduct(Request $request, Product $product){
        $fields = $request->validate([
            'name' => ['string', 'required', 'max:255', 'min:1'],
            'price' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'min:3'],
            'main_img' => ['image', 'max:1024', 'mimes:jpg,jpeg,png'],
            'quantity' => ['integer'],
            'details' => ['required']
        ]);
        
        if(isset($fields['main_img'])){
            $imageName = time() . "." . $fields['main_img']->extension();
            $fields['main_img']->move(public_path('assets/uploads'), $imageName);
            $fields['main_img'] = $imageName;
        } 
        
        $product->update($fields);
        return redirect()->back();

    }

    function deleteProduct(Product $product){
        $product->delete();
        return redirect()->back();
    }

    function deleteProductCategory(ProductCategory $product_category){
        $product_category->delete();
        return redirect()->back();
    }

    function addProductCategoryPage(Product $product){
        $productCatIds = $product->product_categories()->pluck('category_id');
        $categories = Category::whereNotIn('id', $productCatIds)->get();
        return view('admin.product-categories', compact('categories', 'product'));
    }

    
    function addProductCategory(Product $product, Request $request){
        $fields = $request->validate([
            'category_id' => ['required', 'exists:categories,id']
        ]);
        
        $fields['product_id'] = $product->id;
        foreach($product->product_categories as $product_category){
            if($product_category->category_id == $fields['category_id']){
                return redirect()->back();
            }
        }
        
        ProductCategory::create($fields);
        return redirect()->back();
    }

    function addCategory(Request $request){
        $fields = $request->validate([
            'name' => ['required', 'string', 'min:1', 'max:255']
        ]);
        Category::create($fields);
        return redirect('/admin/categories');
    }

    function addCategoriesPage(){
        return view('admin.addCategory');
    }
    
    function categoriesPage(){
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    function addProduct(Request $request){
        $fields = $request->validate([
            'name' => ['string', 'required', 'max:255', 'min:1'],
            'price' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'min:3'],
            'main_img' => ['required', 'image', 'max:1024', 'mimes:jpg,jpeg,png'],
            'quantity' => ['integer'],
            'details' => ['required']
        ]);
        
        $fields['details'] = strip_tags($fields['details'], '<script>');
        $imageName = time() . "." . $fields['main_img']->extension();
        $fields['main_img']->move(public_path('assets/uploads'), $imageName);

        $fields['main_img'] = $imageName;
        Product::create($fields);
        return redirect('/admin/products');
    }

    function addProductPage(){
        return view('admin.addProduct');
    }

    function productsPage(){
        $products = Product::all();
        return view('admin.products', compact("products"));
    }

    function homePage(){
        return view('admin.home');
    }
}
