<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface{
    
    public function suspend($id){
        return User::where('id', $id)->update(['suspended' => true]);
    }

    public function activate($id){
        return User::where('id', $id)->update(['suspended' => false]);
    }

    public function withRoles($roles){
        return User::role($roles)->get();
    }

    // public function create($data){
    //     return User::create($data);
    // }
}