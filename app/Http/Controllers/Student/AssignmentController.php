<?php

namespace App\Http\Controllers\Student;

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
            ->where('subject_id',$id)
            ->join('subjects', function ($join) {
                $join->on('assignments.id', '=', 'subjects.id');
            })
            ->get();
        //dd($assignments);


        return view('pages.student.assignment.show',[
            'assignments' => $assignments
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

        return view('pages.student.assignment.show-details', compact('assignment', 'result'));
    }

}
