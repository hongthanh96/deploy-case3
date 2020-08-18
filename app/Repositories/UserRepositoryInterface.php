<?php
    namespace App\Repositories;
    interface UserRepositoryInterface{
        public function all();
        public function findById($idUser);
        public function findAdmin($idAdmin,$request);
        public function findRole($idUser, $requests);
        public function findBlock($idUser, $requests);
        public function editUser($idUser);
        public function updateUser($requests);
    }
?>
