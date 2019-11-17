<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $fillable = ['title','user_id','password', 'description', 'user_id','deleted_at',];
    protected $dates = ['deleted_at'];
    protected $table = 'survey';

    public function questions() {
        return $this->hasMany(Question_survey::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function answers() {
        return $this->hasMany(Answer_survey::class);
    }
}
