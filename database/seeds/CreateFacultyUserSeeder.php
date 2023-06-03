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
        $faculties = [
            [
                'lastname' => 'Faculty1',
                'firstname' => 'User1',
                'mi' => 'F',
                'idno' => '01',
                'email' => 'faculty1@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'lastname' => 'Faculty2',
                'firstname' => 'User2',
                'mi' => 'F',
                'idno' => '02',
                'email' => 'faculty2@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'lastname' => 'Faculty3',
                'firstname' => 'User3',
                'mi' => 'F',
                'idno' => '03',
                'email' => 'faculty3@gmail.com',
                'password' => bcrypt('password')
            ]
        ];
    
        foreach ($faculties as $facultyData) {
            $user = User::create($facultyData);
            $user->assignRole('Faculty');
        }
    }    
}
