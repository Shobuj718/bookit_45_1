<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Businessneeds extends Model
{
    use SoftDeletes;

    protected $fillable = [
          'user_id',
          'manage_client_records',
          'send_email_sms_promotions',
          'send_email_sms_remiders',
          'add_online_scheduling',
          'invoices_estimates',
          'accept_payments',
    ];
}
