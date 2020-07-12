<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                        <i class="ft-menu font-large-1"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        @if ($system->mobile_logo)
                        <img class="brand-logo" alt="{{ $system->app_name }}"
                            src="{{ url('storage/system', $system->mobile_logo) }}">
                        @endif
                        <h3 class="brand-text">{{ $system->app_name }}</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="fa fa-ellipsis-v"></i>
                    </a>
                </li>
            </ul>
        </div>

        
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                            <i class="ft-menu"> </i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-link-expand" href="#">
                            <i class="ficon ft-maximize"></i>
                        </a>
                    </li>
                    
                    @can(['Admit Student'])
                        <li class="nav-item mt-1">
                            <a class="btn btn-info btn-sm" href="{{ route('new.admission') }}">
                                <span class="user-name">
                                <i class="fa fa-plus"></i>   New Admission
                                </span>
                            </a>
                        </li>
                    @endcan



                </ul>
                <ul class="nav navbar-nav float-right">
                    
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="avatar avatar-online">
                                <img src="{{ (auth()->user()->avatar != null) ? 
                                    url('storage/users', auth()->user()->avatar) : 
                                    asset('defaults/user.png') }}"
                                    alt="avatar" />
                                <i></i>
                            </span>
                            <span class="user-name">
                                {{ auth()->user()->name }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('user.profile') }}">
                                <i class="ft-user"></i>Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="ft-settings"></i>Edit profile
                            </a>
                            <a class="dropdown-item" href="{{ route('change.password') }}">
                                <i class="ft-lock"></i>Change password
                            </a>
                        
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('profile.logout') }}">
                                <i class="ft-power"></i>
                                Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>