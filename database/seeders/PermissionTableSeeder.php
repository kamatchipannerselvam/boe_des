<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'mproduct-list',
           'mproduct-create',
           'mproduct-edit',
           'mproduct-delete',
           'mpcoo-list',
           'mpcoo-create',
           'mpcoo-edit',
           'mpcoo-delete',
           'mpcur-list',
           'mpcur-create',
           'mpcur-edit',
           'mpcur-delete',
           'mcustomer-list',
           'mcustomer-create',
           'mcustomer-edit',
           'mcustomer-delete'
		   ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}