<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surveys extends Model
{
    //
    protected $table="survey";
  //  protected $primarykey="id_survey";
    protected $fillable = ['id_survey','id_user','name_survey','type_survey','date_survey','description','password',];

}
