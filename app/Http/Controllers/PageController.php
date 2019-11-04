<?php

namespace App\Http\Controllers;
use App\User;
use Egulias\EmailValidator\Exception\AtextAfterCFWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $amountUser = User::all()->count();
        return view('web.index',compact('amountUser'));
    }

    public function createSession(Request $request){


        if(!Auth::check()){
            return redirect()->route('login')->with('NotLogin','Vui lòng đăng nhập trước khi tạo phiên hỏi đáp!');
        }

        
    }
}
