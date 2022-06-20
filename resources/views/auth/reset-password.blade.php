@extends('layout')

@section('content')
<div class="col-xxl-8 px-5 py-4">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 py-lg-0">
      <div class="col-12 col-sm-8 col-lg-6 mx-sm-auto mt-5">
        <img src="/image/brand/hero.png" class="d-block mx-lg-auto img-fluid pe-lg-5 mt-5" width="720" loading="lazy">
      </div>
      <div class="col-12 col-lg-6 ps-lg-5">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <h2 class="h2 mb-5">Update Password.</h2>
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="mb-3 col-8">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $request->email }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="mb-3 col-8">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-3 col-8">
                      <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" name="password_confirmation">
                    </div>
            <button type="submit" class="btn btn-success btn-sm px-4 py-2 mt-2">Update Password</button>
        </form>
      </div>
    </div>
  </div>
@endsection
