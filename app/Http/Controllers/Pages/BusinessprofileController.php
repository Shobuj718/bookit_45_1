<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Businessprofile;

class BusinessprofileController extends Controller
{
    public function business(Request $request)
    {
        //dd($request->all());
    	//Businessprofile::create($request->all());
    	
    	$data = new Businessprofile;

		$slug    = md5(uniqid(time()));
		/*$data->slug    = md5(uniqid(time()));
    	$data->user_id = $request->user_id;
    	$data->industry_id = $request->industry_id;
    	$data->profession_id = $request->profession_id;
    	$data->country_with_code = $request->country_with_code;
    	$data->phone_number = $request->phone_number;
    	$data->persons = $request->persons;
    	$data->web_url = $request->web_url;
    	$data->address = $request->address;
    	$data->present_number_address = $request->present_number_address;
    	$data->status = '1';
    	$data->save();*/

    	$response = [
    		'success' => 'ok',
    		'message' => "Business profile created",
            'slug' => $slug,
            'profession_id' => $request->all()
    	];
    	return response()->json($response);
    }
}
