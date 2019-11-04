<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $amountUser = User::all()->count();
        return view('web.index',compact('amountUser'));
    }
}
