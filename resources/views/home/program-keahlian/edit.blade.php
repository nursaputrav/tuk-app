@extends('layout')

@section('content')
<form method="POST" action="{{ route('program-keahlian.update', $program_keahlian->id) }}">
    @csrf
    @method('PUT')
    <div class="col-12 px-5 py-5 bg-light">
      <h2 class="h2 mt-2 mb-4 px-4 text-center">Update Program Keahlian.</h2>
      <div class="row p-4">

            <div class="col-11 col-sm-9 col-md-7 col-lg-4 mb-3 mx-auto">
                <label class="form-label">Nama Skema Kompetensi</label>
                <input type="text" class="form-control @error('nama_keahlian') is-invalid @enderror" name="nama_keahlian" value="{{ old('nama_keahlian', $program_keahlian->nama_keahlian) }}" placeholder="Nama Program...">
                    @error('nama_keahlian')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="col-12 col-sm-6 col-md-8 col-lg-4 btn btn-success btn-sm mt-4 mt-sm-5 mt-md-5 mt-lg-5">Update</button>
            </div>
        </div>
      </div>
    </form>
@endsection
