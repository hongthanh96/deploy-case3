<?php
    namespace App\Repositories;
    use App\Models\Service;
    use App\Repositories\ServiceRepositoryInterface;

class ServiceReponsitory implements ServiceRepositoryInterface{

        public function all(){

            $services = Service::all();
            return $services;
        }

        public function create($service){

            $service = Service::create($service);
            return $service;
        }

        public function findById($serviceID){

            $service = Service::findOrFail($serviceID);
            return $service;
        }

        public function delete($serviceID){

            $service = Service::findOrFail($serviceID);
            $service->delete();
            return $service;
        }

        public function updateService($requests,$idService){
            $service = Service::where('id', $idService)->firstOrFail();
            $service->update($requests);
            return $service;
        }

    }

?>
