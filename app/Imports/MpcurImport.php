<?php
namespace App\Imports;
use App\Models\Mpcur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class MpcurImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mpcur([
            'short_code'=>$row['shortcode'],
            'name'=>$row['name'],
        ]);
    }
}