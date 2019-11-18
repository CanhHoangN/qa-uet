<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Comment_in;
use App\Like_question;
use App\Question;
use App\Survey;
use App\User;
use Egulias\EmailValidator\Exception\AtextAfterCFWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Session_qa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Events\FormSubmitted;

class PageController extends Controller
{
    public static $arr = array();
    public function index()
    {
        $list_qa = array();
        session()->push('list', -1);
        $allsession= Session_qa::orderBy('id_session','DESC')->get();
        /* $type_sessions = DB::table('sessions')
            ->select('type_session', DB::raw('count(*) as total'))
            ->groupBy('type_session')->get();*

        $amountUser = User::all()->count();


        $count_session = $allsession->count();*/
        //dd($question);
        $hotsessions=DB::table('sessions')
            ->join('questions', 'sessions.id_session', '=', 'questions.id_session')
            ->select('sessions.id_session as id', 'sessions.name_session as name_session', DB::raw("count(*) as count"))
            ->groupBy('sessions.id_session')
            ->limit(5);

        return view('web.index', compact('allsession', 'hotsessions'));
    }
    public function showSessionUnQuestion()
    {
        $amountUser = User::all()->count();
        $type_sessions = DB::table('sessions')
            ->select('type_session', DB::raw('count(*) as total'))
            ->groupBy('type_session')->get();
        $allsession = DB::table('sessions')
            ->whereNotExists(function ($query) {
                $query->select('*')
                    ->from('questions')
                    ->whereRaw('sessions.id_session = questions.id_session');
            })
            ->get();
        $hotsessions=DB::table('sessions')
            ->join('questions', 'sessions.id_session', '=', 'questions.id_session')
            ->select('sessions.id_session as id', 'sessions.name_session as name_session', DB::raw("count(*) as count"))
            ->groupBy('sessions.id_session')
            ->orderBy('count')
            ->limit(5);

        return view('web.index', compact('amountUser', 'allsession', 'type_sessions', 'hotsessions'));
    }
    public function createSession(Request $request)
    {


        if (!Auth::check()) {
            return redirect()->route('login')->with('NotLogin', 'Vui lòng đăng nhập trước khi tạo phiên hỏi đáp!');
        } else {
            if (isset($request->password)) {
                Session_qa::create([
                    'id_user' => Auth::id(),
                    'name_session' => $request->name_session,
                    'type_session' => $request->type_session,
                    'description' => $request->description,
                    'password' => bcrypt($request->password),
                    'expired_at' => $request->time_session,
                ]);
            } else {
                Session_qa::create([
                    'id_user' => Auth::id(),
                    'name_session' => $request->name_session,
                    'type_session' => $request->type_session,
                    'description' => $request->description,
                    'expired_at' => $request->time_session,
                ]);
            }

            return redirect()->back();
        }
    }
    public function showSession($id)
    {

        $session = Session_qa::where("id_session", $id)->get();
        $list_qa = Question::where('id_session', $id)->get();
        $count_view = Session_qa::where("id_session", $id)->pluck('count_views')->first();
        $count_view = (int) $count_view + 1;
        Session_qa::where('id_session', $id)->update(array(
            'count_views' => $count_view,
        ));
        $name = "";
        $quantity_question = 0;
        return view("web.session", compact("session", 'id', 'list_qa', 'name', 'quantity_question'));
    }
    public function showCheckPass($id)
    {
        return view('web.required');
    }
    public function addQaToSession(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('NotLogin_question', 'Vui lòng đăng nhập trước khi đặt câu hỏi!');
        } else {
            $id_user = Auth::id();
            $person = $request->post_person;
            $name = "";
            if ($person == "on") {
                $name = "Hide";
            } else {
                $name = Auth::user()->name;
            }
            Question::create([
                'id_session' => $id,
                'id_user' => $id_user,
                'whoposted' => $name,
                'title_question' => $request->title_question,
            ]);
            return redirect()->back();
        }
    }
    public function requiredPassword(Request $request, $id)
    {
        return view('web.required', compact('id'));
    }
    public function postRequiredPassword(Request $request, $id)
    {

        $session_password = Session_qa::where("id_session", $id)->value('password');
        if (Hash::check($request->required_password, $session_password)) {
            self::$arr[] = $id;
            session()->push('list', $id);
            // Session::put('list_qa',$id);
            return redirect()->route("show_detail_session", $id);
        } else {
            return redirect()->back()->with('error_required_password', "Key không đúng !");
        }
    }
    public function showQuestion($id, $id_question)
    {
        $session = Session_qa::where("id_session", $id)->get();
        $comments = Comment::where('id_question', $id_question)->get();
        $comments_in = Comment::where('id_question', $id_question)->get();
        $like = Like_question::where('id_question', $id_question)->get();
        $question = Question::where('id_question', $id_question)->get();
        //dd($like[0]->id_user);
        return view('web.question_session', compact('session', 'id_question', 'comments', 'comments_in', 'like', 'question'));
    }
    public function addCommentToQuestion(Request $request, $id_question)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('NotLogin_comment', 'Vui lòng đăng nhập trước khi tạo nhận xét!');
        } else {
            Comment::create([
                'id_question' => $id_question,
                'id_user' => Auth::id(),
                'content' => $request->comment_question,
            ]);

            $text = request()->comment_question;
            event(new FormSubmitted($text));
            return redirect()->back();
        }
    }
    public function addCommentToComment(Request $request, $id_question, $id_comment)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('NotLogin_comment', 'Vui lòng đăng nhập trước khi tạo nhận xét!');
        } else {
            Comment_in::create([
                'id_user' => Auth::id(),
                'id_comment' => $id_comment,
                'content' => $request->comment_rep,
            ]);
            return redirect()->back();
        }
    }
    public function likeQuestion($id_question)
    {
        Like_question::create([
            'id_question' => $id_question,
            'id_user' => Auth::id(),
            'name_user' => Auth::user()->name,
        ]);
        return redirect()->back();
    }
    public function unlikeQuestion($id_question)
    {
        $like = Like_question::where('id_question', $id_question)->where('id_user', Auth::id());
        $like->delete();

        return redirect()->back();
    }
    public function profileUser($id)
    {

        $allsession = Session_qa::where('id_user', $id)->get();
        $user = User::where('id', $id)->get();

        return view('web.user_profile', compact('allsession', 'user','id'));
    }
    public function deleteSession($id_session)
    {
        Session_qa::where('id_session', $id_session)->delete();

        return redirect()->back()->with('delete', 'Xoá thành công!');
    }
    public function profileSurvey($id){
        // = Session_qa::where('id_user', $id)->get();
        $allsurvey = Survey::where('user_id',$id)->get();

       // $user = User::where('id', $id)->get();
        return view('web.user_profile_survey', compact('allsurvey','id'));
    }
    public function tagName($tag_name){

        $allsession = Session_qa::where('type_session',$tag_name)->get();
       // dd($allsession);
        return view('web.tag_name',compact('allsession'));
    }
    public function editSession(Request $request,$id){
        $edit = [];
        if(isset($request->title_edit) &&  isset($request->desc_edit)){
            $edit = ['name_session'=>$request->title_edit,'description'=>$request->desc_edit];
        }else if(!isset($request->title_edit) &&  isset($request->desc_edit)){
            $edit = ['description'=>$request->desc_edit];
        }else{
            $edit = ['name_session'=>$request->title_edit];
        }

        Session_qa::where('id_session',$id)->update($edit);
        return redirect()->back();
    }
}
