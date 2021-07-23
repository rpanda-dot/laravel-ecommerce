<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $null_parent_categories = Category::whereNull('parent_id')->get();
        $all_categories = [];
        $defth_of_category = 0;
        $this->calculate_category($null_parent_categories, $all_categories, $defth_of_category);
        return view('admin.product.category', compact('all_categories'));
    }
    private function calculate_category($null_parent_categories, &$category_return_array, $defth_of_category)
    {
        foreach ($null_parent_categories as $category) {

            array_push($category_return_array, [
                'id' => $category->id,
                'name' => $category->name,
                'parent' => $category->parent ? $category->parent->name : '-',
                'defth' => $defth_of_category,
            ]);
            $child_categories =  Category::where('parent_id', '=', $category->id)->get();
            if ($child_categories->isEmpty()) {
            } else {
                $this->calculate_category($child_categories, $category_return_array, $defth_of_category + 1);
            }
        }
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
        ]);

        $category = new Category();
        $category->name =  $request->input('name');
        $category->parent_id =  $request->input('parent_id');
        $category->save();


        $alert_message = [
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        ];
        return redirect('admin/category')->with($alert_message);
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
        Category::destroy($id);
        return 1;
    }
}
