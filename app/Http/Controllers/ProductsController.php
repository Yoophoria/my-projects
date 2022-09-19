<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    public function cart() {
        return view('products.cart');
    }

    public function addToCart($id){
        $products = Product::find($id);

        if(!$products){
            abort(404);
        }

        $cart = session()->get('cart');

        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $products->name,
                    "quantity" => 1,
                    "price" => $products->price,
                ]
            ];
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'added to cart successfully!');
        }

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            "name" => $products->name,
            "quantity" => 1,
            "price" => $products->price
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $data = [
        //     'a' => 'a',
        // ];

        // return response()->json($data);

        if($request->id and $request->quantity) {

            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            $request->session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully! :)');
        }
    }

    public function remove(Request $request) {
        if($request->id) {
            $cart = session()->get('cart');
            
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $request->session()->forget('success', 'Product removed successfully :(');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function test_api(Request $request){
        $data = [
            'b' => '_token',
        ];

        return response()->json($data);
    
    }
}
