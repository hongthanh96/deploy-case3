<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackdetailRequest;
use App\Repositories\PackDetailRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackdetailController extends Controller
{
    private $packDetailReponsitory;
    public function __construct(PackDetailRepository $packDetailReponsitory)
    {
        $this->packDetailReponsitory = $packDetailReponsitory;
    }
    public function index()
    {
        if (Auth::user()->isAdmin == 1){
            return view('admin.packDetail');
            }
            else{
                return redirect('/home');
            }

    }

    public function getPackDetail(){

        $packLists = $this->packDetailReponsitory->all();
        return response()->json($packLists,200);

    }

    public function create(PackdetailRequest $request)
    {

        $requests = $request->all();
        $packList = $this->packDetailReponsitory->add($requests);
        return response()->json($packList,200);

    }

    public function edit($id)
    {
        $packList = $this->packDetailReponsitory->findById($id);
        return response()->json($packList);
    }

    public function update(PackdetailRequest $request, $id)
    {
        $requests = $request->all();
        $packList = $this->packDetailReponsitory->updatePackDetail($requests,$id);
        return response()->json($packList,200);

    }


    public function destroy($id)
    {
        $packList = $this->packDetailReponsitory->delete($id);
        return response()->json($packList,200);
    }
}
