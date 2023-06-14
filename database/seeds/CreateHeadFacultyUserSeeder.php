<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateHeadFacultyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $headfaculties = [
            [
                'lastname' => 'Head Faculty',
                'firstname' => 'User',
                'mi' => 'F',
                'idno' => '0000',
                'email' => 'headfaculty@gmail.com',
                'password' => bcrypt('password')
            ],
        ];
    
        foreach ($headfaculties as $headfacultiesData) {
            $user = User::create($headfacultiesData);
            $user->assignRole('Head Faculty');
        }
    }
}
