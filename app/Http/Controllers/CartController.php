<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function order(){
        $cart = session()->get('cart', []);
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();
        $total_amount = 0;
        foreach($products as $product){
            $cart[$product->id]['price'] = $product->price;
            $cart[$product->id]['id'] = $product->id;
            $total_amount += ($product->price *  $cart[$product->id]['quantity']);
        }

        Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $total_amount,
            'order_items' => json_encode($cart)
        ]);

        session()->forget('cart');
        return redirect('/');
    }

    function cartPage(){
        $cart = session()->get('cart', []);
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();
        foreach($products as $product){
            $cart[$product->id]['name'] = $product->name;
            $cart[$product->id]['price'] = $product->price;
            $cart[$product->id]['id'] = $product->id;
        }
        return view('cart', compact("cart"));
    }

    function incrementCart(Product $product){
        $cart = session()->get('cart', []);
        if(isset($cart[$product->id])){
            if($product->quantity <= $cart[$product->id]['quantity']){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Quantity not available in stock!'
                ]);
            }
            $cart[$product->id]['quantity'] += 1;
            session()->put('cart', $cart);
            return response()->json([
                'status' => 'success',
                'quantity' => $cart[$product->id]['quantity']
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Product not in cart!'
        ]);
    }

    function decrementCart(Product $product){
        $cart = session()->get('cart', []);
        if(isset($cart[$product->id])){
            if($cart[$product->id]['quantity'] <= 0){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Quantity cant be less than 0'
                ]);
            }
            $cart[$product->id]['quantity'] -= 1;
            session()->put('cart', $cart);
            return response()->json([
                'status' => 'success',
                'quantity' => $cart[$product->id]['quantity']
            ]);
        } 
        return response()->json([
            'status' => 'error',
            'message' => 'Product not in cart'
        ]);
    }

    function removeFromCart(Product $product){
        $cart = session()->get('cart', []);
        if(isset($cart[$product->id])){
            unset($cart[$product->id]);
            session()->put('cart', $cart);
            return response()->json([
                'status' => 'success'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Item not in cart'
        ]);
    }

    function addToCart(Product $product, Request $request){
        $fields = $request->validate([
            'quantity' => ['required', 'min:1', 'max:99', 'integer']
        ]);

        if($product->quantity < $fields['quantity']){
            return redirect()->back();
        }

        $cart = session()->get('cart', []);
        
        if(isset($cart[$product->id])){
            return redirect()->back();
        }

        $cart[$product->id] = [
            'quantity' => $fields['quantity']
        ];
        
        session()->put('cart', $cart);
        return redirect()->back();
        
    }
}
