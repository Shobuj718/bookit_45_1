<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaypalSubscription extends Model
{
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}