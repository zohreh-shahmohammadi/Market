<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\Photo;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$countries= \App\Http\Utilities\Country::all();
        alert('danger','You clicked the button!');
     
        
    return view('banners.create'/*,compact('countries')*/);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        Banner::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip,$street)
    {
      
       $banner = Banner::locatedAt($zip,$street)->first();
        return view('banners.show',compact('banner'));
        
    }
public function addPhotos($zip,$street,Request $request){
    $this->validate($request,[
'photo' => 'required|mimes:jpg,png,bmp'
    ]);
$file = $request->file('photo');
$name = time() . $file->getClientOriginalName();
 $file->move('banners/photos',$name);
 $banner = Banner::locatedAt($zip,$street)->first();
 $banner->photos()->create(['path' => "/banners/photos/{$name}"]);
 return 'Done';
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
