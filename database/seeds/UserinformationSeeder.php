<?php

use App\Userinformation;
use Illuminate\Database\Seeder;

class UserinformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Userinformation::class,5)->create();
    }
}
