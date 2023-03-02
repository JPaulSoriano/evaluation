<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateFacultyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'lastname' => 'Faculty',
            'firstname' => 'User',
            'mi' => 'F',
            'idno' => '123456',
        	'email' => 'faculty@gmail.com',
        	'password' => bcrypt('password')
        ]);

        $user->assignRole('Faculty');
    }
}
