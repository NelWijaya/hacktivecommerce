@extends('partials.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12 col-md-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori Baru</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('storeKategori') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="jenis_kategori">Kategori</label>
                                <select class="form-control" id="jenis_kategori" name="jenis_kategori">
                                    <option value="Smartphone">Smartphone</option>
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Komputer">Komputer</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>
                            </div>
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
                            <th>Kategori</th>
                            <th>Parent</th>
                            <th>Created At</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $key => $data)
                            <tr>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>{{ $data->jenis_kategori }}</td>
                                <td>{{ $data->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('editKategori', ["id" => $data->id]) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('destroyKategori', ["id" => $data->id]) }}">Hapus</a>
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
