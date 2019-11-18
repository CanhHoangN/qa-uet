<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = "questions";
    protected $fillable = ['id_question','id_session','title_question','whoposted','id_user','description',];
}
