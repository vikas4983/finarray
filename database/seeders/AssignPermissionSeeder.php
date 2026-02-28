<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AssignPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::find(1);
 if ($admin) {
            $admin->syncPermissions(Permission::all());
        }
 $viewPermission = Permission::where('name', 'view borrows')
            ->where('guard_name', 'web')
            ->first();
  $users = User::where('id', '!=', 1)->get();
 foreach ($users as $user) {
            if ($viewPermission) {
                $user->syncPermissions([$viewPermission]);
            }
        }
    }
}
