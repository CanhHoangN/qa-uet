<?php

namespace App\Http\Middleware;

use App\Session_qa;
use App\surveys;
use Closure;
use Illuminate\Support\Facades\Session;

class requiredPasswordQa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $id = $request->route('id');
        $pass = Session_qa::where('id_session',$id)->value('password');
        $accept = Session::get('list');

        if(!empty($pass)){
            if(in_array($id,$accept)){
                return $next($request);
            }else{
                return response()->view('web.required',compact('id')); //\Redirect::route('check_pass',$id)->with('id',$id);
            }
        }else{
            return $next($request);
        }


    }
    public function terminate($request, $response)
    {
        // Store the session data...
       // $id = $request->route('id');
       // return redirect()->route("show_detail_session",$id);
    }
}
