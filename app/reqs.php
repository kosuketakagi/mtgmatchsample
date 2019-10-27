<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reqs extends Model
{
    public static $rules = array(
        'recruit_id' => 'required|unique:posts|'
    );



    public function user()
    {
        return $this->belongsTo('App\User', 'recruiter_id');
    }


}
