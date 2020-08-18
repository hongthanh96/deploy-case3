<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumdetailRequest;
use App\Repositories\AlbumDetailReponsitory;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Albumdetail;
class AlbumdetailController extends Controller
{
    private $albumDetailReponsitory;
    public function __construct(AlbumDetailReponsitory $albumDetailReponsitory)
    {
        $this->albumDetailReponsitory = $albumDetailReponsitory;
    }

    public function index()
    {
        $albumss = $this->albumDetailReponsitory->allAlbum();
        return view('admin.albumDetail',compact('albumss'));
    }


    public function getDetailAlbum()
    {
        $albumDetails = $this->albumDetailReponsitory->all();
        foreach($albumDetails as $albumDetail){
            $albumDetail['filename'] = json_decode($albumDetail['filename']);
        }
       return response()->json($albumDetails, 200);
    }

    public function getDetailAlbumImage($id)
    {
        $albumDetails = Albumdetail::find($id);
        $albumDetail['filename'] = json_decode($albumDetails['filename']);
       return response()->json($albumDetail, 200);
    }

    public function create(AlbumdetailRequest $request)
    {
        $atribute = $request->all();
        // dd($atribute);
        if ($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $fileName);
            $atribute['image']= $fileName ;
        }else{
            $atribute['image']="none.jpg";
        }

        if ($request->hasFile('filename')) {
            $data = [];
            foreach ($request->filename as $photo) {
                $fileName = time().rand().'.'.$photo->getClientOriginalExtension();
                $photo->move(public_path('upload'), $fileName);
                array_push($data , $fileName);
            }
        }
        $atribute['filename'] = json_encode($data);

        // $atribute['filename'] = "none.jpg";
        // dd($atribute);
        // $result = $this->albumDetailReponsitory->add($atribute);

        $result = Albumdetail::create($atribute);
        return response()->json($result, 200);
    }

    public function store(Request $request)
    {


    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $albumDetail = $this->albumDetailReponsitory->findOrFail($id);
        return response()->json($albumDetail);
    }

    public function update(AlbumdetailRequest $request, $id)
    {
        $requests = $request->all();
        $albumDetail = $this->albumDetailReponsitory->updateDetailAlbum($requests,$id);
        return response()->json($albumDetail);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $albumDetail = $this->albumDetailReponsitory->delete($id);
        return response()->json($albumDetail);
    }
}
