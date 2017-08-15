    @extends('header')
    @section('content')
        <div class="container">
            <h2>Input Transaksi</h2>
            <form method="post" action="{{url('create')}}">
                {{csrf_field()}}
                <!--
                <label for="id" style="width : 155px">ID Transaksi</label><input type="text" value="K-03" id="id" name="id" readonly style="background: gray"> -->
                <label for="satuan_kerja" style="width : 150px">Satuan Kerja</label>
                <select id="satuan_kerja" name="satuan_kerja" style="width : 152px">
                    <option value="HRD">SDM, Umum dan Keuangan (HRD)</option>
                    <option value="KOT">Kajian Operasi dan Teknik (KOT)</option>
                    <option value="PRW">Perawatan (PRW)</option>
                    <option value="OPR">Operasi (OPR)</option>
                    <option value="KPR">Kendali Produk (KPR)</option>
                </select> <br>
                <label for="nama_pengambil" style="width : 150px">Nama Pengambil</label> <input type="text" id="nama_pengambil" name="nama_pengambil"> <br>
                <label for="nama_peminta" style="width : 150px">Nama Peminta</label> <input type="text" id="nama_peminta" name="nama_peminta"> <br>
                <label for="barang" style="width : 150px">Barang</label>
                <select id="barang" name="barang" style="width : 152px">
                    <option value="Aqua">Aqua</option>
                    <option value="Gula_Pasir">Gula Pasir</option>
                    <option value="Kopi">Kopi</option>
                    <option value="Teh">Teh</option>
                </select> 
                &nbsp &nbsp
                <label for="jumlah" style="width : 120px">Jumlah Barang</label> <input type="number" id="jumlah" name="jumlah" min="1" max="100" step="1" value="1" style="width: 50px">
                <select id="satuan" name="satuan" style="height : 25px">
                    <option value="Kotak" data-chained="Aqua">Kotak</option>
                    <option value="Galon" data-chained="Aqua">Galon</option> 
                    <option value="Kilogram" data-chained="Gula_Pasir">Kilogram</option> 
                    <option value="Kilogram" data-chained="Kopi">Kilogram</option>
                    <option value="Kotak" data-chained="Teh">Kotak</option>  
                </select> <br
                <label for="keterangan">Keterangan</label> <br> <textarea type="input" id="keterangan" name="keterangan"></textarea> <br>
                <button type="submit" class="btn btn-success">Input</button>
            </form>
        </div>
    @endsection