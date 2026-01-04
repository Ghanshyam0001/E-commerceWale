<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'subCategory'])->paginate(10);
        return view('admin-panel.products.list', compact('products'));
    }

    public function create()
    {
        $Categories = Category::all();
        $Sub_Categories = SubCategory::all();

        return view('admin-panel.products.create', compact('Categories', 'Sub_Categories'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'price'           => 'required|numeric|min:0',
            'discount_price'  => 'nullable|numeric|min:0|lte:price',
            'description'     => 'nullable|string',
            'category_id'     => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        $img_name = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img_name = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $img_name);
        }


        $product = new Product();
        $product->title = $validated['title'];
        $product->price = $validated['price'];
        $product->discount_price = $validated['discount_price'] ?? null;
        $product->description = $validated['description'] ?? null;
        $product->category_id = $validated['category_id'];
        $product->sub_category_id = $validated['sub_category_id'];
        $product->image = $img_name;
        $product->save();

        return redirect('products/list');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $Categories = Category::all();
        $Sub_Categories = SubCategory::all();

        return view('admin-panel.products.edit', compact('product', 'Categories', 'Sub_Categories'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img_name = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $img_name);

            if ($product->image && file_exists(public_path('uploads/products/' . $product->image))) {
                unlink(public_path('uploads/products/' . $product->image));
            }
            $product->image = $img_name;
        }

        $product->save();

        return redirect()->route('products.list');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);


        if ($product->image && file_exists(public_path('uploads/products/' . $product->image))) {
            unlink(public_path('uploads/products/' . $product->image));
        }


        $product->delete();

        return redirect()->route('products.list');
    }

    public function addcart(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->where('product_id', $request->prod_id)->first();
        if (!$cart) {
            $cart = new Cart();
            $cart->product_id = $request->prod_id;
            $cart->user_id = Auth::id();
            $cart->save();
        }


        $cart_count = Cart::where('user_id', Auth::id())->count();

        return response()->json(['success' => true, 'cart_count' => $cart_count, 'message' => 'Product added To Cart Successfully']);
    }

    public function cart(Request $request)
    {
        $cart_prods = Cart::where('user_id', Auth::id())->get();


        return view('cart', compact('cart_prods'));
    }

    public function updatecart(Request $request)
    {
        $cart = Cart::find($request->cart_id);


        $cart->quantity = $request->quantity;

        $cart->save();

        $cart_count = Cart::where('user_id', Auth::id())->count();


        return response()->json(['success' => true, 'cart_count' => $cart_count,]);
    }
    public function removecart(Request $request)
    {
        $cart = Cart::find($request->cart_id);

        $cart->delete();
        $cart_count = Cart::where('user_id', Auth::id())->count();


        return response()->json(['success' => true, 'cart_count' => $cart_count,]);
    }

    public function totalpayout(Request $request)
    {
        $cart = Cart::find($request->cart_id);


        $carts = Cart::where('user_id', Auth::id())->get();
        $total_payout = 0;
        foreach ($carts as $cart) {
            $total_payout = $total_payout + ($cart->quantity * $cart->product->discount_price);
        }


        return response()->json(['success' => true, 'total_payout' => $total_payout]);
    }

public function chackout()
{
    $cart_prods = Cart::where('user_id', Auth::id())
        ->where('quantity', '>', 0)
        ->with('product')
        ->get();

    $total_payout = $cart_prods->sum(function ($cart) {
        return $cart->quantity * $cart->product->discount_price;
    });

    $last_order = Order::where('user_id', Auth::id())->latest()->first();

    return view('chackout', compact('cart_prods','total_payout','last_order'));
}

public function searchProducts(Request $request)
{
    $query = $request->query('query');

    $userRole = auth()->check() ? auth()->user()->role : null;

    $products = Product::with(['category', 'subCategory'])
        ->where('title', 'LIKE', "%{$query}%")
        ->orWhere('id', $query)
        ->orWhereHas('category', fn($q) => $q->where('name', 'LIKE', "%{$query}%"))
        ->orWhereHas('subCategory', fn($q) => $q->where('name', 'LIKE', "%{$query}%"))
        ->get()
        ->map(function($product) use ($userRole) {
            $product->auth_user_role = $userRole; // send role to JS
            return $product;
        });

    return response()->json($products);
}




}
