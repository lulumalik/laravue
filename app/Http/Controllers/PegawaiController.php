<?php
 
namespace App\Http\Controllers;
 
use Request;
use DB;
 
 
class PegawaiController extends Controller
{
	public function index()
	{
    	        // mengambil data dari table pegawai
		$pegawai = DB::table('pegawai')->paginate(10);
    	        // mengirim data pegawai ke view index
        return response()->json($pegawai, 200);
 
	}
 
}