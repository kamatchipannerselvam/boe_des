<?php
namespace App\Imports;
use App\Models\Mcustomer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class McustomerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mcustomer([
          'customer_name'=>$row['name'],
          'address1'=>$row['address1'],
          'address2'=>$row['address2'],
          'emirsal_code'=>$row['emirsalcode'],
          'city'=>$row['city'],
          'country'=>$row['country'],
	]);
    }
}