<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $table='photos';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'path'
    ];

    public function Posts()
    {
        return $this->belongsToMany('App\Model\Post','post_photos');
    }
}

