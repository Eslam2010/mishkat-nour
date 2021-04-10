<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'content',
        'post_id',
        'user_id'
    ];
    public function User()
    {
        return $this->belongsTo('App\Model\User','user_id');
    }

    public function Post()
    {
        return $this->belongsTo('App\Model\Post','post_id');
    }

}
