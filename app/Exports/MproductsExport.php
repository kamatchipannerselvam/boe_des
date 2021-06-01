<?php
namespace App\Exports;
use App\Models\Mproduct;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class MproductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mproduct::all(['category','brand','model_no','model_name','hscode','color']);
    }
    public function headings():array{
        return ['Category','Brand','Model','Description','Hscode','Color'];
    }
}