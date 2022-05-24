@extends('main')

@section('title', 'Programs')

@section('navbar')
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ url('/') }}"><img src="{{ asset('style/assets/img/logo-web2.png') }}" style="width:60%; margin-top: 10px; margin-bottom:10px"></a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
@endsection

@section('sidenav')
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="{{ url('/') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Home
                    </a>
                    <a class="nav-link" href="{{ url('edulevels') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Edulevel
                    </a>
                    <a class="nav-link" href="{{ url('programs') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Program
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Admin
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Program</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Show Program</li>
                </ol>
            </div>
            <div class="content mt-3 px-4">
                <div class="animated fadeIn">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="pull-left">
                                <strong>Detail Program</strong>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('programs') }}" class="btn btn-default btn-sm">
                                    <i class="fa fa-undo"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th style="width:20%">Nama Edulevel</th>
                                                <td style="width:80%">{{ $program->edulevel->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Program</th>
                                                <td>{{ $program->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Student Price</th>
                                                <td>{{ $program->student_price }}</td>
                                            </tr>
                                            <tr>
                                                <th>Student Max</th>
                                                <td>{{ $program->student_max }}</td>
                                            </tr>
                                            <tr>
                                                <th>Info</th>
                                                <td>{{ $program->info }}</td>
                                            </tr>
                                            <tr>
                                                <th>Dibuat Tanggal</th>
                                                <td>{{ $program->created_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
