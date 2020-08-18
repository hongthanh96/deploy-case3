<?php
    namespace App\Repositories;

    interface AlbumRepositoryInterface{
        public function all();

        public function add($requests);

        public function findById($idAlbum);

        public function updateAlbum($requests,$id);

        public function delete($idAlbum);
    }
?>
