<?php

use App\Models\Packdetail;
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
        $this->call(UserSeeder::class);
        $this->call(UserinformationSeeder::class);
        $this->call(PackdetailSeeder::class);
        $this->call(ServiceSeeder::class);
    }
}
