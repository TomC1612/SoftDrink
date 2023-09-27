<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $viewData = [];
        $name = "Coca";
        $viewData["title"] = "Products - Soft Drink";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = Product::all();
        $viewData["brands"] = Product::distinct()->select("brand")->get();
        // $viewData["products"] = Product::where('name', 'like', "%" . $name . "%")->get();
        return view('product.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName() . " - Soft Drink";
        $viewData["subtitle"] = $product->getName() . " - Product information";
        $viewData["product"] = $product;



        $userId = Comment::where("product_id", $id)->value('user_id');
        $viewData["comments"] = Comment::all();
        $viewData["UserName"] = User::where('id', $userId)->value('name');


        return view('product.show')->with("viewData", $viewData);
    }
    public function search(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "Products - Soft Drink";
        $viewData["subtitle"] = "List of products";
        $name = $request->input("name");
        $viewData["products"] = Product::where('name', 'like', "%" . $name . "%")->get();
        return view('product.search')->with("viewData", $viewData);
    }
    public function load(Request $request)

    {
        $viewData = [];
        $viewData["title"] = "Products - Soft Drink";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = Product::all();
        $ProductBrand = $request->input("ProductBrand");
        if ($ProductBrand == "all") {
            $viewData["products"] = Product::all();
        } else {
            $viewData["products"] = Product::where("brand", $ProductBrand)->get();
        }
        $viewData["ProductBrand"] = $ProductBrand;
        $viewData["brands"] = Product::distinct()->select("brand")->get();


        return view("product.index")->with("viewData", $viewData);
    }
}
