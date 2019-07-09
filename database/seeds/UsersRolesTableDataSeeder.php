<?php

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UsersRolesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_role')->truncate();

        $data = [
            [
                'user_id' => '1',
                'role_id' => '1'
            ]
        ];

        foreach ( $data as  $datas )
        {
            UserRole::create($datas);
        }
    }
}
