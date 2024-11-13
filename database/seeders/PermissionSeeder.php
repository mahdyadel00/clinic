<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'users', 'create_user', 'edit_user', 'show_user', 'delete_user',
            'permissions', 'create_permission', 'edit_permission', 'show_permission', 'delete_permission',
            'roles', 'create_role', 'edit_role', 'show_role', 'delete_role',
            'doctors', 'create_doctor', 'edit_doctor', 'delete_doctor',
            'patients', 'create_patient', 'edit_patient', 'show_patient', 'delete_patient',
            'doctor_schedule_shifts', 'create_doctor_schedule_shift', 'edit_doctor_schedule_shift', 'show_doctor_schedule_shift', 'delete_doctor_schedule_shift',
            'user_schedules', 'create_user_schedule', 'edit_user_schedule', 'show_user_schedule', 'delete_user_schedule',
            'rooms', 'create_room', 'edit_room', 'show_room', 'delete_room',
            'waiting_reservations', 'create_waiting_reservation', 'edit_waiting_reservation', 'show_waiting_reservation', 'delete_waiting_reservation',
            'complaints', 'create_complaint', 'edit_complaint', 'show_complaint', 'delete_complaint',
            'price_lists', 'create_price_list', 'edit_price_list', 'show_price_list', 'delete_price_list',
            'majors', 'create_major', 'edit_major', 'show_major', 'delete_major',
            'bookings', 'create_booking', 'edit_booking', 'show_booking', 'delete_booking',
            'contacts', 'create_contact', 'edit_contact', 'show_contact', 'delete_contact',
            'settings', 'create_setting', 'edit_setting', 'show_setting', 'delete_setting',
        ];


        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
