<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;

class TransactionController extends Controller
{
    function viewTransaction(){
    	$total = DB::table('transaksi')
    		->count();
        $total++;
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
        		'keterangan' => $request->input('keterangan'),
        		"created_at" =>  \Carbon\Carbon::now(), # \Datetime()
            	"updated_at" => \Carbon\Carbon::now(),  # \Datetime()
        	]);

    	$last_id = DB::table('transaksi')
            ->count();
    	
		DB::table('items')->insert([
    			'id_transaksi' => $last_id,
    			'aqua' => $request->input('aqua'),
    			'gula_pasir' => $request->input('gula_pasir'),
    			'kopi' => $request->input('kopi'),
    			'teh' => $request->input('teh'),
    			'type_aqua' => $request->input('type_aqua'),
    			'type_gula_pasir' => $request->input('type_gula_pasir'),
    			'type_kopi' => $request->input('type_kopi'),
    			'type_teh' => $request->input('type_teh')
    		]);

    	return redirect('');
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
    		case "P3" : return "P3"; break;
    		case "HRD" : return "SDM, Umum dan Keuangan"; break;
            case "KOT" : return "Kajian Operasi dan Teknik"; break;
            case "PRW" : return "Perawatan"; break;
            case "OPR" : return "Operasi"; break;
            case "KPR" : return "Kendali Produk"; break;
            case "ANB" : return "Angbat"; break;
            case "PLT" : return "PLTU"; break;
            case "LOG" : return "Logistik dan Gudang"; break;
            case "K3L" : return "K3L dan Security"; break;
    	}
    	return "";
    }

    function resetTable(){

        DB::table('transaksi')->delete();
    	return redirect('');
    }

    function viewDetail(Request $request){
        $transaction = DB::table('transaksi')
            ->where('id', $request->input('id_transaksi'))
            ->first();

        $items = DB::table('items')
            ->where('id_transaksi', $request->input('id_transaksi'))
            ->first();
        return view('view', ['transaction' => $transaction , 'items' => $items]);
    }
}
