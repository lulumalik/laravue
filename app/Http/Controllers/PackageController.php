<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
// import file model Package
use App\Package;
use DB;
use Facade\FlareClient\Http\Response;

class PackageController extends Controller
{
    // mengambil semua data
    public function all()
    {
        return Package::all();
    }

    // mengambil data by id
    public function show($id)
    {
        return Package::find($id);
    }

    // menambah data
    public function store(Request $request)
    {
        return Package::create($request->all());
    }

    // mengubah data
    public function update($id, Request $request)
    {
        $package = Package::find($id);
        $package->update($request->all());
        return $package;
    }

    // menghapus data
    public function delete($id)
    {
        $person = Package::find($id);
        $person->delete();
        // cara return response object
        return response()->json(['response' => 'success', 'id_deleted' => $id]);
    }
}
