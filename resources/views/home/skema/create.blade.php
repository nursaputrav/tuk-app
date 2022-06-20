@extends('layout')

@section('content')
<form method="POST" action="{{ route('skema.store') }}">
    @csrf
    <div class="col-12 px-5 py-5 bg-light">
      <h2 class="h2 mt-2 mb-4 px-4 text-center">Create Skema Kompetensi.</h2>
      <div class="row p-4">

            <div class="col-11 col-sm-9 col-md-7 col-lg-4 mb-3 mx-auto">
                <label class="form-label">Nama Skema Kompetensi</label>
                <input type="text" class="form-control @error('nama_skema') is-invalid @enderror" name="nama_skema" value="{{ old('nama_skema') }}" placeholder="Nama Skema...">
                    @error('nama_skema')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="col-12 col-sm-6 col-md-8 col-lg-4 btn btn-success btn-sm mt-4 mt-sm-5 mt-md-5 mt-lg-5">Create</button>
            </div>



        </div>
      </div>
    </form>
@endsection
