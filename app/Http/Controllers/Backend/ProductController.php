<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
        $data = request()->validate([
            'name' => 'required',
        ]);

        $product = new Product();

        $product->name =  $request->input('name');
        $product->short_description =  $request->input('short_description');
        $product->long_description =  $request->input('long_description');
        $product->sale_price =  $request->input('sale_price');
        $product->price =  $request->input('price');
        $product->save();

        $alert_message = [
            'message' => 'Product Created Successfully',
            'alert-type' => 'success'
        ];
        return redirect('admin/product')->with($alert_message);
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
        $product = Product::find($id);
        return view('admin.product.create', compact('product'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        $product = Product::find($id);

        $product->name =  $request->input('name');
        $product->short_description =  $request->input('short_description');
        $product->long_description =  $request->input('long_description');
        $product->sale_price =  $request->input('sale_price');
        $product->price =  $request->input('price');
        $product->save();

        $alert_message = [
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect('admin/product')->with($alert_message);
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
}
