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
        $data = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-import',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'group-list',
            'group-create',
            'group-edit',
            'group-delete',
            'member-import',
            'member-list',
            'member-create',
            'member-edit',
            'member-delete',

        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
