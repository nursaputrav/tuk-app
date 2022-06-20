@extends('layout')

@section('content')
<div class="col-12 px-4 px-sm-4 px-md-4 px-lg-5 py-5 bg-light">
    <h2 class="h2 mt-2 mb-5 px-4">View Project.</h2>

      <div class="row p-4">
          <div class="col-12 col-sm-10 col-md-7 col-lg-4">
            <label class="form-label">Foto Profile</label><br>
            <img src="{{ Auth::user()->getFotoProfile() }}" class="img-thumbnail mb-4 mb-lg-0" width="200" height="200">
          </div>

          <div class="col-12 col-sm-10 col-md-6 col-lg-4">
            <div class="col-9 mb-4">
                <label class="form-label">Nama Lengkap</label>
                <input disabled type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ Auth::user()->nama }}">
                @error('judul_project')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="col-9 mb-4">
                    <label class="form-label">Skema Kompetensi</label>
                    <select class="form-select" name="skema_id" disabled>
                        <option disabled>Pilih Skema Kompetensi</option>
                        @foreach ($skema as $skemas)
                          <option value="{{ $skemas->id }}">{{ $skemas->nama_skema }}</option>
                        @endforeach
                  </select>
            </div>
            <div class="col-9 mb-4">
                <label class="form-label">Judul Project</label>
                <input disabled type="text" class="form-control @error('judul_project') is-invalid @enderror" name="judul_project" value="{{ old('judul_project', $projects->judul_project) }}">
                @error('judul_project')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="col-9 mb-4">
                <label class="form-label">Alamat Project</label>
                <input disabled type="text" class="form-control @error('alamat_project') is-invalid @enderror" name="alamat_project" value="{{ old('alamat_project', $projects->alamat_project) }}">
                @error('alamat_project')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
          </div>

          <div class="col-12 col-sm-10 col-md-6 col-lg-4">

            <div class="col-9 mb-4">
                <label class="form-label">Login Project</label>
                <textarea disabled class="form-control @error('login_project') is-invalid @enderror" name="login_project" rows="3">{{ old('login_project', $projects->login_project) }}</textarea>
                @error('login_project')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="col-9 mb-4">
                <label class="form-label">Deskripsi Project</label>
                <textarea disabled class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="4">{{ old('deskripsi', $projects->deskripsi) }}</textarea>
                @error('deskripsi')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <a href="{{ route('project.index') }}" class="col-9 btn btn-success btn-sm mt-2">Kembali</a>
          </div>
        </div>
      </div>


    <h2 class="h2 mt-2 mb-5 px-5 text-sm-center text-md-center text-lg-center">Preview Project.</h2>
    <div class="col-10 col-sm-10 col-md-10 col-lg-8 mx-auto">
        <div id="carouselExampleInterval" class="carousel carousel-dark slide mb-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if(count($image))
                    @foreach ($image as $img)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ asset('image/gambar_project/'.$img->image) }}" class="d-block w-100 mx-auto" alt="...">
                    </div>
                    @endforeach
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
@endsection
