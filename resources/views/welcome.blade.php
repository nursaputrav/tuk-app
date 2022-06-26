@extends('layout')

@section('content')
<?php
use App\Models\Gallery;
$data = Gallery::all();
?>

<div class="col-xxl-8 px-5 py-5 mb-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 py-lg-0 mt-lg-1">
      <div class="col-12 col-sm-8 col-lg-6 mx-sm-auto mt-5">
            @if($data->isEmpty())
            <div id="carouselExampleInterval" class="carousel carousel-dark slide mb-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/image/hero/green.png" class="d-block mx-lg-auto img-fluid pe-lg-5 mt-lg-4" width="720">
                    </div>
                    <div class="carousel-item">
                        <img src="/image/hero/black.png" class="d-block mx-lg-auto img-fluid pe-lg-5 mt-lg-4" width="720">
                    </div>
                    <div class="carousel-item">
                        <img src="/image/hero/blue.png" class="d-block mx-lg-auto img-fluid pe-lg-5 mt-lg-4" width="720">
                    </div>
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

            @else
            <div id="carouselExampleInterval" class="carousel carousel-dark slide mb-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @if(count($data))
                    @foreach ($data as $img)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ asset('image/hero/'.$img->foto_gallery) }}" class="d-block mx-lg-auto img-fluid pe-lg-5 mt-lg-4" width="720">
                        {{-- class="d-block w-100 mx-auto" --}}
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

            @endif
      </div>
      <div class="col-12 col-lg-6 ps-4 ps-lg-5 mt-5 mt-sm-0 mt-md-0 mt-lg-0">
        <h1 class="h1 lh-2 mb-4">Simpan Project Kamu Sekarang!</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start col-1">
            <a href="{{ route('login') }}" class="btn btn-success btn-sm">
                <img src="/image/hero/save.png" width="28px">
            </a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-11 mx-auto mb-5 px-4">
      <div class="clearfix">
          <div class="col-12 col-sm-8 col-md-6 col-lg-5 float-start mb-4 mb-md-0">
            <form action="/">
                <div class="clearfix">
                    <div class="col-9 float-start">
                        <select class="form-select" name="user_sekolah">
                            <option value>Pilih Nama Sekolah</option>
                            @if($sekolahs->isEmpty())
                                <option>Data Tidak Tersedia</option>
                            @else
                            @foreach ($sekolahs as $sekolah)
                                <option value="{{ $sekolah->id }}">{{ $sekolah->nama_sekolah }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-3 float-end">
                        <button type="submit" class="btn btn-sm btn-primary ms-4">Cari</button>
                    </div>
                </div>
            </form>
          </div>
          <div class="col-9 col-sm-8 col-md-4 col-lg-2 float-sm-start float-md-end float-lg-end">
                <form action="/">
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search2">
                </form>
          </div>
      </div>
  </div>

<div class="col-11 table-responsive mx-auto px-4 mb-5">
  <table class="table table-striped table-hover">
    <thead class="table-green rounded">
      <tr class="rounded">
        <th scope="col">No.</th>
        <th scope="col">Nama</th>
        <th scope="col">Asal Sekolah</th>
        <th scope="col">No.Telp</th>
        <th scope="col">Judul Project</th>
        <th scope="col">Link Project</th>
      </tr>
    </thead>
    <tbody>
        @if($project->isEmpty() && $users->isEmpty())
            <tr>
                <td class="p-3 text-center" colspan="6">Data Tidak Tersedia</td>
            </tr>
        @else


        @foreach ($users as $user)
        <tr class="table-light">

            @if ($user->sekolah_id == NULL)
              <th scope="row" class="d-none">{{ $loop->iteration }}</th>
              @else
              <th scope="row">{{ $loop->iteration }}</th>
            @endif


            @if ($user->nama == NULL)
              <td class="d-none">{{ $user->nama}}</td>
              @else
              <td>{{ $user->nama}}</td>
            @endif


            @if ($user->sekolah_id == NULL)
              <td class="d-none"></td>
              @else
              <td>{{ $user->sekolah->nama_sekolah}}</td>
            @endif

            @if ($user->no_telp == NULL)
              <td class="d-none">{{ $user->no_telp }}</td>
              @else
              <td>{{ $user->no_telp }}</td>
            @endif



            @if ($user->no_telp == NULL)
               <td class="d-none"></td>
            @else
                <td>
                @foreach ($user->project as $p)
                <div style="margin-bottom: 10px">
                        <a href="{{ route('welcome.view', $p->id) }}">{{ $p->judul_project }}</a>
                </div>
                @endforeach
                </td>

                <td>
                @foreach ($user->project as $p)
                    <div style="margin-bottom: 10px"><a href="{{ $p->alamat_project }}">{{ $p->alamat_project }}</a></div>
                @endforeach
                </td>
            @endif



        </tr>
        @endforeach
        @endif
    </tbody>
  </table>

  {{ $users->appends(['search' => request('search')])->links('vendor.pagination.custom') }}

</div>

@endsection
