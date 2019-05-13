<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 
        'lastname', 
        'email', 
        'slug',
        'password', 
        'display_name', 
        'country_id', 
        'phone', 
        'professional_title', 
        'language', 
        'avatar', 
        'color'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function business(){
        return $this->hasOne(Business::class);
    }

    public function contact_info(){
        return $this->hasOne(ContactInfo::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
    
    public function subscriptions() {
        return $this->hasMany(PaypalSubscription::class);
    }
    
    public function unsubscriptions() {
        return $this->hasMany(PaypalUnsubscription::class);
    }
    
    public function hasCurrentSubscription() {
        $lastSubscriptionItemName = $this->subscriptions()->latest()->first()->item_name;
        $latestSubscriptionDate = $this->subscriptions()->where('item_name', $lastSubscriptionItemName)->latest()->first()->created_at;
        $latestUnsubscriptionDate = $this->unsubscriptions()->latest()->first()->created_at;
        return strtotime($latestSubscriptionDate) > strtotime($latestUnsubscriptionDate) ? true : false;
    }
    public function currentSubscription() {
        return $this->hasCurrentSubscription() ? $this->subscriptions()->latest()->first() : null;
    }
    
    public function currentPackageName() {
        return $this->hasCurrentSubscription() ? $this->subscriptions()->latest()->first()->item_name : null;
    }

    public function businessProfile()
    {
        return $this->hasOne(BusinessProfile::class);
    }

}
