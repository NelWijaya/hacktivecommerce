@extends('partials.master')

@section('style')
<style>
.card{
    width: 100% !important;
}

</style>
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Product</h1>
    </div>

    <!-- Content Row -->
    <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Product Baru</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_produk">Nama Product</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Kategori">
                        </div>
                        <div class="form-group">
                            <textarea name="deskripsi" id="editor" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Rilis">Rilis</option>
                                <option value="Draft">Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select class="form-control " id="kategori_id" name="kategori_id">
                                @foreach ($kategori as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" min="0" class="form-control" id="harga" name="harga" placeholder="Harga Product">
                        </div>

                        <div class="form-group">
                            <label for="berat">Berat</label>
                            <input type="number" min="0" class="form-control" id="berat" name="berat" placeholder="Berat Product">
                        </div>

                        <div class="form-group">
                            <label for="foto_produk">Foto Product</label>
                            <input type="file" class="form-control" id="foto_produk" name="foto_produk" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
