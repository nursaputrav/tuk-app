@extends('layout')

@section('content')
<div class="col-xxl-8 px-5 py-4">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 py-lg-0">
      <div class="col-12 col-sm-8 col-lg-6 mx-sm-auto mt-5">
        <img src="/image/hero/green.png" class="d-block mx-lg-auto img-fluid pe-lg-5 mt-5" width="720" loading="lazy">
      </div>
      <div class="col-12 col-lg-6 ps-lg-5">
        <form method="POST" action="{{ route('password.request') }}">
            @csrf
            <h2 class="h2 mb-5">Reset Password.</h2>

            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="mb-3 col-12 col-sm-10 col-md-8 col-lg-9">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <button type="submit" class="btn btn-success btn-sm px-4 py-2 mt-2">Reset Password</button>
        </form>
      </div>
    </div>
  </div>
@endsection
