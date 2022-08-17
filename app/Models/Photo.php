<?php

namespace App\Models;

use Directory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Stmt\Return_;
//use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $baseDir = 'banners/photos';
    protected $table='banner_photos';
    protected $fillable = ['thumbnail_path','path','thumbnail_path'];
    use HasFactory;
    public function banner(){
        return $this->belongsTo(Banner::class);
    }
    public static function named($name){
        $photo = new static;
        $photo->saveAs($name);
        //$name = time() . $file->getClientOriginalName();
        //$photo->saveAs($name->getClientOriginalName());
        /// thumbnail IMAGE INVENTION IMAGE changed or removed
       // $photo->path = $photo->baseDir . DIRECTORY_SEPARATOR .$name;
        //$file->move($photo->baseDir,$name);
        return $photo;
    }

    // thumbnail IMAGE INVENTION IMAGE
  

    public function saveAS($name){
$this->name =sprintf("%s-%s",time(),$name);
$this->path =sprintf("%s/%s",$this->baseDir,$this->name);
$this->thumbnail_path =sprintf("%s/tn-%s",$this->baseDir,$this->name);
    }
    public function move(HttpUploadedFile $file){
        $file->move($this->baseDir,$this->name);
        $this->makeThumbnail();
        return $this;
        //Image::make($this->path)->fit(200)->save($this->thumbnail_path);
    }
    public function makeThumbnail(){
        Image::make($this->path)->fit(200)->save($this->thumbnail_path);
        return $this;
    }
}
