<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumdetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albumdetails')->insert([
            'title' => 'Ảnh cưới đẹp tại Hà Nội',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'isHot' => 1,
            'image' => '1597397425.jpg',
            'filename' => '["15973974251020408324.jpg","1597397425496001669.jpg","15973974251196159248.jpg","15973974251782216313.jpg","1597397425601759613.jpg","1597397425543618984.jpg"]',
            'album_id' => 1
        ]);
        DB::table('albumdetails')->insert([
            'title' => 'Album ngoại cảnh',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'isHot' => 1,
            'image' => '1597397607.jpg',
            'filename' => '["1597397607154860300.jpg","15973976071787257183.jpg","15973976071042356936.jpg","15973976071215935457.jpg","15973976071384588658.jpg","1597397607142755937.jpg"]',
            'album_id' => 1
        ]);
        DB::table('albumdetails')->insert([
            'title' => 'Album ảnh cưới tại Quảng Ninh',
            'description' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?",
            'isHot' => 1,
            'image' => '1597397529.jpg',
            'filename' => '["15973975291396473636.jpg","15973975291423974305.jpg","15973975291336788683.jpg","15973975291834921381.jpg","15973975291470098187.jpg","1597397529386482417.jpg"]',
            'album_id' => 1
        ]);
    }
}
