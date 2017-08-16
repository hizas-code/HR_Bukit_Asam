    @extends('header')
    @section('content')
        <div class="container">
            <h2>Daftar Transkasi</h2>
            <form method="get" action="{{url('create')}}">
                <button type="submit" class="btn btn-success pull-right"> Input Transaksi </button>
            </form>
            <button type="submit" class="btn btn-danger pull-right" data-toggle="modal" data-target="#reset"> Reset </button>
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
                    $x = $total++;
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
                                <form method="get" action="{{url('detail')}}">
                                    <input type="hidden" id="id_transaksi" name="id_transaksi" value="{{$transaction->id}}">
                                    <button type="submit" class="btn btn-success" >Detail</button>
                                </form>
                            </td>
                        </div>
                    </tr>
                @endforeach
            </table>
        </div>

    <div id="reset" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reset Data</h4>
                </div>
                <div class="modal-body">
                    <p> Yakin untuk menghapus semua data? </p>    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Tidak</button>
                    <form method="post" action="{{url('reset')}}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger pull-right"> Reset </button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    @endsection