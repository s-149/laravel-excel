<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

// class BarangExport implements FromCollection, WithHeadings
class BarangExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Barang::all();
    //     // ->map(function ($item) {
    //     //     $item->created_at = Carbon::parse($item->created_at)->timezone('Asia/Jakarta');
    //     //     $item->updated_at = Carbon::parse($item->updated_at)->timezone('Asia/Jakarta');
    //     //     return $item;
    //     // });
    // }
    public function array(): array
    {
        $barangs = Barang::all();
        $data = [];

        foreach ($barangs as $barang) {
            $data[] = [
                'ID' => $barang->id,
                'Nama' => $barang->nama,
                'Harga' => $barang->harga,
                'Stok' => $barang->stok,
                'Merk' => $barang->merk,
                'Kode' => $barang->kode,
                'Created At' => Carbon::parse($barang->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
                'Updated At' => Carbon::parse($barang->updated_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
            ];
        }

        return $data;
    }
    /**
     * Menambahkan header ke file Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Harga',
            'Stok',
            'Merk',
            'Kode',
            'Created At',
            'Updated At',
        ];
    }
}
