<!DOCTYPE html>

@php
    $user = auth()->user();
@endphp

<html class="light" dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>لوحة التحكم | NutriZone</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet" />
    <!-- Tailwind CSS v3 -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#10B981", // Emerald 500
                        secondary: "#3B82F6",
                        "background-light": "#F9FAFB",
                        "background-dark": "#111827",
                    },
                    fontFamily: {
                        display: ["Cairo", "sans-serif"],
                        body: ["Cairo", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.75rem",
                    },
                },
            },
        };
    </script>
    <style data-purpose="custom-layout">
        body {
            font-family: 'Cairo', sans-serif;
        }

        .circular-progress {
            background: radial-gradient(closest-side, white 79%, transparent 80% 100%),
                conic-gradient(#10B981 70%, #E5E7EB 0);
        }

        .dark .circular-progress {
            background: radial-gradient(closest-side, #1F2937 79%, transparent 80% 100%),
                conic-gradient(#10B981 70%, #374151 0);
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>
    <script>
        (() => {
            const savedTheme = localStorage.getItem('nutrizone-theme') || 'light';
            const savedLanguage = localStorage.getItem('nutrizone-language') || 'ar';

            document.documentElement.classList.toggle('dark', savedTheme === 'dark');
            document.documentElement.lang = savedLanguage;
            document.documentElement.dir = savedLanguage === 'ar' ? 'rtl' : 'ltr';
        })();
    </script>
</head>

<body
    class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-200 transition-colors duration-300">
    <!-- BEGIN: DashboardLayout -->
    <div class="flex min-h-screen">
        <!-- BEGIN: Sidebar -->
        <x-user-slider />
        <!-- END: Sidebar -->
        <!-- BEGIN: MainContent -->
        <main class="flex-1 md:mr-64 p-4 md:p-8 min-h-screen">
            <!-- Top Header / Search -->
            <header class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white">أهلاً بك، {{ $user?->name }}! 👋</h1>
                    <p class="text-slate-500 dark:text-slate-400 mt-1">دعنا نرى تقدمك اليوم.</p>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Notification -->
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 text-slate-500 hover:text-primary">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <!-- Theme Toggle (Simplified) -->
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 text-slate-500"
                        id="theme-toggle">
                        <span class="material-symbols-outlined">dark_mode</span>
                    </button>
                </div>
            </header>
            <!-- Dashboard Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- BEGIN: Left Column (Calorie & Water) -->
                <div class="lg:col-span-1 space-y-8">
                    <!-- Daily Calorie Tracker -->
                    <div class="bg-white dark:bg-gray-800 p-8 rounded-[2rem] shadow-sm border border-gray-50 dark:border-gray-700 flex flex-col items-center"
                        data-purpose="calorie-card">
                        <h3 class="text-lg font-bold mb-6 w-full text-right">السعرات اليومية</h3>
                        <div class="relative w-48 h-48 circular-progress rounded-full flex items-center justify-center">
                            <div class="text-center z-10">
                                <span class="text-3xl font-black text-slate-900 dark:text-white">1,450</span>
                                <p class="text-sm text-slate-500">من أصل 2,100</p>
                            </div>
                        </div>
                        <div class="mt-8 grid grid-cols-3 gap-4 w-full">
                            <div class="text-center">
                                <p class="text-xs text-slate-400 mb-1">بروتين</p>
                                <div class="h-1.5 bg-gray-100 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="bg-blue-500 h-full w-[80%]"></div>
                                </div>
                                <p class="text-xs font-bold mt-1">92g</p>
                            </div>
                            <div class="text-center">
                                <p class="text-xs text-slate-400 mb-1">كاربهيدرات</p>
                                <div class="h-1.5 bg-gray-100 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="bg-primary h-full w-[60%]"></div>
                                </div>
                                <p class="text-xs font-bold mt-1">140g</p>
                            </div>
                            <div class="text-center">
                                <p class="text-xs text-slate-400 mb-1">دهون</p>
                                <div class="h-1.5 bg-gray-100 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="bg-yellow-500 h-full w-[45%]"></div>
                                </div>
                                <p class="text-xs font-bold mt-1">45g</p>
                            </div>
                        </div>
                    </div>
                    <!-- Water Intake Tracker -->
                    <div class="bg-emerald-50 dark:bg-emerald-900/20 p-8 rounded-[2rem] border border-emerald-100 dark:border-emerald-800"
                        data-purpose="water-card">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-bold text-emerald-900 dark:text-emerald-400">شرب الماء</h3>
                            <span class="material-symbols-outlined text-primary text-3xl">water_drop</span>
                        </div>
                        <div class="flex flex-wrap gap-3 justify-center">
                            <!-- Active Glass -->
                            <div class="w-10 h-12 bg-primary rounded-lg flex items-end p-1">
                                <div class="w-full h-full bg-white/30 rounded-md"></div>
                            </div>
                            <div class="w-10 h-12 bg-primary rounded-lg flex items-end p-1">
                                <div class="w-full h-full bg-white/30 rounded-md"></div>
                            </div>
                            <div class="w-10 h-12 bg-primary rounded-lg flex items-end p-1">
                                <div class="w-full h-full bg-white/30 rounded-md"></div>
                            </div>
                            <div class="w-10 h-12 bg-primary rounded-lg flex items-end p-1">
                                <div class="w-full h-full bg-white/30 rounded-md"></div>
                            </div>
                            <!-- Empty Glass -->
                            <div class="w-10 h-12 border-2 border-emerald-200 dark:border-emerald-700 rounded-lg"></div>
                            <div class="w-10 h-12 border-2 border-emerald-200 dark:border-emerald-700 rounded-lg">
                            </div>
                            <div class="w-10 h-12 border-2 border-emerald-200 dark:border-emerald-700 rounded-lg">
                            </div>
                            <div class="w-10 h-12 border-2 border-emerald-200 dark:border-emerald-700 rounded-lg">
                            </div>
                        </div>
                        <p class="text-center mt-6 font-bold text-emerald-800 dark:text-emerald-300">لقد شربت 1.2 لتر
                            من 2.5 لتر</p>
                        <button
                            class="w-full mt-4 bg-primary text-white py-3 rounded-xl font-bold shadow-lg shadow-emerald-500/20 hover:scale-[1.02] transition-transform">
                            إضافة كوب ماء +
                        </button>
                    </div>
                </div>
                <!-- END: Left Column -->
                <!-- BEGIN: Right Column (Meal Summary) -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold dark:text-white">وجبات اليوم</h3>
                        <a class="text-primary text-sm font-bold cursor-pointer" href="{{ route('user.plans') }}">تعديل الخطة</a>
                    </div>
                    <!-- Breakfast -->
                    <div
                        data-dashboard-meal="breakfast"
                        class="bg-white dark:bg-gray-800 p-5 rounded-2xl shadow-sm border border-gray-50 dark:border-gray-700 flex items-center gap-6 group hover:border-primary transition-colors">
                        <div class="w-20 h-20 rounded-xl overflow-hidden bg-slate-100">
                            <img alt="Breakfast" class="w-full h-full object-cover"
                                src="{{ asset('img/Low-fat-diet-WP-image-.jpg') }}" />
                        </div>
                        <div class="flex-1">
                            <span
                                class="text-xs font-bold text-primary bg-emerald-50 dark:bg-emerald-900/30 px-2 py-0.5 rounded-md mb-1 inline-block">الإفطار</span>
                            <h4 class="meal-name font-bold dark:text-white">أومليت خضار مع خبز شوفان</h4>
                            <p class="meal-meta text-sm text-slate-500">450 سعرة حرارية • جاهزة لليوم الحالي</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="meal-icon material-symbols-outlined text-slate-400">schedule</span>
                        </div>
                    </div>
                    <!-- Lunch -->
                    <div
                        data-dashboard-meal="lunch"
                        class="bg-white dark:bg-gray-800 p-5 rounded-2xl shadow-sm border border-gray-50 dark:border-gray-700 flex items-center gap-6 group hover:border-primary transition-colors">
                        <div class="w-20 h-20 rounded-xl overflow-hidden bg-slate-100">
                            <img alt="Lunch" class="w-full h-full object-cover"
                                src="{{ asset('img/Low-fat-diet-WP-image-.jpg') }}" />
                        </div>
                        <div class="flex-1">
                            <span
                                class="text-xs font-bold text-blue-500 bg-blue-50 dark:bg-blue-900/30 px-2 py-0.5 rounded-md mb-1 inline-block">الغداء</span>
                            <h4 class="meal-name font-bold dark:text-white">دجاج مشوي مع أرز وخضار</h4>
                            <p class="meal-meta text-sm text-slate-500">620 سعرة حرارية • جاهزة لليوم الحالي</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="meal-icon material-symbols-outlined text-slate-400">schedule</span>
                        </div>
                    </div>
                    <!-- Dinner -->
                    <div
                        data-dashboard-meal="dinner"
                        class="bg-white dark:bg-gray-800 p-5 rounded-2xl shadow-sm border border-gray-50 dark:border-gray-700 flex items-center gap-6 group border-dashed border-2">
                        <div
                            class="w-20 h-20 rounded-xl overflow-hidden bg-slate-100 flex items-center justify-center">
                            <img alt="Dinner" class="h-full w-full object-cover"
                                src="{{ asset('img/Low-fat-diet-WP-image-.jpg') }}" />
                        </div>
                        <div class="flex-1">
                            <span
                                class="text-xs font-bold text-amber-500 bg-amber-50 dark:bg-amber-900/30 px-2 py-0.5 rounded-md mb-1 inline-block">العشاء</span>
                            <h4 class="meal-name font-bold dark:text-white">زبادي يوناني مع فاكهة ومكسرات</h4>
                            <p class="meal-meta text-sm text-slate-500">320 سعرة حرارية • جاهزة لليوم الحالي</p>
                        </div>
                        <button
                            class="bg-slate-100 dark:bg-gray-700 text-slate-600 dark:text-slate-300 p-2 rounded-lg">
                            <span class="material-symbols-outlined">add</span>
                        </button>
                    </div>
                    <!-- Snacks -->
                    <div
                        class="bg-white dark:bg-gray-800 p-5 rounded-2xl shadow-sm border border-gray-50 dark:border-gray-700 flex items-center gap-6 group border-dashed border-2">
                        <div
                            class="w-20 h-20 rounded-xl overflow-hidden bg-slate-100 flex items-center justify-center">
                            <span class="material-symbols-outlined text-slate-300 text-4xl">apple</span>
                        </div>
                        <div class="flex-1">
                            <span
                                class="text-xs font-bold text-purple-500 bg-purple-50 dark:bg-purple-900/30 px-2 py-0.5 rounded-md mb-1 inline-block">سناك</span>
                            <h4 class="font-bold text-slate-400">تفاحة خضراء أو لوز نئ</h4>
                            <p class="text-sm text-slate-400">150 سعرة حرارية</p>
                        </div>
                        <button
                            class="bg-slate-100 dark:bg-gray-700 text-slate-600 dark:text-slate-300 p-2 rounded-lg">
                            <span class="material-symbols-outlined">add</span>
                        </button>
                    </div>
                    <!-- Progress Chart Placeholder -->
                    <div
                        class="bg-white dark:bg-gray-800 p-8 rounded-[2rem] shadow-sm border border-gray-50 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-lg font-bold dark:text-white">ملخص الوزن الأسبوعي</h3>
                            <select class="bg-slate-50 dark:bg-gray-700 border-none rounded-lg text-sm px-4 py-1">
                                <option>آخر 7 أيام</option>
                                <option>آخر شهر</option>
                            </select>
                        </div>
                        <div class="h-40 flex items-end justify-between gap-2">
                            <div
                                class="w-full bg-emerald-100 dark:bg-emerald-900/20 rounded-t-lg h-[80%] relative group">
                                <div
                                    class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-[10px] px-2 py-1 rounded hidden group-hover:block">
                                    85kg</div>
                            </div>
                            <div
                                class="w-full bg-emerald-100 dark:bg-emerald-900/20 rounded-t-lg h-[78%] relative group">
                            </div>
                            <div
                                class="w-full bg-emerald-100 dark:bg-emerald-900/20 rounded-t-lg h-[75%] relative group">
                            </div>
                            <div
                                class="w-full bg-emerald-100 dark:bg-emerald-900/20 rounded-t-lg h-[74%] relative group">
                            </div>
                            <div
                                class="w-full bg-emerald-100 dark:bg-emerald-900/20 rounded-t-lg h-[70%] relative group">
                            </div>
                            <div class="w-full bg-primary rounded-t-lg h-[68%] relative group">
                                <div
                                    class="absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white text-[10px] px-2 py-1 rounded">
                                    82.4kg</div>
                            </div>
                        </div>
                        <div class="flex justify-between mt-4 text-[10px] text-slate-400 font-bold">
                            <span>السبت</span>
                            <span>الأحد</span>
                            <span>الاثنين</span>
                            <span>الثلاثاء</span>
                            <span>الأربعاء</span>
                            <span>الخميس</span>
                        </div>
                    </div>
                </div>
                <!-- END: Right Column -->
            </div>
        </main>
        <!-- END: MainContent -->
    </div>
    <!-- END: DashboardLayout -->
    <!-- Notifications Popup -->
    <div id="notif-popup"
        class="hidden fixed top-20 left-8 z-[999] w-80 bg-white dark:bg-gray-900 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-800 overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 dark:border-gray-800">
            <span class="font-bold text-slate-800 dark:text-white">الإشعارات</span>
            <button onclick="document.getElementById('notif-popup').classList.add('hidden')"
                class="text-slate-400 hover:text-primary"><span
                    class="material-symbols-outlined text-sm">close</span></button>
        </div>
        <div class="divide-y divide-gray-100 dark:divide-gray-800 max-h-72 overflow-y-auto">
            <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
                <span class="material-symbols-outlined text-primary mt-0.5">restaurant</span>
                <div>
                    <p class="text-sm font-bold">حان وقت وجبة الغداء</p>
                    <p class="text-xs text-slate-400">منذ 10 دقائق</p>
                </div>
            </div>
            <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
                <span class="material-symbols-outlined text-blue-500 mt-0.5">water_drop</span>
                <div>
                    <p class="text-sm font-bold">تذكير: اشرب كوب ماء</p>
                    <p class="text-xs text-slate-400">منذ 30 دقيقة</p>
                </div>
            </div>
            <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
                <span class="material-symbols-outlined text-amber-500 mt-0.5">star</span>
                <div>
                    <p class="text-sm font-bold">لقد حققت هدف البروتين اليوم!</p>
                    <p class="text-xs text-slate-400">منذ ساعة</p>
                </div>
            </div>
        </div>
    </div>

    <script data-purpose="ui-interactivity">
        const defaultMeals = {
            breakfast: {
                name: 'أومليت خضار مع خبز شوفان',
                calories: '450',
            },
            lunch: {
                name: 'دجاج مشوي مع أرز وخضار',
                calories: '620',
            },
            dinner: {
                name: 'زبادي يوناني مع فاكهة ومكسرات',
                calories: '320',
            },
        };
        const toggleBtn = document.getElementById('theme-toggle');
        const html = document.documentElement;
        const savedTheme = localStorage.getItem('nutrizone-theme') || 'light';
        const savedLanguage = localStorage.getItem('nutrizone-language') || 'ar';
        html.classList.toggle('dark', savedTheme === 'dark');
        html.lang = savedLanguage;
        html.dir = savedLanguage === 'ar' ? 'rtl' : 'ltr';
        toggleBtn.innerHTML = savedTheme === 'dark'
            ? '<span class="material-symbols-outlined">light_mode</span>'
            : '<span class="material-symbols-outlined">dark_mode</span>';

        // Theme Toggle
        toggleBtn.addEventListener('click', () => {
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('nutrizone-theme', 'light');
                toggleBtn.innerHTML = '<span class="material-symbols-outlined">dark_mode</span>';
            } else {
                html.classList.add('dark');
                localStorage.setItem('nutrizone-theme', 'dark');
                toggleBtn.innerHTML = '<span class="material-symbols-outlined">light_mode</span>';
            }
        });

        // Notifications
        const notifBtn = document.querySelector('button:has(.material-symbols-outlined:not([id]))');
        document.querySelectorAll('button').forEach(btn => {
            if (btn.querySelector('.material-symbols-outlined')?.textContent.trim() === 'notifications') {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    document.getElementById('notif-popup').classList.toggle('hidden');
                });
            }
        });
        document.addEventListener('click', () => document.getElementById('notif-popup').classList.add('hidden'));

        // Add water cup
        let cups = 4,
            totalCups = 8,
            waterLiters = 1.2;
        const waterBtn = document.querySelector('button.w-full.mt-4.bg-primary');
        const waterText = document.querySelector('.text-center.mt-6.font-bold');
        const cupsContainer = document.querySelector('.flex.flex-wrap.gap-3.justify-center');
        if (waterBtn) {
            waterBtn.addEventListener('click', () => {
                if (cups < totalCups) {
                    cups++;
                    waterLiters = (cups * 0.3).toFixed(1);
                    // rebuild cups
                    cupsContainer.innerHTML = '';
                    for (let i = 0; i < totalCups; i++) {
                        const div = document.createElement('div');
                        if (i < cups) {
                            div.className = 'w-10 h-12 bg-primary rounded-lg flex items-end p-1';
                            div.innerHTML = '<div class="w-full h-full bg-white/30 rounded-md"></div>';
                        } else {
                            div.className =
                                'w-10 h-12 border-2 border-emerald-200 dark:border-emerald-700 rounded-lg';
                        }
                        cupsContainer.appendChild(div);
                    }
                    if (waterText) waterText.textContent = `لقد شربت ${waterLiters} لتر من 2.5 لتر`;
                    if (cups === totalCups) showToast('أحسنت! لقد أكملت كمية الماء اليومية 🎉');
                } else {
                    showToast('لقد أكملت كمية الماء اليومية بالفعل!');
                }
            });
        }

        function syncDashboardMeals() {
            const mealState = JSON.parse(localStorage.getItem('nutrizone-daily-meals') || '{}');
            const activeDay = mealState.activeDay ?? '1';
            const currentDayState = mealState[activeDay] || {};

            document.querySelectorAll('[data-dashboard-meal]').forEach((card) => {
                const mealKey = card.dataset.dashboardMeal;
                const savedMeal = defaultMeals[mealKey];
                const mealName = card.querySelector('.meal-name');
                const mealMeta = card.querySelector('.meal-meta');
                const mealIcon = card.querySelector('.meal-icon');
                const status = currentDayState[mealKey];

                if (mealName) {
                    mealName.textContent = savedMeal.name;
                }

                if (mealMeta) {
                    if (status === 'done') {
                        mealMeta.textContent = `${savedMeal.calories} سعرة حرارية • تم تناول الوجبة`;
                    } else if (status === 'saved') {
                        mealMeta.textContent = `${savedMeal.calories} سعرة حرارية • تم حفظ الوجبة`;
                    } else {
                        mealMeta.textContent = `${savedMeal.calories} سعرة حرارية • جاهزة لليوم الحالي`;
                    }
                }

                if (mealIcon) {
                    mealIcon.textContent = status === 'done' ? 'check_circle' : 'schedule';
                    mealIcon.classList.toggle('text-emerald-500', status === 'done');
                    mealIcon.classList.toggle('text-slate-400', status !== 'done');
                }
            });
        }

        document.querySelectorAll('a.text-primary.text-sm.font-bold.cursor-pointer').forEach(el => {
            el.addEventListener('click', () => {
                syncDashboardMeals();
            });
        });

        // Add meal buttons
        document.querySelectorAll('button .material-symbols-outlined').forEach(icon => {
            if (icon.textContent.trim() === 'add') {
                icon.closest('button').addEventListener('click', () => showToast('تم تسجيل الوجبة بنجاح ✓'));
            }
        });

        // Toast helper
        function showToast(msg) {
            const t = document.createElement('div');
            t.className =
                'fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-sm px-5 py-3 rounded-xl shadow-xl z-[9999] transition-all';
            t.textContent = msg;
            document.body.appendChild(t);
            setTimeout(() => t.remove(), 3000);
        }

        syncDashboardMeals();
    </script>
</body>

</html>
