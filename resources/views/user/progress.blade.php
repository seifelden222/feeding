<!DOCTYPE html>

@php
    $user = auth()->user();
@endphp

<html class="light" dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&amp;family=Public+Sans:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
                        "primary": "#10B981",
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
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">
    <div class="flex h-screen overflow-hidden">
        <!-- SideNav -->
   <x-user-slider />

        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-y-auto pr-0 md:pr-64">
            <!-- Header -->
            <header
                class="h-16 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 px-8 flex items-center justify-between sticky top-0 z-10">
                <div class="flex items-center gap-4">
                    <h2 class="text-xl font-bold">مرحباً، {{ $user?->name }}</h2>
                </div>
                <div class="flex items-center gap-4">
                    <button
                        class="p-2 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-full relative">
                        <span class="material-symbols-outlined">notifications</span>
                        <span
                            class="absolute top-2 left-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-slate-900"></span>
                    </button>
                    <div
                        class="h-10 w-10 rounded-full bg-slate-200 overflow-hidden border border-slate-300 dark:border-slate-700">
                        <img alt="صورة الملف الشخصي" class="w-full h-full object-cover"
                            data-alt="رجل مبتسم يرتدي قميصاً أزرق كاجوال"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNKvrjjClO3-chDCR572pQ-fuSOuIYPxGcdjaBnGQ82LY7cGXInNQbI3nFs36cMYDpoPDoXkgRTJi82NXIVNe6r9gf7TydmkYZ-7KjRr9ktneFBM9Mki8CWVAHBjyDWvLICQzdEqPMfNsGePDl-3IzOGCN-iXnEXfHFzk4Ps0UC0qZ6bp80YPrS4GzKd8og3UE6wWqbCT3Vv5gn5icvyn7zNlaZeqH9ZB-II0HZi_xhHnsQUuP0-tZMlABnf_9Teg-WHkmy-jLkO-N" />
                    </div>
                </div>
            </header>
            <div class="p-8 space-y-8">
                <!-- Title and CTA -->
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold">تحليل التقدم</h3>
                        <p class="text-slate-500 dark:text-slate-400">تابع تطور جسمك وأدائك بمرور الوقت</p>
                    </div>
                    <button
                        class="bg-primary hover:bg-primary/90 text-white px-6 py-2.5 rounded-xl font-bold flex items-center gap-2 transition-all shadow-md shadow-primary/20">
                        <span class="material-symbols-outlined">add</span>
                        تحديث القياسات
                    </button>
                </div>
                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800 flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500 dark:text-slate-400 font-medium">الوزن الحالي</span>
                            <div
                                class="bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 px-2 py-1 rounded-lg text-sm flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">trending_down</span>
                                2%
                            </div>
                        </div>
                        <p class="text-3xl font-bold">85.4 <span class="text-lg font-normal text-slate-500">كجم</span>
                        </p>
                        <div class="w-full bg-slate-100 dark:bg-slate-800 h-1.5 rounded-full mt-2">
                            <div class="bg-primary h-full rounded-full w-[70%]"></div>
                        </div>
                    </div>
                    <div
                        class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800 flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500 dark:text-slate-400 font-medium">نسبة الدهون</span>
                            <div
                                class="bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 px-2 py-1 rounded-lg text-sm flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">trending_down</span>
                                1.5%
                            </div>
                        </div>
                        <p class="text-3xl font-bold">18.2 <span class="text-lg font-normal text-slate-500">%</span></p>
                        <div class="w-full bg-slate-100 dark:bg-slate-800 h-1.5 rounded-full mt-2">
                            <div class="bg-primary h-full rounded-full w-[45%]"></div>
                        </div>
                    </div>
                    <div
                        class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800 flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500 dark:text-slate-400 font-medium">كتلة العضلات</span>
                            <div
                                class="bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 px-2 py-1 rounded-lg text-sm flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">trending_up</span>
                                0.8%
                            </div>
                        </div>
                        <p class="text-3xl font-bold">42.5 <span class="text-lg font-normal text-slate-500">كجم</span>
                        </p>
                        <div class="w-full bg-slate-100 dark:bg-slate-800 h-1.5 rounded-full mt-2">
                            <div class="bg-primary h-full rounded-full w-[85%]"></div>
                        </div>
                    </div>
                </div>
                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Weight Chart -->
                    <div
                        class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800">
                        <h4 class="text-lg font-bold mb-6">تطور الوزن (آخر 6 أشهر)</h4>
                        <div class="h-64 relative">
                            <svg class="w-full h-full overflow-visible" viewbox="0 0 400 200">
                                <defs>
                                    <lineargradient id="chartGradient" x1="0" x2="0" y1="0"
                                        y2="1">
                                        <stop offset="0%" stop-color="#10B981" stop-opacity="0.3"></stop>
                                        <stop offset="100%" stop-color="#10B981" stop-opacity="0"></stop>
                                    </lineargradient>
                                </defs>
                                <path d="M0,180 Q50,160 100,140 T200,100 T300,80 T400,60" fill="none"
                                    stroke="#10B981" stroke-width="3"></path>
                                <path d="M0,180 Q50,160 100,140 T200,100 T300,80 T400,60 V200 H0 Z"
                                    fill="url(#chartGradient)"></path>
                                <circle cx="100" cy="140" fill="#10B981" r="4"></circle>
                                <circle cx="200" cy="100" fill="#10B981" r="4"></circle>
                                <circle cx="300" cy="80" fill="#10B981" r="4"></circle>
                                <circle cx="400" cy="60" fill="#10B981" r="4"></circle>
                            </svg>
                            <div class="flex justify-between mt-4 text-xs text-slate-400">
                                <span>يناير</span>
                                <span>فبراير</span>
                                <span>مارس</span>
                                <span>أبريل</span>
                                <span>مايو</span>
                                <span>يونيو</span>
                            </div>
                        </div>
                    </div>
                    <!-- Calorie Adherence Chart -->
                    <div
                        class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800">
                        <h4 class="text-lg font-bold mb-6">الالتزام بالسعرات الحرارية</h4>
                        <div class="h-64 flex items-end justify-between gap-4 px-2">
                            <div class="flex-1 flex flex-col items-center gap-2">
                                <div class="w-full bg-primary/20 rounded-t-lg transition-all hover:bg-primary/40"
                                    style="height: 85%"></div>
                                <span class="text-xs text-slate-400">الأسبوع 1</span>
                            </div>
                            <div class="flex-1 flex flex-col items-center gap-2">
                                <div class="w-full bg-primary/20 rounded-t-lg transition-all hover:bg-primary/40"
                                    style="height: 60%"></div>
                                <span class="text-xs text-slate-400">الأسبوع 2</span>
                            </div>
                            <div class="flex-1 flex flex-col items-center gap-2">
                                <div class="w-full bg-primary rounded-t-lg transition-all hover:bg-primary/90"
                                    style="height: 95%"></div>
                                <span class="text-xs text-slate-400 font-bold text-primary">الأسبوع 3</span>
                            </div>
                            <div class="flex-1 flex flex-col items-center gap-2">
                                <div class="w-full bg-primary/20 rounded-t-lg transition-all hover:bg-primary/40"
                                    style="height: 75%"></div>
                                <span class="text-xs text-slate-400">الأسبوع 4</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Measurement History Table -->
                <div
                    class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800 overflow-hidden">
                    <div class="p-6 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between">
                        <h4 class="text-lg font-bold">سجل القياسات</h4>
                        <button class="text-primary font-medium hover:underline flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">download</span>
                            تصدير التقرير
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-right border-collapse">
                            <thead class="bg-slate-50 dark:bg-slate-800/50">
                                <tr>
                                    <th class="px-6 py-4 text-sm font-semibold text-slate-600 dark:text-slate-400">
                                        التاريخ</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-slate-600 dark:text-slate-400">
                                        الوزن (كجم)</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-slate-600 dark:text-slate-400">نسبة
                                        الدهون (%)</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-slate-600 dark:text-slate-400">كتلة
                                        العضلات (كجم)</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-slate-600 dark:text-slate-400">
                                        الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-medium">15 يونيو 2024</td>
                                    <td class="px-6 py-4 text-sm">85.4</td>
                                    <td class="px-6 py-4 text-sm">18.2%</td>
                                    <td class="px-6 py-4 text-sm">42.5</td>
                                    <td class="px-6 py-4 text-sm">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined">edit_square</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-medium">1 يونيو 2024</td>
                                    <td class="px-6 py-4 text-sm">86.2</td>
                                    <td class="px-6 py-4 text-sm">18.5%</td>
                                    <td class="px-6 py-4 text-sm">42.2</td>
                                    <td class="px-6 py-4 text-sm">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined">edit_square</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-medium">15 مايو 2024</td>
                                    <td class="px-6 py-4 text-sm">87.5</td>
                                    <td class="px-6 py-4 text-sm">19.1%</td>
                                    <td class="px-6 py-4 text-sm">42.0</td>
                                    <td class="px-6 py-4 text-sm">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined">edit_square</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-medium">1 مايو 2024</td>
                                    <td class="px-6 py-4 text-sm">88.9</td>
                                    <td class="px-6 py-4 text-sm">19.8%</td>
                                    <td class="px-6 py-4 text-sm">41.8</td>
                                    <td class="px-6 py-4 text-sm">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined">edit_square</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 bg-slate-50 dark:bg-slate-800/50 flex justify-center">
                        <button class="text-sm font-bold text-slate-500 hover:text-primary">عرض المزيد من
                            القياسات</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

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
                <span class="material-symbols-outlined text-primary mt-0.5">monitoring</span>
                <div>
                    <p class="text-sm font-bold">تم تحديث قياساتك</p>
                    <p class="text-xs text-slate-400">منذ يومين</p>
                </div>
            </div>
            <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
                <span class="material-symbols-outlined text-green-500 mt-0.5">trending_down</span>
                <div>
                    <p class="text-sm font-bold">خسرت 0.8 كجم هذا الأسبوع!</p>
                    <p class="text-xs text-slate-400">منذ 3 أيام</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Measurements Modal -->
    <div id="update-modal" class="hidden fixed inset-0 bg-black/50 z-[998] flex items-center justify-center">
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 w-80 shadow-2xl">
            <h3 class="font-bold text-lg mb-4">تحديث القياسات</h3>
            <div class="space-y-3">
                <div><label class="text-sm text-slate-500">الوزن (كجم)</label><input type="number"
                        placeholder="85.4"
                        class="w-full mt-1 bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary" />
                </div>
                <div><label class="text-sm text-slate-500">نسبة الدهون (%)</label><input type="number"
                        placeholder="18.2"
                        class="w-full mt-1 bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary" />
                </div>
                <div><label class="text-sm text-slate-500">كتلة العضلات (كجم)</label><input type="number"
                        placeholder="42.5"
                        class="w-full mt-1 bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary" />
                </div>
            </div>
            <div class="flex gap-3 mt-5">
                <button onclick="saveUpdate()"
                    class="flex-1 bg-primary text-white py-2 rounded-xl font-bold">حفظ</button>
                <button onclick="document.getElementById('update-modal').classList.add('hidden')"
                    class="flex-1 border border-slate-200 py-2 rounded-xl font-bold">إلغاء</button>
            </div>
        </div>
    </div>

    <!-- Edit Row Modal -->
    <div id="edit-modal" class="hidden fixed inset-0 bg-black/50 z-[998] flex items-center justify-center">
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 w-80 shadow-2xl">
            <h3 class="font-bold text-lg mb-4">تعديل القياس</h3>
            <div class="space-y-3">
                <div><label class="text-sm text-slate-500">الوزن (كجم)</label><input id="edit-weight" type="number"
                        class="w-full mt-1 bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary" />
                </div>
                <div><label class="text-sm text-slate-500">نسبة الدهون (%)</label><input id="edit-fat"
                        type="number"
                        class="w-full mt-1 bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary" />
                </div>
                <div><label class="text-sm text-slate-500">كتلة العضلات (كجم)</label><input id="edit-muscle"
                        type="number"
                        class="w-full mt-1 bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary" />
                </div>
            </div>
            <div class="flex gap-3 mt-5">
                <button onclick="saveEdit()"
                    class="flex-1 bg-primary text-white py-2 rounded-xl font-bold">حفظ</button>
                <button onclick="document.getElementById('edit-modal').classList.add('hidden')"
                    class="flex-1 border border-slate-200 py-2 rounded-xl font-bold">إلغاء</button>
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

        function showToast(msg) {
            const t = document.createElement('div');
            t.className =
                'fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-sm px-5 py-3 rounded-xl shadow-xl z-[9999]';
            t.textContent = msg;
            document.body.appendChild(t);
            setTimeout(() => t.remove(), 3000);
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

        // Update measurements button
        document.querySelectorAll('button').forEach(btn => {
            if (btn.textContent.includes('تحديث القياسات')) {
                btn.addEventListener('click', () => document.getElementById('update-modal').classList.remove(
                    'hidden'));
            }
        });

        function saveUpdate() {
            document.getElementById('update-modal').classList.add('hidden');
            showToast('تم حفظ القياسات بنجاح ✓');
        }

        // Export report
        document.querySelectorAll('button').forEach(btn => {
            if (btn.textContent.includes('تصدير التقرير')) {
                btn.addEventListener('click', () => {
                    const rows = document.querySelectorAll('tbody tr');
                    let csv = 'التاريخ,الوزن,نسبة الدهون,كتلة العضلات\n';
                    rows.forEach(row => {
                        const cells = row.querySelectorAll('td');
                        if (cells.length >= 4) csv +=
                            `${cells[0].textContent.trim()},${cells[1].textContent.trim()},${cells[2].textContent.trim()},${cells[3].textContent.trim()}\n`;
                    });
                    const blob = new Blob([csv], {
                        type: 'text/csv;charset=utf-8'
                    });
                    const a = document.createElement('a');
                    a.href = URL.createObjectURL(blob);
                    a.download = 'progress-report.csv';
                    a.click();
                    showToast('جاري تنزيل التقرير...');
                });
            }
        });

        // Edit row buttons
        let currentRow = null;
        document.querySelectorAll('tbody tr').forEach(row => {
            const editBtn = row.querySelector('button');
            if (editBtn) {
                editBtn.addEventListener('click', () => {
                    currentRow = row;
                    const cells = row.querySelectorAll('td');
                    document.getElementById('edit-weight').value = cells[1]?.textContent.trim() || '';
                    document.getElementById('edit-fat').value = parseFloat(cells[2]?.textContent) || '';
                    document.getElementById('edit-muscle').value = cells[3]?.textContent.trim() || '';
                    document.getElementById('edit-modal').classList.remove('hidden');
                });
            }
        });

        function saveEdit() {
            if (currentRow) {
                const cells = currentRow.querySelectorAll('td');
                cells[1].textContent = document.getElementById('edit-weight').value;
                cells[2].textContent = document.getElementById('edit-fat').value + '%';
                cells[3].textContent = document.getElementById('edit-muscle').value;
            }
            document.getElementById('edit-modal').classList.add('hidden');
            showToast('تم تحديث القياس بنجاح ✓');
        }

        // Show more
        document.querySelectorAll('button').forEach(btn => {
            if (btn.textContent.includes('عرض المزيد')) {
                btn.addEventListener('click', () => showToast('لا توجد قياسات إضافية حالياً'));
            }
        });
    </script>
