<?php

namespace App\Http\Middleware;

use App\System;
use Closure;
use Illuminate\Support\Facades\Schema;

class WebsiteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Schema::hasTable('systems'))
        {
            $system = System::first();
            
            if($system->show_website == false)
            {
                return redirect('/manage');
            }
        }

        return $next($request);
    }
}
