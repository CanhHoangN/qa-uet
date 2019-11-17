<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer_survey extends Model
{
    //
    protected $fillable = ['id','user_id','question_id','survey_id','answer',];
    protected $table = 'answer_survey';

    public function survey() {
        return $this->belongsTo(Survey::class);
    }

    public function question() {
        return $this->belongsTo(Question_survey::class);
    }
}
