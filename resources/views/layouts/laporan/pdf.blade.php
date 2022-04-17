<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .container{
        padding: 0px 50px;
    }

    .text-center{
        text-align: center;
        margin: 30px 0px;
    }

    table, tr, th, td{
        border: solid 1px black;
    }
</style>
<body>
    <div class="container">
        <div class="text-center">
            <h2>Laporan Pembelian</h2>
        </div>
        @php
            $today = \Carbon\Carbon::now('GMT+7');
        @endphp
        <p>Laporan ini di generate pada tanggal: {{ $today->year. '/' . $today->month . '/' . $today->day }}</p>
        <table width="100%" cellspacing="0">
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
</body>
</html>

