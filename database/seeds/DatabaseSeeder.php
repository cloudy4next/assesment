<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        \App\Client::factory()->count(10)->create();
        \App\Employee::factory()->count(5)->create();
        \App\Service::factory()->count(10)->create();
        \App\Appointment::factory()->count(10)->create();

        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
        ]);
    }
}
