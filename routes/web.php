<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

try
{
    DB::connection()->getPdo();
    $connection = true;
}
catch(\Exception $e)
{
    $connection = false;

    Route::get('app/install/db', 'AppInstallController@dbSetupForm')->name('db.setup.form');
    Route::post('app/install/db', 'AppInstallController@dbSetup')->name('db.setup');
    
    Route::get('/', function(){
        return redirect('app/install/db');
    });
}


if($connection)
{
    include "route-functions.php";

    Route::group(
    [
      'middleware'=> 'website'
    ],
    
    function(){

        Route::get('/apply-online', 'PublicController@apply')->name('apply.online');
        Route::get('/courses', 'PublicController@courses')->name('public.courses');
        Route::get('/contact-us', 'PublicController@contact')->name('public.contact');
        Route::get('/course/{slug}', 'PublicController@courseSingle')->name('course.single');
        
        //Student Login
        Route::get('/login/student', 'Student\StudentLoginController@studentLogin')->name('student.login');
        Route::post('/login/student', 'Student\StudentLoginController@authLogin')->name('student.login');
        
        
        //Student
    
        // Route::get('/forgot/pwd/student', 'StudentController@forgotPwd')->name('student.forgot');
    
        Route::group([
            'prefix' => 'student',
            'namespace' => 'Student',
            'middleware' => 'studentAuth'
        ],function(){
            Route::get('/profile', 'StudentController@profile')->name('student.profile');
            Route::get('/recent-course', 'StudentController@recentCourse')->name('recent.course');
            Route::get('/content/{id}/view', 'StudentController@contentView')->name('content.view');
        });
    
    
    
    
        Route::get('application-form', 'ApplicationController@registrationForm')->name('application.form');
    
        Route::get('course&admission-info', function(){
            return view('course-info');
        })->name('course.info');
    
    
        Route::post('submit-application', 'ApplicationController@add_register')->name('add.register');
    
        Route::get('verify-application-by-phone-number/{id}', 'ApplicationController@verify_application')
            ->name('verify.registration');
    
        Route::put('verify-application', 'ApplicationController@verify_register')->name('verify.register');
    
        Route::get('successfully-registered/{phone}', 'ApplicationController@successfully_registered')->name('success.register');
    });

    Route::redirect('home', 'manage');

    // Include all admin routes 
    include "route-admin.php";

    Route::get('/user/{token}/activation', 'PublicController@userActivation')->name('active.user');
    Route::post('/user/{token}/activation', 'PublicController@userActivate')->name('active.user');


    Route::get('/{slug}', 'PublicController@defaultPage')->name('default.page');


}
    
