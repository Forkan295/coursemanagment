<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ setActive(['home'], 'active') }}">
                <a href="{{ route('home') }}">
                    <i class="icon-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span>
                </a>
            </li>

            @canany(['View Applicants','Admit Student','Update Student','Delete Student','Update Payment'])
                <li class=" navigation-header">
                    <span>Applicants</span>
                    <i class="ft-more-horizontal ft-minus"></i>
                </li>
                <li class="nav-item {{ setActive(['verified.applicants'], 'active') }}">
                    <a href="{{ route('verified.applicants') }}">
                        <i class="icon-user-following"></i>
                        <span class="menu-title">All Applicants</span>
                    </a>
                </li>
            @endcanany

            @canany(['View Student','Admit Student','Update Student','Delete Student','Update Payment'])
                <li class=" navigation-header">
                    <span>Students</span>
                    <i class="ft-more-horizontal ft-minus"></i>
                </li>
                <li class="nav-item {{ setActive(['all.students'], 'active') }}">
                    <a href="{{ route('all.students') }}">
                        <i class="ft-users"></i>
                        <span class="menu-title">All Students</span>
                    </a>
                </li>
                <li class="nav-item {{ setActive(['filter.students'], 'active') }}">
                    <a href="{{ route('filter.students') }}">
                        <i class="ft-search"></i>
                        <span class="menu-title">Students filter</span>
                    </a>
                </li>

                <li class="nav-item {{ setActive(['payment.records'], 'active') }}">
                    <a href="{{ route('payment.records') }}">
                        <i class="ft-search"></i>
                        <span class="menu-title">Payment Records</span>
                    </a>
                </li>

                <li class="nav-item {{ setActive(['payment.records'], 'active') }}">
                    <a href="{{ route('payment.records') }}">
                        <i class="ft-search"></i>
                        <span class="menu-title">Student Records</span>
                    </a>
                </li>
            @endcanany


            @canany(['View Courses','Create Course','Update Course','Delete Course', 'View Batch', 'View Schedule', 'Create Schedule','Update Schedule','Delete Schedule','Create Batch','Update Batch','Delete Batch', 'Create Schedule','Update Schedule','Delete Schedule','Create Batch','Update Batch','Delete Batch'])
            <li class=" navigation-header">
                <span>Institute</span>
                <i class="ft-more-horizontal ft-minus"></i>
            </li>
             @endcanany

            @canany(['View Courses','Create Course','Update Course','Delete Course'])
            <li class="nav-item {{ setActive(['course.index','course.create','course.edit'], 'active') }}">
                <a href="{{ route('course.index') }}">
                    <i class="icon-book-open"></i>
                    <span class="menu-title">Courses</span>
                </a>
            </li>
            @endcanany

           @canany(['View Batch','Create Schedule','Update Schedule','Delete Schedule','Create Batch','Update Batch','Delete Batch'])
           <li class="nav-item {{ setActive(['batch.index','batch.edit'], 'active') }}">
               <a href="{{ route('batch.index') }}">
                   <i class="fa fa-th"></i>
                   <span class="menu-title">Batches</span>
               </a>
           </li>
           @endcanany

           @canany(['Create Schedule','Update Schedule','Delete Schedule','Create Batch','Update Batch','Delete Batch'])
           <li class="nav-item {{ setActive(['day.index'], 'active') }}">
               <a href="{{ route('day.index') }}">
                   <i class="icon-calendar"></i>
                   <span class="menu-title">Class Days</span>
               </a>
           </li>
           @endcanany

           @canany(['View Schedule','Create Schedule','Update Schedule','Delete Schedule','Create Batch','Update Batch','Delete Batch'])
           <li class="nav-item {{ setActive(['schedule.index'], 'active') }}">
               <a href="{{ route('schedule.index') }}">
                   <i class="icon-calendar"></i>
                   <span class="menu-title">Schedules</span>
               </a>
           </li>
           @endcanany

           <li class=" navigation-header">
                <span>Content</span>
                <i class="ft-more-horizontal ft-minus"></i>
            </li>

            <li class=" nav-item {{ setActive(['admin.content','content.create', 'content.edit'], 'active') }}">
                <a href="{{ route('admin.content') }}">
                    <i class="icon-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Class content</span>
                </a>
            </li>


            <li class=" navigation-header">
                <span>HRM</span>
                <i class="ft-more-horizontal ft-minus"></i>
            </li>


        {{-- @canany(['View Permissions']) --}}

            <li class="nav-item has-sub {{ setActive(['permissoin.index','role.index'], 'active') }}">
                <a href="index.html">
                    <i class="icon-home"></i>
                    <span class="menu-title">Access Controll</span>
                </a>
                <ul class="menu-content" style="">
                    <li class="{{ setActive(['permissoin.index'], 'active') }}">
                        <a class="menu-item" href="{{ route('permission.index') }}">
                            Permissions
                        </a>
                    </li>
                    <li class="{{ setActive(['role.index'], 'active') }}">
                        <a class="menu-item" href="{{ route('role.index') }}">
                            Roles
                        </a>
                    </li>

                </ul>
            </li>

         {{-- @endcanany --}}


            <li class="nav-item {{ setActive(['users.index'], 'active') }}">
                <a href="{{ route('users.index') }}">
                    <i class="icon-user-following"></i>
                    <span class="menu-title">Manage Users</span>
                </a>
            </li>
            <li class="nav-item {{ setActive(['trainer.index'], 'active') }}">
                <a href="{{ route('trainer.index') }}">
                    <i class="icon-user-following"></i>
                    <span class="menu-title">Manage Trainer</span>
                </a>
            </li>



            <li class=" navigation-header">
                <span>SYSTEM TOOLS</span>
                <i class="ft-more-horizontal ft-minus"></i>
            </li>

            <li class="nav-item {{ setActive(['system.info'], 'active') }}">
                <a href="{{ route('system.info') }}">
                    <i class="icon-user-following"></i>
                    <span class="menu-title">System info</span>
                </a>
            </li>

            <li class="nav-item {{ setActive(['setting.tools'], 'active') }}">
                <a href="{{ route('setting.tools') }}">
                    <i class="icon-user-following"></i>
                    <span class="menu-title">Setting & Tools</span>
                </a>
            </li>

            <li class="nav-item {{ setActive(['system.uploads'], 'active') }}">
                <a href="{{ route('system.uploads') }}">
                    <i class="icon-user-following"></i>
                    <span class="menu-title">Files & uploads</span>
                </a>
            </li>

            <li class="nav-item {{ setActive(['api.integration'], 'active') }}">
                <a href="{{ route('api.integration') }}">
                    <i class="icon-user-following"></i>
                    <span class="menu-title">API integration</span>
                </a>
            </li>

            <li class="nav-item {{ setActive(['meta.scripts'], 'active') }}">
                <a href="{{ route('meta.scripts') }}">
                    <i class="icon-user-following"></i>
                    <span class="menu-title">Meta Scripts</span>
                </a>
            </li>

            @if ($system->show_website == true)
            {{-- website module start --}}
            <li class=" navigation-header">
                <span>WEBSITE SETTINGS</span>
                <i class="ft-more-horizontal ft-minus"></i>
            </li>

            <li class="nav-item {{ setActive(['features.index'], 'active') }}">
                <a href="{{ route('features.index') }}">
                    <i class="icon-user-following"></i>
                    <span class="menu-title">Features</span>
                </a>
            </li>

              <li class="nav-item has-sub {{ setActive(['pages.index'], 'active') }}">
                <a href="index.html">
                    <i class="icon-home"></i>
                    <span class="menu-title">Pages</span>
                </a>
                <ul class="menu-content" style="">
                    <li class="{{ setActive(['pages.index'], 'active') }}">
                        <a class="menu-item" href="{{ route('pages.index') }}">
                            All page
                        </a>
                    </li>
                    <li class="{{ setActive(['pages.create'], 'active') }}">
                        <a class="menu-item" href="{{ route('pages.create') }}">
                            Create Page
                        </a>
                    </li>

                </ul>
            </li>

            {{-- website module end --}}
                
            @endif






        </ul>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>
