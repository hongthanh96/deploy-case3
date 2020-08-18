<?php

namespace App\Http\Controllers;

use App\Repositories\PacklistRepository;
use Illuminate\Http\Request;

class PacklistController extends Controller
{
    private $packListRepository;
    public function __construct(PacklistRepository $packListRepository)
    {
        $this->packListRepository = $packListRepository;
    }

    public function index()
    {
        return view('admin.packList');
    }

    public function getPactlists(){
        $packlists = $this->packListRepository->all();
        return response()->json($packlists);
    }

    public function create(Request $request)
    {
        $requests = $request->all();
        $packlist = $this->packListRepository->add($requests);
        return response()->json($packlist);
    }


    public function store(Request $request)
    {
        //
    }


    public function edit($id)
    {
        $packlist = $this->packListRepository->findById($id);
        return response()->json($packlist);
    }


    public function update(Request $request, $id)
    {
       $requests = $request->all();
       $packlist = $this->packListRepository->updatePacklist($requests,$id);
       return response()->json($packlist);
    }

    public function destroy($id)
    {
        $packlist = $this->packListRepository->delete($id);
        return response()->json($packlist);
    }
}
