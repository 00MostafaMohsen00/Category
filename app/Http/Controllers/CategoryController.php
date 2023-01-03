<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::whereNull('category_id')->get();
        return view('category.index',get_defined_vars());
    }
    public function get_categories($id){
        $category=Category::findOrFail($id);
        return $category->categories;
    }
}
