<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // items
        Permission::create(['name' => 'view item']);
        Permission::create(['name' => 'create item']);
        Permission::create(['name' => 'edit item']);
        Permission::create(['name' => 'delete item']);


        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());

        $role2 = Role::create(['name' => 'staff'])
            ->givePermissionTo(['view item', 'create item', 'edit item']);  
    }
}
