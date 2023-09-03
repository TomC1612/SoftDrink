<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    //
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Admin - Soft Drink";

        return view('admin.home.index')->with("viewData", $viewData);
    }
}
