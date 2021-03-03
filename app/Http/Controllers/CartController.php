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

        if(session()->has('cart')) {

            $products = session()->get('cart');  // pega os produtos da sessão 
            $productsSlugs = array_column($products, 'slug'); // pega os slugs que estão ativos na sessão cart

            // Se o slug do produto que está sendo adicionado já existir na sessão.
            if(in_array($product['slug'], $productsSlugs)){
                // pega o slug do produto que está sendo adicionado + amount e passa os produtos já salvos na sessão
                $products = $this->productIncrement($product['slug'], $product['amount'], $products);
                session()->put('cart', $products);
            } else {
                //Se existe session -> faz um push para inserir dentro da session os dados
                session()->push('cart', $product);
            }
        } else {
            //Se não existe session -> faz um put para criar
            $products[] = $product;

            session()->put('cart', $products);
        }
        
        flash('Produto adicionado no carrinho!')->success();
        return redirect()->route('product.single', ['slug'=>$product['slug']]);
    }

    public function remove($slug)
    {
        if(!session()->has('cart')){
            return redirect()->route('cart.index');
        }

        $products = session()->get('cart');

        $products = array_filter($products, function($line) use($slug){
            return $line['slug'] != $slug;
        });

        session()->put('cart', $products);
        return redirect()->route('cart.index');
    }

    public function cancel()
    {
        session()->forget('cart');
        
        flash('Compra cancelada!')->success();
        return redirect()->route('cart.index');
    }

    public function productIncrement($slug, $amount, $products)
    {
        $products = array_map(function($line) use($slug, $amount){
            if($slug == $line['slug']){
                $line['amount'] += $amount;
            }
            return $line;
        }, $products);

        return $products;
    }
}
