<?php
    namespace App\Repositories;

use App\Models\Album;
use App\Repositories\AlbumRepositoryInterface;

class AlbumReponsitory implements AlbumRepositoryInterface{

        public function all(){
            $albums = Album::all();
            return $albums;
        }

        public function add($requests){
            $album = new Album;
            $album->name = $requests['name'];
            $album->save();
            return $album;
        }

        public function findById($idAlbum){
            $album = Album::where('id',$idAlbum)->firstOrFail();
            return $album;
        }

        public function updateAlbum($requests,$id){
            $album = Album::where('id',$id)->firstOrFail();
            $album->update($requests);
            return $album;
        }

        public function delete($idAlbum){
            $album = Album::findOrFail($idAlbum);
            $album->delete();
            return $album;
        }
    }
?>
