<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Barang;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BarangImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
// class BarangImport implements ToCollection, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Barang([
            'nama'  => $row['nama'],
            'harga' => $row['harga'],
            'stok'  => $row['stok'],
            'merk'  => $row['merk'],
            'kode'  => $row['kode']
        ]);
    }
    // public function rules(): array
    // {
    //     return [
    //         'nama' => 'required',
    //         'harga' => 'required',
    //         'stok' => 'required',
    //         'merk' => 'required',
    //         'kode' => 'required|unique:barangs',
    //     ];
    // }
    // public function collection(Collection $rows)
    // {
    //     foreach ($rows as $row) {
    //         Barang::create([
    //             'nama' => $row['nama'],
    //             'harga' => $row['harga'],
    //             'stok' => $row['stok'],
    //             'merk' => $row['merk'],
    //             'kode' => $row['kode'],
    //         ]);
    //     }
    // }
    public function rules(): array
    {
        return [
            'kode' => 'unique:barangs,kode', // Validasi untuk memastikan 'kode' unik di tabel 'barangs'
        ];
    }

    public function customValidationMessages()
    {
        return [
            'kode.unique' => 'Kode :input sudah ada di database.',
        ];
    }
}
