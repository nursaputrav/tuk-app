@extends('layout')

@section('content')
<form method="POST" action="{{ route('program-keahlian.store') }}">
    @csrf
    <div class="col-12 px-5 py-5 bg-light">
      <h2 class="h2 mt-2 mb-4 px-4 text-center">Create Program Keahlian.</h2>
      <div class="row p-4">

            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-6 mx-auto">
                <label class="form-label">Nama Program</label>
                <input type="text" class="form-control @error('nama_keahlian') is-invalid @enderror" name="nama_keahlian" value="{{ old('nama_keahlian') }}" placeholder="Nama Program...">
                    @error('nama_keahlian')
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
