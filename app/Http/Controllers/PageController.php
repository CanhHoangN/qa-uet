<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Comment_in;
use App\Question;
use App\User;
use Egulias\EmailValidator\Exception\AtextAfterCFWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\surveys;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public static $arr = array();
    public function index()
    {
        $list_qa = array();
        session()->push('list',-1);
        $amountUser = User::all()->count();
        $allsurvey= surveys::all();
        return view('web.index',compact('amountUser', 'allsurvey'));
    }

    public function createSession(Request $request){


        if(!Auth::check()){
            return redirect()->route('login')->with('NotLogin','Vui lòng đăng nhập trước khi tạo phiên hỏi đáp!');
        }
        else{
            if(isset($request->password)){
                surveys::create([
                    'id_user'=>Auth::id(),
                    'name_survey'=>$request->name_survey,
                    'type_survey'=>$request->type_survey,
                    'description'=>$request->description,
                    'password'=>bcrypt($request->password),
                ]);
            }else{
                surveys::create([
                    'id_user'=>Auth::id(),
                    'name_survey'=>$request->name_survey,
                    'type_survey'=>$request->type_survey,
                    'description'=>$request->description,
                ]);
            }

            return redirect()->back();
        }


    }
    public function showSession($id){

        $survey = surveys::where("id_survey",$id)->get();
        $list_qa = Question::where('id_survey',$id)->get();
        return view("web.session",compact("survey",'id','list_qa'));


    }
    public function showCheckPass($id){
        return view('web.required');
    }
    public function addQaToSession(Request $request,$id){
        $id_user = Auth::id();
        $person = $request->post_person;
        $name = "";
        if($person == "on"){
            $name = "Hide";
        }else{
            $name = Auth::user()->name;
        }
        Question::create([
            'id_survey'=>$id,
            'id_user'=>$id_user,
            'whoposted'=>$name,
            'title_question'=>$request->title_question,
        ]);
        return redirect()->back();

    }
    public function requiredPassword(Request $request,$id){
        return view('web.required',compact('id'));
    }
    public function postRequiredPassword(Request $request,$id){

        $survey_password = surveys::where("id_survey",$id)->value('password');
        if(Hash::check($request->required_password,$survey_password)){
            self::$arr[] = $id;
            session()->push('list',$id);
           // Session::put('list_qa',$id);
            return redirect()->route("show_detail_session",$id);
        }else{
            return redirect()->back()->with('error_required_password',"Key không đúng !");
        }
    }
    public function showQuestion($id,$id_question){
        $survey = surveys::where("id_survey",$id)->get();
        $comments = Comment::where('id_question',$id_question)->get();
        $comments_in = Comment::where('id_question',$id_question)->get();
        return view('web.question_session',compact('survey','id_question','comments','comments_in'));
    }
    public function addCommentToQuestion(Request $request,$id_question){
        Comment::create([
           'id_question'=>$id_question,
           'id_user'=>Auth::id(),
           'content'=>$request->comment_question,
        ]);
        return redirect()->back();
    }
    public function addCommentToComment(Request $request,$id_question,$id_comment){
        Comment_in::create([
            'id_user'=>Auth::id(),
            'id_comment'=>$id_comment,
            'content'=>$request->comment_rep,
        ]);
        return redirect()->back();
    }
}
