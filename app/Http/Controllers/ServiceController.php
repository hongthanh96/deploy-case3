<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Repositories\ServiceReponsitory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    private $serviceReponsitory;

    public function __construct(ServiceReponsitory $serviceReponsitory)
    {
        $this->serviceReponsitory = $serviceReponsitory;
    }
    public function index()
    {
        // $services = $this->serviceReponsitory->all();
        if (Auth::user()->isAdmin == 1){
        return view('admin.services');
        }
        else{
            return redirect('/home');
        }
    }

    public function getApi(){
        $services =  $this->serviceReponsitory->all();
        return response()->json($services,200);
    }

    public function create(ServiceRequest $request)
    {
        $requests = $request->all();
        $service = $this->serviceReponsitory->create($requests);
        return response()->json($service);
    }

    public function edit($id)
    {
        $service = $this->serviceReponsitory->findById($id);
        return response()->json($service,200);

    }

    public function update(ServiceRequest $request,$id)
    {
        $requests = $request->all();
        $service = $this->serviceReponsitory->updateService($requests,$id);
        return response()->json($requests,200);
    }

    public function destroy($id)
    {
        $service = $this->serviceReponsitory->delete($id);
        return response()->json($service);
    }
}
