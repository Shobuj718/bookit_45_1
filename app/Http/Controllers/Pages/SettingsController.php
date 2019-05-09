<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function getBusinessInfo(){
        $user = Auth::user();
        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }



        return view($user_type.'.settings.business_info');
    }

    public function getAutoClientMessages(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.auto_client_messages');
    }

    public function getAvailabilityAndCalendar(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.availability_and_calendar');
    }

    public function getClientCard(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.client_card');
    }

    public function getConversionTracking(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.conversion_tracking');
    }

    public function getCoupons(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.coupons');
    }

    public function getEmailTemplates(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.email_templates');
    }

    public function getInboxAndLeads(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.inbox_and_leads');
    }

    public function getIntegrations(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.integrations');
    }

    public function getMyAccount(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.my_account');
    }

    public function getMyServices(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.services.index');
    }

    public function getOnlineBookingOptions(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.online_booking_options');
    }

    public function getPayments(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.payments');
    }

    public function getStaff(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.staff.staff');
    }

    public function getCalendarSettings(){
        $user = Auth::user();

        
        if($user->hasRole('admin')){
            $user_type = "admin";
        }

        if($user->hasRole('business-admin') || $user->hasRole('staff')){
            $user_type = "user";
        }


        return view($user_type.'.settings.calendar');
    }
}
