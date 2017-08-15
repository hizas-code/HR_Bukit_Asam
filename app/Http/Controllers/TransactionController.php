<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    function viewTransaction(){
    	$total = DB::table('transaksi')
    		->count();
        $transactions = DB::table('transaksi')->get();
        return view('data', ['transactions' => $transactions, 'total' => $total]);
    }

    function createTransaction(Request $request){
        return view('create');
    }

    function insertTransaction(Request $request){
    
    	$total = DB::table('transaksi')
    		->where('satuan_kerja', $this->getDivision($request->input('satuan_kerja')))
    		->count();
    	$total++;
    	$nomor_struk = $request->input('satuan_kerja') . '-' . $this->generateNumber($total);
    	DB::table('transaksi')->insert([
        		'nomor_struk' => $nomor_struk,
        		'nama_pengambil' => $request->input('nama_pengambil'),
        		'nama_peminta' => $request->input('nama_peminta'),
        		'satuan_kerja' => $this->getDivision($request->input('satuan_kerja')),
        		'barang' => $request->input('barang'),
        		'satuan' => $request->input('satuan'),
        		'jumlah' => $request->input('jumlah'),
        		'keterangan' => $request->input('keterangan'),
        		"created_at" =>  \Carbon\Carbon::now(), # \Datetime()
            	"updated_at" => \Carbon\Carbon::now(),  # \Datetime()
        	]);
    	$transactions = DB::table('transaksi')->get();
    	return redirect('')->with(['transactions' => $transactions, 'total' => $total]);
    }

    function generateNumber($x)
    {
    	if($x == 999)
    		return '001';
    	else if($x > 99)
    		return $x;
    	else if($x > 9)
    		return '0' . $x;
    	else return '00' . $x;
    }

    function getDivision($div_code)
    {
    	switch($div_code){
    		case "HRD" : return "SDM, Umum dan Keuangan"; break;
            case "KOT" : return "Kajian Operasi dan Teknik"; break;
            case "PRW" : return "Perawatan"; break;
            case "OPR" : return "Operasi"; break;
            case "KPR" : return "Kendali Produk"; break;
    	}
    	return "";
    }
}
