<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@laso.bg')->first();
        $role = Role::where('role_name', Role::SUPER_ADMIN)->first();

        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);

    }
}
