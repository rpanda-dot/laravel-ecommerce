<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        $trashed_count = Product::onlyTrashed()->count();
        return view('admin.product.list', compact('products', 'trashed_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
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

        $product_images = [];

        if (!empty($request->file('product_images'))) {

            foreach ($request->file('product_images') as $product_image) {

                $file = $product_image;
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('uploads/product_images'), $filename);
                array_push($product_images, $filename);
            }
        }
        $product->product_images = $product_images;
        $product->save();
        $product->categories()->attach($request->input('categories'));


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
        return 'RP';
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
        $product_categories = $product->categories();
        $selected_categories = [];
        foreach ($product->categories as $category) {
            array_push($selected_categories, $category->pivot->category_id);
        }
        $categories = Category::all();
        return view('admin.product.create', compact('product', 'categories', 'selected_categories'));
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

        $product_images = [];

        if (!empty($request->file('product_images'))) {

            foreach ($request->file('product_images') as $product_image) {

                $file = $product_image;
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('uploads/product_images'), $filename);
                array_push($product_images, $filename);
            }
        }
        if (!empty($request->input('existing_product_images'))) {
            foreach ($request->input('existing_product_images') as $old_image) {
                array_push($product_images, $old_image);
            }
        }
        $product->product_images = $product_images;
        $product->save();
        $product->categories()->sync($request->input('categories'));

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
        Product::destroy($id);
        return 1;
    }
    public function trashed()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.product.trashed', compact('products'));
    }
    public function restore($product)
    {
        Product::onlyTrashed()
            ->where('id', $product)
            ->restore();

        $products = Product::onlyTrashed()->get();

        $alert_message = [
            'message' => 'Product Restored Successfully',
            'alert-type' => 'success'
        ];
        return view('admin.product.trashed', compact('products'))->with($alert_message);
    }
    public function empty_trahsed()
    {
        return 'Not Working RP';
        // $products = Product::onlyTrashed()->;
        // $products
        // $products->

    }
    public function permanenet_delete($product)
    {
        Product::onlyTrashed()->find($product)->forceDelete();

        $products = Product::onlyTrashed()->get();
        $alert_message = [
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        ];
        return view('admin.product.trashed', compact('products'))->with($alert_message);
    }
}
