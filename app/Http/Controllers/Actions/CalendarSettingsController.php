<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\CalendarSettings;

class CalendarSettingsController extends Controller {

    public function index() {
        $calendarSettings = CalendarSettings::where('business_id', Auth::user()->business_id)->first();
        return response()->json([
            'status' => 'success',
            'calendarSettings' => $calendarSettings
        ]);
    }

    public function save(Request $request) {

        $validation = Validator::make($request->all(), [
            'business_hour_end' => 'required',
            'business_hour_start' => 'required',
            'increment_hour' => 'required',
            'increment_minute' => 'required',
            'local_time' => 'required',
            'timezone' => 'required',
            'week_start' => 'required',
            'weekly_off' => 'required'
        ]);


        if($validation->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validation->errors()
            ]);
        }
        

        
        if(CalendarSettings::where('business_id', Auth::user()->business_id)->count()) {
            $calendarSettings = CalendarSettings::where('business_id', Auth::user()->business_id)->first();
        } else {
            $calendarSettings = new CalendarSettings;
        }

        $calendarSettings->business_id = Auth::user()->business_id;
        $calendarSettings->week_start = $request->week_start;
        $calendarSettings->increment_hour = $request->increment_hour;
        $calendarSettings->increment_minute = $request->increment_minute;
        $calendarSettings->weekly_off = $request->weekly_off;
        $calendarSettings->timezone = $request->timezone;
        $calendarSettings->business_hour_start = $request->business_hour_start;
        $calendarSettings->business_hour_end = $request->business_hour_end;
        $calendarSettings->local_time = $request->local_time;

        $calendarSettings->save();

        return response()->json([
            'status' => 'success',
            'data' => $request->all()
        ]);
    }
}