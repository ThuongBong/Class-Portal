<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/', function () {
    if (Auth::guest()) {
        return view('index');
    } else {
        return redirect('/home');
    }
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

//join home student
Route::get('/join/class/{classCode?}', [ClassController::class, 'joinClass'])->name('join.class');

Route::get('/about-us', function (){
    return view('pages.about');
});
Route::get('/terms', function (){
    return view('pages.terms');
});

// User Routes
Route::get('/profile', [UserController::class, 'show']);
Route::post('/profile/update', [UserController::class, 'update']);
Route::get('/profile/{user_id}', [UserController::class, 'show']);
Route::get('/class/{class_id}/students', [UserController::class, 'showAll']);

// Class Routes
Route::get('/class/create', [ClassController::class, 'create']);
Route::get('/class/{id}', [ClassController::class, 'show'])->name('class.detail');
Route::post('/class', [ClassController::class, 'store']);
Route::put('/class/{id}', [ClassController::class, 'update']);
Route::delete('/class/{id}', [ClassController::class, 'destroy']);
Route::post('/class/{class_id}/student', [ClassController::class, 'addStudents']);
Route::post('/subject/save/', [ClassController::class, 'saveSubject']);
Route::post('/subject/new/save', [ClassController::class, 'saveNewSubject']);

Route::get('/remove/student/class/{id}', [ClassController::class, 'removeStudent'])->name('remove.student.class');

Route::get('/delete/{id}','ClassController@delete')->name('user.delete');

Route::post('/url/',[ClassController::class,'urlLink']);

// Subjects Routes
Route::get('/subject/create', [SubjectController::class, 'create']);
Route::get('/subject/{id}', [SubjectController::class, 'show']);
Route::post('/subject', [SubjectController::class, 'store']);
Route::put('/subject/{id}', [SubjectController::class, 'update']);
Route::delete('/subject/{id}', [SubjectController::class, 'destroy']);

Route::get('/subjects/showAll', [SubjectController::class, 'showAll'])->name('student.subjects.show_all');

// Assignment Routes
Route::post('/subject/{id}/assignment', [AssignmentController::class, 'store']);
Route::get('/subject/{subject_id}/assignment/{assignment_id}', [AssignmentController::class, 'show']);
Route::delete('/subject/{subject_id}/assignment/{assignment_id}', [AssignmentController::class, 'destroy']);
Route::put('/subject/{subject_id}/assignment/{assignment_id}', [AssignmentController::class, 'update']);

// Message Routes
Route::post('/user/{user_id}/message', [MessageController::class, 'store']);
Route::delete('/message/{message_id}', [MessageController::class, 'destroy']);
Route::get('/message/', [MessageController::class, 'show']);


Route::group(['prefix' => 'teacher/assignments', 'namespace' => 'Teacher'], function(){
    Route::get('/', 'AssignmentController@index')->name('teacher.assignment.index');
    Route::get('/create','AssignmentController@create')->name('teacher.assignment.create');
    Route::post('/create','AssignmentController@store');

    Route::get('/update/{id}','AssignmentController@edit')->name('teacher.assignment.update');
    Route::post('/update/{id}','AssignmentController@update');

    Route::get('/delete/{id}','AssignmentController@delete')->name('teacher.assignment.delete');

    Route::post('/get/subject/by/class','AssignmentController@getsSubjectByClass')->name('get.subject.by.class');

    Route::get('/answers/{id}', 'AssignmentController@answers')->name('teacher.assignment.answers');

    Route::get('/get/detail/answer/{id}','AssignmentController@detailAnswer')->name('get.detail.answer');
    Route::post('/update/mark/answer/{id}','AssignmentController@updateMark')->name('update.mark.answer');
});

Route::group(['prefix' => 'student/assignments', 'namespace' => 'Student'], function(){
    Route::get('/', 'AssignmentController@show')->name('student.assignment.show');
    Route::get('/showAll', 'AssignmentController@showAll')->name('student.assignment.show_all');
    Route::get('/detail/{id}', 'AssignmentController@detail')->name('student.assignment.show-details');
});

Route::post('/result/{id}',[ResultController::class, 'sendResult'])->name('student.assignment.result');

Route::post('/Issues', [IssueController::class, 'store']);

