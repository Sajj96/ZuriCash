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
        $super_admin->name         = 'Super';
        $super_admin->lastname     = 'Admin';
        $super_admin->location     = 'Dar';
        $super_admin->idtype       = 'National ID';
        $super_admin->idlink       = 'https://';
        $super_admin->country      = 'tz';
        $super_admin->city         = 'Dar';
        $super_admin->phonenumber  = '255717000000';
        $super_admin->password     = Hash::make('Admin123');
        $super_admin->status       = User::USER_ACTIVE;
        $super_admin->user_type    = User::ADMIN_USER_TYPE;
        $super_admin->save();
    }
}
