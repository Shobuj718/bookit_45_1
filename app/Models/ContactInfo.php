<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function phoneNumber() {
        return $this->country->dialing_code.$this->phone;
    }
}
