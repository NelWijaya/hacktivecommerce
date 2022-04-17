@extends('partials.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product</h1>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <button data-toggle="modal" data-target="#massupload" class="btn btn-danger mr-2">Mass Upload</button>

            <a href="{{ route('createProduct') }}" class="btn btn-primary">Tambah</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="massupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('importData') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="qty">Select Data</label>
                            <input type="file" name="import_file" id="import_file" class="form-control">
                        </div>
                    </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Import Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $key => $value)
                            <tr>
                                <td>
                                    <img src="{{ asset('produk/'.$value->foto_produk) }}" alt="" style="width: 100px">
                                </td>

                                <td>{{ $value->nama_produk }} <br>
                                    Kategori: <span class="badge badge-primary">{{ $value->nama_kategori }}</span> <br>
                                    Berat: <span class="badge badge-primary">{{ $value->berat }}</span>
                                </td>

                                <td>Rp {{ number_format($value->harga) }}</td>

                                <td>{{ $value->created_at->format('d-m-Y') }}</td>

                                <td>{{ $value->status }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('editProduct', ["id" => $value->id]) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('destroyProduct', ["id" => $value->id]) }}">Hapus</a>
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
