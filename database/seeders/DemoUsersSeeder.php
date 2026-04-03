<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patientRole = Role::query()->firstOrCreate(['name' => 'patient']);
        $specialistRole = Role::query()->firstOrCreate(['name' => 'specialist']);

        $defaultPassword = Hash::make('password');

        $user = User::query()->updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Demo User',
                'phone' => '01000000001',
                'status' => 'active',
                'role' => 'user',
                'password' => $defaultPassword,
            ],
        );

        $trainer = User::query()->updateOrCreate(
            ['email' => 'trainer@example.com'],
            [
                'name' => 'Demo Trainer',
                'phone' => '01000000002',
                'status' => 'active',
                'role' => 'trainer',
                'password' => $defaultPassword,
            ],
        );

        $user->roles()->syncWithoutDetaching([$patientRole->id]);
        $trainer->roles()->syncWithoutDetaching([$specialistRole->id]);
    }
}
