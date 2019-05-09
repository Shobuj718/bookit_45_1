<?php

namespace App\Http\Controllers\Actions;

// use App\Models\Business;
use App\Models\WebsiteWidget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\Business;

class WebsiteWidgetController extends Controller {
    
    public function save(Request $request) {

        if(WebsiteWidget::where('user_id', Auth::user()->id)->count()) {
            $websiteWidget = WebsiteWidget::where('user_id', Auth::user()->id)->first();    
        } else {
            $websiteWidget = new WebsiteWidget;
            $websiteWidget->user_id = Auth::user()->id;
        }

        
        $websiteWidget->action_type = $request->action_type;
        $websiteWidget->schedule = $request->schedule;
        $websiteWidget->details = $request->details;
        $websiteWidget->content = $request->content;
        $websiteWidget->youtube = $request->youtube;
        $websiteWidget->call_us = $request->call_us;
        $websiteWidget->make_payment = $request->make_payment;
        $websiteWidget->map = $request->map;

        $websiteWidget->invitation_label = $request->invitation_label;
        $websiteWidget->invitation_title = $request->invitation_title;
        $websiteWidget->invitation_text = $request->invitation_text;

        if($request->desktop_view == "true") {
            $websiteWidget->desktop_view = 1;    
        } else {
            $websiteWidget->desktop_view = 0;
        }
        
        if($request->auto_desktop_view == "true") {
            $websiteWidget->auto_desktop_view = 1;
        } else {
            $websiteWidget->auto_desktop_view = 0;    
        }
        
        $websiteWidget->auto_desktop_view_after = $request->auto_desktop_view_after;
        
        if($request->mobile_view == "true") {
            $websiteWidget->mobile_view = 1;    
        } else {
            $websiteWidget->mobile_view = 0;
        }
        
        if($request->auto_mobile_view == "true") {
            $websiteWidget->auto_mobile_view = 1;
        } else {
            $websiteWidget->auto_mobile_view = 0;
        }
        
        $websiteWidget->auto_mobile_view_after = $request->auto_mobile_view_after;

        $websiteWidget->save();

        return response()->json([
            'status' => 'success',
            'websiteWidget' => $websiteWidget
        ]);
    }

    public function getProperties() {
        $websiteWidget = WebsiteWidget::where('user_id', Auth::user()->id)->first();
        return response()->json([
            'status' => 'success',
            'websiteWidget' => $websiteWidget
        ]);
    }

    function getServicesForBusiness(Request $request){
        $business = Business::where('secret_key', $request->key)->with('services')->first();

        return response()->json([
            'status' => 'success',
            'services' => $business->services
        ]);
    }

    function getCategoriesWithServices(Request $request){
        return response()->json([
            'status' => 'success',
            'categories' => Business::where('secret_key', $request->key)->with('categories.services')->first()->categories
        ]);
    }

    function getStaffsForBusiness(Request $request){
        return response()->json([
            'status' => 'success',
            'staffs' => Business::where('secret_key', $request->key)->with('staffs')->first()->staffs
        ]);
    }
}
