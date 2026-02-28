<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $members =   User::factory(10)->create([
            'password' => Hash::make('password'),
        ]);
       foreach ($members as $member) {
          $member->assignRole('member');
       }
    }
}
