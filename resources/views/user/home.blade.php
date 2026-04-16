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
                        @php
                            $pct = $dailyTarget > 0 ? min(100, intval(($totalCalories / $dailyTarget) * 100)) : 0;
                        @endphp
                        <div class="relative w-48 h-48 rounded-full flex items-center justify-center"
                             style="background: radial-gradient(closest-side, white 79%, transparent 80% 100%), conic-gradient(#10B981 {{$pct}}%, #E5E7EB 0);">
                            <div class="text-center z-10">
                                <span class="text-3xl font-black text-slate-900 dark:text-white">{{ number_format($totalCalories) }}</span>
                                <p class="text-sm text-slate-500">من أصل {{ number_format($dailyTarget) }}</p>
                            </div>
                        </div>
                        <div class="mt-8 grid grid-cols-3 gap-4 w-full">
                            <div class="text-center">
                                <p class="text-xs text-slate-400 mb-1">بروتين</p>
                                <div class="h-1.5 bg-gray-100 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="bg-blue-500 h-full w-[80%]"></div>
                                </div>
                                <p class="text-xs font-bold mt-1">{{ round($totalProtein) }}g</p>
                            </div>
                            <div class="text-center">
                                <p class="text-xs text-slate-400 mb-1">كاربهيدرات</p>
                                <div class="h-1.5 bg-gray-100 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="bg-primary h-full w-[60%]"></div>
                                </div>
                                <p class="text-xs font-bold mt-1">{{ round($totalCarb) }}g</p>
                            </div>
                            <div class="text-center">
                                <p class="text-xs text-slate-400 mb-1">دهون</p>
                                <div class="h-1.5 bg-gray-100 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="bg-yellow-500 h-full w-[45%]"></div>
                                </div>
                                <p class="text-xs font-bold mt-1">{{ round($totalFat) }}g</p>
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
                        <div id="cupsContainer" class="flex flex-wrap gap-3 justify-center">
                            @for($i = 0; $i < 8; $i++)
                                @if($i < $waterCups)
                                    <div class="w-10 h-12 bg-primary rounded-lg flex items-end p-1">
                                        <div class="w-full h-full bg-white/30 rounded-md"></div>
                                    </div>
                                @else
                                    <div class="w-10 h-12 border-2 border-emerald-200 dark:border-emerald-700 rounded-lg"></div>
                                @endif
                            @endfor
                        </div>
                        <p id="waterText" class="text-center mt-6 font-bold text-emerald-800 dark:text-emerald-300">
                            لقد شربت {{ number_format($waterCups * 0.3, 1) }} لتر من 2.5 لتر
                        </p>
                        <button id="addWaterBtn"
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
                        <button onclick="document.getElementById('addMealModal').classList.remove('hidden')"
                            class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-emerald-600 transition-colors">
                            <span class="material-symbols-outlined text-base">add</span>
                            إضافة وجبة
                        </button>
                    </div>

                    @if(session('meal-added'))
                        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-bold text-emerald-700">
                            {{ session('meal-added') }}
                        </div>
                    @endif

                    @forelse($meals as $meal)
                    <div class="bg-white dark:bg-gray-800 p-5 rounded-2xl shadow-sm border border-gray-50 dark:border-gray-700 flex items-center gap-6 group hover:border-primary transition-colors">
                        <div class="w-20 h-20 rounded-xl overflow-hidden bg-slate-100 shrink-0">
                            @if($meal->image_path)
                                <img alt="{{ $meal->name }}" class="w-full h-full object-cover" src="{{ asset('storage/'.$meal->image_path) }}" />
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="material-symbols-outlined text-slate-300 text-4xl">restaurant</span>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            @php
                                $typeColors = [
                                    'breakfast' => 'text-primary bg-emerald-50',
                                    'lunch'     => 'text-blue-500 bg-blue-50',
                                    'dinner'    => 'text-amber-500 bg-amber-50',
                                    'snack'     => 'text-purple-500 bg-purple-50',
                                ];
                            @endphp
                            <span class="text-xs font-bold px-2 py-0.5 rounded-md mb-1 inline-block {{ $typeColors[$meal->meal_type] ?? 'text-slate-500 bg-slate-50' }}">
                                {{ $meal->mealTypeLabel() }}
                            </span>
                            <h4 class="font-bold dark:text-white">{{ $meal->name }}</h4>
                            <p class="text-sm text-slate-500">
                                {{ $meal->calories ? $meal->calories.' سعرة' : '' }}
                                {{ $meal->protein_g ? '• بروتين '.$meal->protein_g.'g' : '' }}
                                {{ $meal->carb_g ? '• كارب '.$meal->carb_g.'g' : '' }}
                                {{ $meal->fat_g ? '• دهون '.$meal->fat_g.'g' : '' }}
                            </p>
                            @if($meal->notes)
                                <p class="text-xs text-slate-400 mt-1">{{ $meal->notes }}</p>
                            @endif
                        </div>
                        <form action="{{ route('user.meals.destroy', $meal) }}" method="POST" onsubmit="return confirm('حذف الوجبة؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 rounded-xl text-slate-300 hover:text-red-400 hover:bg-red-50 transition-colors">
                                <span class="material-symbols-outlined text-base">delete</span>
                            </button>
                        </form>
                    </div>
                    @empty
                    <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl border border-dashed border-slate-200 dark:border-gray-700 text-center">
                        <span class="material-symbols-outlined text-slate-300 text-5xl">restaurant</span>
                        <p class="text-slate-400 font-bold mt-3">لم تسجل أي وجبات اليوم بعد</p>
                        <button onclick="document.getElementById('addMealModal').classList.remove('hidden')"
                            class="mt-4 bg-primary text-white px-6 py-2 rounded-xl text-sm font-bold hover:bg-emerald-600 transition-colors">
                            إضافة أول وجبة
                        </button>
                    </div>
                    @endforelse
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
    <!-- Add Meal Modal -->
    <div id="addMealModal" class="hidden fixed inset-0 bg-black/40 z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-black dark:text-white">إضافة وجبة جديدة</h3>
                <button onclick="document.getElementById('addMealModal').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form action="{{ route('user.meals.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="meal_date" value="{{ $today }}">
                <div>
                    <label class="mb-2 block text-sm font-bold dark:text-slate-200">اسم الوجبة</label>
                    <input name="name" type="text" required class="w-full rounded-2xl border-slate-200 bg-slate-50 dark:bg-gray-700 dark:border-gray-600 px-4 py-3 focus:border-primary focus:ring-primary" placeholder="مثال: دجاج مشوي مع أرز" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold dark:text-slate-200">نوع الوجبة</label>
                    <select name="meal_type" required class="w-full rounded-2xl border-slate-200 bg-slate-50 dark:bg-gray-700 dark:border-gray-600 px-4 py-3 focus:border-primary focus:ring-primary">
                        <option value="breakfast">الإفطار</option>
                        <option value="lunch">الغداء</option>
                        <option value="dinner">العشاء</option>
                        <option value="snack">سناك</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="mb-2 block text-sm font-bold dark:text-slate-200">السعرات الحرارية</label>
                        <input name="calories" type="number" min="0" class="w-full rounded-2xl border-slate-200 bg-slate-50 dark:bg-gray-700 dark:border-gray-600 px-4 py-3 focus:border-primary focus:ring-primary" placeholder="مثال: 450" />
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold dark:text-slate-200">بروتين (g)</label>
                        <input name="protein_g" type="number" min="0" step="0.1" class="w-full rounded-2xl border-slate-200 bg-slate-50 dark:bg-gray-700 dark:border-gray-600 px-4 py-3 focus:border-primary focus:ring-primary" placeholder="0" />
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold dark:text-slate-200">كاربوهيدرات (g)</label>
                        <input name="carb_g" type="number" min="0" step="0.1" class="w-full rounded-2xl border-slate-200 bg-slate-50 dark:bg-gray-700 dark:border-gray-600 px-4 py-3 focus:border-primary focus:ring-primary" placeholder="0" />
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold dark:text-slate-200">دهون (g)</label>
                        <input name="fat_g" type="number" min="0" step="0.1" class="w-full rounded-2xl border-slate-200 bg-slate-50 dark:bg-gray-700 dark:border-gray-600 px-4 py-3 focus:border-primary focus:ring-primary" placeholder="0" />
                    </div>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold dark:text-slate-200">ملاحظات (اختياري)</label>
                    <textarea name="notes" rows="2" class="w-full rounded-2xl border-slate-200 bg-slate-50 dark:bg-gray-700 dark:border-gray-600 px-4 py-3 focus:border-primary focus:ring-primary" placeholder="أي ملاحظات إضافية..."></textarea>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold dark:text-slate-200">صورة الوجبة (اختياري)</label>
                    <input name="image" type="file" accept="image/*" class="w-full rounded-2xl border border-slate-200 bg-slate-50 dark:bg-gray-700 dark:border-gray-600 px-4 py-3 text-sm" />
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="submit" class="flex-1 bg-primary hover:bg-emerald-600 text-white py-3 rounded-2xl font-black transition-all">إضافة الوجبة</button>
                    <button type="button" onclick="document.getElementById('addMealModal').classList.add('hidden')" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 py-3 rounded-2xl font-black transition-all">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
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
        const toggleBtn = document.getElementById('theme-toggle');
        const html = document.documentElement;
        const savedTheme = localStorage.getItem('nutrizone-theme') || 'light';
        html.classList.toggle('dark', savedTheme === 'dark');
        toggleBtn.innerHTML = savedTheme === 'dark'
            ? '<span class="material-symbols-outlined">light_mode</span>'
            : '<span class="material-symbols-outlined">dark_mode</span>';

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

        // Water tracker
        let cups = {{ $waterCups }};
        const totalCups = 8;
        const waterBtn = document.getElementById('addWaterBtn');
        const waterText = document.getElementById('waterText');
        const cupsContainer = document.getElementById('cupsContainer');

        function renderCups(count) {
            cupsContainer.innerHTML = '';
            for (let i = 0; i < totalCups; i++) {
                const div = document.createElement('div');
                if (i < count) {
                    div.className = 'w-10 h-12 bg-primary rounded-lg flex items-end p-1';
                    div.innerHTML = '<div class="w-full h-full bg-white/30 rounded-md"></div>';
                } else {
                    div.className = 'w-10 h-12 border-2 border-emerald-200 dark:border-emerald-700 rounded-lg';
                }
                cupsContainer.appendChild(div);
            }
            waterText.textContent = `لقد شربت ${(count * 0.3).toFixed(1)} لتر من 2.5 لتر`;
        }

        if (waterBtn) {
            waterBtn.addEventListener('click', () => {
                if (cups >= totalCups) return;
                fetch('{{ route('user.water.add-cup') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                })
                .then(r => r.json())
                .then(data => {
                    cups = data.cups;
                    renderCups(cups);
                });
            });
        }

        // Close modal on backdrop click
        document.getElementById('addMealModal').addEventListener('click', function(e) {
            if (e.target === this) this.classList.add('hidden');
        });
    </script>
</body>
</html>
