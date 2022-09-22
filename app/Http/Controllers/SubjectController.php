<?php

namespace App\Http\Controllers;

use App\Models\Classes_Subject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Specify the middleware for this controller
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAll()
    {
        $userId = Auth::user()->id;
        $subjects =  DB::table('subjects')
            ->join('classes_subjects','subjects.id','=','classes_subjects.subject_id')
            ->join('classes_users', 'classes_subjects.class_id','=','classes_users.class_id')
            ->join('classes', 'classes_subjects.class_id','=','classes.id')
            ->where('classes_users.user_id',$userId)
            ->select('subjects.*', 'classes.name as className', 'classes.id as classId')
            ->get();

        return view('pages.student.subject.show_all', compact('subjects'));
    }

    public function show($id)
    {
        $subject = Subject::find($id);
        $instructor = $subject->users()->where('role', 'teacher')->first();

        $assignments = $subject->assignments()->orderBy('due_date', 'desc')->get();

        // Grab all the recent activity, which includes
        // assignments and annoucement, then sort date that
        // it was created
        $recent_activity = array();

        return view('pages.teacher.subject.show', [
            'subject' => $subject,
            'instructor' => $instructor,
            'subject_id' => $id,
            'assignments' => $assignments,
            'recent_activity' => $recent_activity
        ]);
    }

    /**
     * Show a form to create a new class - GET
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('pages.teacher.subject.create', [
            'subjects'=>$subjects
        ]);
    }

    /**
     * Save a newly created class - POST
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255|nullable',   // Roadmap To Computing
        ]);

//        $class_id = Auth::user()->classes()->id;

        $subject = new Subject;
        $class_subject = new Classes_Subject();
        $subject->name = $request->input('name');
        $subject->description = $request->input('description');

        if ($subject->save()) {
            // Insert information into the pivot table for users and classes
//            $class_subject->classes_id =$class_id;
//            $class_subject->subject_id=$subject->id;
//            $class_subject->save();
            return redirect('/class/create')->with('success', 'Subject added successfully!');
        }
    }

    /**
     * Update the class' information [PUT]
     */
    public function update(Subject $subject, Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255|nullable',   // Roadmap To Computing
        ]);

        $subject = Subject::find($id);
        $subject->name = $request->input('name');
        $subject->description = $request->input('description');

        if ($subject->save()) {
            return redirect('/subject/' . $id)->with('success', 'Subject updated successfully!');
        }
    }

    /**
     * Delete a particular class - DELETE
     */
    public function destroy(Subject $subject, $id)
    {
        if (Subject::destroy($id)) {
            return redirect('/home')->with('success', 'Subject deleted successfully!');
        }
    }
}
