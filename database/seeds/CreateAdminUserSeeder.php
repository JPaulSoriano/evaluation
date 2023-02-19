<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'lastname' => 'Admin',
            'firstname' => 'User',
            'mi' => 'A',
            'idno' => '0',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('password')
        ]);

        $user->assignRole('Admin');
    }
}
