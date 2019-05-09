<?php

namespace App\Http\Controllers\Actions;

use App\Models\PaypalSubscription;
use App\Models\PaypalUnsubscription;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaypalInstantPaymentNotificationController extends Controller {
    
    public function paypalSubscribeAndUnsubscribe (Request $request, $slug) {
        
        $user = User::where('slug', $slug)->first(); 
        
        if($request->has('txn_id') && $request->payment_status == "Completed" && ($request->txn_type == "subscr_payment" || $request->txn_type == "recurring_payment")) {
            
            $subscription = new PaypalSubscription;
            
            $subscription->user_id = $user->id;
            
            
            // Todo: Create Package controller and get package id from there
            // $subscription->package_id = $request->package_id;
            
            /*
                CHECK IF THE PAYMENT IS RECURRING PAYMENT: (if we don't get txn_type == recurring_payment)
                => Add new column | "type" | in | paypal_subscriptions | table
                Algorithm:
                
                    info: Recurring payment will be the considered on last subscription.
                
                    -> If user has [Current subscription] on the [same package ( item_name )] , 
                        then => type = reccurring payment
                    -> else 
                        then => type = subscription
                    
                Usefull Methods:
                    
                    $user->currentSubscription()
                    $user->currentPackageName()
            */
            
            // subscription_type:
            if($user->currentPackageName() == $request->item_name) {
                $subscription->type = "recurring_payment";    
            } else {
                $subscription->type = "subscription";
            }
            
            $subscription->transaction_subject = $request->transaction_subject;
            $subscription->txn_type = $request->txn_type;
            $subscription->subscr_id = $request->subscr_id;
            $subscription->item_name = $request->item_name;
            $subscription->txn_id = $request->txn_id;
            
            $subscription->item_number = $request->item_number;
            $subscription->payment_status = $request->payment_status;
            $subscription->payment_fee = $request->payment_fee;
            $subscription->mc_fee = $request->mc_fee;
            $subscription->mc_gross = $request->mc_gross;
            $subscription->btn_id = $request->btn_id;
            $subscription->payment_date = $request->payment_date;
            $subscription->mc_currency = $request->mc_currency;
            
            $subscription->payer_id = $request->payer_id;
            $subscription->first_name = $request->first_name;
            $subscription->last_name = $request->last_name;
            $subscription->payer_email = $request->payer_email;
            $subscription->receiver_id = $request->receiver_id;
            $subscription->receiver_email = $request->receiver_email;
            $subscription->business = $request->business;
            
            $subscription->contact_phone = $request->contact_phone;
            $subscription->residence_country = $request->residence_country;
            $subscription->payment_gross = $request->payment_gross;
            $subscription->payment_type = $request->payment_type;
            $subscription->protection_eligibility = $request->protection_eligibility;
            
            $subscription->verify_sign = $request->verify_sign;
            $subscription->payer_status = $request->payer_status;
            $subscription->test_ipn = $request->test_ipn;
            $subscription->charset = $request->charset;
            $subscription->notify_version = $request->notify_version;
            $subscription->ipn_track_id = $request->ipn_track_id;
            
            $subscription->save();   
        } 
        
        if($request->txn_type == "subscr_cancel") {
            
            $unsubscription = new PaypalUnsubscription;
            
            $unsubscription->user_id = $user->id;
            
            $unsubscription->transaction_subject = $request->transaction_subject;
            $unsubscription->txn_type = $request->txn_type;
            $unsubscription->subscr_id = $request->subscr_id;
            $unsubscription->item_name = $request->item_name;
            $unsubscription->txn_id = $request->txn_id;
            
            $unsubscription->item_number = $request->item_number;
            $unsubscription->payment_status = $request->payment_status;
            $unsubscription->payment_fee = $request->payment_fee;
            $unsubscription->mc_fee = $request->mc_fee;
            $unsubscription->mc_gross = $request->mc_gross;
            $unsubscription->btn_id = $request->btn_id;
            $unsubscription->payment_date = $request->payment_date;
            $unsubscription->mc_currency = $request->mc_currency;
            $unsubscription->recurring = $request->recurring;
            $unsubscription->reattempt = $request->reattempt;
            $unsubscription->mc_amount3 = $request->mc_amount3;
            $unsubscription->period3 = $request->period3;
            
            $unsubscription->payer_id = $request->payer_id;
            $unsubscription->first_name = $request->first_name;
            $unsubscription->last_name = $request->last_name;
            $unsubscription->payer_email = $request->payer_email;
            $unsubscription->receiver_id = $request->receiver_id;
            $unsubscription->receiver_email = $request->receiver_email;
            $unsubscription->business = $request->business;
            
            $unsubscription->contact_phone = $request->contact_phone;
            $unsubscription->residence_country = $request->residence_country;
            $unsubscription->payment_gross = $request->payment_gross;
            $unsubscription->payment_type = $request->payment_type;
            $unsubscription->protection_eligibility = $request->protection_eligibility;
            
            $unsubscription->verify_sign = $request->verify_sign;
            $unsubscription->payer_status = $request->payer_status;
            $unsubscription->test_ipn = $request->test_ipn;
            $unsubscription->charset = $request->charset;
            $unsubscription->notify_version = $request->notify_version;
            $unsubscription->ipn_track_id = $request->ipn_track_id;
            
            $unsubscription->save();   
        }
        
        http_response_code(200);
    }
}