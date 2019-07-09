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

        $data = [
            [
                'name' => 'super_admin',
                'description' => 'Can Edit Everythings'
            ],
            [
                'name' => 'admin',
                'description' => 'Can Edit thing'
            ],

        ];

        foreach ( $data as  $datas )
        {
            Role::create($datas);
        }
    }
}
