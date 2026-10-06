<?php

namespace Database\Seeders;

use App\Models\Admin\FacebookToken;
use App\Models\User;
use Database\Seeders\RolesSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@laso.bg',
            'password' => Hash::make('password'),
            'phone'    => '000'
        ]);

        FacebookToken::create([
            'id' => 1,
            'facebook_token' => 'test',
        ]);

        $this->call([
            RolesSeeder::class,
            AssignRoleSeeder::class
        ]);
    }
}
