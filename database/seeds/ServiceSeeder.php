<?php

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Quay phóng sự cưới',
            'description' =>"Một bức ảnh hơn ngàn lời nói - 1 đoạn Video hơn ngàn bức ảnh. Xem những Clip cực đẹp với thiết bị đẳng cấp tại Wedding studio."
        ]);
        DB::table('services')->insert([
            'name' => 'Thuê trang phục cưới',
            'description' =>"Với Wedding studio, các bạn có thể lựa chọn cho mình một chiếc áo cưới lộng lẫy, hợp thời trang, quyến rũ nhất trong ngày cưới."
        ]);

        DB::table('services')->insert([
            'name' => 'Trang điểm cô dâu',
            'description' =>"Chuyên viên Makeup của chúng tôi có trên 5 năm kinh nghiệm, với phong cách trang điểm đẳng cấp, phong cách tự nhiên, sang trọng..."
        ]);
    }
}
