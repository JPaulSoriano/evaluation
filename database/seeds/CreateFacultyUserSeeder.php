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
            'name' => 'John Doe',
        	'email' => 'doe@gmail.com',
        	'password' => bcrypt('password')
        ]);

        $user->assignRole('Faculty');
    }
}
