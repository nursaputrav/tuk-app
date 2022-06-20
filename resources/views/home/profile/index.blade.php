@extends('layout')

@section('content')
<form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-12 px-4 px-sm-4 px-md-4 px-lg-4 py-5 bg-light">
      <h2 class="h2 mt-2 mb-4 px-4 mx-lg-4">Profile.</h2>
      <div class="row p-4 mx-lg-3">
          <div class="col-12 col-sm-10 col-md-7 col-lg-4">
            <label class="form-label">Foto Profile</label><br>
            <img src="{{ $user->getFotoProfile() }}" class="img-thumbnail img-preview" width="200" height="200">
            <div class="col-9 mb-3 mt-3">
              <label class="form-label">Upload Foto</label>
              <input type="file" name="foto_profile" class="form-control @error('foto_profile') is-invalid @enderror" id="image" value="{{ $user->foto_profile }}" onchange="previewImage()">
                @error('foto_profile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

          </div>

          <div class="col-12 col-sm-10 col-md-6 col-lg-4">
            <div class="col-9 mb-3">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $user->nama) }}">
              @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-9 mb-3">
              <label class="form-label">No.Hp</label>
              <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp', $user->no_telp) }}">
              @error('no_telp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-9 mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>


            <div class="col-9 mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                    <option selected disabled>Pilih Jenis Kelamin</option>
                    <option value="laki-laki" @if($user->jenis_kelamin == 'laki-laki') selected @endif>Laki-Laki</option>
                    <option value="perempuan" @if($user->jenis_kelamin == 'perempuan') selected @endif>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-9">
                <label class="form-label">Alamat Lengkap</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="4">{{ old('alamat', $user->alamat) }}</textarea>
                @error('alamat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
          </div>

          <div class="col-12 col-sm-10 col-md-6 col-lg-4">
              <div class="col-9 mb-3">
                  <label class="form-label">Asal Sekolah</label>
                  <select class="form-select @error('sekolah_id') is-invalid @enderror" name="sekolah_id">
                      <option disabled value>Pilih Asal Sekolah</option>

                      @if (Auth::user()->sekolah_id == NULL)
                      @else
                        <option value="{{ $user->sekolah_id }}">{{ $user->sekolah->nama_sekolah }}</option>
                      @endif

                      @foreach ($sekolah as $school)
                        <option value="{{ $school->id }}">{{ $school->nama_sekolah }}</option>
                    @endforeach
                </select>
                @error('sekolah_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-9 mb-3">
                <label class="form-label">Kelas</label>
                <select class="form-select @error('kelas_id') is-invalid @enderror" name="kelas_id">
                    <option disabled value>Pilih Kelas</option>

                    @if (Auth::user()->kelas_id == NULL)
                    @else
                      <option value="{{ $user->kelas_id }}">{{ $user->kelas->nama_kelas }}</option>
                    @endif

                    @foreach ($kelas as $class)
                        <option value="{{ $class->id }}">{{ $class->nama_kelas }}</option>
                    @endforeach
                </select>
                @error('kelas_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>



            <div class="col-9 mb-3">
                <label class="form-label">Tahun Ajaran</label>
                <input disabled type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" value="{{ $tahun_sekarang."-".$tahun_depan }}">
                @error('tahun_ajaran')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

            <div class="col-9 mb-3">
                <label class="form-label">Program Keahlian</label>
                <select class="form-select @error('program_keahlian_id') is-invalid @enderror" name="program_keahlian_id">
                    <option disabled value>Pilih Program Keahlian</option>

                    @if (Auth::user()->program_keahlian_id == NULL)
                    @else
                      <option value="{{ $user->program_keahlian_id }}">{{ $user->program_keahlian->nama_keahlian }}</option>
                    @endif

                    @foreach ($program_keahlian as $keahlian)
                        <option value="{{ $keahlian->id }}">{{ $keahlian->nama_keahlian }}</option>
                    @endforeach
                </select>
                @error('program_keahlian_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-9 mb-3">
                <label class="form-label">Status Siswa</label>
                <select class="form-select @error('status_siswa') is-invalid @enderror" name="status_siswa">
                    <option selected disabled>Pilih Status Siswa</option>
                    <option value="bekerja" @if($user->status_siswa == 'bekerja') selected @endif>Bekerja</option>
                    <option value="belum_bekerja" @if($user->status_siswa == 'belum_bekerja') selected @endif>Belum Bekerja</option>
                </select>
                @error('status_siswa')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="col-9 btn btn-success btn-sm mt-3">Simpan Perubahan</button>
          </div>
        </div>
      </div>
    </form>
@endsection
