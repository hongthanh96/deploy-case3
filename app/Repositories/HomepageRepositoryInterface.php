<?php
    namespace App\Repositories;
    interface HomepageRepositoryInterface{
        public function serviceAll();
        public function packDetailAll();
        public function albumHot();
        public function imgDetail($id);
    }
?>
