<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateStudentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'lastname' => 'Student',
            'firstname' => 'User',
            'mi' => 'S',
            'lrn' => '000',
            'idno' => '2',
        	'email' => 'student@gmail.com',
        	'password' => bcrypt('password')
        ]);

        $user->assignRole('Student');
    }
}
