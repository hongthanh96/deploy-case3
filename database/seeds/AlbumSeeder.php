<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            'name' => 'Ảnh ngoại cảnh'
        ]);
        DB::table('albums')->insert([
            'name' => 'Ảnh sự kiện'
        ]);
        DB::table('albums')->insert([
            'name' => 'Ảnh trang trí tiệc'
        ]);
    }
}
