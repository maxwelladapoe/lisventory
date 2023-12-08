<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //

    public function index()
    {

        $categories = Category::where('team_id', $this->userTeamId)->latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'Categories fetched',
            'categories' =>  $categories
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
        ]);
        $category = new Category();
        $category->name = ucfirst($request->name);
        $category->user_id = $this->userId;
        $category->team_id = $this->userTeamId;
        if ($category->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Category created',
                'category' =>  $category
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'id' => ['required', 'alpha_num'],

        ]);

        $category = Category::find($id);
        $itemName = $category->getOriginal("name");
        $category->name = ucfirst($request->name);

        if ($category->save()) {
            return response()->json([
                'success' => true,
                'message' => "$itemName been updated successfully",
                'category' => $category
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category->user_id == Auth::user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'You do not have a category with this ID'
            ], 400);
        }
        if ($category->delete()) {
            return response()->json([
                'success' => true,
                'message' => "$category->name has been deleted successfully",
                'category' => $category
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }
}
