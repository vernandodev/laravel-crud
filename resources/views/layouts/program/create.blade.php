@extends('main')

@section('title', 'Edulevel')

@section('navbar')
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html"><img src="{{ asset('style/assets/img/logo-web2.png') }}" style="width:60%; margin-top: 10px; margin-bottom:10px"></a>
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
                    <a class="nav-link" href="{{ url('home') }}">
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
                <h1 class="mt-4">Tambah Data Program</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div class="content mt-3 px-4">
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <div class="pull-left">
                                <strong>Data Program</strong>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('programs') }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-undo"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                    <form action="{{ url('programs') }}" method="POST">
                                        @csrf
                                        <div class="form-group p-2">
                                          <label class="form-label">Nama Program</label>
                                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"></input>
                                          @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                          @enderror
                                        </div>
                                        <div class="form-group p-2">
                                            <label class="form-label">Nama Edulevel</label>
                                            <select name="edulevel_id" id="" class="form-control @error('edulevel_id') is-invalid @enderror">
                                                <option value="">- Pilih -</option>
                                                @foreach ($edulevels as $item)
                                                    <option value="{{ $item->id }}" {{ old('edulevel_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('edulevel_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                          @enderror
                                          </div>
                                        <div class="form-group p-2">
                                            <label class="form-label">Student Price</label>
                                            <input type="number" class="form-control @error('student_price') is-invalid @enderror" name="student_price" value="{{ old('student_price') }}"></input>
                                            @error('student_price')
                                              <div class="invalid-feedback">
                                                  {{ $message }}
                                              </div>
                                            @enderror
                                        </div>
                                        <div class="form-group p-2">
                                            <label class="form-label">Student Max</label>
                                            <input type="number" class="form-control @error('student_max') is-invalid @enderror" name="student_max" value="{{ old('student_max') }}"></input>
                                            @error('student_max')
                                              <div class="invalid-feedback">
                                                  {{ $message }}
                                              </div>
                                            @enderror
                                        </div>
                                        <div class="form-group p-2">
                                            <label class="form-label">Info</label>
                                            <textarea type="text" class="form-control @error('info') is-invalid @enderror" name="info">{{ old('info') }}</textarea>
                                            @error('info')
                                              <div class="invalid-feedback">
                                                  {{ $message }}
                                              </div>
                                            @enderror
                                        </div>
                                        <div class="form-group p-2">
                                            <button type="submit" class="btn btn-success mt-3">Submit</button>
                                        </div>
                                    </form>
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
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
    })
</script>
<script>
    $("input.mask").each((i,ele)=>{
     let clone=$(ele).clone(false)
     clone.attr("type","text")
     let ele1=$(ele)
     clone.val(Number(ele1.val()).toLocaleString("en"))
     $(ele).after(clone)
     $(ele).hide()
     clone.mouseenter(()=>{

       ele1.show()
       clone.hide()
     })
     setInterval(()=>{
       let newv=Number(ele1.val()).toLocaleString("en")
       if(clone.val()!=newv){
         clone.val(newv)
       }
     },10)

     $(ele).mouseleave(()=>{
       $(clone).show()
       $(ele1).hide()
     })
   })
 </script>
@endsection


