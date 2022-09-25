<?php

namespace App\Http\Controllers\Student;

use App\Models\Classes;
use App\Models\Classes_Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;
use App\Models\Subject;
use App\Models\Result;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    public function __construct()
    {
        view()->share([]);
    }

    public function show($id){
        $assignments = DB::table('assignments')
            ->join('subjects', function ($join) {
                $join->on('assignments.subject_id', '=', 'subjects.id');
            })
            ->join('classes','assignments.class_id','=','classes.id')
            ->select('assignments.*', 'subjects.name', 'subjects.description as subjectDescription')
            ->select('assignments.*', 'classes.name as className', 'classes.title as classTitle', 'classes.room as classRoom')
            ->where('subject_id',$id)
            ->get();
        dd($assignments);
        $subject = Subject::find($id);

        return view('pages.student.assignment.show',[
            'assignments' => $assignments,
            'subject' => $subject,

        ]);
    }

    public function showAll()
    {
        $userId = Auth::user()->id;
        $classIds = DB::table('classes_users')->where('user_id', $userId)->pluck('class_id');
        $subjectIds = DB::table('classes_subjects')->whereIn('class_id', $classIds)->pluck('subject_id');
        $assignments = Assignment::with('subject')
            ->whereIn('subject_id', $subjectIds)
            ->orderByDesc('id')
            ->paginate(NUMBER_PAGINATION);
        return view('pages.student.assignment.show_all', compact('assignments'));
    }

    public function detail($id)
    {
        $assignment = Assignment::find($id);

        if (!$assignment) {
            return redirect()->back()->with('error', 'Data does not exist');
        }

        $userId = Auth::user()->id;
        $result = Result::where(['user_id' => $userId, 'assignment_id' => $id])->first();
//        dd($result);

        //dd($assignment);

        return view('pages.student.assignment.show-details', compact('assignment', 'result'));
    }

}
