    @extends('header')
    @section('content')
        <div class="container">
                <style>
                    input {
                          border: 0;
                          outline: 0;
                          background: transparent;
                          border-bottom: 1px solid black;
                    }
                </style>
                <h1> Detail Transaksi </h1>
                <label for="tanggal" style="width : 150px">Tanggal</label>
                <input type="text" readonly value="{{$transaction->created_at}}"> <br>
                <label for="nomor_struk" style="width : 150px">Nomor Struk</label>
                <input type="text" readonly value="{{$transaction->nomor_struk}}"> <br>
                <label for="nama_pengambil" style="width : 150px">Nama Pengambil</label> 
                <input type="text" id="nama_pengambil" name="nama_pengambil" readonly value="{{$transaction->nama_pengambil}}"> <br>
                <label for="nama_peminta" style="width : 150px">Nama Peminta</label> <input type="text" id="nama_peminta" name="nama_peminta" readonly value="{{$transaction->nama_peminta}}"> <br>
                <!--<div id="goods1">    
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
                    </select> <br>
                </div>-->
                @if($items->aqua != 0)
                    <label for="aqua" style="width : 150px">Aqua</label> 
                    <input type="text" readonly value="{{$items->aqua}} . {{$items->type_aqua}} . Aqua"> <br>
                @endif
                @if($items->aqua != 0)
                <label for="gula_pasir" style="width : 150px">Gula Pasir</label>
                <input type="text" readonly value="{{$items->gula_pasir}} . {{$items->type_gula_pasir}} . Gula Pasir"> <br>
                @endif
                @if($items->aqua != 0)
                <label for="kopi" style="width : 150px">Kopi</label> 
                <input type="text" readonly value="{{$items->kopi}} . {{$items->type_kopi}} . Kopi"> <br>
                @endif
                @if($items->aqua != 0)
                <label for="teh" style="width : 150px">Teh</label> 
                <input type="text" readonly value="{{$items->teh}} . {{$items->type_teh}} . Teh"> <br>
                @endif
                @if($transaction->keterangan != '')
                <label for="keterangan">Keterangan</label> <br> <textarea type="input" id="keterangan" name="keterangan" readonly>{{$transaction->keterangan}}</textarea> <br>
                @endif
                <a href="{{url('')}}" > <button type="button" class="btn btn-danger">Kembali</button></a>
        </div>
    @endsection