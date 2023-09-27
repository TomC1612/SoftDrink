<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    protected $table = "reviews";
    public function create($id)
    {
        $viewData = [];
        $viewData["title"] = "Soft Drink";
        $viewData["product"] = Product::findOrFail($id);
        return view('review.create')->with("viewData", $viewData);
    }
    public function save(Request $request, $id)
    {
        $request->validate([
            'content' => 'required| max:255',
            'rating' => 'required',
        ]);
        $userId = Auth::user()->getId();


        $comment = new Comment();
        $comment->setContent($request->input("content"));
        $comment->setRating($request->input("rating"));
        $comment->setUserID($userId);
        $comment->setProductId($id);
        $comment->save();


        return back();
        // return redirect()->route('cart.index');
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Soft Drink";
        $viewData['product'] = Product::findOrFail($id);
        return view('review.edit')->with("viewData", $viewData);
    }
}
