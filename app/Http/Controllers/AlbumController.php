<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Repositories\AlbumReponsitory;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    private $albumReponsitory;
    public function __construct(AlbumReponsitory $albumReponsitory)
    {
        $this->albumReponsitory = $albumReponsitory;
    }
    public function index()
    {
        return view("admin.albums");
    }
    public function getAlbums()
    {
        $albums = $this->albumReponsitory->all();
        return response()->json($albums);
    }

    public function create(AlbumRequest $request)
    {
        $requests = $request->all();
        $result = $this->albumReponsitory->add($requests);
        return response()->json($result , 200);
    }

    public function edit($id)
    {
        $album = $this->albumReponsitory->findById($id);
        return response()->json($album);
    }


    public function update(AlbumRequest $request, $id)
    {
        $requests = $request->all();
        $album = $this->albumReponsitory->updateAlbum($requests,$id);
        return response()->json($album);
    }

    public function destroy($id)
    {
        $album = $this->albumReponsitory->delete($id);
        return response()->json($album);
    }
}
