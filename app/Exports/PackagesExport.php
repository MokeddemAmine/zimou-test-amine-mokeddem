<?php

namespace App\Exports;

use App\Models\Package;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PackagesExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Package::with(['commune','delivery_type','status','store'])->get()
            ->map(function($package){
                return [
                    'tracking_code' => $package->tracking_code,
                    'store'         =>$package->store->name,
                    'name'          => $package->name,
                    'status'        => $package->status_id,
                    'full_name'     => $package->client_first_name . $package->client_first_name,
                    'client_phone'  => $package->client_phone,
                    'wilaya'        => $package->commune->wilaya->name,
                    'commune'       => $package->commune->name,
                    'delivery_type' => $package->delivery_type->name,
                    'status name'   => $package->status->name,
                ];
            });
    }
    public function headings():array
    {
        return [
            'trancking code',
            'store',
            'name',
            'status',
            'client full name',
            'client phone',
            'wilaya',
            'commune',
            'delivery type',
            'status name',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
