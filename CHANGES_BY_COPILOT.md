# Changes Applied by GitHub Copilot (session)

This file summarizes code edits made during our recent session and includes quick verification steps.

**Summary (short)**
- Fixed seeders to create required reference data and added sample NutritionPlans & MealTemplates.
- Created fallback meal templates when user has `selected_system` but no DB plan.
- Made user registration more flexible (phone and password client-side validation relaxed) and mapped `selected_system` to a primary `UserNutritionPlan` at registration.
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

2. Seed the test nutrition plans (creates specialist/patient/treatment/plan/templates):

```bash
php artisan db:seed --class=TestNutritionPlansSeeder --force
```

3. Open the app and test flows:
- Register a new user (use `selected_system` = `diabetes` to test automatic assignment). After registration, check `user_nutrition_plans` for a row with `is_primary = 1`.
- Log in as a user and visit `/user/home` to confirm the calorie donut and nutrient numbers reflect today's meals.
- As a trainer, visit `/trainer/home` and click **Add test data** ("إضافة بيانات تجريبية"). The page should redirect back to the trainer home and show the seeded consultations.

**Notes & next steps**
- The registration server-side validation remains as defined in `RegisteredUserController` (server-side rules are authoritative). Consider adding `selected_system` to the server validation and persisting the phone server-side if required.
- I can add a flash message UI for the trainer seed action so the user sees a success notice after redirect — tell me if you want that.

---

If you want this as a changelog in a different location or more detailed per-file diffs, I can generate that next.
