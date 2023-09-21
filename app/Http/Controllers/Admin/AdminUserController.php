<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //
    protected $table = "users";
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Admin - Soft Drink";
        $viewData["users"] = User::all();

        return view('admin.user.index')->with("viewData", $viewData);
    }
    public function create()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Admin - Soft Drink";
        $viewData["roles"] = User::select('role')->distinct()->get();
        return view('admin.user.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',

        ]);

        $newUser = new User();
        $newUser->setName($request->input("name"));
        $newUser->setEmail($request->input("email"));
        $newUser->setPassword(Hash::make($request->input("password")));
        $newUser->setRole($request->input("role"));
        $newUser->setBalance("5000");
        $newUser->save();
        return back();
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Product - Soft Drink";
        $viewData["user"] = User::findOrFail($id);

        $viewData["roles"] = User::select('role')->distinct()->get();
        return view('admin.user.edit')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->setName($request->input("name"));
        $user->setEmail($request->input("email"));
        $user->setRole($request->input("role"));
        $user->setPassword(Hash::make($request->input("password")));
        $user->save();
        return back();
    }
    public function delete($id)
    {
        User::destroy($id);
        return back();
    }
}
