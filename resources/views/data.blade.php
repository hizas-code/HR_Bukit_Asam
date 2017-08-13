    @extends('header')
    @section('content')
        <div class="container">
            <h2>Daftar Transkasi</h2>
            <table class="table" id="account_table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nomor Struk</th>
                        <th>Satuan Kerja</th>
                        <th>Nama Pengambil</th>
                        <th>Nama Peminta</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @foreach ($transactions as $transaction)
                @php
                    $x = 0;
                    $x++;
                @endphp
                    <tr>
                        <div class="col-md-3">
                            <td> {{$x}} </td>
                        </div>
                        <div class="col-md-3">
                            <td> {{$transactions->created_at}} </td>
                        </div>
                        <div class="col-md-3">
                            <td> {{$transactions->nomor_struk}} </td>
                        </div>
                        <div class="col-md-3">
                            <td> {{$transaction->satuan_kerja}} </td>
                        </div>
                        <div class="col-md-3">
                            <td> {{$transaction->nama_pengambil}} </td>
                        </div>
                        <div class="col-md-3">
                            <td> {{$transaction->nama_peminta}} </td>
                        </div>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection