<!DOCTYPE html>
<html lang="en">
<head>
    <title>IDGL</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('img/favicon.ico')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('adminlte/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/ekko-lightbox.css')}}">
	@yield('header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="loader">
        <div class="loader-inner">
            <img src="{{asset('img/loading.gif')}}" alt="" style="width: 100%;">
        </div>
    </div>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto align-items-center">
                @if(Auth::check())
                    <li class="nav-item mr-3">
                        Welcome {{Auth::user()->name}},
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{route('logout')}}">
                            Logout
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{route('login')}}" class="brand-link">
              <img src="{{asset('img/small_logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">IDGL</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        @if(Auth::check() && (Auth::user()->isUser()))
                            <li class="nav-item">
                                <a href="{{route('users.index')}}" class="nav-link {{(Route::currentRouteName() == 'users.index') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item {{(Route::currentRouteName() == 'clients') || (Route::currentRouteName() == 'clients.add') || (Route::currentRouteName() == 'clients.edit') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{(Route::currentRouteName() == 'clients') || (Route::currentRouteName() == 'clients.add') || (Route::currentRouteName() == 'clients.edit') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Clients<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('clients')}}" class="nav-link {{(Route::currentRouteName() == 'clients') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Clients</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('clients.add')}}" class="nav-link {{(Route::currentRouteName() == 'clients.add') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add New Client</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{(Route::currentRouteName() == 'certificates') || (Route::currentRouteName() == 'certificates.add') || (Route::currentRouteName() == 'certificates.edit') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{(Route::currentRouteName() == 'certificates') || (Route::currentRouteName() == 'certificates.add') || (Route::currentRouteName() == 'certificates.edit') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Certificates<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('certificates')}}" class="nav-link {{(Route::currentRouteName() == 'certificates') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Certificates</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('certificates.add')}}" class="nav-link {{(Route::currentRouteName() == 'certificates.add') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add New Certificate</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @elseif(Auth::check() && Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a href="{{route('admin.index')}}" class="nav-link {{(Route::currentRouteName() == 'admin.index') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item {{(Route::currentRouteName() == 'admin.clarities') || (Route::currentRouteName() == 'admin.clarities.add') || (Route::currentRouteName() == 'admin.clarities.edit') || (Route::currentRouteName() == 'admin.colors') || (Route::currentRouteName() == 'admin.colors.add') || (Route::currentRouteName() == 'admin.colors.edit') || (Route::currentRouteName() == 'admin.shapes') || (Route::currentRouteName() == 'admin.shapes.add') || (Route::currentRouteName() == 'admin.shapes.edit') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{(Route::currentRouteName() == 'admin.clarities') || (Route::currentRouteName() == 'admin.clarities.add') || (Route::currentRouteName() == 'admin.clarities.edit') || (Route::currentRouteName() == 'admin.colors') || (Route::currentRouteName() == 'admin.colors.add') || (Route::currentRouteName() == 'admin.colors.edit') || (Route::currentRouteName() == 'admin.shapes') || (Route::currentRouteName() == 'admin.shapes.add') || (Route::currentRouteName() == 'admin.shapes.edit') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-chart-bar"></i>
                                    <p>Variation Types<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('admin.shapes')}}" class="nav-link {{(Route::currentRouteName() == 'admin.shapes') || (Route::currentRouteName() == 'admin.shapes.add') || (Route::currentRouteName() == 'admin.shapes.edit') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Shapes</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.colors')}}" class="nav-link {{(Route::currentRouteName() == 'admin.colors') || (Route::currentRouteName() == 'admin.colors.add') || (Route::currentRouteName() == 'admin.colors.edit') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Colors</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.clarities')}}" class="nav-link {{(Route::currentRouteName() == 'admin.clarities') || (Route::currentRouteName() == 'admin.clarities.add') || (Route::currentRouteName() == 'admin.clarities.edit') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Clarities</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{(Route::currentRouteName() == 'clients') || (Route::currentRouteName() == 'clients.add') || (Route::currentRouteName() == 'clients.edit') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{(Route::currentRouteName() == 'clients') || (Route::currentRouteName() == 'clients.add') || (Route::currentRouteName() == 'clients.edit') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Clients<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('clients')}}" class="nav-link {{(Route::currentRouteName() == 'clients') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Clients</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('clients.add')}}" class="nav-link {{(Route::currentRouteName() == 'clients.add') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add New Client</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{(Route::currentRouteName() == 'certificates') || (Route::currentRouteName() == 'certificates.add') || (Route::currentRouteName() == 'certificates.edit') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{(Route::currentRouteName() == 'certificates') || (Route::currentRouteName() == 'certificates.add') || (Route::currentRouteName() == 'certificates.edit') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Certificates<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('certificates')}}" class="nav-link {{(Route::currentRouteName() == 'certificates') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Certificates</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('certificates.add')}}" class="nav-link {{(Route::currentRouteName() == 'certificates.add') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add New Certificate</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{(Route::currentRouteName() == 'admin.users') || (Route::currentRouteName() == 'admin.users.add') || (Route::currentRouteName() == 'admin.users.edit') || (Route::currentRouteName() == 'admin.users.change') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{(Route::currentRouteName() == 'admin.users') || (Route::currentRouteName() == 'admin.users.add') || (Route::currentRouteName() == 'admin.users.edit') || (Route::currentRouteName() == 'admin.users.change') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>Users<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('admin.users')}}" class="nav-link {{(Route::currentRouteName() == 'admin.users') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Users</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.users.add')}}" class="nav-link {{(Route::currentRouteName() == 'admin.users.add') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add New User</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            @yield('content')
        </div>
        <footer class="main-footer">
            Copyright &copy; 2026 International Diamond & Gem Laboratory. All rights reserved.
        </footer>
    </div>
    <script src="{{asset('adminlte/js/jquery.min.js')}}"></script>
    <script src="{{asset('adminlte/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminlte/js/select2.full.min.js')}}"></script>
    <script src="{{asset('adminlte/js/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('adminlte/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminlte/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('adminlte/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('adminlte/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/js/jszip.min.js')}}"></script>
    <script src="{{asset('adminlte/js/buttons.html5.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"></script>
    <script src="{{asset('js/validation-additional.js')}}"></script>
    <script src="{{asset('adminlte/js/moment.min.js')}}"></script>
    <script src="{{asset('adminlte/js/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('adminlte/js/daterangepicker.js')}}"></script>
    <script src="{{asset('adminlte/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('adminlte/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('adminlte/js/adminlte.js')}}"></script>
    <script src="{{asset('adminlte/js/ekko-lightbox.min.js')}}"></script>
     <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    @yield('footer')
</body>
</html>