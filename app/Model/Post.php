<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table='posts';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'title',
        'content',
        'section_id',
        'user_id'
    ];


    public function Section()
    {
        return $this->belongsTo('App\Model\Section','section_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Model\User','user_id');
    }

    public function Comments()
    {
        return $this->hasMany('App\Model\Comment','post_id');
    }

    public function Photos()
    {
        return $this->belongsToMany('App\Model\Photo','post_photos');
    }
}
