@extends('partials.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Pelanggan</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updatePelanggan', ["id"=>$pelanggan->id ]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pelanggan" value="{{ $pelanggan->name }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="5">{{ $pelanggan->alamat }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
