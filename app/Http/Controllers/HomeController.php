<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Classes;
use App\Models\classes_user;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index(Request $request)
    {
        $recent_activity = array();

        $classes = Auth::user()->classes()->get();

        /*$class1 = Classes::whereHas('users', function ($query){
            $query->where('user_id', '=', Auth::user()->id);
        });*/


        if (Auth::user()->role == 'teacher'){
            return view('pages.teacher.home', [
                'recent_activity' => $recent_activity,
                'classes' => $classes,
            ]);
        } else {
            return view('pages.student.home',[
                'classes' => $classes,
            ]);
        }
    }

}
