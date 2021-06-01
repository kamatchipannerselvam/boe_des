<?php
namespace App\Exports;
use App\Models\Mpcur;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class MpcurExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mpcur::all(['short_code','name']);
    }
    public function headings():array{
        return ['Shortcode','Name'];
    }
}