<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           'admin',
           'faculty',
           'student',
           'head faculty'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo('admin');

        $role = Role::create(['name' => 'Faculty']);
        $role->givePermissionTo('faculty');

        $role = Role::create(['name' => 'Student']);
        $role->givePermissionTo('student');

        
        $role = Role::create(['name' => 'Head Faculty']);
        $role->givePermissionTo('head faculty');
    }
}
