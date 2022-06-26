@extends('layout')

@section('content')
<form method="POST" action="{{ route('sekolah.store') }}">
    @csrf
    <div class="col-12 px-5 py-5 bg-light">
      <h2 class="h2 mt-2 mb-4 px-4 text-center">Create Sekolah.</h2>
      <div class="row p-4">

            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-6 mx-auto">
                <label class="form-label">Nama Sekolah</label>
                <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" name="nama_sekolah" value="{{ old('nama_sekolah') }}" placeholder="Nama Sekolah...">
                    @error('nama_sekolah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <center>
                        <button type="submit" class="col-12 col-sm-10 col-md-10 col-lg-7 btn btn-success btn-sm mt-4 mt-sm-5 mt-md-5 mt-lg-5 mx-auto">Create</button>
                    </center>
            </div>



        </div>
      </div>
    </form>
@endsection
