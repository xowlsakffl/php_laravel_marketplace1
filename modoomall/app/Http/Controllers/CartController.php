<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];

        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = $request->get('product');

        if(session()->has('cart')){

            $products = session()->get('cart');
            //slug들로 배열 만듬
            $productSlugs = array_column($products, 'slug');
            //새로 들어온 slug가 기존 slug에 일치하는게 있다면
            if(in_array($product['slug'], $productSlugs)){
                $products = $this->productIncrement($product['slug'], $product['quantity'], $products);
                session()->put('cart', $products);
            }else{
                session()->push('cart', $product);
            }
        }else{
            $products[] = $product;

            session()->put('cart', $products);
        }

        return redirect()->route('product.single', ['slug' => $product['slug']]);
    }

    public function remove($slug)
    {
        if(!session()->has('cart')){
            return redirect()->route('cart.index');
        }

        $products = session()->get('cart');

        //매개변수 $slug가 아닌것들만 리턴
        $products = array_filter($products, function($line) use($slug){
            return $line['slug'] != $slug;
        });
        
        session()->put('cart', $products);
        return redirect()->route('cart.index');
    }

    public function cancel()
    {
        session()->forget('cart');

        return redirect()->route('cart.index');
    }

    private function productIncrement($slug, $quantity, $products)
    {
        //array_map 배열 각각에 적용
        $products = array_map(function($line) use($slug, $quantity){
            if($slug == $line['slug']){
                $line['quantity'] += $quantity;
            }
            return $line;
        }, $products);

        return $products;
    }
}
