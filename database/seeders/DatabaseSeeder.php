<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::query()->firstOrCreate(['name' => 'admin']);
        $specialistRole = Role::query()->firstOrCreate(['name' => 'specialist']);
        $patientRole = Role::query()->firstOrCreate(['name' => 'patient']);

        $permissions = [
            'users.create',
            'users.update',
            'users.delete',
            'roles.assign',
            'permissions.manage',
            'cases.read_all',
            'programs.read_all',
            'reports.read_all',
            'patients.read_assigned',
            'cases.create',
            'cases.update_assigned',
            'treatment_programs.create',
            'treatment_programs.update',
            'nutrition_plans.create',
            'nutrition_plans.update',
            'sports_programs.create',
            'sports_programs.update',
            'assignments.create',
            'assignments.update',
            'reports.create',
            'reports.read_assigned',
            'profile.read_self',
            'profile.update_self',
            'plans.read_self',
            'reports.read_self',
            'adherence_logs.create_self',
        ];

        foreach ($permissions as $code) {
            Permission::query()->firstOrCreate(['code' => $code]);
        }

        $adminRole->permissions()->sync(Permission::query()->whereIn('code', [
            'users.create',
            'users.update',
            'users.delete',
            'roles.assign',
            'permissions.manage',
            'cases.read_all',
            'programs.read_all',
            'reports.read_all',
        ])->pluck('id'));

        $specialistRole->permissions()->sync(Permission::query()->whereIn('code', [
            'patients.read_assigned',
            'cases.create',
            'cases.update_assigned',
            'treatment_programs.create',
            'treatment_programs.update',
            'nutrition_plans.create',
            'nutrition_plans.update',
            'sports_programs.create',
            'sports_programs.update',
            'assignments.create',
            'assignments.update',
            'reports.create',
            'reports.read_assigned',
        ])->pluck('id'));

        $patientRole->permissions()->sync(Permission::query()->whereIn('code', [
            'profile.read_self',
            'profile.update_self',
            'plans.read_self',
            'reports.read_self',
            'adherence_logs.create_self',
        ])->pluck('id'));

        $adminUser = User::query()->firstOrCreate(
            ['email' => 'test@example.com'],
            User::factory()->make([
                'name' => 'Test User',
                'role' => 'trainer',
            ])->toArray(),
        );

        $adminUser->roles()->syncWithoutDetaching([$adminRole->id]);

        $this->call(DemoUsersSeeder::class);
    }
}
