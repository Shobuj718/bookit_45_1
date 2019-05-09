<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function getAddStaffPage(){
        return view('user.settings.staff.add');
    }
}