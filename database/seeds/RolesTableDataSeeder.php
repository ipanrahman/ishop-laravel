<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $roles = [
            [
                'name' => 'admin',
                'description' => 'Can Edit Everything'
            ],
            [
                'name' => 'user',
                'description' => 'Can access web'
            ],

        ];
        DB::table('roles')->insert($roles);
    }
}
