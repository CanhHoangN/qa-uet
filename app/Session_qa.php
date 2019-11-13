<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session_qa extends Model
{
    //

    protected $table="sessions";
    protected $fillable = ['id_session','id_user','name_session','type_session','date_session','description','password',];
}
