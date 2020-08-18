<?php
    namespace App\Repositories;
    interface PackDetailRepositoryInterface{
        public function all();

        public function add($requests);

        public function findById($idPackDrtail);

        public function updatePackDetail($requests,$id);

        public function delete($idPackDrtail);
    }
?>
