<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\ContactInfo;

class ContactInfoController extends Controller
{
    public function save(Request $request){
        $validation = Validator::make($request->all(), [
            'country_id' => 'required',
            'phone' => 'required',
            'address' => 'required|string',
            'website_url' => 'required|string'
        ]);

        if($validation->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validation->errors()
            ]);
        }

        $user = Auth::user();

        $contactInfo = $user->contact_info;

        if(!$contactInfo){
            $contactInfo = new ContactInfo;
            $contactInfo->user_id = $user->id;
        }

        $contactInfo->country_id = $request->country_id;
        $contactInfo->phone = $request->phone;
        $contactInfo->address = $request->address;
        $contactInfo->website_url = $request->website_url;
        $contactInfo->display_phone = $request->display_phone;
        $contactInfo->display_address = $request->display_address;
        $contactInfo->display_website_url = $request->display_website_url;
        $contactInfo->save();

        return response()->json([
            'status' => 'success',
            'contactInfo' => $contactInfo->with('country')->first()
        ]);
    }

    public function getBusinessInfo() {

        $user = Auth::user();
        $contactInfo = ContactInfo::where('user_id', $user->id)->first();
        $businessPhoneNumber = $contactInfo->phoneNumber();
        $businessAddress = $contactInfo->address;
        
        return response()->json([
            'status' => 'success',
            'businessPhoneNumber' => $businessPhoneNumber,
            'businessAddress' => $businessAddress
        ]);
        
    }
}
