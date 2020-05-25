<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zakat;
use JWTAuth;

class ZakatController extends Controller
{
    // mengambil semua data
    public function all()
    {
        return Zakat::all();
    }

    // mengambil data by id
    public function show($id)
    {
        return Zakat::find($id);
    }

    // menambah data
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'keterangan_jumlah' => 'required',
        ]);

        try {
            // attempt to verify the credentials and create a token for the user
            $user = JWTAuth::parseToken()->authenticate();
            $id = $user->id;
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
    
            return response()->json(['token_expired'], 500);
    
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
    
            return response()->json(['token_invalid'], 500);
    
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
    
            return response()->json(['token_absent' => $e->getMessage()], 500);
    
        }

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
    
        $nama_file = time()."_".$file->getClientOriginalName();
    
            // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
        
		return Zakat::create([
            'id_post' => $id,
			'file' => $nama_file,
            'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'keterangan_jumlah' => $request->keterangan_jumlah,
		]);
    }

    // mengubah data
    public function update($id, Request $request)
    {
        $person = Zakat::find($id);
        $person->update($request->all());
        return $person;
    }

    // menghapus data
    public function delete($id)
    {
        $person = Zakat::find($id);
        $person->delete();
        // cara return response object
        return response()->json(['response' => 'success', 'id_deleted' => $id]);
    }
}
