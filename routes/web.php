<?php

use Illuminate\Http\Request;
use App\Models\PaypalSubscription;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->middleware(['website-widget'])->group(function(){

    Route::get('/get-widget', 'Pages\WebsiteWidgetController@show');
    Route::get('/get-calendar', 'Pages\WebsiteWidgetController@getCalendar');
    Route::get('/get-calendar-settings', 'Pages\WebsiteWidgetController@getCalendarSettings');
    Route::get('/categories', 'Actions\WebsiteWidgetController@getCategoriesWithServices');
    Route::get('/staffs', 'Actions\WebsiteWidgetController@getStaffsForBusiness');
    
    Route::post('/save-booking-info', 'Actions\BookingController@save');
});

Auth::routes(['verify' => true]);

Route::prefix('api')->group(function(){
    Route::get('/countries', function(){
        return response()->json([
            'countries' => \App\Models\Country::all()
        ]);
    });
});

Route::post('/paypal-subscription', function(Request $request){
    $file = fopen("test.txt","w");
    
    $text = '';

    foreach($request->all() as $key=>$value){
        $text .= "\n\n".$key.'=>'.$value;
    }
    
    fwrite($file,$text);
    fclose($file);
    
    http_response_code(200);
});

Route::post('/paypal-subscription/{slug}', 'Actions\PaypalInstantPaymentNotificationController@paypalSubscribeAndUnsubscribe');
// Route::post('/paypal-subscription/{slug}', function(Request $request, $slug){
//     $file = fopen("test.txt","w");
//     $date = date('m/d/Y h:i:s a', time());
//     $text = '';
//     $text .= $date;
//     $user = \App\Models\User::where('slug', $slug)->first();
//     $text .= $user->email;
    
//     foreach($request->all() as $key=>$value){
//         // $text .='user email = '.$user->email."\n\n".$key.'=>'.$value;
//         $text .= "\n\n".$key.'=>'.$value;
//     }
    
//     fwrite($file,$text);
//     fclose($file);
    
//     if($request->has('txn_id') && $request->has('transaction_subject') && $request->transaction_subject == "subscr_payment") {
        
//         $subscription = new PaypalSubscription;
        
//         $subscription->user_id = $user->id;
        
//         $subscription->transaction_subject = $request->transaction_subject;
//         $subscription->txn_type = $request->txn_type;
//         $subscription->subscr_id = $request->subscr_id;
//         $subscription->item_name = $request->item_name;
//         $subscription->txn_id = $request->txn_id;
        
//         $subscription->item_number = $request->item_number;
//         $subscription->payment_status = $request->payment_status;
//         $subscription->payment_fee = $request->payment_fee;
//         $subscription->mc_fee = $request->mc_fee;
//         $subscription->mc_gross = $request->mc_gross;
        
//         $subscription->btn_id = $request->btn_id;
//         $subscription->payment_date = $request->payment_date;
//         $subscription->mc_currency = $request->mc_currency;
//         $subscription->payer_id = $request->payer_id;
//         $subscription->first_name = $request->first_name;
        
//         $subscription->last_name = $request->last_name;
//         $subscription->payer_email = $request->payer_email;
//         $subscription->receiver_id = $request->receiver_id;
//         $subscription->receiver_email = $request->receiver_email;
//         $subscription->business = $request->business;
        
//         $subscription->contact_phone = $request->contact_phone;
//         $subscription->residence_country = $request->residence_country;
//         $subscription->payment_gross = $request->payment_gross;
//         $subscription->payment_type = $request->payment_type;
//         $subscription->protection_eligibility = $request->protection_eligibility;
        
//         $subscription->verify_sign = $request->verify_sign;
//         $subscription->payer_status = $request->payer_status;
//         $subscription->test_ipn = $request->test_ipn;
//         $subscription->charset = $request->charset;
//         $subscription->notify_version = $request->notify_version;
//         $subscription->ipn_track_id = $request->ipn_track_id;
        
//         $subscription->save();   
//     }
    
//     http_response_code(200);
// });

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', 'Pages\DashboardController@getDashboard');
    Route::get('/inbox', 'Pages\DashboardController@getInbox');
    Route::get('/bookings', 'Actions\BookingController@getInbox');
    Route::get('/single-inbox/{slug}', function() {
        return view('user.singleinbox');
    });
    Route::get('/conversation', 'Pages\DashboardController@getConversation');
    Route::get('/calendar', 'Pages\DashboardController@getCalendar');
    Route::get('/clients', 'Pages\DashboardController@getClients');
    Route::get('/payments', 'Pages\DashboardController@getPayments');
    Route::get('/documents', 'Pages\DashboardController@getDocuments');
    Route::get('/client-portal', 'Pages\DashboardController@getClientPortal');
    Route::get('/widget', 'Pages\DashboardController@getWebsiteWidget');
    Route::get('/settings', 'Pages\DashboardController@getSettings');

    Route::get('/settings/business-info', 'Pages\SettingsController@getBusinessInfo');
    Route::get('/settings/auto-client-messages', 'Pages\SettingsController@getAutoClientMessages');
    Route::get('/settings/availability-and-calendar', 'Pages\SettingsController@getAvailabilityAndCalendar');
    Route::get('/settings/client-card', 'Pages\SettingsController@getClientCard');
    Route::get('/settings/conversion-tracking', 'Pages\SettingsController@getConversionTracking');
    Route::get('/settings/coupons', 'Pages\SettingsController@getCoupons');
    Route::get('/settings/email-templates', 'Pages\SettingsController@getEmailTemplates');
    Route::get('/settings/inbox-and-leads', 'Pages\SettingsController@getInboxAndLeads');
    Route::get('/settings/integrations', 'Pages\SettingsController@getIntegrations');
    Route::get('/settings/my-account', 'Pages\SettingsController@getMyAccount');
    Route::get('/settings/my-services', 'Pages\SettingsController@getMyServices');
    Route::get('/settings/online-booking-options', 'Pages\SettingsController@getOnlineBookingOptions');
    Route::get('/settings/payments', 'Pages\SettingsController@getPayments');
    Route::get('/settings/staff', 'Pages\SettingsController@getStaff');
    Route::get('/settings/calendar', 'Pages\SettingsController@getCalendarSettings');

});

