@extends('layout')

@section('content')
<div class="col-12 px-5 py-5 bg-light">
    <h2 class="h2 mt-2 mb-5 px-lg-4">Profile Tuk.</h2>
    <form method="POST" action="{{ route('profile-tuk.update', $data->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row p-4">
        <div class="col-12 col-sm-10 col-md-7 col-lg-4">
            <div class="col-12 mb-4">
                <label class="form-label">Foto Tuk</label><br>

                @if($data->foto_tuk == NULL)
                    <img src="/image/foto_tuk/tuk.png" class="img-thumbnail img-preview" width="200" height="200">
                @else
                    <img src="{{ asset('image/foto_tuk/'.$data->foto_tuk) }}" class="img-thumbnail img-preview" width="200" height="200">
                @endif

                <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9 mt-5">
                    <label class="form-label">Upload Foto Tuk</label>
                    <input type="file" name="foto_tuk" class="form-control @error('foto_tuk') is-invalid @enderror" id="image" onchange="previewImage()">
                    @error('foto_tuk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Nama Tuk</label>
                <input type="text" class="form-control @error('nama_tuk') is-invalid @enderror" name="nama_tuk" value="{{ old('nama_tuk', $data->nama_tuk) }}">
                @error('nama_tuk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Alamat Tuk</label>
                <textarea class="form-control @error('alamat_tuk') is-invalid @enderror" name="alamat_tuk" rows="5">{{ old('alamat_tuk', $data->alamat_tuk) }}</textarea>
                @error('alamat_tuk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-12 col-sm-10 col-md-7 col-lg-4">
            <div class="col-12 mb-4">
                <label class="form-label">Foto Lsp</label><br>


                @if($data->foto_lsp == NULL)
                    <img src="/image/foto_tuk/lsp.png" class="img-thumbnail img-preview-lsp" width="200" height="200">
                @else
                    <img src="{{ asset('image/foto_tuk/'.$data->foto_lsp) }}" class="img-thumbnail img-preview-lsp" width="200" height="200">
                @endif

                <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9 mt-5">
                    <label class="form-label">Upload Foto Lsp</label>
                    <input type="file" name="foto_lsp" class="form-control @error('foto_lsp') is-invalid @enderror" id="image-lsp" onchange="previewImagelsp()">
                    @error('foto_lsp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">No.Telp Tuk</label>
                <input type="text" class="form-control @error('telp_tuk') is-invalid @enderror" name="telp_tuk" value="{{ old('telp_tuk', $data->telp_tuk) }}">
                @error('telp_tuk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Ketua Tuk</label>
                <input type="text" class="form-control @error('ketua_tuk') is-invalid @enderror" name="ketua_tuk" value="{{ old('ketua_tuk', $data->ketua_tuk) }}">
                @error('ketua_tuk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Admin Tuk</label>
                <input type="text" class="form-control @error('admin_tuk') is-invalid @enderror" name="admin_tuk" value="{{ old('admin_tuk', $data->admin_tuk) }}">
                @error('admin_tuk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-12 col-sm-10 col-md-7 col-lg-4">
            <div class="col-12 mb-4">
                <label class="form-label">Foto Bnsp</label><br>

                @if($data->foto_bnsp == NULL)
                    <img src="/image/foto_tuk/bnsp.png" class="img-thumbnail img-preview-bnsp" width="200" height="200">
                @else
                    <img src="{{ asset('image/foto_tuk/'.$data->foto_bnsp) }}" class="img-thumbnail img-preview-bnsp" width="200" height="200">
                @endif

                <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9 mt-5">
                    <label class="form-label mt-lg-3">Upload Foto Bnsp</label>
                    <input type="file" name="foto_bnsp" class="form-control @error('foto_bnsp') is-invalid @enderror" id="image-bnsp" onchange="previewImagebnsp()">
                    @error('foto_bnsp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Mou Tuk File</label>
                <input type="file" name="mou_tuk" class="form-control @error('mou_tuk') is-invalid @enderror">
                  @error('mou_tuk')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
            </div>

            <button type="submit" class="col-12 col-sm-10 col-md-10 col-lg-9 btn btn-success btn-sm mt-2 mb-5">Simpan Profile Tuk</button>
            </div>
        </div>


      </div>
    </form>
@endsection
