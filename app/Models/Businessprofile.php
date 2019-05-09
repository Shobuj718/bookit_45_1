<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Businessprofile extends Model
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
          'present_number_address'
    ];
    //protected $table = 'businessprofiles';
}
