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
        $students = [
            [
                'lastname' => 'Student1',
                'firstname' => 'User1',
                'mi' => 'S',
                'lrn' => '1-1-1',
                'idno' => '001',
                'email' => 'student1@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'lastname' => 'Student2',
                'firstname' => 'User2',
                'mi' => 'S',
                'lrn' => '2-2-2',
                'idno' => '002',
                'email' => 'student2@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'lastname' => 'Student3',
                'firstname' => 'User3',
                'mi' => 'S',
                'lrn' => '3-3-3',
                'idno' => '003',
                'email' => 'student3@gmail.com',
                'password' => bcrypt('password')
            ]
        ];
    
        foreach ($students as $studentData) {
            $user = User::create($studentData);
            $user->assignRole('Student');
        }
    }
    
}
