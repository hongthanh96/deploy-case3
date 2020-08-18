<?php
    namespace App\Repositories;

    interface ServiceRepositoryInterface {
        public function all();

        public function create($service);

        public function findById($serviceID);

        public function delete($serviceID);
    }
?>
