<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    //
    public function index()
    {
        //fetch all products
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        //load form view
        return view('products.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $imageName = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $imageName);

        $product = new Product;
        $product->name = $request->get('name');
        $product->image = $imageName;
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->save();

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        // get the product
        $product = Product::find($id);

        return view('products.edit', ['product' => $product]);

    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $input = $request->all();

        $product->update($input);

//        Session::flash('message', 'Successfully updated product!');

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }


}
