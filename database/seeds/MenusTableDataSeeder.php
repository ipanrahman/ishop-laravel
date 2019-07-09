<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->truncate();

        $data = [
            [
                'name' => 'users'
            ],
            [
                'name' => 'roles'
            ],
            [
                'name' => 'menus'
            ],

        ];

        foreach ( $data as  $datas )
        {
            Menu::create($datas);
        }
    }
}
