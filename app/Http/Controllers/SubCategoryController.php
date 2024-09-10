<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{

    public function index()
    {
        // Fetch all subcategories along with their parent category
        $data = SubCategory::with('category')->get();
        return response()->json(['result' => $data, 'status' => 2000], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Validate the category_id
        ]);

        if ($validator->fails()) {
            return response()->json(['result' => $validator->errors(), 'status' => 3000], 422);
        }

        $subCategory = new SubCategory();
        $subCategory->name = $request->input('name');
        $subCategory->category_id = $request->input('category_id'); // Assign the category_id
        $subCategory->save();

        return response()->json(['result' => $subCategory, 'status' => 2000], 200);
    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::find($id);

        if (!$subCategory) {
            return response()->json(['error' => 'SubCategory not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['result' => $validator->errors(), 'status' => 3000], 422);
        }

        $subCategory->name = $request->input('name');
        $subCategory->category_id = $request->input('category_id');
        $subCategory->save();

        return response()->json(['result' => $subCategory, 'status' => 2000], 200);
    }

    public function destroy($id)
    {
        try {
            $subCategory = SubCategory::find($id);

            if ($subCategory) {
                $subCategory->delete();
                return response()->json(['status' => 2000], 200);
            }

            return response()->json(['status' => 3000, 'message' => 'SubCategory not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000], 500);
        }
    }

}
