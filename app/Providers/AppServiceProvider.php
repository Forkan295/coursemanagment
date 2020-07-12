<?php

namespace App\Providers;

use App\Course;
use App\User;
use Exception;
use App\System;
use App\Feature;
use App\Page;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $example = __DIR__."/../../.env.example";
        $env = __DIR__."/../../.env";

        if(!file_exists($env)){
            copy($example, $env);
            Artisan::call("key:generate");
            $host = $_SERVER['HTTP_HOST'];
            header('location:'. 'http://'.$host);
            exit;
        }


        Schema::defaultStringLength(191);

        try
        {
            DB::connection()->getPdo();
            $connection = true;
        }
        catch(Exception $e)
        {
            $connection = false;
        }


        if($connection)
        {
            if (Schema::hasTable('systems')) {
                $system =  System::first();
                View::share ('system', $system);

                if($system->app_environment == true)
                {
                    if($system->pub_path != null)
                    {
                        $this->app->bind('path.public', function() {
                            $system =  System::first();
                            return realpath(base_path().'/'.$system->pub_path);
                        });
                    }
                }
            }

            if (Schema::hasTable('pages')) {
                $pages =  Page::where('page_status', true)->get();
                View::share ('pages', $pages);
            }

            if (Schema::hasTable('courses')) {
                $courses =  Course::where('is_active', true)->get();
                View::share ('courses', $courses);
            }
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
