<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\Models\Onboard;

class OnboardController extends Controller
{
    public function business(Request $request)
    {
		
		$business = new Onboard;

    	$slug    = md5(uniqid(time()));

		/*$business->slug    = md5(uniqid(time()));
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
        $business->manage_client_records = $request->manage_client_records;
        $business->send_email_sms_promotions = $request->send_email_sms_promotions;
        $business->send_email_sms_reminders = $request->send_email_sms_reminders;
        $business->add_online_scheduling = $request->add_online_scheduling;
        $business->invoices_estimates = $request->invoices_estimates;
        $business->accept_payments = $request->accept_payments;
    	
    	$business->status = 1;
    	$business->save();*/
    	
    	$response = [
    		'success' => 'ok',
    		'message' => "Business profile created",
            'slug' => $slug,
            'profession_id' => $request->all()
    	];
    	return response()->json($response);
    }
}
