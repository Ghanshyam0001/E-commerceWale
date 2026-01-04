<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $query = Product::with('subcategory');

    // AJAX search by title
    if ($request->ajax() && $request->action === "search-product") {
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $products = $query->paginate(4);

        return view('partials.front_product', compact('products'))->render();
    }

    // Default products for page load
    $products = $query->paginate(4);
    $subcategories = SubCategory::all();

    return view('index', compact('products', 'subcategories'));
}

    public function shop(Request $request)
    {
        $perpage = 9;
        $products = Product::paginate($perpage);
        $all_products = Product::all();

        if ($request->ajax()) {
            if ($request->sub_cat_id) {

                $where = [['sub_category_id', '=', $request->sub_cat_id]];
            }

            if ($request->cat_id) {
                $where = [['category_id', '=', $request->cat_id]];
            }

            if ($request->range) {
                $where = [['price', '<=', $request->range]];
            }
            $products = Product::where($where)->paginate($perpage);
        }
        $data['categories'] = Category::all();
        $data['subcategories'] = SubCategory::all();
        $data['products'] = $products;
        $data['$perpage'] = $perpage;

        if ($request->ajax()) {


            return view('shop_product')->with($data);
        }

        return view('shop')->with($data);
    }
}
