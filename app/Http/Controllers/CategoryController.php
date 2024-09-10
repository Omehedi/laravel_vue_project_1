<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index()
    {
        $data = Category::all();
        return response()->json(['result' => $data, 'status' => 2000], 200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['result' => $validator->errors(), 'status' => 3000], 422);
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return response()->json(['result' => $category, 'status' => 2000], 200);
    }


    public function show($id)
    {

    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['result' => $validator->errors(), 'status' => 3000], 422);
        }

        $category->name = $request->input('name');
        $category->save();

        return response()->json(['result' => $category, 'status' => 2000], 200);
    }


    public function destroy($id)
    {
        try {
            $category = Category::find($id);

            if ($category) {
                $category->delete();
                return response()->json(['status' => 2000], 200);
            }

            return response()->json(['status' => 3000, 'message' => 'Category not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000], 500);
        }
    }
}
