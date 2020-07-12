<?php

use App\User;
use App\System;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

if (Schema::hasTable('users')) {

    $user = User::all();
}
else
{
    Route::get('app/install/migration', 'AppInstallController@installMigrationForm')->name('app.install.migration');
    Route::post('app/install/migration', 'AppInstallController@installMigration' )->name('app.install.migration');
    $user = [];
}

if (!count($user)) 
{
    // Route::get('/login', function () {
    //     return redirect()->route('app.install.admin');
    // });
    if (Schema::hasTable('users')) {
        
        Route::redirect('/', 'app/install/admin');
    }
    else{
        Route::redirect('/', 'app/install/migration');
        Route::redirect('/app/install/admin', '/app/install/migration');
    }

    Route::get('app/install/admin', 'AppInstallController@AdminForm')->name('app.install.admin');
    Route::post('app/install/admin', 'AppInstallController@appInstallAdmin' )->name('app.install.admin');
  

    Route::redirect('/login', 'app/install/admin');
    Route::redirect('/register', 'app/install/admin');
    Route::redirect('/manage', 'app/install/admin');


}
else 
{
    Route::get('/', 'PublicController@index')->name('public.index')->middleware('website');
    // Auth::routes();

    //Login routes
    Route::get('login/institute', 'Auth\LoginController@showLoginForm')->name('institute.login');
    Route::post('login/institute', 'Auth\LoginController@login')->name('institute.login');
}

// if(DB::connection()->getDatabaseName() && DB::connection()->getDatabaseName() != 'homestead')
// {
    if (Schema::hasTable('systems')) 
    {
        $system = System::first();

        if(!$system)
        {
            Route::get('app/install/system', 'AppInstallController@systemForm')->name('app.install.system');
            Route::post('app/install/system', 'AppInstallController@appInstallSystem' )->name('app.install.system');
        
        }
    }

// }

