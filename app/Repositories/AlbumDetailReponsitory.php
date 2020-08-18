<?php
    namespace App\Repositories;
use App\Models\Album;
use App\Models\Albumdetail;
use App\Repositories\AlbumDetailReponsitoryInterface;

class AlbumDetailReponsitory implements AlbumDetailReponsitoryInterface{
        public function all(){
            // $albumDetails = Albumdetail::all();
            $albumDetails = Albumdetail::select('albums.name','albumdetails.*')
                            ->join('albums','albums.id','=','albumdetails.album_id')
                            ->get();
            return $albumDetails;
        }

        public function allAlbum(){
            $albums = Album::all();
            return $albums;
        }

        public function add($requests){
            $albumDetails = Albumdetail::create($requests);
            return $albumDetails;
        }

        public function findOrFail($idImage){
            $albumDetail = Albumdetail::where('id',$idImage)->firstOrFail();
            return $albumDetail;
        }
        public function updateDetailAlbum($requests,$idDetail){
            $albumDetail = Albumdetail::where('id', $idDetail)->firstOrFail();
            $albumDetail->update($requests);
            return $albumDetail;
        }

        public function delete($idDetail){
            $albumDetail = Albumdetail::findOrFail($idDetail);
            $albumDetail->delete();
            return $albumDetail;
        }
    }
?>
