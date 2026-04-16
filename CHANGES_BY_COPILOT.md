# Changes Applied by GitHub Copilot (session)

This file summarizes code edits made during our recent session and includes quick verification steps.

**Summary (short)**

- Fixed seeders to create required reference data and added sample NutritionPlans & MealTemplates.
- Created fallback meal templates when user has `selected_system` but no DB plan.
- Updated registration to include `age`, `phone`, and optional `selected_system`, persist them server-side, enforce phone length ($\ge 10$ digits), and enforce a stronger password policy; also maps `selected_system` to a primary `UserNutritionPlan` at registration when possible.
- Wired daily calorie totals to the dashboard donut from real meals.
- Fixed several JS/view issues (missing <script> tag) and made the trainer seed endpoint return redirect for non-AJAX requests.
- Added a safe GET redirect for the trainer seed route to avoid MethodNotAllowed when opened directly.

---

**Files modified**

- `app/Http/Controllers/User/PlansController.php`:
  - Added a fallback that returns example meal templates (Arabic names) when the user has `selected_system` but no DB-assigned NutritionPlan.

- `app/Http/Controllers/Auth/RegisteredUserController.php`:
  - During registration, search for a matching `NutritionPlan` by title keywords mapped from `selected_system` and create a `UserNutritionPlan` assignment with `is_primary=true` when found.

- `database/seeders/TestNutritionPlansSeeder.php`:
  - Now creates a specialist user/profile, a patient user/profile, a `PatientCase` and `TreatmentProgram` first, then creates `NutritionPlan` records and `MealTemplate` records linked to the treatment program (avoids FK errors).
  - Fixed column name use: `date_of_birth` in `PatientProfile`.

- `app/Http/Controllers/User/HomeController.php`:
  - Computes nutrient totals for today's meals (`totalCalories`, `totalProtein`, `totalCarb`, `totalFat`) and determines `dailyTarget` from the user's primary plan.

- `resources/views/user/home.blade.php`:
  - Renders the calorie donut and nutrient numbers from controller-computed totals instead of hard-coded values.

- `resources/views/auth/register.blade.php`:
  - Relaxed client-side phone validation (allow separators, international formats; only enforce length bounds).
  - Relaxed client-side password validation: no longer "numbers-only"; now enforces a minimum length (6 chars).

- `app/Http/Controllers/Trainer/ConsultationController.php`:
  - `seed()` now creates sample consultations and returns JSON for AJAX requests, otherwise redirects back to `trainer.home` with a flash message.
  - Removed the strict `: JsonResponse` return type so both redirect and JSON responses are allowed.

- `resources/views/trainer/home.blade.php`:
  - Fixed JS rendering bug by adding a missing opening `<script>` tag before inline JS (so the script executes instead of being printed as page text).

- `routes/web.php`:
  - Added a `GET /trainer/consultations/seed` route that redirects to `trainer.home` to prevent MethodNotAllowed when the URL is opened directly in a browser.

**How to verify locally**

1. Run migrations (if not already):

```bash
php artisan migrate --force
```

1. Seed the test nutrition plans (creates specialist/patient/treatment/plan/templates):

```bash
php artisan db:seed --class=TestNutritionPlansSeeder --force
```

1. Open the app and test flows:

- Register a new user (use `selected_system` = `diabetes` to test automatic assignment). After registration, check `user_nutrition_plans` for a row with `is_primary = 1`.
- Log in as a user and visit `/user/home` to confirm the calorie donut and nutrient numbers reflect today's meals.
- As a trainer, visit `/trainer/home` and click **Add test data** ("إضافة بيانات تجريبية"). The page should redirect back to the trainer home and show the seeded consultations.

**Notes & next steps**

- The registration server-side validation remains as defined in `RegisteredUserController` (server-side rules are authoritative). Consider adding `selected_system` to the server validation and persisting the phone server-side if required.
- I can add a flash message UI for the trainer seed action so the user sees a success notice after redirect — tell me if you want that.

---

## New changes (Apr 16, 2026)

### Profile photo + body images (user)

- **DB**: added `users.profile_photo_path` and created `body_images` table.
  - Migration: `database/migrations/2026_04_16_000001_add_profile_photo_and_body_images.php`
- **Models**:
  - `app/Models/BodyImage.php` (new)
  - `app/Models/User.php`: added `profile_photo_path` to `$fillable` and `bodyImages()` relation
- **Profile update**:
  - `app/Http/Requests/ProfileUpdateRequest.php`: validates `profile_photo` and `body_images[]`
  - `app/Http/Controllers/ProfileController.php`: stores uploads on `public` disk and creates `BodyImage` rows
- **User UI**:
  - `resources/views/user/settings.blade.php`: added upload inputs (profile photo + multiple body images)
  - `resources/views/user/body_images.blade.php`: new gallery page + delete button
  - `resources/views/components/user-slider.blade.php`: shows profile photo if present + new menu link
- **Routes**:
  - `routes/web.php`: added `GET /user/body-images` + `DELETE /user/body-images/{bodyImage}`
  - `app/Http/Controllers/User/BodyImageController.php`: list + delete (owner-only)

### Admin pages scaffold + subscriptions data

- **Admin sidebar**:
  - `resources/views/admin/partials/sidebar.blade.php`: added links for subscriptions/payments/reports/complaints and shows admin profile photo when present.
- **Admin routes**:
  - `routes/web.php`: added `/admin/subscriptions`, `/admin/payments`, `/admin/reports`, `/admin/complaints`
- **Controllers**:
  - `app/Http/Controllers/Admin/SubscriptionController.php`: loads real data from `user_nutrition_plans` with stats + pagination
  - `app/Http/Controllers/Admin/PaymentController.php`, `ReportController.php`, `ComplaintController.php`: placeholders (UI ready)
- **Views**:
  - `resources/views/admin/subscriptions.blade.php`: real stats + table (uses `UserNutritionPlan` + `NutritionPlan` + `User`)
  - `resources/views/admin/payments.blade.php`, `reports.blade.php`, `complaints.blade.php`: placeholders
- **UI fix**: removed extra `md:pr-72` padding (it was intended for a fixed sidebar, but admin sidebar is not fixed) and added Material Symbols/fonts so icons don’t show as plain text.

### Quick verification (new)

```bash
php artisan migrate
php artisan storage:link
```

- Login as admin and visit:
  - `/admin/subscriptions`
  - `/admin/payments`
  - `/admin/reports`
  - `/admin/complaints`

> Note: if `vendor/bin/pint` is not executable on your machine, run it via PHP:
> `php ./vendor/bin/pint --dirty --format agent`

---

If you want this as a changelog in a different location or more detailed per-file diffs, I can generate that next.
