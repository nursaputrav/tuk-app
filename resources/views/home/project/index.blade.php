@extends('layout')

@section('content')
<div class="col-12 px-5 py-5 bg-light">
    <h2 class="h2 mt-2 mb-5 px-lg-4">Project.</h2>

    <div class="table-responsive col-12 mx-auto px-lg-4 mb-5">
        <table class="table table-striped table-hover">
            <thead class="table-green rounded">
              <tr class="rounded">
              <th scope="col">No.</th>
              <th scope="col">Skema Kompetensi</th>
              <th scope="col">Judul Project</th>
              <th scope="col">Alamat Project</th>
              <th scope="col">Login Project</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($projects as $project)
                <tr class="table-light">
                    <th scope="row" class="pt-3">{{ $loop->iteration }}</th>
                    <td class="pt-3">{{ $project->skema->nama_skema }}</td>
                    <td class="pt-3"><a href="{{ route('project.show', $project->id) }}">{{ $project->judul_project }}</a></td>
                    <td class="pt-3">{{ $project->alamat_project }}</td>
                    <td class="pt-3">{{ $project->login_project }}</td>
                    <td>

                            <form action="{{ route('project.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger shadow ms-3 mb-2 mb-sm-2 mb-md-0 mb-lg-0 mt-md-1">
                                    <i data-feather="trash"></i>
                                </button>
                                <a href="{{ route('project.edit', $project->id) }}" class="btn btn-sm btn-warning mt-md-1 shadow ms-3 text-white"><i data-feather="edit-2"></i></a>
                            </form>

                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
    </div>

    <form method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row p-4">
          <div class="col-12 col-sm-10 col-md-7 col-lg-4">
            <label class="form-label">Foto Profile</label><br>
            <img src="{{ Auth::user()->getFotoProfile() }}" class="img-thumbnail " width="200" height="200">

            <div class="mb-3 col-12 col-sm-10 col-md-9 col-lg-9 mt-5">
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
                        <option selected disabled>Pilih Skema Kompetensi</option>
                        @foreach ($skemas as $skemakom)
                          <option value="{{ $skemakom->id }}">{{ $skemakom->nama_skema }}</option>
                        @endforeach
                  </select>
            </div>
            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Judul Project</label>
                <input type="text" class="form-control @error('judul_project') is-invalid @enderror" name="judul_project" value="{{ old('judul_project') }}">
                @error('judul_project')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Alamat Project</label>
                <input type="text" class="form-control @error('alamat_project') is-invalid @enderror" name="alamat_project" value="{{ old('alamat_project') }}">
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
                <textarea class="form-control @error('login_project') is-invalid @enderror" name="login_project" rows="3">{{ old('login_project') }}</textarea>
                @error('login_project')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="mb-4 col-12 col-sm-10 col-md-10 col-lg-9">
                <label class="form-label">Deskripsi Project</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <button type="submit" class="col-12 col-sm-10 col-md-10 col-lg-9 btn btn-success btn-sm mt-2">Simpan Project</button>
          </div>
        </div>
      </div>
    </form>
@endsection
