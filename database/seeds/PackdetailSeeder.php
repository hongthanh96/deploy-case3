<?php

use App\Models\Packdetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackdetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Packdetail::class,3)->create();
        DB::table('packdetails')->insert([
            'name' => 'VIP1',
            'price' => '5000000',
            'service1' => 'Tặng vest cưới',
            'service2' => 'Tặng vé phim trường',
            'service3' => '2 ảnh phóng sự 60 X 90',
            'service4' => '2 ảnh để bàn',
            'service5' => 'Trang điểm cô dâu tại nhà',
        ]);
        DB::table('packdetails')->insert([
            'name' => 'VIP2',
            'price' => '6000000',
            'service1' => 'Tặng vest cưới',
            'service2' => 'Tặng vé phim trường',
            'service3' => '2 ảnh phóng sự 60 X 90',
            'service4' => '1 váy cưới',
            'service5' => 'Trang điểm cô dâu tại nhà',
        ]);
        DB::table('packdetails')->insert([
            'name' => 'VIP3',
            'price' => '7000000',
            'service1' => 'Tặng vest cưới',
            'service2' => 'Tặng vé phim trường',
            'service3' => '5 ảnh phóng sự 60 X 90',
            'service4' => '2 váy cưới',
            'service5' => 'Trang điểm cô dâu tại nhà',
        ]);
    }
}
