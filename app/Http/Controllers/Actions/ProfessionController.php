<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Industry;
use App\Models\Profession;

use Illuminate\Support\Facades\Validator;

class ProfessionController extends Controller
{
    public function index(){
        return response()->json([
            'status' => 'success',
            'professions' => Profession::all()
        ]);
    }

    public function indexByIndustryId(Request $request){
        return response()->json([
            'status' => 'success',
            'professions' => Profession::where('industry_id', $request->industry_id)->get()
        ]);
    }


    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:industries',
            'industry_id' => 'required'
        ]);
        
        if($validation->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validation->errors()
            ]);
        }

        $profession = new Profession;
        $profession->industry_id = $request->industry_id;
        $profession->name = $request->name;
        $profession->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Profession created successfully!'
        ]);
    }

    public function delete(Request $request){
        Profession::destroy($request->id);

        return response()->json([
            'status' => 'success',
            'message' => 'Deleted successfully!'
        ]);
    }
}
