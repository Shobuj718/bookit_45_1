<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    private $user;
    
    public function __construct(UserRepository $user){
        $this->user = $user;
    }


    public function suspend($id){
        $this->user->suspend('id', $id);
    }


    public function activate($id){
        $this->user->activate('id', $id);
    }

    public function updateAvatar(Request $request){
        $path = $request->file('avatar')->store('avatars');

        return $path;
    }

    public function getBusinessAdmins(){
        return response()->json([
            'users' => $this->user->withRoles(['admin'])
        ]);
    }

    public function getAuthenticatedUser(Request $request){
        
        $relations = array_filter(explode(',', $request->relations));
        
        if($relations){
            return User::where('id', Auth::user()->id)->with($relations)->first();
        }

        return \Auth::user();
    }

    public function save(Request $request){
        $validation = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'display_name' => 'required',
            'country_id' => 'required',
            'phone' => 'required',
            'professional_title' => 'required|string'
        ]);

        if($validation->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validation->errors()
            ]);
        }
        
        // return response()->json($request->all());

        // $updatedUser = \DB::table('users')->where('id', Auth::user()->id)->update($request->all());
        // $updatedUser->save();

        $user = Auth::user();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->display_name = $request->display_name;
        $user->phone = $request->phone;
        $user->country_id = $request->country_id;
        $user->professional_title = $request->professional_title;
        $user->save();

        return response()->json([
            'status' => 'success',
            'user' => $user->with('country')->first()
        ]);
    }
}
