<?php
    namespace App\Repositories;
    interface PacklistRepositoryInterface{
        public function all();

        public function add($requests);

        public function findById($idPacklist);

        public function updatePacklist($requests,$id);

        public function delete($idPacklist);
    }
?>
