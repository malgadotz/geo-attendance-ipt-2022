<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\StaffCourseController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AttedenceController;

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

// Route::get('/', [HomeController::class,'index']);

Auth::routes();

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
}); //Prevent Going back to previous login after logout
Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth']], function(){

    // Route::get('dashboard',[HomeController::class,'index'])->name('admin.dashboard');
   
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    // Route::get('admin',[AdminController::class,'index'])->name('admin.dashboard');

    // Route::get('studentstore',[AdminController::class,'studentstore'])->name('admin.studentstore');

 // PROGRAM 
    
    Route::get('program/view',[ProgramController::class,'view'])->name('admin.program.view');
    Route::get('program/add',[ProgramController::class,'add'])->name('admin.program.add');
    Route::post('program/store',[ProgramController::class,'store'])->name('admin.program.store');

    Route::get('program/delete/{id}',[ProgramController::class,'delete'])->name('admin.program.delete');
    Route::get('program/edit/{id}',[ProgramController::class,'edit'])->name('admin.program.edit');
    Route::post('program/edit/update',[ProgramController::class,'update'])->name('admin.program.update');
    
// COURSE
    Route::get('course/view',[CourseController::class,'view'])->name('admin.course.view');
    Route::get('course/add',[CourseController::class,'add'])->name('admin.course.add');
    Route::post('course/create',[CourseController::class,'create'])->name('admin.course.create');

    Route::get('course/delete/{id}',[CourseController::class,'delete'])->name('admin.course.delete');
    Route::get('course/edit/{id}',[CourseController::class,'edit'])->name('admin.course.edit');
    Route::post('course/edit/update',[CourseController::class,'update'])->name('admin.course.update');
    
// VENUE
    Route::get('venue/view',[VenueController::class,'view'])->name('admin.venue.view');
    Route::get('venue/add',[VenueController::class,'add'])->name('admin.venue.add');
    Route::post('venue/create',[VenueController::class,'create'])->name('admin.venue.create');

    Route::get('venue/delete/{id}',[VenueController::class,'delete'])->name('admin.venue.delete');
    Route::get('venue/edit/{id}',[VenueController::class,'edit'])->name('admin.venue.edit');
    Route::post('venue/edit/update',[VenueController::class,'update'])->name('admin.venue.update');
    
    Route::get('venue/location/{id}',[VenueController::class,'location'])->name('admin.venue.location');
    Route::post('venue/location/store',[VenueController::class,'locate'])->name('admin.venue.locate');
    


    // SESSION
Route::get('session/view',[SessionController::class,'view'])->name('admin.session.view');
Route::get('session/add',[SessionController::class,'add'])->name('admin.session.add');
Route::post('session/create',[SessionController::class,'create'])->name('admin.session.create');

Route::get('session/delete/{id}',[SessionController::class,'delete'])->name('admin.session.delete');
Route::get('session/edit/{id}',[SessionController::class,'edit'])->name('admin.session.edit');
Route::post('session/edit/update',[SessionController::class,'update'])->name('admin.session.update');

// STUDENT
Route::get('student/view',[StudentController::class,'view'])->name('admin.student.view');
Route::get('student/add',[StudentController::class,'add'])->name('admin.student.add');
Route::post('student/create',[StudentController::class,'store'])->name('admin.student.create');
Route::get('student/delete/{id}',[StudentController::class,'delete'])->name('admin.student.delete');
Route::get('student/edit/{id}',[StudentController::class,'edit'])->name('admin.student.edit');
Route::post('student/edit/update',[StudentController::class,'update'])->name('admin.student.update');
Route::post('student/importstudent',[StudentController::class,'importstudent'])->name('admin.student.import');
Route::get('student/import',[StudentController::class,'import'])->name('admin.student.imports');
Route::get('studentexport', [StudentController::class, 'exportstudent'])->name('exports');


// STUDENT COURSE
Route::get('studentcourse/view',[StudentCourseController::class,'view'])->name('admin.studentcourse.view');
Route::get('studentcourse/add',[StudentCourseController::class,'add'])->name('admin.studentcourse.add');
Route::post('studentcourse/create',[StudentCourseController::class,'create'])->name('admin.studentcourse.create');
Route::get('studentcourse/delete/{id}',[StudentCourseController::class,'delete'])->name('admin.studentcourse.delete');
Route::get('studentcourse/edit/{id}',[StudentCourseController::class,'edit'])->name('admin.studentcourse.edit');
Route::post('studentcourse/edit/update',[StudentCourseController::class,'update'])->name('admin.studentcourse.update');

Route::post('studentcourse/importcourse',[StudentCourseController::class,'importstudentcourse'])->name('admin.studentcourse.import');
Route::get('studentcourse/import',[StudentCourseController::class,'import'])->name('admin.studentcourse.imports');


