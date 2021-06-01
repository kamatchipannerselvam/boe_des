<?php
namespace App\Imports;
use App\Models\Mproduct;
#use Maatwebsite\Excel\Concerns\ToModel;
#use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\OnEachRow;
class MproductsImport implements OnEachRow, WithHeadingRow //ToModel, WithHeadingRow
{
     public function onRow(Row $row)
    {
        //$row = $row->toArray();

        $mproduct = Mproduct::firstOrCreate([
            'category'=>$row['category'],
            'brand'=>$row['brand'],
            'model_no'=>$row['model'],
            'model_name'=>$row['description'],
            'hscode'=>$row['hscode'],
            'color'=>$row['color'],
        ]);

        if (! $mproduct->wasRecentlyCreated) {
            $mproduct->update([
            'category'=>$row['category'],
            'brand'=>$row['brand'],
            'model_no'=>$row['model'],
            'model_name'=>$row['description'],
            'hscode'=>$row['hscode'],
            'color'=>$row['color'],
            ]);
        }
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
//    public function model(array $row)
//    {
//        return new Mproduct([
//            'category'=>$row['category'],
//            'brand'=>$row['brand'],
//            'model_no'=>$row['model'],
//            'model_name'=>$row['description'],
//            'hscode'=>$row['hscode'],
//            'color'=>$row['color'],
//        ]);
//    }
}