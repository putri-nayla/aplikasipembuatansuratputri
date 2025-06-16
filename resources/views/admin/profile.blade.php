@extends('layouts.appadmin')

@section('title', 'Profil Admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Profil Saya</h3>
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ asset(auth()->user()->foto ?? 'dist/img/default-avatar.png') }}" class="img-fluid img-circle" width="150">
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr><th>Nama</th><td>{{ auth()->user()->namaadmin }}</td></tr>
                    <tr><th>username</th><td>{{ auth()->user()->username}}</td></tr>
                    <tr><th>Role</th><td>{{ auth()->user()->role }}</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.appadmin')

@section('title', 'Profil Admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Profil Saya</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ asset(auth()->user()->foto ?? 'dist/img/default-avatar.png') }}" class="img-fluid img-circle" width="150">
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr><th>Nama</th><td>{{ auth()->user()->namaadmin }}</td></tr>
                    <tr><th>username</th><td>{{ auth()->user()->username }}</td></tr>
                    <tr><th>Role</th><td>{{ auth()->user()->role }}</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


