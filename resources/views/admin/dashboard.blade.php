@extends('layouts.appadmin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Selamat Datang -->
            <div class="col-md-12">
                <div class="alert alert-primary">
                    <h5>👋 Selamat datang, {{ auth()->user()->namaadmin }}!</h5>
                    <p>masuk sebagai <strong>{{ ucfirst(auth()->user()->role) }}</strong>. Gunakan menu di sidebar untuk mengelola sistem.</p>
                </div>
            </div>

            <!-- Statistik Admin -->
            <div class="col-lg-6 col-8">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>admin/petugas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-8">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>75</h3>
                        <p>surat</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            

            <!-- Card Informasi -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Sistem</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Mengumpulkan dan menganalisis data surat.</li>
                            <li>Memudahkan manajemen reservasi.</li>
                            <li>Meminimalkan kesalahan dalam penjadwalan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection