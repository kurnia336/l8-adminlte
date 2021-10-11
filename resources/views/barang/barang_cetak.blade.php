
<style>
    br {
   display: block;
   margin: 5px 0;
}
</style>
    @forelse ($barangs as $barang)
                    @php
                        $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                    @endphp
                    <br>
                    <br>
                    <hr>
                    <center><img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($barang->barcode_kode, $generatorPNG::TYPE_CODE_128)) }}"><center><br>
                    <center>{{ $barang->barcode_kode }}<center>
                    <center>{{ $barang->nama_barang }}<center>
                @empty
                    <div class="alert alert-danger">
                        Data Barang belum Tersedia.
                    </div>
    @endforelse 
