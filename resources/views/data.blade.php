    @extends('header')
    @section('content')
        <div class="container">
            <h2>Daftar Transkasi</h2>
            <form method="get" action="{{url('create')}}">
                <button type="submit" class="btn btn-success pull-right"> Input Transaksi</button>
            </form>
            <br> <br>
            <table class="table" id="account_table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nomor Struk</th>
                        <th>Satuan Kerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @php
                    $x = $total+1;
                @endphp    
                @foreach ($transactions as $transaction)
                @php
                    $x--;
                @endphp
                    <tr>
                        <div class="col-md-1">
                            <td> {{$x}} </td>
                        </div>
                        <div class="col-md-2">
                            <td> {{$transaction->created_at}} </td>
                        </div>
                        <div class="col-md-2">
                            <td> {{$transaction->nomor_struk}} </td>
                        </div>
                        <div class="col-md-2">
                            <td> {{$transaction->satuan_kerja}} </td>
                        </div>
                        <div class="col-md-3">
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#detailModal">Detail</button>
                            </td>
                        </div>
                    </tr>
                @endforeach
            </table>
        </div>

    <div id="detailModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Transaksi</h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endsection