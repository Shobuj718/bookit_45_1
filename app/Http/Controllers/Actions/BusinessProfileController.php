<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessProfile;
use App\Models\BusinessNeed;

class BusinessProfileController extends Controller
{
    public function business(Request $request)
    {
		
		$business = new BusinessProfile;

    	$slug    = md5(uniqid(time()));

		$business->slug    = md5(uniqid(time()));
    	$business->user_id = $request->user_id;
    	$business->industry_id = $request->industry_id;
    	$business->profession_id = $request->profession_id;
    	$business->country_with_code = $request->country_with_code;
    	$business->phone_number = $request->phone_number;
    	$business->persons = $request->persons;
    	$business->web_url = $request->web_url;
    	$business->address = $request->address;
    	if($request->present_number_address){
    		$business->present_number_address = $request->present_number_address;
    	}else{
    		$business->present_number_address = 0;
    	}
    	
    	$business->status = 1;
    	$business->save();
    	
    	$response = [
    		'success' => 'ok',
    		'message' => "Business profile created",
            'slug' => $slug,
            'profession_id' => $request->all()
    	];
    	return response()->json($response);
    }

      public function services(Request $request)
    {
		
		$services = new BusinessNeed;

		//$user_id = Auth::user()->id;

    	$slug    = md5(uniqid(time()));

		$services->slug    = md5(uniqid(time()));
    	$services->user_id = $request->user_id;
    	$services->manage_client_records = $request->manage_client_records;
    	$services->send_email_sms_promotions = $request->send_email_sms_promotions;
    	$services->send_email_sms_reminders = $request->send_email_sms_reminders;
    	$services->add_online_scheduling = $request->add_online_scheduling;
    	$services->invoices_estimates = $request->invoices_estimates;
    	$services->accept_payments = $request->accept_payments;
    	$services->status = 1;
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
