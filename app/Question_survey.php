<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_survey extends Model
{
    //
    protected $table = 'question_survey';
    protected $casts = [
        'option_name' => 'array',
    ];
    protected $fillable = ['title', 'question_type', 'option_name', 'user_id'];
    public function survey() {
        return $this->belongsTo(Survey::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function answers() {
        return $this->hasMany(Answer_survey::class);
    }


}
