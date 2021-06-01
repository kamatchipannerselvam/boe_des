<?php
namespace App\Imports;
use App\Models\Mpcoo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class MpcooImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mpcoo([
            'short_code'=>$row['shortcode'],
            'name'=>$row['name'],
        ]);
    }
}