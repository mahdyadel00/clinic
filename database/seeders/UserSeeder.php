<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create super admin
        $super_admin = User::create([

            'name'              => "Super Admin",
            'email'             => "admin@email.com",
            'password'          => Hash::make('password'),
            'email_verified_at' => now(),
            'phone'             => "0123456789",
            'roles_name'        => "owner",
            ]);

        $role = Role::create(['name' => 'super_admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
        $super_admin->assignRole([$role->id]);


    }
}
