<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table='banner_photos';
    protected $fillable = ['photo'];
    use HasFactory;
    public function banner(){
        return $this->belongsTo(App\Models\Banner::class);
    }
}
