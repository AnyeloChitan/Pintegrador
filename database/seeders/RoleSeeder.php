<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roleAdmin=Role::create(['name'=>'admin']);
        $roleUser=Role::create(['name'=>'user']);

        Permission::create(['name'=>'categoria.index'])->syncRoles([$roleAdmin, $roleUser]);
        Permission::create(['name'=>'categoria.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'categoria.update'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'categoria.destroy'])->syncRoles([$roleAdmin]);
    }
}
