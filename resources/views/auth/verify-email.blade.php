@extends('layout')

@section('content')
<div class="col-xxl-8 px-5 py-4">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 py-lg-0">
      <div class="col-12 col-sm-8 col-lg-6 mx-sm-auto mt-5">
        <img src="/image/brand/hero.png" class="d-block mx-lg-auto img-fluid pe-lg-5 mt-5" width="720" loading="lazy">
      </div>
      <div class="col-12 col-lg-6 ps-lg-5">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <h2 class="h2 mb-4">Verifikasi Email</h2>
            @if(session('status'))
                <div class="alert alert-success mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h5 class="mb-4">You must verify your email address. please check your email for a verification link.</h5>
            <button type="submit" class="btn btn-success btn-sm px-4 py-2">Resend Email Verification</button>
        </form>
      </div>
    </div>
  </div>
@endsection
