@extends('partials.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Kategori</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateKategori', ["id"=>$kategori->id ]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" placeholder="Nama Kategori">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="jenis_kategori">Kategori</label>
                                <select class="form-control" id="jenis_kategori" name="jenis_kategori">
                                    <option value="{{ $kategori->jenis_kategori }}">{{ $kategori->jenis_kategori }}</option>
                                    <option value="Smartphone">Smartphone</option>
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Komputer">Komputer</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
