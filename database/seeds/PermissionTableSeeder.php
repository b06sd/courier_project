<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'View User',
            'Add User',
            'Edit User',
            'Delete User',
            'View Account',
            'Add Account',
            'Edit Account',
            'Delete Account',
            'View Role',
            'Add Role',
            'Edit Role',
            'Delete Role',
            'View Permission',
            'Add Permission',
            'Edit Permission',
            'Delete Permission',
            'View Sale',
            'Add Sale',
            'Edit Sale',
            'Delete Sale',
            'View Consignee',
            'Add Consignee',
            'Edit Consignee',
            'Delete Consignee',
            'View Courier',
            'Add Courier',
            'Edit Courier',
            'Delete Courier',
            'View Product',
            'Add Product',
            'Edit Product',
            'Delete Product',
         ];


         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
