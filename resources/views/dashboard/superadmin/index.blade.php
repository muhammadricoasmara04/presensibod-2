@extends('dashboard.layout.main')
@section('container')
    <link href='/css/superadmin.css' rel='stylesheet'>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="col-lg-12 col-9">
                        <div class="container">
                            <img src="/img/logo.png" width="316px" alt="Logo FHCI" class="brand-image img-square"
                                style="opacity: .8; display: block; margin: auto;">
                            <h1 class="display-4 text-center"><b>Welcome!</b></h1>
                            <p class="lead text-center">Presensi CFO and CEO</p>
                        </div>
                    </div>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3></h3>
                                    <p>Histori Presensi</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="" class="small-box-footer">Detail <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3></h3>
                                    <p>Account User</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <a href="" class="small-box-footer">Detail <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3></h3>

                                    <p>overall</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-envelope-square"></i>
                                </div>
                                <a href="" class="small-box-footer">Detail <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    @endsection
