<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;

class CategoryController extends Controller
{
    public function save(Request $request){
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);


        if($validation->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validation->errors()
            ]);
        }

        do{
            $slug = uniqid();
        }while(Category::where('slug', $slug)->count());

        $category = new Category;
        $category->name = $request->name;
        $category->slug = $slug;
        $category->business_id = Auth::user()->business->id;
        $category->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Category created successfully!'
        ]);
    }

    function index(){
        return response()->json([
            'status' => 'success',
            'categories' => Auth::user()->business->categories()->with('services')->get()
        ]);
    }

    function update(Request $request){
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);


        if($validation->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validation->errors()
            ]);
        }

        $category = Category::where('slug', $request->slug)->first();
        $category->name = $request->name;
        $category->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Category updated successfully!'
        ]);
    }

    public function delete(Request $request){
        $category = Category::where('slug', $request->slug)->first();
        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully.'
        ]);
    }
}
