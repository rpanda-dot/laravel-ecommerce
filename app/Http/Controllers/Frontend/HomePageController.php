<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index()
    {
        $null_parent_categories = Category::whereNull('parent_id')->get();
        $men_category = Category::where('name', '=', 'Men')->first();
        $women_category = Category::where('name', '=', 'Women')->first();
        $men_subcategories = Category::where('parent_id', '=', $men_category->id)->get();
        $women_subcategories = Category::where('parent_id', '=', $women_category->id)->get();


        return view('frontend.home_page', compact('men_subcategories', 'women_subcategories'));
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


    private function calculate_menu($null_parent_categories, &$category_return_array, $defth_of_category)
    {
        foreach ($null_parent_categories as $category) {

            $temp_cat = [
                'id' => $category->id,
                'name' => $category->name,
                'parent' => $category->parent ? $category->parent->name : '-',
                'defth' => $defth_of_category,
            ];

            array_push($category_return_array, [
                'id' => $category->id,
                'name' => $category->name,
                'parent' => $category->parent ? $category->parent->name : '-',
                'defth' => $defth_of_category,
            ]);
            $child_categories =  Category::where('parent_id', '=', $category->id)->get();
            if (!$child_categories->isEmpty()) {
                $temp_cat['child'] = [];
                $this->calculate_category($child_categories, $category_return_array, $defth_of_category + 1);
            }
        }
    }
}
