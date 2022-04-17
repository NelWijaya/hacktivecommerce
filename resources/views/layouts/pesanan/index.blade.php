@extends('partials.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pesanan</h1>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Pesanan Baru</button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('storePesanan') }}" method="POST">
            @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesanan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="produk_id">Produk</label>
                            <select class="form-control" id="produk_id" name="produk_id">
                                @foreach ($produk as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->nama_produk }} - Rp {{ number_format($value->harga) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pelanggan_id">Pelanggan</label>
                            <select class="form-control " id="pelanggan_id" name="pelanggan_id">
                                @foreach ($pelanggan as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input type="number" min="0" class="form-control" id="qty" name="qty" placeholder="Banyak Product" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Proses">Proses</option>
                                <option value="Batal">Batal</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Pesanan</button>
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
                            <th>Invoice</th>
                            <th>Produk</th>
                            <th>Pelanggan</th>
                            <th>Qty</th>
                            <th>Total Harga</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanan as $key => $value)
                            <tr>
                                <td>
                                    {{ $value->invoice_id }}
                                </td>
                                <td>
                                    {{ $value->nama_produk }}
                                </td>
                                <td>
                                    {{ $value->name }}
                                </td>
                                <td>
                                    {{ $value->qty }}
                                </td>
                                <td>
                                    {{ number_format($value->total_harga) }}
                                </td>
                                <td>
                                    {{ $value->date }}
                                </td>
                                <td>
                                    @if ($value->status == 'Proses')
                                        <span class="badge badge-info">{{ $value->status }}</span>
                                    @else
                                        @if ($value->status == 'Batal')
                                            <span class="badge badge-danger">{{ $value->status }}</span>
                                        @else
                                        <span class="badge badge-success">{{ $value->status }}</span>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('editPesanan', ["id" => $value->id]) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('destroyPesanan', ["id" => $value->id]) }}">Hapus</a>
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
