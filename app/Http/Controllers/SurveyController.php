<?php

namespace App\Http\Controllers;
use App\Answer_survey;
use App\Question_survey;
use App\Session_qa;
use App\User;
use Auth;
use App\Survey;
use App\Answer;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Array_;

class SurveyController extends Controller
{


  public function home(Request $request)
  {
    $allsurvey = Survey::all();
      $type_sessions = DB::table('sessions')
          ->select('type_session', DB::raw('count(*) as total'))
          ->groupBy('type_session')->get();

      $amountUser = User::all()->count();
      $allsession= Session_qa::all();

      $count_session = $allsession->count();

    return view('web.survey', compact('allsurvey','amountUser','count_session','type_sessions'));
  }
  public function handlerSurvey($id){
      //dd(\Illuminate\Support\Facades\Auth::id());
      if(\Illuminate\Support\Facades\Auth::check()){
          $survey = Survey::where('id',$id)->get();
          //dd($survey);
          if(\Illuminate\Support\Facades\Auth::id() == $survey[0]->user_id){

              return redirect()->route('detail.survey',$id);
          }else{
              return redirect()->route('view.survey',$id);
          }
      }else{
          return redirect()->route('login')->with('NotLogin_survey','Vui lòng đăng nhập trước khi khảo sát.');
      }

  }

  # Show page to create new survey
  public function new_survey()
  {
    return view('survey.new');
  }

  public function create(Request $request)
  {
    Survey::create([
       'title'=>$request->title_survey,
       'description'=>$request->description,
       'password'=>$request->password,
        'user_id'=>\Illuminate\Support\Facades\Auth::id()
    ]);

    return redirect()->route('survey');
  }

  # retrieve detail page and add questions here
  public function detail_survey($survey_id,Survey $survey)
  {

      $survey = Survey::where('id',$survey_id)->get();
      $questions = Question_survey::where('survey_id',$survey_id)->get();
      //dd($questions);
      $count = 0;
      return view('survey.detail', compact('survey','questions','count'));

  }


  public function edit(Survey $survey)
  {
    return view('survey.edit', compact('survey'));
  }

  # edit survey
  public function update(Request $request, Survey $survey)
  {
    $survey->update($request->only(['title', 'description']));
    return redirect()->action('SurveyController@detail_survey', [$survey->id]);
  }

  # view survey publicly and complete survey
  public function view_survey(Survey $survey)
  {
  //  dd($survey);
    $survey->option_name = unserialize($survey->option_name);
    return view('survey.view', compact('survey'));
  }

  # view submitted answers from current logged in user
  public function view_survey_answers(Survey $survey)
  {    $id = $survey->id;
       $question = Question_survey::where('survey_id',$survey->id)->get();

      $q_checkbox = [];
      $q_radio = [];
      $q_radio_1 = [];
      $list_answer_radio = [];
      foreach ($question as $key => $value){
          if($value->question_type == 'checkbox'){
              foreach ($value->option_name as $key_op => $value_op){
                  $q_checkbox[] = $value_op;
              }
          }else if($value->question_type = 'radio'){
              $q_count_radio = [];
              $q_count_radio[] = ['name','value'];
              $q_radio_1[] = [];
              //$arr_radio = [];
              foreach ($value->option_name as $key_op => $value_op){
                 // $arr_radio[] = $value_op;
                  $q_radio[] = $value_op;
                  //$q_radio_1[] = $value_op;
              }

              foreach ($q_radio as $key => $value){
                  $q_count_radio[] = [$value,Answer_survey::where('survey_id',$survey->id)->where('answer',"\"$value\"")->count()];
              }
              $q_radio_1[] = $q_radio;
              $list_answer_radio[] = $q_count_radio;
              //$q_radio_1 = $q_radio;
              unset($q_count_radio);
              unset($q_radio);
          }

      }
     // dd($question);

      return view('answer.view1',compact('list_answer_radio','id','question'));

  }

  // TODO: Make sure user deleting survey
  // has authority to
  public function delete_survey(Survey $survey)
  {
    $survey->delete();
    return redirect('');
  }

}
