<?php


use App\User;
use Illuminate\Support\Facades\Schema;

if (Schema::hasTable('users')) {

    $user = User::all();
}
else
{
    $user = [];
}

if (count($user)) {

    Route::group([
        'namespace' => 'Admin',
        'prefix' => 'manage',
        'middleware' => 'auth'
    ], function(){


        Route::get('/', 'AdminController@index')->name('home');

        Route::group([
            'middleware' => 'permission:Admit Student'
        ], function(){
            Route::get('new/admission', 'ApplicantsController@newAdmission')->name('new.admission');
            Route::post('new/admission', 'ApplicantsController@registerNewAdmission')->name('store.admission');
        });

        Route::get('student/{id}/demo-receipt', 'ApplicantsController@demoReceipt');

        Route::group([
            'middleware' => 'permission:View Applicants|Admit Student|Update Student|Delete Student|Update Payment'
        ], function(){
            Route::get('verified/applicants', 'ApplicantsController@verifiedApplicants')->name('verified.applicants');
            Route::get('unverified/applicants', 'ApplicantsController@unverifiedApplicants')->name('unverified.applicants');
            Route::get('applicants/{id}/detailes', 'ApplicantsController@detailesApplicants')->name('detailes.applicants');
        });
        Route::group([
            'middleware' => 'permission:View Student|Admit Student|Update Student|Delete Student|Update Payment'
        ], function () {
            Route::get('students', 'ApplicantsController@allStudents')->name('all.students');
            Route::get('filter/students', 'ApplicantsController@filterStudents')->name('filter.students');
            Route::get('search/students', 'ApplicantsController@SearchStudents')->name('search.students');
            Route::get('student/{id}/detailes', 'ApplicantsController@detailesStudent')->name('detailes.student');
            Route::get('student/{id}/receipt', 'ApplicantsController@receiptStudent')->name('receipt.student');
        });

        Route::group([
            'middleware' => 'permission:Admit Student|Update Student|Delete Student|Update Payment'
        ], function () {
            Route::get('student/{id}/delete', 'ApplicantsController@deleteStudent')->name('delete.student');
            Route::post('applicants/{id}/detailes', 'ApplicantsController@admitApplicants')->name('admit.applicant');

            Route::post('student/{id}/payment', 'PaymentController@updatePayment')->name('payment.student');
            Route::post('student/{id}/discount', 'PaymentController@makeDiscount')->name('make.discount');
        });

        Route::get('student/payments', 'PaymentController@paymentRecords')->name('payment.records');


        //BATCH
        Route::group([
            'middleware' => 'permission:View Batch|Create Schedule|Update Schedule|Delete Schedule|Create Batch|Update Batch|Delete Batch'
        ], function () {
            Route::get('batch', 'BatchController@index')->name('batch.index');
        });

        Route::group([
            'middleware' => 'permission:Create Schedule|Update Schedule|Delete Schedule|Create Batch|Update Batch|Delete Batch'
        ], function () {
            Route::post('batch', 'BatchController@store')->name('batch.store');
            Route::get('batch/{id}/edit', 'BatchController@view')->name('batch.view');
            Route::post('batch/{id}/edit', 'BatchController@update')->name('batch.update');
            Route::get('batch/{id}/start', 'BatchController@start')->name('start.batch');
            Route::get('batch/{id}/end', 'BatchController@end')->name('end.batch');

            //Day route
            Route::get('day', 'DayController@index')->name('day.index');
            Route::post('day', 'DayController@store')->name('day.store');
            Route::get('day/{id}/edit', 'DayController@edit')->name('day.edit');
            Route::post('day/{id}/edit', 'DayController@update')->name('day.update');

            Route::post('schedule/store', 'ScheduleController@store')->name('schedule.store');
            Route::get('schedule/{id}/edit', 'ScheduleController@edit')->name('schedule.edit');
            Route::post('schedule/{id}/edit', 'ScheduleController@update')->name('schedule.update');
            Route::get('schedule/{id}/destroy', 'ScheduleController@destroy')->name('schedule.destroy');
        });
        //Time Schedule
        Route::group([
            'middleware' => 'permission:View Schedule|Create Schedule|Update Schedule|Delete Schedule|Create Batch|Update Batch|Delete Batch'
        ], function () {
                Route::get('schedule/', 'ScheduleController@index')->name('schedule.index');
        });

        Route::group([
            'middleware' => 'permission:View Permissions'
        ], function(){
            Route::get('permission', 'PermissionController@index')->name('permission.index');
        });

        Route::group([
            'middleware' => 'permission:View Roles|Create Role|Update Role|Delete Role'
        ], function(){
            Route::get('role', 'RoleController@index')->name('role.index');
        });

        Route::group([
            'middleware' => 'permission:Create Role|Update Role|Delete Role'
        ], function(){
            Route::post('role', 'RoleController@store')->name('role.store');
            Route::post('role/{id}/update', 'RoleController@update')->name('role.update');
        });


        Route::group([
            'middleware' => 'permission:View Courses|Create Course|Update Course|Delete Course'
        ], function () {
            Route::get('course', 'CourseController@index')->name('course.index');
        });

        Route::group([
            'middleware' => 'permission:Create Course|Update Course|Delete Course'
        ], function () {
            Route::get('courses', 'CourseController@index')->name('course.index');
            Route::get('course', 'CourseController@create')->name('course.create');
            Route::post('course', 'CourseController@store')->name('course.store');
            Route::get('course/{id}/edit', 'CourseController@edit')->name('course.edit');
            Route::post('course/{id}/edit', 'CourseController@update')->name('course.update');
        });


        Route::get('course/attributes', 'ContentController@getAttrByCourse')->name('course.attributes');

        Route::get('contents', 'ContentController@index')->name('admin.content');
        Route::get('contents/{id}/edit', 'ContentController@edit')->name('content.edit');
        Route::get('contents/create', 'ContentController@create')->name('content.create');
        Route::post('contents/create', 'ContentController@store')->name('content.store');
        Route::post('contents/{id}/edit', 'ContentController@update')->name('content.update');


        Route::group([
            'middleware' => 'permission:Create User|Update User|Delete User'
        ], function () {
            Route::resource('trainer', 'TrainerController');
        });

        Route::post('student/{id}/asign', 'StudentController@asignStudent')->name('student.asign');
        Route::get('course/admission-fees', 'StudentController@courseAdmissionFees')->name('course.fees');

        Route::resource('users', 'UserController');

        Route::get('profile', 'ProfileController@index')->name('user.profile');
        Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::get('password/change', 'ProfileController@password')->name('change.password');
        Route::post('password/change', 'ProfileController@changePassword')->name('change.password');
        Route::post('profile/edit', 'ProfileController@update')->name('profile.edit');
        Route::get('logout', 'ProfileController@logout')->name('profile.logout');


        Route::get('system-info', 'SystemController@systemInfo')->name('system.info');
        Route::post('system-info', 'SystemController@SaveSystemInfo')->name('system.info');

        Route::get('system-uploads', 'SystemController@systemUploads')->name('system.uploads');
        Route::get('system-uploads/{type}', 'SystemController@uploadsDelete')->name('uploads.delete');
        Route::post('system-uploads', 'SystemController@SaveSystemUploads')->name('system.uploads');


        Route::get('setting-tools', 'SystemController@settingTools')->name('setting.tools');
        Route::post('setting-tools', 'SystemController@SaveSettingTools')->name('setting.tools');
        Route::get('api-integration', 'SystemController@apiIntegration')->name('api.integration');
        Route::post('api-integration', 'SystemController@SaveApiIntegration')->name('api.integration');
        Route::get('meta-scripts', 'SystemController@metaScripts')->name('meta.scripts');
        Route::post('meta-scripts', 'SystemController@SaveMetaScripts')->name('meta.scripts');

        //   features
        Route::resource('features', 'FeaturesController');
        Route::get('features/delete/{id}','FeaturesController@delete')->name('features.delete');

        //   pages
        Route::resource('pages', 'PageController');
    });
}
