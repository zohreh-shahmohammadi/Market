<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\AuthorizesUsers;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\ChangeBannerRequest;
use App\Models\Banner;
use App\Models\Photo;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile as FileUploadedFile;

class BannersController extends Controller
{

    use AuthorizesUsers;
//effect you can not access to function create,store,show
public function __construct()
{
    parent::__construct();
    $this->middleware('auth',['except' => ['show']]);
}

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
       // Banner::create($request->all());
       $banner = Auth::user()->publish(   new Banner($request->all()));

        alert('danger','You cbanner has create!');
         return back();
      // return redirect($banner->zip.'/'.str_replace(' ','-',$banner->street));
  // return redirect(banner_path());
    }
/*public function banner_path(Banner $banner){
   return $banner->zip.'/'.str_replace(' ','-',$banner->street);
}*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip,$street)
    {
      //there is 2 methods in banner.php
      // $banner = Banner::locatedAt($zip,$street)->first();
        $banner = Banner::locatedAt($zip,$street);
        return view('banners.show',compact('banner'));
        
    }
    //1
///in ravesh estefah az miidel ware ba estefadeh az request kotah mofid
//age az dastor hangeBannerRequest estefedeh konim bayad dar bala 
// use AuthorizesUsers; ino delet bkonim
    /*public function addPhotos($zip,$street,ChangeBannerRequest $request){
        $photo = $this->makePhoto($request->file('photo'));
        return Banner::locatedAt($zip,$street)->addPhoto($photo);
     }*/
//2
/*//ravesh badi

     public function addPhotos($zip,$street,ChangeBannerRequest $request){
        $photo = Photo::formFile($request->file('photo'))->upload();
        return Banner::locatedAt($zip,$street)->addPhoto($photo);
     }*/

//


// add photo enteghal dadaim dakhel photo controller esmesham taghir kard bename store
//Route ahm taghir dadaim
/*public function addPhotos($zip,$street,Request $request){
    $this->validate($request,[
'photo' => 'required|mimes:jpg,png,bmp'
    ]);
    //there is 2 methods
/* $file = $request->file('photo');
 $name = time() . $file->getClientOriginalName();
 $file->move('banners/photos',$name);
 $banner=Banner::locatedAt($zip,$street);
 //or
// $banner=Banner::locatedAt($zip,$street)->first();
$banner->photos()->create(['path' => "/banners/photos/{$name}"]);
return 'Done';*/

//or another methods
 //$photo=Photo::fromForm($request->file('photo'));
 //chand ravesh baraye neveshtan gurd vojod darad
 /*$banner = Banner::locatedAt($zip,$street);
 //if($banner->user_id !== auth()->id()){
    if(! $banner->ownedBy(auth()->user())){
   // if(! $banner->userCreatedbanner($request)){
   return $this->unAuthorized($request);
 }
 $photo = $this->makePhoto($request->file('photo'));
 //Banner::locatedAt($zip,$street)->addPhoto($photo);
 $banner->addPhoto($photo);
 

}*/

//ENTEGHAL MIDIM BE PHOTOCONTROLLER
/*public function makePhoto(FileUploadedFile $file){
   return Photo::named($file->getClientOriginalName())->move($file);
}*/
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
