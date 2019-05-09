<?php

namespace App\Http\Controllers\Actions;

use App\Models\Business;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class BusinessDescriptionController extends Controller
{
    public function getBusinessDescription(){
        return response()->json([
            'status' => 'success',
            'businessDescription' => Auth::user()->businessDescription
        ]);
    }

    public function save(Request $request){
        $user = Auth::user();

        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'short_description' => 'required|string',
            'industry_id' => 'required',
            'profession_id' => 'required'
        ]);

        if($validation->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validation->errors()
            ]);
        }

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $path = 'images/avatars/';
            $filename = $user->slug.uniqid().time().'.'.($file->getClientOriginalExtension());
            $uploadPath = $file->move($path, $filename);
            $user->avatar = '/'.$uploadPath;
            $user->save();
        }
        
        $businessDescription = $user->business;

        if(!$businessDescription){
            $businessDescription = new Business;
            $businessDescription->user_id = $user->id;
        }

        $businessDescription->name = $request->name;
        $businessDescription->short_description = $request->short_description;
        $businessDescription->industry_id = $request->industry_id;
        $businessDescription->profession_id = $request->profession_id;
        
        $secret_key = '';
        do{
            $secret_key = uniqid().uniqid();
        } while(Business::where('secret_key', $secret_key)->count());
        
        $businessDescription->secret_key = $secret_key;
        
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $path = 'images/logos/';
            $filename = $user->slug.uniqid().time().'.'.($file->getClientOriginalExtension());
            $uploadPath = $file->move($path, $filename);
            $businessDescription->logo = '/'.$uploadPath;
        }
        
        $businessDescription->save();

        $user->business_id = $businessDescription->id;
        $user->color = '#07EAD4';
        $user->save();

        $user->assignRole('staff');

        return response()->json([
            'status' => 'success',
            'businessDescription' => $businessDescription
        ]);
    }
}
