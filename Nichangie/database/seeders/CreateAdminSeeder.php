<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::firstOrNew(['email'=>'admin@example.com']);
        $super_admin->firstname = 'Super';
        $super_admin->lastname = 'Admin';
        $super_admin->nida = '00000000000';
        $super_admin->phone = '0717000000';
        $super_admin->address = 'Tabata';
        $super_admin->country = 'tz';
        $super_admin->town = 'Dar es salaam';
        $super_admin->password = Hash::make('Admin123');
        $super_admin->user_type = User::ADMIN_USER_TYPE;
        $super_admin->save();
    }
}
