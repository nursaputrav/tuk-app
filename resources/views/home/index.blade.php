@extends('layout')

@section('content')
    <div class="col-12 px-4 px-lg-5 py-5">
        <div class="alert alert-success alert-dismissible fade show mx-4 p-4" role="alert">
            <strong>Selamat Datang, {{ Auth::user()->nama }}!</strong><br> Lengkapi Data Diri Anda Sebelum Memulai. <br>
            <a href="{{ route('profile.view') }}" class="btn btn-success mt-4 px-3 py-2">Lengkapi</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endsection
