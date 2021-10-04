<!-- @extends('adminlte::page') -->

@section('title', 'Barang')

@section('content_header')
<h1>Data Master Barang</h1>
@stop

@section('content')

<div class="row" style="">
    <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12">
        <div class="container">
            <div class="card" style="width:100%;min-height:400px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-xl-12 col-lg-12">
                        <div class="table-responsive">
                            <a href="{{ route('barang.create') }}" class="btn btn-md btn-success mb-3"><i class="far fa-plus-square"></i> TAMBAH DATA BARANG</a>
                                <table id="tables" class="table table-striped table-hover" style="width:100%">
                                <caption>List of Barang</caption>
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>BARCODE</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($barangs as $barang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        
                                        @php
                                            $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                                        @endphp
                                        <td align="center"><img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($barang->barcode_kode, $generatorPNG::TYPE_CODE_128)) }}"><br>
                                        {{ $barang->barcode_kode }}
                                    
                                        </td>
                                                                             
                                        <td class="text-center">
                                        tidak ada aksi
                                    </td>
                                    </tr>

                                  @empty
                                      <div class="alert alert-danger">
                                          Data Barang belum Tersedia.
                                      </div>
                                  @endforelse
                                    </tbody>
                                    <tfoot class="thead-dark">
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>BARCODE</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </tfoot>
                                </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Script Datatables -->
<!-- @php
$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
@endphp

<img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode('000005263635', $generatorPNG::TYPE_CODE_128)) }}"> -->
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<style>
    .table .thead-dark th {
  color: #fff;
  background-color: #212529;
  border-color: #32383e;
}
</style>
@stop

@section('js')
<!-- <script> console.log('Hi!'); </script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
    $('#tables').DataTable({
        responsive: true
    });
    } );
</script>
@stop