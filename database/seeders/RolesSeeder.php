<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('roles')->insert([
            [
                'role_name' =>  Role::SUPER_ADMIN,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => Role::CLIENT,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
