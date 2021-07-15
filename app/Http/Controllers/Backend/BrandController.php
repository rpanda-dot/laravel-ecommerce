<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_brands = Brand::all();
        return view('admin.product.brand', compact('all_brands'));
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
        $data = request()->validate([
            'name' => 'required',
            'brand_image' => ['required', 'image']
        ]);

        $brand = new Brand();
        $brand->name = $request->input('name');

        $file = $request->file('brand_image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('uploads/brand_logo'), $filename);
        $brand->brand_image = $filename;

        $brand->save();

        $alert_message = [
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success'
        ];
        return redirect('admin/brand')->with($alert_message);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        @unlink(public_path('uploads/brand_logo/') . $brand->brand_image);

        $brand->delete();

        return 1;
        //
    }
}
