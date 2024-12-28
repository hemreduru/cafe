<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'developer')->first();

        User::create([
            'name' => 'Hursit Emre',
            'email' => 'emre@emre.com',
            'password' => Hash::make('emre2000'),
            'role_id' => $adminRole->id,
        ]);
    }
}
