<!DOCTYPE html>

<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>NutriZone | خطة الوجبات</title>
    <!-- BEGIN: Fonts and Icons -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet" />
    <!-- END: Fonts and Icons -->
    <!-- BEGIN: Tailwind Configuration -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#10B981", // Emerald 500
                        secondary: "#059669",
                        "background-light": "#F3F4F6",
                        "background-dark": "#111827",
                    },
                    fontFamily: {
                        display: ["Cairo", "sans-serif"],
                        body: ["Cairo", "sans-serif"],
                    },
                },
            },
        };
    </script>
    <!-- END: Tailwind Configuration -->
    <style data-purpose="custom-layout">
        body {
            font-family: 'Cairo', sans-serif;
        }

        .active-day {
            background-color: #10B981;
            color: white;
            box-shadow: 0 4px 14px 0 rgba(16, 185, 129, 0.39);
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #10B981;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-200 min-h-screen flex">
    <!-- BEGIN: Sidebar Navigation -->
<x-user-slider />

    <!-- END: Sidebar Navigation -->
    <!-- BEGIN: Main Content Area -->
    <main class="flex-1 mr-20 md:mr-64 p-4 md:p-8">
        <!-- BEGIN: Header Section -->
        <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-black text-slate-900 dark:text-white">خطة وجباتك اليومية</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-1">تابع تغذيتك وحقق أهدافك الصحية</p>
            </div>
            <div class="flex items-center gap-3">
                <button
                    class="bg-white dark:bg-slate-800 p-2.5 rounded-xl border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-slate-700 transition-all">
                    <span class="material-symbols-outlined">print</span>
                </button>
                <button
                    class="bg-primary text-white px-6 py-2.5 rounded-xl font-bold flex items-center gap-2 hover:bg-emerald-600 transition-all">
                    <span class="material-symbols-outlined">file_download</span>
                    تنزيل الخطة
                </button>
            </div>
        </header>
        <!-- END: Header Section -->
        <!-- BEGIN: Weekly Calendar -->
        <section class="mb-10" data-purpose="weekly-calendar">
            <div
                class="bg-white dark:bg-slate-900 rounded-[2rem] p-4 shadow-sm border border-gray-100 dark:border-gray-800">
                <div class="grid grid-cols-7 gap-2 text-center">
                    <button
                        class="p-4 rounded-2xl flex flex-col items-center gap-1 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition-all">
                        <span class="text-xs font-bold text-slate-400">السبت</span>
                        <span class="text-lg font-black">١٥</span>
                    </button>
                    <button class="p-4 rounded-2xl flex flex-col items-center gap-1 active-day transition-all">
                        <span class="text-xs font-bold opacity-80">الأحد</span>
                        <span class="text-lg font-black">١٦</span>
                    </button>
                    <button
                        class="p-4 rounded-2xl flex flex-col items-center gap-1 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition-all">
                        <span class="text-xs font-bold text-slate-400">الاثنين</span>
                        <span class="text-lg font-black">١٧</span>
                    </button>
                    <button
                        class="p-4 rounded-2xl flex flex-col items-center gap-1 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition-all">
                        <span class="text-xs font-bold text-slate-400">الثلاثاء</span>
                        <span class="text-lg font-black">١٨</span>
                    </button>
                    <button
                        class="p-4 rounded-2xl flex flex-col items-center gap-1 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition-all">
                        <span class="text-xs font-bold text-slate-400">الأربعاء</span>
                        <span class="text-lg font-black">١٩</span>
                    </button>
                    <button
                        class="p-4 rounded-2xl flex flex-col items-center gap-1 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition-all">
                        <span class="text-xs font-bold text-slate-400">الخميس</span>
                        <span class="text-lg font-black">٢٠</span>
                    </button>
                    <button
                        class="p-4 rounded-2xl flex flex-col items-center gap-1 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition-all">
                        <span class="text-xs font-bold text-slate-400">الجمعة</span>
                        <span class="text-lg font-black">٢١</span>
                    </button>
                </div>
            </div>
        </section>
        <!-- END: Weekly Calendar -->
        <!-- BEGIN: Meal Cards Container -->
        <section class="space-y-6" data-purpose="daily-meals">
            <!-- BEGIN: Breakfast Card -->
            <article
                class="bg-white dark:bg-slate-900 rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100 dark:border-gray-800 flex flex-col md:flex-row group transition-all hover:shadow-xl">
                <div class="md:w-64 h-48 md:h-auto shrink-0 relative overflow-hidden">
                    <img alt="Breakfast"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZCjaSli2gWnUhXG-iHJYTBmGPH6QBaXWhcP_lw9ezB-1AzHA1GLY3OhxbolGEiJd-IHTC6drU84Ae2PjlvQEdyrRn5e0Ws8kYbI6LIJPGYyLZ2BObGPcehlOijmJuusH8PAYFhaemMQlSnDkllAGOfnIaWUWfqIOoiJkLjV2hcQZJk0NVxHvlmvaKNtnbJKBGaC7wOVnYlcgSRUibf9bwzYxkFYTFWpXSbMyWRX6ZPqFCdWYk52CI3mTR1DgafoffqbYvef7EabWU" />
                    <div class="absolute inset-0 bg-black/20"></div>
                    <span
                        class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-black text-emerald-600">وجبة
                        الإفطار</span>
                </div>
                <div class="p-6 md:p-8 flex-1">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-2xl font-black text-slate-900 dark:text-white">أومليت الخضار مع خبز الشوفان
                            </h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">غني بالألياف والبروتين لبداية يوم
                                نشيطة</p>
                        </div>
                        <div class="text-left">
                            <span class="text-2xl font-black text-primary">٤٥٠</span>
                            <span class="text-xs block text-slate-400">سعرة حرارية</span>
                        </div>
                    </div>
                    <!-- Macros -->
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div
                            class="bg-emerald-50 dark:bg-emerald-900/20 p-3 rounded-2xl border border-emerald-100 dark:border-emerald-800">
                            <span class="block text-[10px] text-emerald-600 font-bold uppercase mb-1">بروتين</span>
                            <span class="font-bold text-slate-900 dark:text-white">٢٥ جم</span>
                        </div>
                        <div
                            class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-2xl border border-blue-100 dark:border-blue-800">
                            <span class="block text-[10px] text-blue-600 font-bold uppercase mb-1">كربوهيدرات</span>
                            <span class="font-bold text-slate-900 dark:text-white">٣٠ جم</span>
                        </div>
                        <div
                            class="bg-amber-50 dark:bg-amber-900/20 p-3 rounded-2xl border border-amber-100 dark:border-amber-800">
                            <span class="block text-[10px] text-amber-600 font-bold uppercase mb-1">دهون</span>
                            <span class="font-bold text-slate-900 dark:text-white">١٢ جم</span>
                        </div>
                    </div>
                    <!-- Ingredients -->
                    <div class="mb-8">
                        <h4 class="font-bold text-slate-700 dark:text-slate-300 text-sm mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined text-xs">list_alt</span>
                            المكونات:
                        </h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">
                            ٣ بيضات كبيرة، سبانخ طازجة، طماطم كرزية، فلفل ملون، ملعقة زيت زيتون، شريحة خبز شوفان، رشة
                            زعتر بري.
                        </p>
                    </div>
                    <!-- Actions -->
                    <div class="flex items-center gap-4">
                        <button
                            class="flex-1 bg-primary text-white font-bold py-3 rounded-2xl flex items-center justify-center gap-2 hover:bg-emerald-600 transition-all">
                            <span class="material-symbols-outlined">done</span>
                            تم التناول
                        </button>
                        <button
                            class="flex-1 border-2 border-slate-100 dark:border-slate-800 text-slate-600 dark:text-slate-400 font-bold py-3 rounded-2xl flex items-center justify-center gap-2 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                            <span class="material-symbols-outlined">swap_horiz</span>
                            تبديل الوجبة
                        </button>
                    </div>
                </div>
            </article>
            <!-- END: Breakfast Card -->
            <!-- BEGIN: Lunch Card -->
            <article
                class="bg-white dark:bg-slate-900 rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100 dark:border-gray-800 flex flex-col md:flex-row group transition-all hover:shadow-xl">
                <div class="md:w-64 h-48 md:h-auto shrink-0 relative overflow-hidden">
                    <img alt="Lunch"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuA4xFSrSDmXu-Ryy3pfKM21cY066_R5amwixJL2q434KFsRnCnQbgiBsFmJDvE5KLNSJNx-7L925DKwD3KCV2rleiXS7Is-xujH0fPK2Gn4G5AEv2t6EBNvSNm9iisB1-O15fvN7tndhk2Kv3gXiSOkpLqk0Ce4QmCymOLC3cwK2I0k-Jrodc1dz_4i3lP5HuFVsLayWLMs7Betg0oewcU7YZGSdECn9tLM4jc1Uq663XoWIxrVesTbh6TLk4i52F716Y7n-IwEuSaI" />
                    <div class="absolute inset-0 bg-black/20"></div>
                    <span
                        class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-black text-emerald-600">وجبة
                        الغداء</span>
                </div>
                <div class="p-6 md:p-8 flex-1">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-2xl font-black text-slate-900 dark:text-white">سلمون مشوي مع الكينوا</h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">أوميغا 3 وكربوهيدرات معقدة
                                للطاقة</p>
                        </div>
                        <div class="text-left">
                            <span class="text-2xl font-black text-primary">٦٢٠</span>
                            <span class="text-xs block text-slate-400">سعرة حرارية</span>
                        </div>
                    </div>
                    <!-- Macros -->
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div
                            class="bg-emerald-50 dark:bg-emerald-900/20 p-3 rounded-2xl border border-emerald-100 dark:border-emerald-800">
                            <span class="block text-[10px] text-emerald-600 font-bold uppercase mb-1">بروتين</span>
                            <span class="font-bold text-slate-900 dark:text-white">٤٠ جم</span>
                        </div>
                        <div
                            class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-2xl border border-blue-100 dark:border-blue-800">
                            <span class="block text-[10px] text-blue-600 font-bold uppercase mb-1">كربوهيدرات</span>
                            <span class="font-bold text-slate-900 dark:text-white">٤٥ جم</span>
                        </div>
                        <div
                            class="bg-amber-50 dark:bg-amber-900/20 p-3 rounded-2xl border border-amber-100 dark:border-amber-800">
                            <span class="block text-[10px] text-amber-600 font-bold uppercase mb-1">دهون</span>
                            <span class="font-bold text-slate-900 dark:text-white">١٨ جم</span>
                        </div>
                    </div>
                    <!-- Ingredients -->
                    <div class="mb-8">
                        <h4 class="font-bold text-slate-700 dark:text-slate-300 text-sm mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined text-xs">list_alt</span>
                            المكونات:
                        </h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">
                            ١٥٠ جرام سلمون فيليه، نصف كوب كينوا مطبوخة، بروكلي مسلوق، عصير ليمون، ثوم مهروس، أعشاب
                            إيطالية.
                        </p>
                    </div>
                    <!-- Actions -->
                    <div class="flex items-center gap-4">
                        <button
                            class="flex-1 bg-primary text-white font-bold py-3 rounded-2xl flex items-center justify-center gap-2 hover:bg-emerald-600 transition-all">
                            <span class="material-symbols-outlined">done</span>
                            تم التناول
                        </button>
                        <button
                            class="flex-1 border-2 border-slate-100 dark:border-slate-800 text-slate-600 dark:text-slate-400 font-bold py-3 rounded-2xl flex items-center justify-center gap-2 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                            <span class="material-symbols-outlined">swap_horiz</span>
                            تبديل الوجبة
                        </button>
                    </div>
                </div>
            </article>
            <!-- END: Lunch Card -->
        </section>
        <!-- END: Meal Cards Container -->
        <!-- BEGIN: Quick Stats/Macros Summary -->
        <section class="mt-12 mb-8 grid grid-cols-1 md:grid-cols-4 gap-6">
            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] shadow-sm border border-gray-100 dark:border-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-slate-500 font-bold text-sm">إجمالي السعرات</span>
                    <span class="material-symbols-outlined text-primary">bolt</span>
                </div>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-black text-slate-900 dark:text-white">١٨٥٠</span>
                    <span class="text-slate-400 text-xs mb-1">/ ٢٢٠٠ سعرة</span>
                </div>
                <div class="w-full bg-gray-100 dark:bg-slate-800 h-2 rounded-full mt-4 overflow-hidden">
                    <div class="bg-primary h-full rounded-full" style="width: 84%"></div>
                </div>
            </div>
            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] shadow-sm border border-gray-100 dark:border-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-slate-500 font-bold text-sm">شرب الماء</span>
                    <span class="material-symbols-outlined text-blue-500">water_drop</span>
                </div>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-black text-slate-900 dark:text-white">١.٥</span>
                    <span class="text-slate-400 text-xs mb-1">/ ٣.٠ لتر</span>
                </div>
                <div class="w-full bg-gray-100 dark:bg-slate-800 h-2 rounded-full mt-4 overflow-hidden">
                    <div class="bg-blue-500 h-full rounded-full" style="width: 50%"></div>
                </div>
            </div>
            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] shadow-sm border border-gray-100 dark:border-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-slate-500 font-bold text-sm">الألياف</span>
                    <span class="material-symbols-outlined text-emerald-600">potted_plant</span>
                </div>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-black text-slate-900 dark:text-white">٢٢</span>
                    <span class="text-slate-400 text-xs mb-1">/ ٣٠ جم</span>
                </div>
                <div class="w-full bg-gray-100 dark:bg-slate-800 h-2 rounded-full mt-4 overflow-hidden">
                    <div class="bg-emerald-600 h-full rounded-full" style="width: 73%"></div>
                </div>
            </div>
            <div class="bg-emerald-600 p-6 rounded-[2rem] shadow-lg shadow-emerald-500/30 text-white">
                <h4 class="font-bold mb-2">ملاحظة المدرب:</h4>
                <p class="text-xs opacity-90 leading-relaxed italic">
                    "ممتاز يا أحمد! لقد حققت نسبة البروتين المطلوبة اليوم. تذكر أن تشرب لتر ماء إضافي قبل التمرين
                    الليلة."
                </p>
            </div>
        </section>
        <!-- END: Quick Stats -->
    </main>
    <!-- END: Main Content Area -->

    <!-- Notifications Popup -->
    <div id="notif-popup"
        class="hidden fixed top-20 left-8 z-[999] w-80 bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-800 overflow-hidden">
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
                    <p class="text-sm font-bold">خطة وجباتك محدّثة</p>
                    <p class="text-xs text-slate-400">منذ 5 دقائق</p>
                </div>
            </div>
            <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
                <span class="material-symbols-outlined text-amber-500 mt-0.5">star</span>
                <div>
                    <p class="text-sm font-bold">حققت هدف البروتين اليوم!</p>
                    <p class="text-xs text-slate-400">منذ ساعة</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Swap Meal Modal -->
    <div id="swap-modal" class="hidden fixed inset-0 bg-black/50 z-[998] flex items-center justify-center">
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 w-80 shadow-2xl">
            <h3 class="font-bold text-lg mb-4">تبديل الوجبة</h3>
            <div class="space-y-3">
                <div class="p-3 border border-slate-200 dark:border-slate-700 rounded-xl cursor-pointer hover:border-primary transition-colors"
                    onclick="selectMeal(this, 'سلطة الكينوا بالخضار - 380 سعرة')">سلطة الكينوا بالخضار - 380 سعرة</div>
                <div class="p-3 border border-slate-200 dark:border-slate-700 rounded-xl cursor-pointer hover:border-primary transition-colors"
                    onclick="selectMeal(this, 'شوفان بالموز والعسل - 420 سعرة')">شوفان بالموز والعسل - 420 سعرة</div>
                <div class="p-3 border border-slate-200 dark:border-slate-700 rounded-xl cursor-pointer hover:border-primary transition-colors"
                    onclick="selectMeal(this, 'بيض مسلوق مع أفوكادو - 350 سعرة')">بيض مسلوق مع أفوكادو - 350 سعرة</div>
            </div>
            <div class="flex gap-3 mt-5">
                <button onclick="confirmSwap()"
                    class="flex-1 bg-primary text-white py-2 rounded-xl font-bold">تأكيد</button>
                <button onclick="document.getElementById('swap-modal').classList.add('hidden')"
                    class="flex-1 border border-slate-200 py-2 rounded-xl font-bold">إلغاء</button>
            </div>
        </div>
    </div>

    <script>
        let selectedMealEl = null,
            selectedMealText = '';
        let currentSwapArticle = null;

        function showToast(msg) {
            const t = document.createElement('div');
            t.className =
                'fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-sm px-5 py-3 rounded-xl shadow-xl z-[9999]';
            t.textContent = msg;
            document.body.appendChild(t);
            setTimeout(() => t.remove(), 3000);
        }

        function selectMeal(el, text) {
            document.querySelectorAll('#swap-modal .cursor-pointer').forEach(e => e.classList.remove('border-primary',
                'bg-primary/5'));
            el.classList.add('border-primary', 'bg-primary/5');
            selectedMealEl = el;
            selectedMealText = text;
        }

        function confirmSwap() {
            if (!selectedMealText) {
                showToast('اختر وجبة أولاً');
                return;
            }
            if (currentSwapArticle) {
                const h3 = currentSwapArticle.querySelector('h3');
                if (h3) h3.textContent = selectedMealText.split(' - ')[0];
            }
            document.getElementById('swap-modal').classList.add('hidden');
            showToast('تم تبديل الوجبة بنجاح ✓');
            selectedMealEl = null;
            selectedMealText = '';
            currentSwapArticle = null;
        }

        // Day selection
        document.querySelectorAll('[data-purpose="weekly-calendar"] button').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('[data-purpose="weekly-calendar"] button').forEach(b => b
                    .classList.remove('active-day'));
                this.classList.add('active-day');
            });
        });

        // Print
        document.querySelector('button:has(.material-symbols-outlined)') && (() => {
            document.querySelectorAll('button').forEach(btn => {
                const icon = btn.querySelector('.material-symbols-outlined');
                if (icon?.textContent.trim() === 'print') btn.addEventListener('click', () => window
                .print());
                if (icon?.textContent.trim() === 'file_download') btn.addEventListener('click', () => {
                    const content =
                        `خطة وجباتك اليومية - NutriZone\n\nالإفطار: أومليت الخضار مع خبز الشوفان - 450 سعرة\nالغداء: سلمون مشوي مع الكينوا - 620 سعرة\n\nإجمالي السعرات: 1850 / 2200`;
                    const blob = new Blob([content], {
                        type: 'text/plain;charset=utf-8'
                    });
                    const a = document.createElement('a');
                    a.href = URL.createObjectURL(blob);
                    a.download = 'meal-plan.txt';
                    a.click();
                });
            });
        })();

        // تم التناول & تبديل الوجبة
        document.querySelectorAll('[data-purpose="daily-meals"] article').forEach(article => {
            const btns = article.querySelectorAll('button');
            btns.forEach(btn => {
                const icon = btn.querySelector('.material-symbols-outlined');
                if (icon?.textContent.trim() === 'done') {
                    btn.addEventListener('click', function() {
                        this.classList.toggle('bg-primary');
                        this.classList.toggle('bg-emerald-700');
                        showToast('تم تسجيل الوجبة ✓');
                    });
                }
                if (icon?.textContent.trim() === 'swap_horiz') {
                    btn.addEventListener('click', () => {
                        currentSwapArticle = article;
                        selectedMealEl = null;
                        selectedMealText = '';
                        document.querySelectorAll('#swap-modal .cursor-pointer').forEach(e => e
                            .classList.remove('border-primary', 'bg-primary/5'));
                        document.getElementById('swap-modal').classList.remove('hidden');
                    });
                }
            });
        });

        // Notifications
        document.addEventListener('click', (e) => {
            if (!document.getElementById('notif-popup').contains(e.target)) {
                document.getElementById('notif-popup').classList.add('hidden');
            }
        });
    </script>
