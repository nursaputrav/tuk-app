@extends('layout')

@section('content')
<div class="col-12 px-4 px-md-5 py-5 bg-light">
    <h2 class="h2 mt-2 mb-5 px-4">Update Project.</h2>

    <form method="POST" action="{{ route('project.update', $projects->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row p-4">
          <div class="col-12 col-sm-10 col-md-7 col-lg-4">
            <label class="form-label">Foto Profile</label><br>

            <img src="{{ Auth::user()->getFotoProfile() }}" class="img-thumbnail " width="200" height="200">
            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9 mt-5">
                <span class="clearfix">
                    <label class="form-label float-start">Upload Gambar Project</label>
                    <div class="form-text text-danger text-bold float-end">Min.5 Gambar</div>
                </span>

                <input type="file" name="image[]" class="form-control @error('image') is-invalid @enderror" accept="image/*" multiple="true">
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>

          <div class="col-12 col-sm-10 col-md-6 col-lg-4">
            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                    <label class="form-label">Skema Kompetensi</label>
                    <select class="form-select" name="skema_id">
                        <option disabled>Pilih Skema Kompetensi</option>
                        <option value="{{ $projects->skema_id }}">{{ $projects->skema->nama_skema }}</option>
                        @foreach ($skema as $skemas)
                          <option value="{{ $skemas->id }}">{{ $skemas->nama_skema }}</option>
                        @endforeach
                  </select>
            </div>
            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Judul Project</label>
                <input type="text" class="form-control @error('judul_project') is-invalid @enderror" name="judul_project" value="{{ old('judul_project', $projects->judul_project) }}">
                @error('judul_project')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Alamat Project</label>
                <input type="text" class="form-control @error('alamat_project') is-invalid @enderror" name="alamat_project" value="{{ old('alamat_project', $projects->alamat_project) }}">
                @error('alamat_project')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Dokumentasi Project</label>
                <input type="file" name="dokumentasi_project" class="form-control @error('dokumentasi_project') is-invalid @enderror">
                  @error('dokumentasi_project')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
            </div>
          </div>

          <div class="col-12 col-sm-10 col-md-6 col-lg-4">

            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Login Project</label>
                <textarea class="form-control @error('login_project') is-invalid @enderror" name="login_project" rows="3">{{ old('login_project', $projects->login_project) }}</textarea>
                @error('login_project')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Deskripsi Project</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="4">{{ old('deskripsi', $projects->deskripsi) }}</textarea>
                @error('deskripsi')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <button type="submit" class="col-9 btn btn-success btn-sm mt-2">Update Project</button>
          </div>
        </div>
      </div>

    <h2 class="h2 mt-2 mb-5 px-5 text-lg-center">Manage Gambar Project.</h2>
      <div class="row pe-4 pt-4 pb-4 mx-5">
          @foreach ($image as $img)
            <div class="card col-10 col-sm-8 col-md-6 col-lg-2 me-4 mb-4 mb-sm-4 mb-md-4 mb-lg-1 ps-0">
              <img class="card-img-top" src="{{ asset('image/gambar_project/'.$img->image) }}" alt="image project">
              <div class="card-body text-center">
                    <a href="/project/remove-img/{{ $img->id }}" class="btn btn-sm btn-danger shadow">
                      <i data-feather="trash"></i>
                    </a>
              </div>
            </div>
          @endforeach
      </div>
    </form>


    {{-- <h2 class="h2 mt-2 mb-5 px-4 text-center">Preview Project.</h2>
    <div id="carouselExampleInterval" class="carousel carousel-dark slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if(count($image))
                @foreach ($image as $img)

                <div class="carousel-item @if ($loop->first) active @endif">
                    <img src="{{ asset('image/'.$img->image) }}" class="d-block w-70 mx-auto" alt="...">
                </div>

                <form action="{{ route('project.remove', $img->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger shadow m-5 p-5">
                        <i data-feather="trash"></i>
                    </button>
                </form>
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
      </div> --}}
@endsection
