<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('name', 'admin')->first();
        $member = Role::where('name', 'member')->first();
if ($admin) {
            $admin->syncPermissions(Permission::all());
        }
 if ($member) {
            $member->syncPermissions(['view borrows']);
        }
    }
}