// STAFF
Route::get('staff/view',[StaffController::class,'view'])->name('admin.staff.view');
Route::get('staff/add',[StaffController::class,'add'])->name('admin.staff.add');
Route::post('staff/make',[StaffController::class,'create'])->name('admin.staff.create');
Route::get('staff/delete/{id}',[StaffController::class,'delete'])->name('admin.staff.delete');
Route::get('staff/edit/{id}',[StaffController::class,'edit'])->name('admin.staff.edit');
Route::post('staff/edit/update',[StaffController::class,'update'])->name('admin.staff.update');


// STAFF IMPORT/EXPORT
Route::post('staff/importstaff',[StaffController::class,'importstaff'])->name('admin.staff.import');
Route::get('staff/import',[StaffController::class,'import'])->name('admin.staff.imports');
Route::get('staffexport', [StaffController::class, 'exportstaff'])->name('exports');



// STAFF COURSE
Route::get('staffcourse/view',[StaffCourseController::class,'view'])->name('admin.staffcourse.view');
Route::get('staffcourse/add',[StaffCourseController::class,'add'])->name('admin.staffcourse.add');
Route::post('staffcourse/create',[StaffCourseController::class,'create'])->name('admin.staffcourse.create');
Route::post('staffcourse/importcourse',[StaffCourseController::class,'importstaffcourse'])->name('admin.staffcourse.import');
Route::get('staffcourse/import',[StaffCourseController::class,'import'])->name('admin.staffcourse.imports');
Route::get('staffcourse/export', [StaffCourseController::class, 'exportstaffcourse'])->name('exports');

Route::get('staffcourse/delete/{id}',[StaffCourseController::class,'delete'])->name('admin.staffcourse.delete');
Route::get('staffcourse/edit/{id}',[StaffCourseController::class,'edit'])->name('admin.staffcourse.edit');
Route::post('staffcourse/edit/update',[StaffCourseController::class,'update'])->name('admin.staffcourse.update');


// ATTENDENCE
Route::get('attendence/view',[AttedenceController::class,'view'])->name('admin.attendence.view');
Route::get('attendence/add',[AttedenceController::class,'add'])->name('admin.attendence.add');
Route::post('attendence/create',[AttedenceController::class,'store'])->name('admin.attendence.create');


    // Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');

}
);
Route::group(['prefix'=>'staff', 'middleware'=>['isStaff','auth']], function(){
    // Route::get('dashboard',[HomeController::class,'index'])->name('staff.dashboard');
    Route::get('dashboard',[StaffController::class,'index'])->name('staff.dashboard');

}
);
Route::group(['prefix'=>'student', 'middleware'=>['isStudent','auth']], function(){
    // Route::get('dashboard',[HomeController::class,'index'])->name('student.dashboard');
    Route::get('dashboard',[StudentController::class,'index'])->name('student.dashboard');

    Route::get('program/view',[ProgramController::class,'view'])->name('admin.program.view');
    Route::get('program/add',[ProgramController::class,'add'])->name('admin.program.add');
    Route::post('program/store',[ProgramController::class,'store'])->name('admin.program.store');
// COURSE
    Route::get('course/view',[CourseController::class,'view'])->name('admin.course.view');
    Route::get('course/add',[CourseController::class,'add'])->name('admin.course.add');
    Route::post('course/create',[CourseController::class,'create'])->name('admin.course.create');
// VENUE
    Route::get('venue/view',[VenueController::class,'view'])->name('admin.venue.view');
    Route::get('venue/add',[VenueController::class,'add'])->name('admin.venue.add');
    Route::post('venue/create',[VenueController::class,'create'])->name('admin.venue.create');
// SESSION
Route::get('session/view',[SessionController::class,'view'])->name('admin.session.view');
Route::get('session/add',[SessionController::class,'add'])->name('admin.session.add');
Route::post('session/create',[SessionController::class,'create'])->name('admin.session.create');
// STUDENT
Route::get('student/view',[StudentController::class,'view'])->name('student.student.view');
Route::get('student/add',[StudentController::class,'add'])->name('student.student.add');
Route::post('student/create',[StudentController::class,'store'])->name('student.student.create');


// ATTENDENCE
Route::get('attendence/view',[AttedenceController::class,'view'])->name('admin.attendence.view');
Route::get('attendence/add',[AttedenceController::class,'add'])->name('admin.attendence.add');
Route::post('attendence/create',[AttedenceController::class,'store'])->name('admin.attendence.create');


}
);

// Route::get('student',[HomeController::class,'index'])->name('student.dashboard');
// Route::get('home',[HomeController::class,'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']
)->name('home');
// Route::get('studentexport', [App\Http\Controllers\StudentController::class, 'exportstudent'])->name('exports');
// Route::get('/admin', [AdminController::class, 'index'])->name('admin');
// Route::get('/staff', [StaffController::class, 'index'])->name('staff');
// Route::get('/student', [StudentController::class, 'index'])->name('student');
