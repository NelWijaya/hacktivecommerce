@extends('partials.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12 col-md-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pelanggan Baru</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('storePelanggan') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pelanggan">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Created At</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $key => $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('editPelanggan', ["id" => $data->id]) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('destroyPelanggan', ["id" => $data->id]) }}">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
