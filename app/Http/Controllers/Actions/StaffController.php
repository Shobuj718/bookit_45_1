<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Repositories\User\UserRepository;

use App\Models\User;

class StaffController extends Controller
{
    public function __construct(UserRepository $user){
        $this->user = $user;
    }

    public function add(Request $request){
        $data = $request->all();
        $validation = Validator::make($data, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'display_name'=> 'required|string',
            'professional_title'=> 'required|string',
            'email'=> 'required|email',
            'password'=> 'required|confirmed'
        ]);

        if($validation->fails()){
            return response()->json($validation->errors());
        }

        $staff = new User;
        $staff->firstname = $request->firstname;
        $staff->lastname = $request->lastname;
        $staff->display_name = $request->display_name;
        $staff->professional_title = $request->professional_title;
        $staff->email = $request->email;
        $staff->color = $request->color;
        $staff->business_id = Auth::user()->business->id;
        $staff->password = \Hash::make($request->password);

        do{
            $slug = uniqid();
        }while(User::where('slug', $slug)->count());

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $path = 'images/avatars/';
            $filename = $slug.uniqid().time().'.'.($file->getClientOriginalExtension());
            $uploadPath = $file->move($path, $filename);
            $staff->avatar = '/'.$uploadPath;
        }

        $staff->slug = $slug;
        $staff->save();

        $staff->assignRole('staff');

        return response()->json([
            'status' => 'success',
            'redirect_url' => url('/settings/staff')
        ]);
    }

    public function index(){
        return response()->json([
            'status' => 'success',
            'staffs' => Auth::user()->business->staffs
        ]);
    }
}