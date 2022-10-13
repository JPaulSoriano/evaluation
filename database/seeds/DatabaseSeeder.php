<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            RolesAndPermissionsTableSeeder::class,
            CreateAdminUserSeeder::class,
            CreateStudentUserSeeder::class,
            CreateFacultyUserSeeder::class,
            AcademicYearTableSeeder::class,
        ]);
    }
}
