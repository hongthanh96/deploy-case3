<?php

use App\Models\Packdetail;
use Illuminate\Database\Seeder;

class PackdetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Packdetail::class,3)->create();
    }
}
