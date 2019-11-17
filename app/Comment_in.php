<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_in extends Model
{
    //
    protected $table = 'comment_in';
    protected $fillable = ['id','id_comment','id_user','content',];
}
