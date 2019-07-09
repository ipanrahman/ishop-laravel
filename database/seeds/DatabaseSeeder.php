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
        $this->call(CategorySeeder::class);
        $this->call(UsersTableDataSeeder::class);
        $this->call(RolesTableDataSeeder::class);
        $this->call(MenusTableDataSeeder::class);
        $this->call(UsersRolesTableDataSeeder::class);
        $this->call(MenusRolesTableDataSeeder::class);
    }
}
