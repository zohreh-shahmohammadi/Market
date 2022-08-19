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

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ownedBy(User $user){
       return $this->user_id == $user->id;

    }
    public static function locatedAt($zip,$street){
        $street=str_replace('-',' ',$street);
        return static::where(compact('zip','street'))->first();
    }
    //or
   /* public function scopelocatedAt($query ,$zip,$street){
        $street=str_replace('-',' ',$street);
        return $query->where(compact('zip','street'));
    }*/

    public function getPriceAttribute($price){
        return '$' .number_format($price);
    }
    public function getDescriptionAttribute($description){
       //nl2br not safe bescouse hacker can injesction in space
        return nl2br($description);
    }
    public function photos(){
        return $this->hasMany(Photo::class);
    }
    public function addPhoto(Photo $photo){
        return $this->photos()->save($photo);
    }
   
}
