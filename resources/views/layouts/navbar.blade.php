<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown d-sm-inline-block text-right">
            <!-- Notifications Dropdown Menu -->
            <a class="nav-link" data-toggle="dropdown" href="#">
                @if (auth()->user()->photo)
                    <img src="{{ asset('assets/userImages') . '/' . auth()->user()->photo }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8;margin-top: -7px; width: 5%">
                @else
                    <img src="{{ asset('dashboard/img/profile.jpg') }}" alt="Detral"
                        class="brand-image img-circle elevation-3" style="opacity: .8;margin-top: -5px; width:30px">
                @endif

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-block"><i
                            class="fas fa-sign-out-alt mr-2"></i>logout</button>
                </form>
                <div class="dropdown-divider"></div>

            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
