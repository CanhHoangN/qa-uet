<?php

namespace App\Http\Controllers;
use App\User;
use Egulias\EmailValidator\Exception\AtextAfterCFWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\surveys;

class PageController extends Controller
{
    public function index()
    {
        $amountUser = User::all()->count();
        $allsurvey= surveys::all();
        return view('web.index',compact('amountUser', 'allsurvey'));
    }

    public function createSession(Request $request){


        if(!Auth::check()){
            return redirect()->route('login')->with('NotLogin','Vui lòng đăng nhập trước khi tạo phiên hỏi đáp!');
        }
        else{

            surveys::create([
                'id_user'=>Auth::id(),
                'name_survey'=>$request->name_survey,
                'type_survey'=>$request->type_survey,
                'description'=>$request->description,
                'password'=>encrypt($request->password),
            ]);
           /* $data= ['name'=> $request->name_survey, 'type'=>$request->type_survey,'des'=>$request->description];
            $survey = new surveys();
            $survey->id_user="123";
            $survey->name_survey=$data['name'];
            $survey->type_survey=$data['type'];
            $survey->description=$data['des'];
            $survey->save();*/
            return redirect()->back();
        }


    }
    public function session(Request $req,$id){
        return view("web.session");
    }
}
