@extends('partials.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pesanan</h1>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <a href="{{ route('downLaporan') }}" class="btn btn-primary">Export PDF</a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanan as $key => $value)
                            <tr>
                                <td>
                                    {{ $value->invoice_id }}
                                </td>
                                <td>
                                    {{ $value->name }}
                                </td>
                                <td>
                                    Rp {{ number_format($value->total_harga) }}
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
                                    {{ $value->date }}
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




