@extends('partials.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pesanan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Pesanan</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updatePesanan', ["id"=> $edit->id]) }}">
                    @csrf
                        <div class="form-group">
                            <label for="produk_id">Produk</label>
                            <select class="form-control" id="produk_id" name="produk_id">
                                <option value="{{ $edit->produk_id }}">{{ $edit->nama_produk }} - Rp {{ number_format($edit->harga) }}</option>

                                @foreach ($produk as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->nama_produk }} - Rp {{ number_format($value->harga) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pelanggan_id">Pelanggan</label>
                            <select class="form-control " id="pelanggan_id" name="pelanggan_id">
                                <option value="{{ $edit->pelanggan_id }}">{{ $edit->name }} </option>

                                @foreach ($pelanggan as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input type="number" min="0" class="form-control" id="qty" name="qty" placeholder="Banyak Product" value="{{ $edit->qty }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="{{ $edit->status }}">{{ $edit->status }}</option>

                                <option value="Proses">Proses</option>
                                <option value="Batal">Batal</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
