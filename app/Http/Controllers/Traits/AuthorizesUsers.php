<?php
namespace App\Http\Controllers\Traits;

use App\Models\Banner;
use Illuminate\Http\Request;

 trait AuthorizesUsers {
    protected function userCreatedbanner($request){
        return Banner::where([
             'zip' => $request->zip,
             'street' => $request->street,
             'user_id' => auth()->user()->id,
     
         ])->exists();
     }
     
     protected function unAuthorized(Request $request){
         if($request->ajax() || $request->wantsJson()){
             return response(['message' => 'Nope!'],403);
         }
         'error';
         return back();
     }
     
 }