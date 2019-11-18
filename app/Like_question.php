<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like_question extends Model
{
    //
    protected $table = 'like_question';
    protected $fillable = ['id','id_question','id_user','name_user',];
}
