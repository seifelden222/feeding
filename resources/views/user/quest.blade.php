<!DOCTYPE html>

@php
    $user = auth()->user();
@endphp

<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>نوتري زون - الاستشارات المباشرة</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&amp;family=Public+Sans:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#10b981", // Emerald green from NutriZone branding
                        "background-light": "#f8fafc",
                        "background-dark": "#0f172a",
                    },
                    fontFamily: {
                        "display": ["Cairo", "Public Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Navigation -->
<x-user-slider />

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col overflow-y-auto pr-0 md:pr-64">
            <!-- Header -->
            <header
                class="h-20 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-8 sticky top-0 z-10">
                <div class="flex flex-col">
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white">مرحباً، {{ $user?->name }} 👋</h2>
                    <p class="text-sm text-slate-500">اليوم هو ١٢ أكتوبر، 2026</p>
                </div>
                <div class="flex items-center gap-4">
                    <div
                        class="relative flex items-center bg-slate-100 dark:bg-slate-800 rounded-xl px-4 py-2 border border-slate-200 dark:border-slate-700">
                        <span class="material-symbols-outlined text-slate-400 ml-2">search</span>
                        <input class="bg-transparent border-none focus:ring-0 text-sm w-48 text-right"
                            placeholder="البحث عن خبير..." type="text" />
                    </div>
                    <button
                        class="p-2.5 bg-slate-100 dark:bg-slate-800 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-200 transition-colors relative">
                        <span class="material-symbols-outlined">notifications</span>
                        <span
                            class="absolute top-2.5 right-2.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-slate-800"></span>
                    </button>
                    <div class="w-10 h-10 rounded-full bg-primary/20 border-2 border-primary overflow-hidden">
                        <img alt="User Profile" class="w-full h-full object-cover" data-alt="صورة الملف الشخصي للمستخدم"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCCkHCAEEcQJxA__O4j1Dr-hBnoFBoSMGO4N5j9wBOYviqhZN5uHZSEMv7p-ceZ0xOlmJgLOahTae9cAQn6ZP18-_4X13Z3jhMTKNV1q-ys8thrXNQBXShbYOBYKfRQhNUWLjs68sAzNQTDNrjvY7A5rxGysRZOHQ5gvafPhP6erY87oGdt4NHlFs14MW2jIV4d5vKWwCAqPdG6zmeGE-5yWY2tteehizS3SKdwL4y8PtCnRGGIvUDWYuk5KX2IlH2afC0h_dTzjbmx" />
                    </div>
                </div>
            </header>
            <!-- Dashboard Content -->
            <div class="p-8 max-w-7xl mx-auto w-full space-y-8">
                <!-- Welcome Section -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <h3 class="text-3xl font-black text-slate-900 dark:text-white mb-2 tracking-tight">الاستشارات
                            المباشرة</h3>
                        <p class="text-slate-500 dark:text-slate-400">تحدث مع نخبة من خبراء التغذية والمدربين المعتمدين
                        </p>
                    </div>
                    <button
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary text-white rounded-xl font-bold shadow-lg shadow-primary/20 hover:scale-105 transition-transform active:scale-95">
                        <span class="material-symbols-outlined">bolt</span>
                        <a href="{{ route('user.messages') }}"><span>بدء محادثة سريعة</span></a>
                    </button>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Right Column: Featured & Experts -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Featured Expert -->
                        <section>
                            <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                                <span class="material-symbols-outlined text-amber-500"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                خبير متميز هذا الأسبوع
                            </h4>
                            <div
                                class="bg-gradient-to-l from-primary/10 to-transparent border border-primary/20 rounded-2xl overflow-hidden flex flex-col md:flex-row">
                                <div class="md:w-1/3 aspect-[4/3] md:aspect-square overflow-hidden">
                                    <img class="w-full h-full object-cover"
                                        data-alt="صورة الدكتورة سارة أحمد خبيرة التغذية"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxnPnL__pFZ0cuR2A5Qgtmd9iH1XWrG4ZQYE9LZ-XTz9x8hsEIgG4dKRHOExmqfoIaPxt9xu58iNiMZ8WDc-vbvj_ayTCjkk4CMOB3gwbj67Jm9yw_R1sp4OwUrSWN-nqC16myifQ5RL5HW5OlT4UJs1B7BitfOXpBB67fn2R5vJzDFGQDshXqGcYyq7uTU3yQXM-SUauc9Y2zAKn88gfWa1ykDd9x5hQGfBXKgm4EaRb6iFUIEEkmxhH0ePJlLPf1L5K0w1MQ69WO" />
                                </div>
                                <div class="p-6 flex-1 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span
                                                class="px-2 py-0.5 bg-primary/20 text-primary text-xs font-bold rounded-full">متاح
                                                الآن</span>
                                            <div class="flex items-center text-amber-500">
                                                <span class="material-symbols-outlined text-sm"
                                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                                <span class="text-sm font-bold mr-1">4.9</span>
                                            </div>
                                        </div>
                                        <h5 class="text-2xl font-bold text-slate-900 dark:text-white">د. سارة أحمد</h5>
                                        <p class="text-primary font-semibold mb-3">أخصائية تغذية علاجية - خبرة 10 سنوات
                                        </p>
                                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                                            متخصصة في تخطيط الوجبات للرياضيين وإدارة الوزن بشكل مستدام من خلال تغيير نمط
                                            الحياة.
                                        </p>
                                    </div>
                                    <button
                                        class="w-full md:w-auto px-8 py-3 bg-primary text-white rounded-xl font-bold hover:shadow-xl transition-all">
                                        احجز الآن
                                    </button>
                                </div>
                            </div>
                        </section>
                        <!-- Expert List -->
                        <section>
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-lg font-bold">الخبراء المتاحون</h4>
                                <button class="text-primary text-sm font-bold hover:underline">عرض الكل</button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Expert Card 1 -->
                                <div
                                    class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-4 rounded-2xl flex items-center gap-4 hover:border-primary transition-colors cursor-pointer group">
                                    <div class="relative">
                                        <div class="w-16 h-16 rounded-full overflow-hidden bg-slate-100">
                                            <img class="w-full h-full object-cover"
                                                data-alt="أخصائي التغذية د. محمد علي"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuALihguexwbSiSeJyZLsn1q6G6cROgrg0DVQ-FSgIYjEDHO1cAJ_-LiDxce3RNtxSXZxBCJD4F7-bNz7z81Z3BYMwc0rhk4F84StTVY3fEo8jHIq-ltBCqdAVnJB1RKGV0saNENuPZ6z0xx5bnu8oBhCF3kMZ6h_QT3bQd73k0IHFhomGgmGNkjYL6_B-31YcKdLEMDNzLoqw9wyBZvn3edu6BCfCSAcHWXeZEA7aPdEgYMqM7lPJPOcpope9tNakbjmqw4u8KLcI91" />
                                        </div>
                                        <div
                                            class="absolute bottom-0 right-0 w-4 h-4 bg-emerald-500 border-2 border-white dark:border-slate-900 rounded-full">
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="font-bold text-slate-900 dark:text-white group-hover:text-primary">
                                            د. محمد علي</h6>
                                        <p class="text-xs text-slate-500">مدرب لياقة بدنية</p>
                                        <div class="flex items-center mt-1">
                                            <span class="material-symbols-outlined text-xs text-amber-500"
                                                style="font-variation-settings: 'FILL' 1;">star</span>
                                            <span class="text-xs font-medium mr-1">4.8</span>
                                        </div>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-slate-400 group-hover:translate-x-[-4px] transition-transform">chevron_left</span>
                                </div>
                                <!-- Expert Card 2 -->
                                <div
                                    class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-4 rounded-2xl flex items-center gap-4 hover:border-primary transition-colors cursor-pointer group">
                                    <div class="relative">
                                        <div class="w-16 h-16 rounded-full overflow-hidden bg-slate-100">
                                            <img class="w-full h-full object-cover"
                                                data-alt="أخصائية التغذية د. ياسمين خالد"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHxEsG9tWf-vi5Y4zrA5QYMLZTdfX3nSMQVUE36wJXZccpRg3xCcNX47N64pkjVPJK16SyVc8rRI42MUPD82YmutpprKmYulSxsOgNkNMlCkexHbju-WVNgysKhxpJOUQYQenWiuPvui39Db9G5biZXXABW0K50wFUhfiZIx5jNobll2AjCh8zh0aj3B49l25paMe6aW1ez8RArcDMktbFqRpWAEOzdRdCOq5_pkmdrlgegz_zYbjDpr57Szq_wtOptmKB-u88oWHE" />
                                        </div>
                                        <div
                                            class="absolute bottom-0 right-0 w-4 h-4 bg-slate-300 dark:bg-slate-700 border-2 border-white dark:border-slate-900 rounded-full">
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="font-bold text-slate-900 dark:text-white group-hover:text-primary">
                                            د. ياسمين خالد</h6>
                                        <p class="text-xs text-slate-500">تغذية أطفال</p>
                                        <div class="flex items-center mt-1">
                                            <span class="material-symbols-outlined text-xs text-amber-500"
                                                style="font-variation-settings: 'FILL' 1;">star</span>
                                            <span class="text-xs font-medium mr-1">4.7</span>
                                        </div>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-slate-400 group-hover:translate-x-[-4px] transition-transform">chevron_left</span>
                                </div>
                                <!-- Expert Card 3 -->
                                <div
                                    class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-4 rounded-2xl flex items-center gap-4 hover:border-primary transition-colors cursor-pointer group">
                                    <div class="relative">
                                        <div class="w-16 h-16 rounded-full overflow-hidden bg-slate-100">
                                            <img class="w-full h-full object-cover"
                                                data-alt="خبير التغذية أ. خالد منصور"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC90w1sQ_l_EaMFpPQR1kP6ljgORSKoxDzEzya903Bv3cmPk5Sw2YBcadvwKCmR13W5CoZLCaclY591ZfZt9UH8n3Cx8SF2ut5nW167DkSNZndKRpdtB1BFroencZupaiDRvzXJCgsxXor_xUwSjbfs-YMXeEF6j86Sk9rB6jJT7bMSxHcmMTFaMCRMnRxYvmyrMDg53vJbLSFnTT8evApY7VWMc787SisR20piK6CBtBzOfHNcTw-Zx7OfTeQEgix81Uk3vlWWIdLb" />
                                        </div>
                                        <div
                                            class="absolute bottom-0 right-0 w-4 h-4 bg-emerald-500 border-2 border-white dark:border-slate-900 rounded-full">
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="font-bold text-slate-900 dark:text-white group-hover:text-primary">
                                            أ. خالد منصور</h6>
                                        <p class="text-xs text-slate-500">تخطيط وجبات كيتو</p>
                                        <div class="flex items-center mt-1">
                                            <span class="material-symbols-outlined text-xs text-amber-500"
                                                style="font-variation-settings: 'FILL' 1;">star</span>
                                            <span class="text-xs font-medium mr-1">4.9</span>
                                        </div>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-slate-400 group-hover:translate-x-[-4px] transition-transform">chevron_left</span>
                                </div>
                                <!-- Expert Card 4 -->
                                <div
                                    class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-4 rounded-2xl flex items-center gap-4 hover:border-primary transition-colors cursor-pointer group">
                                    <div class="relative">
                                        <div class="w-16 h-16 rounded-full overflow-hidden bg-slate-100">
                                            <img class="w-full h-full object-cover"
                                                data-alt="د. ليلى فوزي استشارية السمنة"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBiei-lXBP_hisMFM0Hdx9R17k8hktiGs9Szy20M0bppfsvsikHsPxmfL3sIcELdqV2g4876wtUvu-gAoFry52qBAPomolDbiyAglI5LBvSblxHA8v4CiZ6Znh2MY5rRsFuu5wzTujd3Qck1ZqKrEPLc0eT4X1yFDhYq2KKZn6oNR8Uir5uXUm9IBvxFRx1L99DY28He0HJOVud8wYZ0wMkxm1xZ64_K1l5tTCygVrrh3SVblqacBFg3T17algWBA0mExXUvTE-7VoL" />
                                        </div>
                                        <div
                                            class="absolute bottom-0 right-0 w-4 h-4 bg-emerald-500 border-2 border-white dark:border-slate-900 rounded-full">
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="font-bold text-slate-900 dark:text-white group-hover:text-primary">
                                            د. ليلى فوزي</h6>
                                        <p class="text-xs text-slate-500">استشارية سمنة ونحافة</p>
                                        <div class="flex items-center mt-1">
                                            <span class="material-symbols-outlined text-xs text-amber-500"
                                                style="font-variation-settings: 'FILL' 1;">star</span>
                                            <span class="text-xs font-medium mr-1">5.0</span>
                                        </div>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-slate-400 group-hover:translate-x-[-4px] transition-transform">chevron_left</span>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- Left Column: Appointments & Quick Actions -->
                    <div class="space-y-8">
                        <!-- Upcoming Appointments -->
                        <section
                            class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6">
                            <div class="mb-6 flex items-center justify-between gap-3">
                                <h4 class="text-lg font-bold">الحجز والاستشارة</h4>
                                <span class="rounded-full bg-primary/10 px-3 py-1 text-xs font-bold text-primary">محدثة</span>
                            </div>
                            <div id="appointments-list" class="space-y-4">
                                <!-- Appointment 1 -->
                                <div class="flex gap-4">
                                    <div
                                        class="flex flex-col items-center justify-center bg-primary/10 rounded-xl px-3 py-2 h-fit">
                                        <span class="text-primary font-bold text-sm">أكتوبر</span>
                                        <span class="text-primary font-black text-xl">15</span>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-slate-500 mb-1">الساعة 04:30 مساءً</p>
                                        <h6 class="font-bold text-slate-900 dark:text-white">جلسة مع د. سارة</h6>
                                        <div class="flex items-center gap-2 mt-2">
                                            <span class="w-2 h-2 bg-primary rounded-full"></span>
                                            <span
                                                class="text-xs font-medium text-slate-600 dark:text-slate-400">استشارة
                                                فيديو</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="h-px bg-slate-100 dark:bg-slate-800 my-4"></div>
                                <!-- Appointment 2 -->
                                <div class="flex gap-4 opacity-75">
                                    <div
                                        class="flex flex-col items-center justify-center bg-slate-100 dark:bg-slate-800 rounded-xl px-3 py-2 h-fit">
                                        <span class="text-slate-500 font-bold text-sm">أكتوبر</span>
                                        <span class="text-slate-500 font-black text-xl">18</span>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-slate-500 mb-1">الساعة 09:00 صباحاً</p>
                                        <h6 class="font-bold text-slate-900 dark:text-white">متابعة د. محمد علي</h6>
                                        <div class="flex items-center gap-2 mt-2">
                                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                            <span class="text-xs font-medium text-slate-600 dark:text-slate-400">محادثة
                                                نصية</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button
                                id="manage-appointments-btn"
                                class="w-full mt-6 py-3 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 rounded-xl text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                                إدارة المواعيد
                            </button>
                        </section>
                        <!-- Activity/Stats or Help -->
                        <section class="bg-primary rounded-2xl p-6 text-white relative overflow-hidden">
                            <div class="relative z-10">
                                <h4 class="text-lg font-bold mb-2">هل تحتاج للمساعدة؟</h4>
                                <p class="text-white/80 text-sm mb-4">فريق الدعم الفني متواجد لمساعدتك في اختيار الخبير
                                    المناسب لك.</p>
                                <button
                                    class="px-4 py-2 bg-white text-primary rounded-lg text-sm font-bold hover:bg-slate-100 transition-colors">
                                    تحدث مع الدعم
                                </button>
                            </div>
                            <span
                                class="material-symbols-outlined absolute -bottom-6 -left-6 text-white/10 text-[120px] rotate-12">support_agent</span>
                        </section>
                        <!-- Promotions/Tips -->
                        <section
                            class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6">
                            <div class="flex items-center gap-3 mb-4 text-amber-500">
                                <span class="material-symbols-outlined">lightbulb</span>
                                <h4 class="font-bold">نصيحة اليوم</h4>
                            </div>
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed italic">
                                "شرب كوب من الماء الدافئ مع الليمون صباحاً يساعد في تحسين عملية الهضم وتنشيط معدلات
                                الحرق طوال اليوم."
                            </p>
                        </section>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Notifications Popup -->
    <div id="notif-popup"
        class="hidden fixed top-24 left-8 z-[999] w-80 bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-800 overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 dark:border-gray-800">
            <span class="font-bold text-slate-800 dark:text-white">الإشعارات</span>
            <button onclick="document.getElementById('notif-popup').classList.add('hidden')"
                class="text-slate-400 hover:text-primary"><span
                    class="material-symbols-outlined text-sm">close</span></button>
        </div>
        <div class="divide-y divide-gray-100 dark:divide-gray-800 max-h-72 overflow-y-auto">
            <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
                <span class="material-symbols-outlined text-primary mt-0.5">event</span>
                <div>
                    <p class="text-sm font-bold">موعدك مع د. سارة غداً</p>
                    <p class="text-xs text-slate-400">الساعة 4:30 مساءً</p>
                </div>
            </div>
            <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
                <span class="material-symbols-outlined text-blue-500 mt-0.5">chat</span>
                <div>
                    <p class="text-sm font-bold">رسالة جديدة من د. محمد</p>
                    <p class="text-xs text-slate-400">منذ ساعتين</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Book Modal -->
    <div id="book-modal" class="hidden fixed inset-0 bg-black/50 z-[998] flex items-center justify-center">
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 w-80 shadow-2xl">
            <h3 class="font-bold text-lg mb-1">حجز استشارة</h3>
            <p class="text-sm text-slate-500 mb-4" id="book-expert-name">د. سارة أحمد</p>
            <div class="space-y-3">
                <div><label class="text-sm text-slate-500">التاريخ</label><input type="date"
                        id="booking-date"
                        class="w-full mt-1 bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary" />
                </div>
                <div><label class="text-sm text-slate-500">الوقت</label>
                    <select
                        id="booking-time"
                        class="w-full mt-1 bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary">
                        <option>10:00 صباحاً</option>
                        <option>12:00 ظهراً</option>
                        <option>4:30 مساءً</option>
                        <option>7:00 مساءً</option>
                    </select>
                </div>
                <div><label class="text-sm text-slate-500">نوع الاستشارة</label>
                    <select
                        id="booking-type"
                        class="w-full mt-1 bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary">
                        <option>استشارة فيديو</option>
                        <option>محادثة نصية</option>
                        <option>مكالمة صوتية</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-3 mt-5">
                <button id="confirm-booking-btn" onclick="confirmBook()" class="flex-1 bg-primary text-white py-2 rounded-xl font-bold">تأكيد
                    الحجز</button>
                <button onclick="document.getElementById('book-modal').classList.add('hidden')"
                    class="flex-1 border border-slate-200 py-2 rounded-xl font-bold">إلغاء</button>
            </div>
        </div>
    </div>

    <!-- All Experts Modal -->
    <div id="all-experts-modal" class="hidden fixed inset-0 bg-black/50 z-[998] flex items-center justify-center">
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 w-96 shadow-2xl max-h-[80vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-lg">جميع الخبراء</h3>
                <button onclick="document.getElementById('all-experts-modal').classList.add('hidden')"
                    class="text-slate-400 hover:text-primary"><span
                        class="material-symbols-outlined">close</span></button>
            </div>
            <div class="space-y-3">
                <div class="p-3 border border-slate-200 rounded-xl flex items-center gap-3 cursor-pointer hover:border-primary"
                    onclick="openBook('د. سارة أحمد')"><span
                        class="material-symbols-outlined text-primary">person</span>
                    <div>
                        <p class="font-bold text-sm">د. سارة أحمد</p>
                        <p class="text-xs text-slate-500">تغذية علاجية</p>
                    </div>
                </div>
                <div class="p-3 border border-slate-200 rounded-xl flex items-center gap-3 cursor-pointer hover:border-primary"
                    onclick="openBook('د. محمد علي')"><span
                        class="material-symbols-outlined text-primary">person</span>
                    <div>
                        <p class="font-bold text-sm">د. محمد علي</p>
                        <p class="text-xs text-slate-500">لياقة بدنية</p>
                    </div>
                </div>
                <div class="p-3 border border-slate-200 rounded-xl flex items-center gap-3 cursor-pointer hover:border-primary"
                    onclick="openBook('د. ياسمين خالد')"><span
                        class="material-symbols-outlined text-primary">person</span>
                    <div>
                        <p class="font-bold text-sm">د. ياسمين خالد</p>
                        <p class="text-xs text-slate-500">تغذية أطفال</p>
                    </div>
                </div>
                <div class="p-3 border border-slate-200 rounded-xl flex items-center gap-3 cursor-pointer hover:border-primary"
                    onclick="openBook('أ. خالد منصور')"><span
                        class="material-symbols-outlined text-primary">person</span>
                    <div>
                        <p class="font-bold text-sm">أ. خالد منصور</p>
                        <p class="text-xs text-slate-500">وجبات كيتو</p>
                    </div>
                </div>
                <div class="p-3 border border-slate-200 rounded-xl flex items-center gap-3 cursor-pointer hover:border-primary"
                    onclick="openBook('د. ليلى فوزي')"><span
                        class="material-symbols-outlined text-primary">person</span>
                    <div>
                        <p class="font-bold text-sm">د. ليلى فوزي</p>
                        <p class="text-xs text-slate-500">سمنة ونحافة</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Support Chat Modal -->
    <div id="support-modal" class="hidden fixed inset-0 bg-black/50 z-[998] flex items-center justify-center">
        <div class="bg-white dark:bg-slate-900 rounded-2xl w-80 shadow-2xl overflow-hidden">
            <div class="bg-primary px-5 py-4 flex items-center justify-between">
                <div class="flex items-center gap-2 text-white"><span
                        class="material-symbols-outlined">support_agent</span><span class="font-bold">فريق
                        الدعم</span></div>
                <button onclick="document.getElementById('support-modal').classList.add('hidden')"
                    class="text-white/80 hover:text-white"><span
                        class="material-symbols-outlined text-sm">close</span></button>
            </div>
            <div id="support-msgs" class="p-4 space-y-3 h-48 overflow-y-auto">
                <div class="bg-slate-100 dark:bg-slate-800 rounded-xl p-3 text-sm">أهلاً! كيف يمكنني مساعدتك في اختيار
                    الخبير المناسب؟</div>
            </div>
            <div class="p-3 border-t border-slate-200 dark:border-slate-700 flex gap-2">
                <input id="support-input" type="text" placeholder="اكتب رسالتك..."
                    class="flex-1 bg-slate-100 dark:bg-slate-800 border-none rounded-xl px-3 py-2 text-sm focus:ring-1 focus:ring-primary" />
                <button onclick="sendSupport()" class="bg-primary text-white rounded-xl px-3 py-2"><span
                        class="material-symbols-outlined text-sm">send</span></button>
            </div>
        </div>
    </div>

    <script>
        const html = document.documentElement;
        const savedTheme = localStorage.getItem('nutrizone-theme') || 'light';
        const savedLanguage = localStorage.getItem('nutrizone-language') || 'ar';
        html.classList.toggle('dark', savedTheme === 'dark');
        html.lang = savedLanguage;
        html.dir = savedLanguage === 'ar' ? 'rtl' : 'ltr';

        const bookingsKey = 'nutrizone-bookings';

        function showToast(msg) {
            const t = document.createElement('div');
            t.className =
                'fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-sm px-5 py-3 rounded-xl shadow-xl z-[9999]';
            t.textContent = msg;
            document.body.appendChild(t);
            setTimeout(() => t.remove(), 3000);
        }

        function openBook(name) {
            document.getElementById('book-expert-name').textContent = name;
            document.getElementById('all-experts-modal').classList.add('hidden');
            document.getElementById('book-modal').classList.remove('hidden');
        }

        function renderBookings() {
            const bookings = JSON.parse(localStorage.getItem(bookingsKey) || '[]');
            const list = document.getElementById('appointments-list');

            if (!list) {
                return;
            }

            if (!bookings.length) {
                list.innerHTML =
                    '<div class="rounded-xl bg-slate-50 p-4 text-sm text-slate-500 dark:bg-slate-800 dark:text-slate-300">لا توجد مواعيد محفوظة حالياً.</div>';

                return;
            }

            list.innerHTML = bookings.map((booking) => `
                <div class="flex gap-4 rounded-xl border border-slate-100 p-3 dark:border-slate-800">
                    <div class="flex flex-col items-center justify-center bg-primary/10 rounded-xl px-3 py-2 h-fit">
                        <span class="text-primary font-bold text-sm">${booking.month}</span>
                        <span class="text-primary font-black text-xl">${booking.day}</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs text-slate-500 mb-1">${booking.time}</p>
                        <h6 class="font-bold text-slate-900 dark:text-white">${booking.name}</h6>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="w-2 h-2 bg-primary rounded-full"></span>
                            <span class="text-xs font-medium text-slate-600 dark:text-slate-400">${booking.type}</span>
                        </div>
                    </div>
                    <button class="delete-booking text-rose-500" data-id="${booking.id}" type="button">
                        <span class="material-symbols-outlined">delete</span>
                    </button>
                </div>
            `).join('');

            document.querySelectorAll('.delete-booking').forEach((button) => {
                button.addEventListener('click', () => {
                    const nextBookings = bookings.filter((booking) => booking.id !== button.dataset.id);
                    localStorage.setItem(bookingsKey, JSON.stringify(nextBookings));
                    renderBookings();
                    showToast('تم حذف الموعد المحفوظ');
                });
            });
        }

        function confirmBook() {
            const dateInput = document.getElementById('booking-date');
            const timeSelect = document.getElementById('booking-time');
            const typeSelect = document.getElementById('booking-type');

            if (!dateInput.value) {
                showToast('اختر تاريخ الاستشارة أولاً');
                return;
            }

            const selectedDate = new Date(dateInput.value);
            const currentBookings = JSON.parse(localStorage.getItem(bookingsKey) || '[]');

            currentBookings.unshift({
                id: crypto.randomUUID(),
                name: document.getElementById('book-expert-name').textContent,
                day: String(selectedDate.getDate()).padStart(2, '0'),
                month: selectedDate.toLocaleDateString('ar-EG', {
                    month: 'long',
                }),
                time: timeSelect.value,
                type: typeSelect.value,
            });

            localStorage.setItem(bookingsKey, JSON.stringify(currentBookings));
            document.getElementById('book-modal').classList.add('hidden');
            dateInput.value = '';
            showToast('تم تأكيد الحجز بنجاح ✓');
            renderBookings();
        }

        // Notifications
        document.querySelectorAll('button').forEach(btn => {
            const icon = btn.querySelector('.material-symbols-outlined');
            if (icon?.textContent.trim() === 'notifications') {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    document.getElementById('notif-popup').classList.toggle('hidden');
                });
            }
        });
        document.addEventListener('click', (e) => {
            if (!document.getElementById('notif-popup').contains(e.target))
                document.getElementById('notif-popup').classList.add('hidden');
        });

        // Search experts
        const searchInput = document.querySelector('input[placeholder="البحث عن خبير..."]');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const q = this.value.toLowerCase();
                document.querySelectorAll('.grid .bg-white.dark\\:bg-slate-900.border').forEach(card => {
                    const name = card.querySelector('h6')?.textContent.toLowerCase() || '';
                    card.style.display = name.includes(q) ? '' : 'none';
                });
            });
        }

        // Book buttons
        document.querySelectorAll('button').forEach(btn => {
            if (btn.textContent.trim() === 'احجز الآن') btn.addEventListener('click', () => openBook(
                'د. سارة أحمد'));
            if (btn.textContent.includes('إدارة المواعيد')) btn.addEventListener('click', () => {
                document.getElementById('appointments-list')?.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center',
                });
                showToast('يمكنك إدارة المواعيد المحفوظة من هذه البطاقة');
            });
            if (btn.textContent.includes('تحدث مع الدعم')) btn.addEventListener('click', () => document
                .getElementById('support-modal').classList.remove('hidden'));
            if (btn.textContent.includes('عرض الكل')) btn.addEventListener('click', () => document.getElementById(
                'all-experts-modal').classList.remove('hidden'));
            if (btn.textContent.includes('بدء محادثة سريعة')) btn.addEventListener('click', () => window.location
                .href = '{{ route('user.messages') }}');
        });

        // Expert cards
        document.querySelectorAll('.grid .bg-white.dark\\:bg-slate-900.border.cursor-pointer').forEach(card => {
            card.addEventListener('click', () => {
                const name = card.querySelector('h6')?.textContent || 'الخبير';
                openBook(name);
            });
        });

        // Support chat
        const supportReplies = ['بالتأكيد، يسعدنا مساعدتك!', 'يمكنك الاختيار بناءً على تخصص الخبير',
            'هل تريد خبيراً في التغذية أم اللياقة؟', 'سنوصلك بأفضل خبير في أقرب وقت'
        ];
        let replyIdx = 0;

        function sendSupport() {
            const input = document.getElementById('support-input');
            const msgs = document.getElementById('support-msgs');
            if (!input.value.trim()) return;
            const userMsg = document.createElement('div');
            userMsg.className = 'bg-primary text-white rounded-xl p-3 text-sm mr-auto max-w-[80%]';
            userMsg.textContent = input.value;
            msgs.appendChild(userMsg);
            input.value = '';
            msgs.scrollTop = msgs.scrollHeight;
            setTimeout(() => {
                const reply = document.createElement('div');
                reply.className = 'bg-slate-100 dark:bg-slate-800 rounded-xl p-3 text-sm';
                reply.textContent = supportReplies[replyIdx++ % supportReplies.length];
                msgs.appendChild(reply);
                msgs.scrollTop = msgs.scrollHeight;
            }, 800);
        }
        document.getElementById('support-input')?.addEventListener('keydown', e => {
            if (e.key === 'Enter') sendSupport();
        });
        renderBookings();
    </script>
