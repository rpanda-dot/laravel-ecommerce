<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function category_index($category_id)
    {
        $null_parent_categories = Category::whereNull('parent_id')->get();
        $men_category = Category::where('name', '=', 'Men')->first();
        $women_category = Category::where('name', '=', 'Women')->first();
        $men_subcategories = Category::where('parent_id', '=', $men_category->id)->get();
        $women_subcategories = Category::where('parent_id', '=', $women_category->id)->get();



        $products = Category::findOrFail($category_id)->products;



        return view('frontend.category_shop', compact('men_subcategories', 'women_subcategories', 'products'));
    }
}
