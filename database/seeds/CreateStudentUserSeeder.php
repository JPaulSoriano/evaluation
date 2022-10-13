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
            'name' => 'Juan Dela Cruz',
        	'email' => 'juan@gmail.com',
        	'password' => bcrypt('password')
        ]);

        $user->assignRole('Student');
    }
}
