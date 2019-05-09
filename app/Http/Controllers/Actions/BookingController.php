<?php

namespace App\Http\Controllers\Actions;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Category;
use App\Models\ContactInfo;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Mail;
use App\Notifications\ClientBookingInfo;


class BookingController extends Controller {
    
    public function getInbox() {
        $bookings = Booking::all();
        
        return response()->json([
            'appointments' => $bookings
        ]);
    }
    
    public function save(Request $request) {
        
        $slug = '';
        do{
            $slug = uniqid().uniqid().uniqid().uniqid().uniqid();
        } while(Booking::where('slug', $slug)->count());
        
        $service_slug = $request->service_slug;
        $staff_slug = $request->staff_slug;
        $service = Service::where('slug', $service_slug)->first();
        $staff = User::where('slug', $staff_slug)->first();
        $category = Category::find($service->category_id);
        $contactInfo = ContactInfo::where('user_id', $staff->id)->first();
        $requested_moments = serialize($request->except('key', 'subject', 'message', 'first_name', 'last_name', 'email', 'service_slug', 'staff_slug'));
        
        
        $booking = new Booking;
        
        
        $booking->category_id = $service->category_id;
        $booking->service_id = $service->id;
        $booking->staff_id = $staff->id;
        $booking->service_name = $service->name;
        $booking->staff_name = $staff->display_name;
        $booking->first_name = $request->first_name;
        $booking->last_name = $request->last_name;
        $booking->email = $request->email;
        $booking->subject = $request->subject;
        $booking->message = $request->message;
        $booking->requested_date = $requested_moments;
        
        $booking->slug = $slug;
        
        
        $booking->save();
        $booking['requested_date'] = unserialize($requested_moments);
        $booking['staff_phone'] = $staff->phone;
        
        $data = [
            'booking' => $booking,
            'staff' => $staff,
            'service' => $service,
            'category' => $category,
            'contactInfo' => $contactInfo,
            'dateAndTimes' => $request->except('key', 'subject', 'message', 'first_name', 'last_name', 'email', 'service_slug', 'staff_slug')
        ];
        
        // $inspect = $request->except('key', 'subject', 'message', 'first_name', 'last_name', 'email', 'service_slug', 'staff_slug');
        // dd($inspect[0]);

       /* Mail::send('emails.client.proposal', $data , function($message) use ($data) {
            $message->to('cybertronix.4406@gmail.com')
                    ->subject($data['booking']['subject']);
        });*/

      /*  Mail::send('emails.client.proposal', $data , function($message) use ($data) {
            $message->to('shobujsa1993@gmail.com')
                    ->subject($data['booking']['subject']);
        });*/

        //$data->notify(new ClientBookingInfo($booking));
        
        return response()->json([
            'status' => 'success',
            'booking' => $booking
        ]);
        
    }
}