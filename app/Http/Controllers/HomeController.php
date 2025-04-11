<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = User::count();

       if (Auth::check()) {
            $userName = Auth::user()->name;
            $userRole = Auth::user()->role;
            $userImg = Auth::user()->img;

            Session::put('USERIMG', 'upload/images/' . $userImg);
            Session::put('USERNAME', $userName);
            Session::put('USERROLE', $userRole);
        }
        return view('admin.dashboard');
    }
}
