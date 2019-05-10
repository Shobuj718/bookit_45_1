<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\Models\BusinessNeed;

class BusinessNeedController extends Controller
{
     public function services(Request $request)
    {
		
		$services = new BusinessNeed;

    	$slug    = md5(uniqid(time()));

		$services->slug    = md5(uniqid(time()));
    	$services->user_id = $request->user_id;
    	$services->status = '1';
    	$services->save();
    	
    	$response = [
    		'success' => 'ok2',
    		'message' => "Services profile created",
            'slug' => $slug,
            'business_need' => $request->all()
    	];
    	return response()->json($response);
    }
}
