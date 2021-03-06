<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Recruit extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'time' => 'required',
        'shop' => 'required',
        'format' => 'required',
        'pref_id' => 'required',
        'body' => 'required',
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }

      public function reqs()
    {
        return $this->hasMany('App\reqs');
    }

    public function reqs_approval()
    {
        return $this->hasMany('App\reqs')->where('approval', '=', 1);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

}
