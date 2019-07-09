<?php

use Illuminate\Database\Seeder;
use App\Models\MenuRole;

class MenusRolesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_role')->truncate();

        $data = [
            [
                'role_id' => '1',
                'menu_id' => '1'
            ],
            [
                'role_id' => '1',
                'menu_id' => '2'
            ],
            [
                'role_id' => '1',
                'menu_id' => '3'
            ],
            [
                'role_id' => '2',
                'menu_id' => '3'
            ],

        ];

        foreach ( $data as  $datas )
        {
            MenuRole::create($datas);
        }
    }
}
