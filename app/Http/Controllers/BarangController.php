<?php
// app/Http/Controllers/BarangController.php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use Illuminate\Http\Request;

use App\Exports\BarangExport;
use App\Imports\BarangImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    public function index()
    {
        return view('import', [
            'barang' => Barang::all()
        ]);
    }

    // public function preview(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:xlsx,csv',
    //     ]);

    //     $path = $request->file('file')->getRealPath();
    //     $import = new BarangImport;
    //     $data = Excel::toArray($import, $path);

    //     // Simpan data ke sesi untuk sementara
    //     Session::put('import_data', $data);

    //     return view('preview', ['data' => $data[0]]);
    // }

    // public function confirmImport()
    // {
    //     $data = Session::get('import_data');
    //     $import = new BarangImport;
    //     $import->collection(collect($data[0]));

    //     // Hapus data dari sesi setelah disimpan
    //     Session::forget('import_data');

    //     // Periksa kegagalan
    //     if ($import->failures()->isNotEmpty()) {
    //         // Menyimpan kegagalan ke sesi untuk menampilkannya di view
    //         return back()->withFailures($import->failures());
    //     }

    //     return redirect()->route('barang')->with('success', 'Data berhasil diimport!');
    // }
    // // Tambahkan mutator untuk konversi timezone dan format waktu
    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
    // }

    // public function getUpdatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
    // }

    public function export()
    {
        return Excel::download(new BarangExport, 'barangs.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        // $import = Excel::import(new BarangImport, $request->file('file'));

        // // if($import->failures())

        // return redirect()->back()->with('success', 'Data Barang berhasil diimpor.');

        $import = new BarangImport;
        Excel::import($import, $request->file('file'));

        // Periksa kegagalan
        if ($import->failures()->isNotEmpty()) {
            // Menyimpan kegagalan ke sesi untuk menampilkannya di view
            return back()->withFailures($import->failures());
        }

        return back()->with('success', 'Data berhasil diimport!');
    }

    public function showImportForm()
    {
        return view('import', [
            'barang' => Barang::all()
        ]);
    }

    public function deleteAll()
    {
        Barang::truncate();
        return redirect('/')->with('success', 'data wash deleted');
    }
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
