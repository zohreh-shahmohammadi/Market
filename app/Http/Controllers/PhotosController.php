<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Photo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile as FileUploadedFile;
class PhotosController extends Controller
{
    public function store($zip,$street,Request $request){
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
     $banner = Banner::locatedAt($zip,$street);
     //if($banner->user_id !== auth()->id()){
        if(! $banner->ownedBy(auth()->user())){
       // if(! $banner->userCreatedbanner($request)){
       return $this->unAuthorized($request);
     }
     $photo = $this->makePhoto($request->file('photo'));
     //Banner::locatedAt($zip,$street)->addPhoto($photo);
     $banner->addPhoto($photo);
     
    
    }
    public function makePhoto(FileUploadedFile $file){
        return Photo::named($file->getClientOriginalName())->move($file);
     }
     public function destroy($id)
    {
 Photo::findOrFail($id)->delete();
  return back();
        }
}
