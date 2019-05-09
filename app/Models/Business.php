<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function industry(){
        return $this->belongsTo(Industry::class);
    }

    public function profession(){
        return $this->belongsTo(Profession::class);
    }

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function staffs(){
        return $this->hasMany(User::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }
}
