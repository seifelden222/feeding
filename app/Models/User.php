<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'profile_photo_path',
        'phone',
        'status',
        'role',
        'selected_system',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function dailyMeals(): HasMany
    {
        return $this->hasMany(UserDailyMeal::class);
    }

    public function userNutritionPlans(): HasMany
    {
        return $this->hasMany(UserNutritionPlan::class);
    }

    public function nutritionPlans(): BelongsToMany
    {
        return $this->belongsToMany(NutritionPlan::class, 'user_nutrition_plans')
            ->withPivot(['is_primary', 'assigned_at'])
            ->withTimestamps();
    }

    public function primaryNutritionPlan(): ?NutritionPlan
    {
        $unp = $this->userNutritionPlans()->where('is_primary', true)->first();
        if ($unp) {
            return NutritionPlan::find($unp->nutrition_plan_id);
        }
        // fallback: first assigned
        $unp = $this->userNutritionPlans()->first();
        if ($unp) {
            return NutritionPlan::find($unp->nutrition_plan_id);
        }

        return null;
    }

    public function adminProfile(): HasOne
    {
        return $this->hasOne(AdminProfile::class);
    }

    public function patientProfile(): HasOne
    {
        return $this->hasOne(PatientProfile::class);
    }

    public function bodyImages(): HasMany
    {
        return $this->hasMany(BodyImage::class);
    }

    public function specialistProfile(): HasOne
    {
        return $this->hasOne(SpecialistProfile::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles')->withTimestamps();
    }

    public function hasRole(string $roleName): bool
    {
        return $this->roles()->where('name', $roleName)->exists();
    }

    public function isTrainer(): bool
    {
        return $this->role === 'trainer';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    public function homeRouteName(): string
    {
        if ($this->isAdmin()) {
            return 'admin.home';
        }

        if ($this->isTrainer()) {
            return 'trainer.home';
        }

        return 'user.home';
    }
}
