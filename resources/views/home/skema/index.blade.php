@extends('layout')

@section('content')

<div class="col-11 table-responsive mx-auto px-4 mb-5 mt-5">
    <div class="clearfix">
        <h2 class="h2 mb-4 float-start">Skema Kompetensi.</h2>
        <a href="{{ route('skema.create') }}" class="btn btn-success btn-sm px-4 py-2 mb-4 float-end">Create</a>
    </div>
    <table class="table table-striped table-hover">
      <thead class="table-green">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Skema</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($skema as $skema_kompetensi)
            <tr class="table-light">
                <th class="pt-3" scope="row">{{ $loop->iteration }}</th>
                <td class="pt-3">{{ $skema_kompetensi->nama_skema }}</td>
                <td>
                    <form action="{{ route('skema.destroy', $skema_kompetensi->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger shadow ms-3 mb-2 mb-sm-0 mb-md-0 mb-lg-0">
                            <i data-feather="trash"></i>
                        </button>
                        <a href="{{ route('skema.edit', $skema_kompetensi->id) }}" class="btn btn-sm btn-warning shadow ms-3 text-white"><i data-feather="edit-2"></i></a>
                    </form>
                </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
@endsection
