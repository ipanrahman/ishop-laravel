<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('categories')->get()->count() == 0) {
            DB::table('categories')->insert([
                ['name' => 'Pakaian Pria', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Handphone & Aksesoris', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Komputer & Aksesoris', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Fashion Bayi & Anak', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Sepatu Pria', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Tas Pria', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Jam Tangan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Elektronik', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Kesehatan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Fotografi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Pakain Wanita', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Kecantikan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Ibu & Bayi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Sepatu Wanita', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Tas Wanita', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Fashion Muslim', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Aksesoris Muslim', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Aksesoris Fashion', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Hobi & Koleksi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Makanan & Minuman', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ]);
        }
    }
}
