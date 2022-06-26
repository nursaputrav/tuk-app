@extends('layout')

@section('content')
<div class="col-12 px-4 px-md-5 py-5 bg-white">
    <h2 class="h2 mt-2 mb-5 px-4">Manage Gambar Gallery.</h2>

    <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row p-4">
        <div class="col-12 col-sm-10 col-md-7 col-lg-4">
            <div class="mb-3 col-12 col-sm-11 col-md-11 col-lg-12">
                <span class="clearfix">
                    <label class="form-label float-start">Upload Gambar Gallery</label>
                    <div class="form-text text-danger text-bold float-end">Max.3 Gambar</div>
                </span>

                <input type="file" name="foto_gallery[]" class="form-control @error('foto_gallery') is-invalid @enderror" accept="image/*" multiple="true">
                @error('foto_gallery')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="col-12 col-sm-11 col-md-11 col-lg-12 btn btn-success btn-sm mt-2">Simpan Gallery</button>
          </div>
        </div>


      </div>

    <h2 class="h2 mt-2 mb-5 px-5 text-lg-center">Manage Gambar Gallery.</h2>
      <div class="row pe-4 pt-4 pb-4 mx-5">
          @foreach ($data as $img)
            <div class="card col-10 col-sm-8 col-md-6 col-lg-2 me-4 mb-4 mb-sm-4 mb-md-4 mb-lg-1 ps-0">
              <img class="card-img-top" src="{{ asset('image/hero/'.$img->foto_gallery) }}">
              <div class="card-body text-center">
                <form action="{{ route('gallery.destroy', $img->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger shadow ms-3 mb-2 mb-sm-2 mb-md-0 mb-lg-0 mt-md-1">
                        <i data-feather="trash"></i>
                    </button>
                </form>
              </div>
            </div>
          @endforeach
      </div>
    </form>
@endsection
