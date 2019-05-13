<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BusinessProfile;

class DashboardController extends Controller
{
    public function getDashboard(){
        $user = Auth::user();
        $login_id =  Auth::user()->id;


        $businessProfileId = BusinessProfile::where('user_id', $login_id)->first();
        //var_dump($businessProfileId);
        if($businessProfileId == NULL){
            $businessId = 0;
        }else{
            $businessId = $businessProfileId->status;
        }


        //$businessId = 1;
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }

        
        return view($user_type.'.dashboard', compact('user_type', 'businessId'));
        //return view($user_type.'.onboard.index');
    }
    public function getDashboard2(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }

        
        //return view($user_type.'.dashboard', compact('user_type'));
        return view($user_type.'.onboard.onboard_form', compact('user_type'));
        //return view($user_type.'.onboard.index');
    }

    public function getInbox(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.inbox');
    }

    public function getCalendar(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.calendar');
    }

    public function getClients(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.clients');
    }

    public function getPayments(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.payments');
    }

    public function getDocuments(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.documents');
    }

    public function getOnlinePresence(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.online_presence');
    }

    public function getSettings(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings');
    }

    public function getConversation(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.conversation');
    }

    public function getClientPortal(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.client_portal');
    }

    public function getWebsiteWidget(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.website_widget');
    }


    public function getUsers(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }

        return view($user_type.'.users');
    }
}
