<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class,5)->create();
        DB::table('users')->insert([
            'name' => 'Hồng Thanh Châu',
            'email' => 'hongthanh010896@gmail.com',
            'password' => '$2y$10$L1MXNHRiEqVY/275JBRlZeLzhtjMc/womCPAyQjLTucPSLn3LXjZ6',
            'isAdmin' => 1
        ]);
    }
}
