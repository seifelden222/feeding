<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>الوجبات اليومية | NutriZone</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#10B981",
                        secondary: "#059669",
                        "background-light": "#F3F4F6",
                        "background-dark": "#111827",
                    },
                    fontFamily: {
                        display: ["Cairo", "sans-serif"],
                    },
                },
            },
        };
    </script>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .active-day {
            background-color: #10B981;
            color: white;
        }
    </style>
</head>

<body class="min-h-screen bg-background-light text-slate-800 dark:bg-background-dark dark:text-slate-200">
    <div class="flex min-h-screen">
        <x-user-slider />

        <main class="flex-1 space-y-8 p-4 md:mr-64 md:p-8">
            <header class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 dark:text-white">خطة وجباتك اليومية</h1>
                    <p class="mt-2 text-slate-500 dark:text-slate-400">أي تعديل أو تسجيل وجبة إضافية سيظل محفوظاً عند الرجوع للصفحة.</p>
                </div>

                <a class="inline-flex items-center justify-center gap-2 rounded-2xl bg-primary px-6 py-3 font-black text-white transition hover:bg-emerald-600" href="{{ route('user.settings') }}">
                    <span class="material-symbols-outlined">settings</span>
                    العودة للخصائص
                </a>
            </header>

            <section class="rounded-[2rem] border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <div id="daysGrid" class="grid grid-cols-2 gap-2 text-center sm:grid-cols-4 lg:grid-cols-7">
                    @foreach (['السبت', 'الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة'] as $index => $day)
                        <button class="day-button rounded-2xl px-4 py-4 font-bold transition hover:bg-emerald-50 dark:hover:bg-emerald-900/20 {{ $index === 1 ? 'active-day' : '' }}" data-day="{{ $index }}" type="button">
                            {{ $day }}
                        </button>
                    @endforeach
                </div>
            </section>

            <section class="grid grid-cols-1 gap-6 xl:grid-cols-3">
                @php
                    $meals = [
                        ['key' => 'breakfast', 'title' => 'وجبة الإفطار', 'name' => 'أومليت خضار مع خبز شوفان', 'calories' => '450', 'ingredients' => 'بيض، سبانخ، طماطم، خبز شوفان، زيت زيتون.'],
                        ['key' => 'lunch', 'title' => 'وجبة الغداء', 'name' => 'دجاج مشوي مع أرز وخضار', 'calories' => '620', 'ingredients' => 'صدر دجاج، أرز بني، خضار سوتيه، سلطة خضراء.'],
                        ['key' => 'dinner', 'title' => 'وجبة العشاء', 'name' => 'زبادي يوناني مع فاكهة ومكسرات', 'calories' => '320', 'ingredients' => 'زبادي يوناني، توت، موز، لوز خام.'],
                    ];
                @endphp

                @foreach ($meals as $meal)
                    <article class="meal-card overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900" data-meal="{{ $meal['key'] }}">
                        <img alt="{{ $meal['title'] }}" class="h-52 w-full object-cover" src="{{ asset('img/Low-fat-diet-WP-image-.jpg') }}" />

                        <div class="space-y-5 p-6">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <span class="rounded-full bg-primary/10 px-3 py-1 text-xs font-black text-primary">{{ $meal['title'] }}</span>
                                    <h3 class="mt-3 text-2xl font-black text-slate-900 dark:text-white">{{ $meal['name'] }}</h3>
                                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">{{ $meal['ingredients'] }}</p>
                                </div>

                                <div class="text-left">
                                    <p class="text-2xl font-black text-primary">{{ $meal['calories'] }}</p>
                                    <p class="text-xs text-slate-500">سعرة</p>
                                </div>
                            </div>

                            <div class="rounded-2xl bg-slate-50 p-4 text-sm text-slate-600 dark:bg-slate-800 dark:text-slate-300">
                                <p class="status-text font-bold">لم يتم الحفظ بعد</p>
                            </div>

                            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                                <button class="mark-meal rounded-2xl bg-primary px-4 py-3 font-black text-white transition hover:bg-emerald-600" data-action="done" type="button">
                                    تم التناول
                                </button>
                                <button class="save-meal rounded-2xl border border-slate-200 px-4 py-3 font-black text-slate-700 transition hover:bg-slate-50 dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-800" data-action="save" type="button">
                                    حفظ الوجبة
                                </button>
                            </div>
                        </div>
                    </article>
                @endforeach
            </section>

            <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <div class="mb-6 flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary">add_circle</span>
                    <h2 class="text-xl font-black">تسجيل وجبة إضافية</h2>
                </div>

                <form id="extraMealForm" class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <div>
                        <label class="mb-2 block text-sm font-bold">اسم الوجبة</label>
                        <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" id="extraMealName" type="text" />
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold">السعرات</label>
                        <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" id="extraMealCalories" type="number" />
                    </div>
                    <div class="flex items-end">
                        <button class="w-full rounded-2xl bg-primary px-6 py-3 font-black text-white transition hover:bg-emerald-600" type="submit">
                            حفظ الوجبة الإضافية
                        </button>
                    </div>
                    <div class="md:col-span-3">
                        <label class="mb-2 block text-sm font-bold">ملاحظات</label>
                        <textarea class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" id="extraMealNotes" rows="3"></textarea>
                    </div>
                </form>

                <div id="extraMealsList" class="mt-6 space-y-3"></div>
            </section>
        </main>
    </div>

    <script>
        const storageKey = 'nutrizone-daily-meals';
        const extraMealsKey = 'nutrizone-extra-meals';
        const dayButtons = document.querySelectorAll('.day-button');
        const mealCards = document.querySelectorAll('.meal-card');
        const extraMealForm = document.getElementById('extraMealForm');
        const extraMealsList = document.getElementById('extraMealsList');

        const state = JSON.parse(localStorage.getItem(storageKey) || '{}');
        const extraMeals = JSON.parse(localStorage.getItem(extraMealsKey) || '[]');
        let activeDay = state.activeDay ?? '1';

        const persistState = () => {
            state.activeDay = activeDay;
            localStorage.setItem(storageKey, JSON.stringify(state));
        };

        const renderDays = () => {
            dayButtons.forEach((button) => {
                button.classList.toggle('active-day', button.dataset.day === activeDay);
            });
        };

        const renderMeals = () => {
            mealCards.forEach((card) => {
                const mealKey = card.dataset.meal;
                const mealState = state[activeDay]?.[mealKey];
                const statusText = card.querySelector('.status-text');

                if (!mealState) {
                    statusText.textContent = 'لم يتم الحفظ بعد';
                    return;
                }

                statusText.textContent = mealState === 'done' ? 'تم تسجيل هذه الوجبة كمكتملة.' : 'تم حفظ هذه الوجبة لليوم الحالي.';
            });
        };

        const renderExtraMeals = () => {
            extraMealsList.innerHTML = '';

            extraMeals.filter((meal) => meal.day === activeDay).forEach((meal) => {
                const item = document.createElement('div');
                item.className = 'rounded-2xl bg-slate-50 p-4 dark:bg-slate-800';
                item.innerHTML = `
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="font-black">${meal.name}</p>
                            <p class="text-sm text-slate-500">${meal.notes || 'بدون ملاحظات'}</p>
                        </div>
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-xs font-black text-primary">${meal.calories || 0} سعرة</span>
                    </div>
                `;
                extraMealsList.appendChild(item);
            });

            if (!extraMealsList.innerHTML.trim()) {
                extraMealsList.innerHTML = '<div class="rounded-2xl bg-slate-50 p-4 text-sm text-slate-500 dark:bg-slate-800 dark:text-slate-300">لا توجد وجبات إضافية مسجلة لهذا اليوم.</div>';
            }
        };

        dayButtons.forEach((button) => {
            button.addEventListener('click', () => {
                activeDay = button.dataset.day;
                persistState();
                renderDays();
                renderMeals();
                renderExtraMeals();
            });
        });

        mealCards.forEach((card) => {
            const mealKey = card.dataset.meal;

            card.querySelector('.mark-meal').addEventListener('click', () => {
                state[activeDay] = state[activeDay] || {};
                state[activeDay][mealKey] = 'done';
                persistState();
                renderMeals();
            });

            card.querySelector('.save-meal').addEventListener('click', () => {
                state[activeDay] = state[activeDay] || {};
                state[activeDay][mealKey] = 'saved';
                persistState();
                renderMeals();
            });
        });

        extraMealForm?.addEventListener('submit', (event) => {
            event.preventDefault();

            const name = document.getElementById('extraMealName').value.trim();
            const calories = document.getElementById('extraMealCalories').value.trim();
            const notes = document.getElementById('extraMealNotes').value.trim();

            if (!name) {
                return;
            }

            extraMeals.push({
                day: activeDay,
                name,
                calories,
                notes,
            });

            localStorage.setItem(extraMealsKey, JSON.stringify(extraMeals));
            extraMealForm.reset();
            renderExtraMeals();
        });

        renderDays();
        renderMeals();
        renderExtraMeals();
    </script>
</body>

</html>
