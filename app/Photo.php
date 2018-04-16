<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  //seting probarity (columns on photo table)
    protected $fillable = array('album_id' , 'description' , 'photo' , 'title' , 'size');

    public function album(){

      return $this->belongsTo('App\Album');
    }
}
