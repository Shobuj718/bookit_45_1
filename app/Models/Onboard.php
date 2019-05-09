<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Onboard extends Model
{
	use SoftDeletes;

    protected $fillable = [
          'user_id',
          'industry_id',
          'profession_id',
          'country_with_code',
          'phone_number',
          'persons',
          'web_url',
          'address',
          'present_number_address',
          'manage_client_records',
          'send_email_sms_promotions',
          'send_email_sms_remiders',
          'add_online_scheduling',
          'invoices_estimates',
          'accept_payments',
    ];
}
