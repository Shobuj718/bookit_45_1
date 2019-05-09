<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Industry;

use Illuminate\Support\Facades\Validator;

class IndustryController extends Controller
{
    public function index(){
        return response()->json([
            'status' => 'success',
            'industries' => Industry::all()
        ]);
    }


    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:industries'
        ]);
        
        if($validation->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validation->errors()
            ]);
        }

        $industry = new Industry;
        $industry->name = $request->name;
        $industry->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Industry created successfully!'
        ]);
    }

    public function delete(Request $request){
        Industry::destroy($request->id);

        return response()->json([
            'status' => 'success',
            'message' => 'Deleted successfully!'
        ]);
    }
}
