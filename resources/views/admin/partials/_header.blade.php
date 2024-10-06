<section id="vcMainHeader" class="main-header">

    <div class="logo-header">

        <a href="{{ route('admin.dashboard') }}" class="logo">
            <img src="backend/images/logo.png" alt="navbar brand" class="navbar-brand">
        </a>

        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="la la-bars"></i>
            </span>
        </button>
        <button class="topbar-toggler more">
            <i class="la la-ellipsis-v"></i>
        </button>
        <div class="navbar-minimize">
            <button class="btn btn-minimize btn-rounded">
                <i class="la la-bars"></i>
            </button>
        </div>
    </div>

    <nav class="navbar navbar-header navbar-expand-lg navbarHeaderDropdown">
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm avtarMenu">
                            <img src="{{ 'backend/images/student-'.auth()->user()->gender.'.jpg' }}" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <span class="userNameHeader">{{ auth()->user()->first_name }} {{ auth()->user()->middle_name }} {{ auth()->user()->last_name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">
                                    <img src="{{ auth()->user()->image ? 'uploads/'.auth()->user()->roll_no.'/'.auth()->user()->image : 'backend/images/student-'.auth()->user()->gender.'.jpg' }}" alt="image profile" class="avatar-img rounded">
                                </div>
                                <div class="u-text">
                                    <h4>{{ auth()->user()->name }}</h4>
                                    <p class="text-muted">{{ auth()->user()->email }}</p>
                                    <!--<a href="#" class="btn btn-rounded btn-danger btn-sm">View Profile</a>-->
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.change.password') }}">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
    </nav>
</section>