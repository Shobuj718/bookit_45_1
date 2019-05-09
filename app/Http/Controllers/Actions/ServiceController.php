<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Service;

class ServiceController extends Controller
{
    public function save(Request $request){
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);


        if($validation->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validation->errors()
            ]);
        }

        do{
            $slug = uniqid();
        }while(Service::where('slug', $slug)->count());

        $service = new Service;
        $service->name = $request->name;
        $service->business_id = Auth::user()->business->id;
        $service->slug = $slug;
        $service->category_id = $request->category_id;
        $service->description = $request->description;
        $service->duration_hours = $request->duration_hours;
        $service->duration_minutes = $request->duration_minutes;
        $service->fee = $request->fee*100;
        $service->show_on_booking_form = $request->show_on_booking_form == 'true' ? 1 : 0;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = 'images/services/';
            $filename = $slug.uniqid().time().'.'.($file->getClientOriginalExtension());
            $uploadPath = $file->move($path, $filename);
            $service->image = '/'.$uploadPath;
        }

        $service->location = $request->location;
        $service->method = $request->method;
        $service->address = $request->address;
        $service->contact_number = $request->contact_number;
        $service->online_method = $request->online_method;

        $service->save();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Service created successfully!'
        ]);
    }

    public function update(Request $request) {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);


        if($validation->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validation->errors()
            ]);
        }

        $service = Service::where('slug', $request->slug)->first();

        $service->name = $request->name;
        $service->business_id = Auth::user()->business->id;
        $service->category_id = $request->category_id;
        $service->description = $request->description;
        $service->duration_hours = $request->duration_hours;
        $service->duration_minutes = $request->duration_minutes;
        $service->fee = $request->fee*100;
        $service->show_on_booking_form = $request->show_on_booking_form == 'true' ? 1 : 0;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = 'images/services/';
            $filename = $slug.uniqid().time().'.'.($file->getClientOriginalExtension());
            $uploadPath = $file->move($path, $filename);
            $service->image = '/'.$uploadPath;
        }

        $service->location = $request->location;
        $service->method = $request->method;
        $service->address = $request->address;
        $service->contact_number = $request->contact_number;
        $service->online_method = $request->online_method;

        $service->save();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Service updated successfully!'
        ]);
    }
 
    public function delete(Request $request){
        $service = Service::where('slug', $request->slug)->first();
        $service->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Service deleted successfully.'
        ]);
    }
}
