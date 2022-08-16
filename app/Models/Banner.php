<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
'street',
'city',
'zip',
'country',
'state',
'price',
'description',
    ];
    use HasFactory;
    public function photos(){
        return $this->hasMany(App\Models\Photo::class);
    }
}
