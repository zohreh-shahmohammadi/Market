<?php

namespace App\Models;

use Directory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use PhpParser\Node\Stmt\Return_;

class Photo extends Model
{
    protected $baseDir = 'banners/photos';
    protected $table='banner_photos';
    protected $fillable = ['path'];
    use HasFactory;
    public function banner(){
        return $this->belongsTo(Banner::class);
    }
    public static function fromForm(HttpUploadedFile $file){
        $photo = new static;
        $name = time() . $file->getClientOriginalName();
        $photo->path = $photo->baseDir . DIRECTORY_SEPARATOR .$name;
        $file->move($photo->baseDir,$name);
        return $photo;
    }
}
