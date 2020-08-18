<?php
    namespace App\Repositories;

use App\Models\Albumdetail;
use App\Models\Packdetail;
use App\Models\Service;

class HomepageRepository implements HomepageRepositoryInterface
     {

        public function serviceAll(){
            $services = Service::all();
            return $services;
        }

        public function packDetailAll(){
            $packDetails = Packdetail::all();
            return $packDetails;
        }

        public function albumHot(){
            $albumHots =  Albumdetail::where('isHot','1')->get();
            return $albumHots;
        }

        public function imgDetail($id){
            $album = Albumdetail::findOrFail($id);
            $album->filename = json_decode($album->filename);
            return $album;
        }
    }
?>
