<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'admin',
            'email'=>'myshic8@gmail.com',
            'password'=>Hash::make('123456789'),
        ]);
        Role::create([
            'name'=>'admin'
        ]);
        Role::create([
            'name'=>'writer'
        ]);
        Role::create([
            'name'=>'user'
        ]);
        $user->assignRole('admin');
    }
}
