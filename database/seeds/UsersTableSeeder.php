<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->firstname = "Website";
        $user->lastname = "Admin";
        $user->email = "shobuj@gmail.com";
        $user->slug = uniqid();
        $user->password = Hash::make('123456');
        $user->email_verified_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $user->save();

        $user = new User;
        $user->firstname = "User";
        $user->lastname = "user";
        $user->email = "user@gmail.com";
        $user->slug = uniqid();
        $user->password = Hash::make('123456');
        $user->email_verified_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $user->save();
    }
}
