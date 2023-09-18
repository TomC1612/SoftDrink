<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminProductController extends Controller
{
    //
    protected $table = "products";
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Admin - Soft Drink";
        $viewData['products'] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function create(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            'image' => 'image',
        ]);
        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setImage($request->input('image'));
        // $creationData = $request->only(["name", "description", "price"]);
        if ($request->hasFile('image')) {
            // $imageName = $newProduct->getId() . "." . $request->file('image')->extension();
            $imageName = $request->file('image')->getClientOriginalName();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);

            $newProduct->save();
        }
        $newProduct->save();
        // Product::create($creationData);

        return back();
    }
    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Product - Soft Drink";
        $viewData['products'] = Product::findOrFail();
        return view('admin.product.edit')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            'image' => 'image',
        ]);
        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        if ($request->hasFile('image')) {
            $imageName = $product->getName() . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName);
        }
        $product->save();
        return redirect()->route('admin.product.index');
    }
}