Route::middleware(['role:admin'])->group(function(){
    Route::get('users', 'Pages\DashboardController@getUsers');
    Route::get('industry', 'Pages\IndustryController@getIndustryPage');
    Route::get('profession', 'Pages\ProfessionController@getProfessionPage');

    Route::prefix('api')->group(function(){
        Route::get('users', 'Actions\UserController@getBusinessAdmins');
        
        /**
         * Industry routes
         */
        Route::post('/industry/store', 'Actions\IndustryController@store');
        Route::post('/industry/delete', 'Actions\IndustryController@delete');

        /**
         * Profession routes
         */
        Route::get('/profession/index', 'Actions\ProfessionController@index');
        Route::post('/profession/store', 'Actions\ProfessionController@store');
        Route::post('/profession/delete', 'Actions\ProfessionController@delete');
    });
});

Route::middleware(['role:admin|business-admin'])->prefix('api')->group(function () {
    Route::get('user', 'Actions\UserController@getAuthenticatedUser');

    Route::get('/industry/index', 'Actions\IndustryController@index');
    Route::post('/profession/index', 'Actions\ProfessionController@indexByIndustryId');
});

Route::middleware(['role:business-admin'])->group(function () {
    Route::get('/settings/staff/add', 'Pages\StaffController@getAddStaffPage');
    Route::post('/settings/staff/add', 'Actions\StaffController@add');
    
    // With this route user can get bussiness info :
    Route::get('/get-secret-key', function() {
        $user = Auth::user();
        return response()->json([
            'secret_key' => $user->business->secret_key
        ]);
    });

    Route::prefix('api')->group(function(){
        Route::get('business-description', 'Actions\BusinessDescriptionController@getBusinessDescription');
        Route::post('business-description', 'Actions\BusinessDescriptionController@save');

        Route::get('contact-info', 'Actions\ContactInfoController@getContactInfo');
        Route::get('/contact-info/business-details', 'Actions\ContactInfoController@getBusinessInfo');
        Route::post('contact-info', 'Actions\ContactInfoController@save');

        Route::post('save-user', 'Actions\UserController@save');

        Route::post('category/save', 'Actions\CategoryController@save');
        Route::get('category/index', 'Actions\CategoryController@index');
        Route::post('category/update', 'Actions\CategoryController@update');
        Route::post('category/delete', 'Actions\CategoryController@delete');

        Route::post('/service/save', 'Actions\ServiceController@save');
        Route::post('/service/update', 'Actions\ServiceController@update');
        Route::post('/service/delete', 'Actions\ServiceController@delete');

        Route::post('/calendar-settings/save', 'Actions\CalendarSettingsController@save');
        Route::get('/calendar-settings/index', 'Actions\CalendarSettingsController@index');

        Route::get('/staff/index', 'Actions\StaffController@index');
        Route::post('/staff/delete', 'Actions\StaffController@delete');
        Route::get('/website-widget/get-properties', 'Actions\WebsiteWidgetController@getProperties');
        Route::post('/website-widget/save', 'Actions\WebsiteWidgetController@save');
        
    });
});


// Route::prefix('api')->middleware(['pre-flight', 'website-widget'])->group(function(){

//     Route::get('/get-widget', 'Pages\WebsiteWidgetController@show');
//     Route::get('/get-calendar', 'Pages\WebsiteWidgetController@getCalendar');
//     Route::get('categories', 'Actions\WebsiteWidgetController@getCategoriesWithServices');
//     Route::get('staffs', 'Actions\WebsiteWidgetController@getStaffsForBusiness');
// });

/*Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard/onboarding', 'Pages\OnboardController@onboarding');
    Route::post('/business', 'Pages\OnboardController@business');
    Route::post('/services', 'Pages\OnboardController@services');
});*/

/*Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard/onboarding', 'Pages\OnboardController@onboarding');
    Route::post('/business', 'Pages\BusinessprofileController@business');
    Route::post('/services', 'Pages\BusinessneedsController@services');
});*/

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard/onboarding', 'Pages\DashboardController@getDashboard2');
    Route::post('/business', 'Actions\BusinessProfileController@business');
    Route::post('/services', 'Actions\BusinessProfileController@services');
});


/*Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard/onboarding', 'Pages\OnboardController@onboarding');
    Route::post('/business', 'Actions\OnboardController@business');
    Route::post('/services', 'Actions\BusinessProfileController@services');
});*/