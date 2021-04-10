<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $table='sections';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'name',
        'user_id'
    ];


    public function User()
    {
        return $this->belongsTo('App\Model\User','user_id');
    }

    public function Posts()
    {
        return $this->hasMany('App\Model\Post','section_id');
    }
}
