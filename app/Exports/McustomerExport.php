<?php
namespace App\Exports;
use App\Models\Mcustomer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class McustomerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mcustomer::all(['customer_name','address1','address2','emirsal_code','city', 'country']);
    }
    public function headings():array{
        return ['Name','Address1','Address2','Emirsalcode','City', 'Country'];
    }
}