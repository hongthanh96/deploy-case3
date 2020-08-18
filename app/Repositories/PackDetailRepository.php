<?php
    namespace App\Repositories;

use App\Models\Packdetail;
use App\Repositories\PackDetailRepositoryInterface;
class PackDetailRepository implements PackDetailRepositoryInterface{

        public function all(){
            $albums = Packdetail::all();
            return $albums;
        }

        public function add($requests){
            $packList = Packdetail::create($requests);
            return $packList;
        }

        public function findById($idPackDrtail){
            $album = Packdetail::where('id',$idPackDrtail)->firstOrFail();
            return $album;
        }

        public function updatePackDetail($requests,$idPackDrtail){
            $album = Packdetail::where('id',$idPackDrtail)->firstOrFail();
            $album->update($requests);
            return $album;
        }

        public function delete($idAlbum){
            $album = Packdetail::findOrFail($idAlbum);
            $album->delete();
            return $album;
        }
    }
