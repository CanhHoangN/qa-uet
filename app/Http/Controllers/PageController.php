<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Comment_in;
use App\Like_question;
use App\Question;
use App\User;
use Egulias\EmailValidator\Exception\AtextAfterCFWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Session_qa;
use Illuminate\Support\Facades\DB;
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
        $allsession= Session_qa::all();
        return view('web.index',compact('amountUser', 'allsession'));
    }
    public function showSessionUnQuestion(){
        $amountUser = User::all()->count();
        $allsession = DB::table('sessions')
            ->whereNotExists(function ($query) {
                $query->select('*')
                    ->from('questions')
                    ->whereRaw('sessions.id_session = questions.id_session');
            })
            ->get();

        return view('web.index',compact('amountUser', 'allsession'));
    }
    public function createSession(Request $request){


        if(!Auth::check()){
            return redirect()->route('login')->with('NotLogin','Vui lòng đăng nhập trước khi tạo phiên hỏi đáp!');
        }
        else{
            if(isset($request->password)){
                Session_qa::create([
                    'id_user'=>Auth::id(),
                    'name_session'=>$request->name_session,
                    'type_session'=>$request->type_session,
                    'description'=>$request->description,
                    'password'=>bcrypt($request->password),
                    'expired_at'=>$request->time_session,
                ]);
            }else{
                Session_qa::create([
                    'id_user'=>Auth::id(),
                    'name_session'=>$request->name_session,
                    'type_session'=>$request->type_session,
                    'description'=>$request->description,
                    'expired_at'=>$request->time_session,
                ]);
            }

            return redirect()->back();
        }


    }
    public function showSession($id){

        $session = Session_qa::where("id_session",$id)->get();
        $list_qa = Question::where('id_session',$id)->get();
        $name = "";
        $quantity_question = 0;
        return view("web.session",compact("session",'id','list_qa','name','quantity_question'));


    }
    public function showCheckPass($id){
        return view('web.required');
    }
    public function addQaToSession(Request $request,$id){
        if(!Auth::check()){
            return redirect()->route('login')->with('NotLogin_question','Vui lòng đăng nhập trước khi đặt câu hỏi!');
        }else{
            $id_user = Auth::id();
            $person = $request->post_person;
            $name = "";
            if($person == "on"){
                $name = "Hide";
            }else{
                $name = Auth::user()->name;
            }
            Question::create([
                'id_session'=>$id,
                'id_user'=>$id_user,
                'whoposted'=>$name,
                'title_question'=>$request->title_question,
            ]);
            return redirect()->back();
        }


    }
    public function requiredPassword(Request $request,$id){
        return view('web.required',compact('id'));
    }
    public function postRequiredPassword(Request $request,$id){

        $session_password = Session_qa::where("id_session",$id)->value('password');
        if(Hash::check($request->required_password,$session_password)){
            self::$arr[] = $id;
            session()->push('list',$id);
           // Session::put('list_qa',$id);
            return redirect()->route("show_detail_session",$id);
        }else{
            return redirect()->back()->with('error_required_password',"Key không đúng !");
        }
    }
    public function showQuestion($id,$id_question){
        $session = Session_qa::where("id_session",$id)->get();
        $comments = Comment::where('id_question',$id_question)->get();
        $comments_in = Comment::where('id_question',$id_question)->get();
        $like = Like_question::where('id_question',$id_question)->get();
        $question = Question::where('id_question',$id_question)->get();
        //dd($like[0]->id_user);
        return view('web.question_session',compact('session','id_question','comments','comments_in','like','question'));
    }
    public function addCommentToQuestion(Request $request,$id_question){
        if(!Auth::check()){
            return redirect()->route('login')->with('NotLogin_comment','Vui lòng đăng nhập trước khi tạo nhận xét!');
        }else{
            Comment::create([
                'id_question'=>$id_question,
                'id_user'=>Auth::id(),
                'content'=>$request->comment_question,
            ]);
            return redirect()->back();
        }

    }
    public function addCommentToComment(Request $request,$id_question,$id_comment){
        if(!Auth::check()){
            return redirect()->route('login')->with('NotLogin_comment','Vui lòng đăng nhập trước khi tạo nhận xét!');
        }else
        {
            Comment_in::create([
                'id_user'=>Auth::id(),
                'id_comment'=>$id_comment,
                'content'=>$request->comment_rep,
            ]);
            return redirect()->back();
        }

    }
    public function likeQuestion($id_question){
        Like_question::create([
            'id_question'=>$id_question,
            'id_user'=>Auth::id(),
            'name_user'=>Auth::user()->name,
        ]);
        return redirect()->back();
    }
    public function unlikeQuestion($id_question){
        $like = Like_question::where('id_question',$id_question)->where('id_user',Auth::id());
        $like->delete();

        return redirect()->back();
    }
}
