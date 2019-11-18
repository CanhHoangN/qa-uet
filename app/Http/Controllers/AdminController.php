<?php

namespace App\Http\Controllers;

use App\Answer_survey;
use App\Comment;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Session_qa;
use App\Survey;


use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'permission' => 'admin'])) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/admin')->with('flash_message_error', 'Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }
    public function dashboard()
    {
        $totalUsers = User::where('permission', '!=', 'admin')->count();
        $totalSessions = Session_qa::count();
        $totalSurveys = Survey::count();
        $totalQuestions = Question::count();
        $totalComments = Comment::count();
        $totalAnswers = Answer_survey::count();
        return view('admin.dashboard', compact('totalUsers', 'totalSessions', 'totalSurveys', 'totalQuestions', 'totalComments', 'totalAnswers'));
    }
    public function logout()
    {
        Session::flush();
        return redirect('/admin/logut')->with('flash_message_success', 'Logged out Successfully');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function checkPassword(Request $request)
    {
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['permission' => 'admin'])->first();
        if (Hash::check($current_password, $check_password->password)) {
            echo "true";
            die;
        } else {
            echo "false";
            die;
        }
    }

    public function updatePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if (Hash::check($current_password, $check_password->password)) {
                $password = bcrypt($data['new_pwd']);
                User::where('permission', 'admin')->update(['password' => $password]);
                return redirect('/admin/settings')->with('flash_message_success', 'Password update Successfully!');
            } else {
                return redirect('/admin/settings')->with('flash_message_error', 'Incorrect Current Password!');
            }
        }
    }
    public function getSessions()
    {
        $sessions = Session_qa::all();
        
        return view('admin.sessions', compact('sessions'));
    }
    public function deleteSession($id)
    {
        $session = Session_qa::find($id);
        $session->delete();
        return redirect('admin/sessions')->with('flash_message_success', 'Delete Session Successfully!');
    }
    public function getSurveys()
    {
        $surveys = Survey::all();
        
        return view('admin.surveys', compact('surveys'));
    }
    public function deleteSurvey($id)
    {
        $survey = Survey::find($id);
        $survey->delete();
        return redirect('admin/surveys')->with('flash_message_success', 'Delete Survey Successfully!');
    }

    public function customers()
    {
        $customers = User::orderBy('permission', 'DESC')->paginate(50);
        $total = User::count();
        return view('admin.listCustomers', compact('customers', 'total'));
    }
    public function listCustomer(Request $request)
    {
        $data = $request->all();
        $name = $data['cName'];

        $customers = User::where('name', 'LIKE', '%' . $name . '%')
            ->paginate(50);
        $total = User::where('name', 'LIKE', '%' . $name . '%')
            ->count();
        return view('admin.listCustomers', compact('customers', 'total'));
    }

    public function deleteCustomer($id)
    {
        $customer = User::find($id);
        $customer->delete();
        return redirect('admin/customers')->with('flash_message_success', 'Delete User Successfully!');
    }

    public function addAdmin($id)
    {
        $customer = User::find($id);
        if ($customer->permission != "admin") {
            $customer->permission = "admin";
            $customer->save();
            return redirect('admin/customers')->with('flash_message_success', 'Change Admin Successfully!');
        } else {
            return redirect('admin/customers')->with('flash_message_error', 'Change Admin failure!');
        }
    }
    public function addChutoa($id)
    {
        $customer = User::find($id);
        if ($customer->permission != "chutoa") {
            $customer->permission = "chutoa";
            $customer->save();
            return redirect('admin/customers')->with('flash_message_success', 'Change chu toa  Successfully!');
        } else {
            return redirect('admin/customers')->with('flash_message_error', 'Change chu toa failure!');
        }
    }
    public function addThanhvien($id)
    {
        $customer = User::find($id);
        if ($customer->permission != "thanhvien") {
            $customer->permission = "thanhvien";
            $customer->save();
            return redirect('admin/customers')->with('flash_message_success', 'Change thanh vien Successfully!');
        } else {
            return redirect('admin/customers')->with('flash_message_error', 'Change thanh vien failure!');
        }
    }
    // ok

    

}
