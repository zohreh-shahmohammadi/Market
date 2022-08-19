<?php

namespace App\Models;

use Directory;
use File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Stmt\Return_;


//use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $baseDir = 'images/photos';
    protected $table='banner_photos';
    protected $fillable = ['thumbnail_path','path','thumbnail_path'];
    use HasFactory;
    public function banner(){
        return $this->belongsTo(Banner::class);
    }
   /* //ravesh badi baraye addPhotos bejaie public named va save as va move va thumbnailPath  public fromfile minevisim
//protected $baseDir ham pak mishahvad
publi function __construct($file){
    parent::__construct();
    $this->file = $file;
}

    public function baseDir(){
        return 'images/photos';
    }
    protected $file;
    public static function formFile(HttpUploadedFile $file){
        $photo = new static;
        $photo->file=$file;
        $photo->fill([
            'name' => $photo->fileName(),
            'path' => $photo->filePath(),
            'thumbnail_path' => $photo->thumbnailPath(),

        ]);
        return $photo;
    }

    public function fileName(){
        //sha1 yani beaksa kasani mitonana dasresi dashteh bashand ke karbran websit hastan
  //yani file shoam bod amir.jpg => 232454e64dxghdeyhfd4
  // agar extention ham dashteh bashe onam tabdil mikoneh
  //yani .jpg jpg ezafah koneh
        $name=sha1($this->file->getClientOriginalName());
        $extention = $this->file->getClientOriginalExtension();
        return "{$name}.{$extention}";
    }
    public function filePath(){
        //return $this->baseDir() . '/' .$this->fileName();
        // DIRECTORY_SEPARATOR hamon amal '/' anjam mideh hich farghi nadareh
        return $this->baseDir() . DIRECTORY_SEPARATOR .$this->fileName();
    }
    
    public function thumbnailPath(){
        return $this->baseDir() . '/tn-'.$this->fileName();
    }
    public function upload(){
       $this->$file->move($this->baseDir(),$this->fileName());
        $this->makeThumbnail();
        return $this;
        //Image::make($this->path)->fit(200)->save($this->thumbnail_path);
    }
    public function makeThumbnail(){
        Image::make($this->filePath())->fit(200)->save($this->thumbnailPath());
        return $this;
    }*/
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

    public function delete()
    {
        parent::delete();

   File::delete([
        $this->path,
        $this->thumbnail_path
    ]);

    }
}
