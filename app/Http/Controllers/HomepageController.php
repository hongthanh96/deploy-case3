<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HomepageRepositoryInterface;

class HomepageController extends Controller
{
    private $homepageRepository;
    public function __construct(HomepageRepositoryInterface $homepageRepository)
    {
        $this->homepageRepository =$homepageRepository;
    }
    public function index()
    {
        $services = $this->homepageRepository->serviceAll();
        $packDetails = $this->homepageRepository->packDetailAll();
        $albumHots = $this->homepageRepository->albumHot();
        return view('users.home',compact('services','packDetails','albumHots'));
    }


    public function showAlbum($id){
       $album = $this->homepageRepository->imgDetail($id);
       return view('users.showAlbum',compact('album'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
