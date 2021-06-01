<?php
namespace App\Exports;
use App\Models\Mpcoo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class MpcooExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mpcoo::all(['short_code','name']);
    }
    public function headings():array{
        return ['Shortcode','Name'];
    }
}