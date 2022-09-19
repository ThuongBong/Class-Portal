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
//        dd($classes);

        foreach ($classes as $class) {
            if ($class->get()) {
                foreach ($class->orderBy('created_at', 'desc')->get() as $classes) {
                    $class = $classes->get();
                    $class_info = $class[0]->name . ' ' . $class[0]->tittle . ' - ' . $class[0]->room . ' - ' . $class[0]->section;
                    $classes->type = 'assignment';
                    $classes->class_info = $class_info;
                    array_push($recent_activity, $classes);
                }
            }
        }

        if (count($recent_activity) > 0) {
            usort($recent_activity, function($a, $b) {
                if ($a->created_at == $b->created_at) {
                    return 0;
                }
                return ($a->created_at > $b->created_at) ? -1 : 1;
            });
        }

        $classCode = $request->input('classCode');


        if (Auth::user()->role == 'teacher'){
            return view('pages.teacher.home', [
                'recent_activity' => $recent_activity
            ]);
        } else {
            return view('pages.student.home',[
                'classCode' => $classCode
            ]);
        }
    }

    public function joinClass(Request $request)
    {
        $class = Classes::all();
        $classCode = $request->input('classCode');;

        if ($classCode != $class->class_code) {
            return redirect()->back()->with('error', 'Data does not exist');
        }

        $userId = Auth::user()->id;

        $classUser = Classes_User::where(['user_id' => $userId, 'class_id' => $classCode->id])->first();
        if (!$classUser) {
            $classUser = new Classes_User();
        }
        DB::beginTransaction();
        try {
            $classUser->user_id = $userId;
            $classUser->class_id = $classCode->id;
            $classUser->save();
            DB::commit();
            return redirect()->route('class.detail', $classCode->id)->with('success', 'Successfully added new');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while saving data');
        }
    }


}
