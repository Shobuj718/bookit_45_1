<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'business-admin']);
        $role = Role::create(['name' => 'staff']);
        $role = Role::create(['name' => 'client']);

        \App\Models\User::find(1)->assignRole('admin');
        \App\Models\User::find(2)->assignRole('business-admin');
    }
}
