<?php
    namespace App\Repositories;
    use App\Models\Packlist;
    use App\Repositories\PacklistRepositoryInterface;

class PacklistRepository implements PacklistRepositoryInterface{

        public function all(){
            $paklist = Packlist::all();
            return $paklist;
        }

        public function add($requests){
            $packList = Packlist::create($requests);
            return $packList;
        }

        public function findById($idPacklist){
            $packList = Packlist::where('id',$idPacklist)->firstOrFail();
            return $packList;
        }

        public function updatePacklist($requests,$id){
            $packList = Packlist::where('id',$id)->firstOrFail();
            $packList->update($requests);
            return $packList;
        }

        public function delete($idPacklist){
            $packList = Packlist::findOrFail($idPacklist);
            $packList->delete();
            return $packList;
        }
    }
