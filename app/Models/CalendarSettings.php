<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarSettings extends Model
{
    public function setWeeklyOffAttribute($value)
    {
        $this->attributes['weekly_off'] = serialize($value);
    }

    public function getWeeklyOffAttribute($value)
    {
        return unserialize($value);
    }
}
