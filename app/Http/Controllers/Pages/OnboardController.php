<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OnboardController extends Controller
{
    public function business(Request $request)
    {
        //dd($request->all());
    	$response = [
    		'msg' => 'ok',
    		'business' => $request->show_number_address,
            'user_id' => $request->user_id
    	];
    	return response()->json($response);
    }
    public function services(Request $request)
    {
    	$response = [
    		'msg2' => 'ok2',
    		'business3' => $request->business3
    	];
    	return response()->json($response);
    }
    public function onboarding()
    {
         return view('user.onboard.onboard_form');
    }
}
