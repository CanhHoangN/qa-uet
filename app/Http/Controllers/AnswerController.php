<?php

namespace App\Http\Controllers;

use App\Answer_survey;
use Auth;
use Illuminate\Http\Request;
use App\Survey;
use App\Http\Requests;


class AnswerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function store(Request $request, Survey $survey)
  {
    // remove the token
      $check_user = Answer_survey::where('survey_id',$survey->id)->where('user_id',\Illuminate\Support\Facades\Auth::id())->get();
      if($check_user->count() > 0){
          return redirect()->back()->with('dont_allow','Bạn đã tham gia khảo sát, xin cảm ơn.');
      }else{
          $arr = $request->except('_token');

          $count = 1;
          foreach ($arr as $key => $value) {

              if(array_key_exists('answer',$value)){
                  $newValue = json_encode($value['answer']);
              }else{
                  $newValue = json_encode($value);
              }

              Answer_survey::create([
                  'user_id'=>Auth::id(),
                  'question_id' => $count,
                  'survey_id'=>$survey->id,
                  'answer'=>$newValue,
              ]);
              $count++;
          }
          return redirect()->back()->with('success','Cảm ơn bạn đã tham gia khảo sát.');
      }

      /*foreach ($arr as $key => $value) {
          $newAnswer = new Answer_survey();
          //dd($newValue = json_encode($value['answer']));

          if (! is_array( $value )) {
              $newValue = $value['answer'];
          } else {
              //dd(json_encode($value['answer']));
              $newValue = json_encode($value['answer']);
          }
          $newAnswer->answer = $newValue;
          $newAnswer->question_id = $key;
          $newAnswer->user_id = Auth::id();
          $newAnswer->survey_id = $survey->id;

          $newAnswer->save();

          $answerArray[] = $newAnswer;
      };*/

     // return redirect()->action('SurveyController@view_survey_answers', [$survey->id]);
  }
}
