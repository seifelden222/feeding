<!DOCTYPE html>

<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..900&amp;display=swap" rel="stylesheet" />
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
                        "background-light": "#f8fdfb",
                        "background-dark": "#064e3b",
                    },
                    fontFamily: {
                        "display": ["Cairo", "sans-serif"]
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

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">
    <div class="flex min-h-screen">
        <!-- Sidebar Navigation -->
<x-user-slider />

        <!-- Main Content -->
        <main class="flex-1 p-8 overflow-y-auto pr-0 md:pr-64">
            <header class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-bold">الإعدادات</h2>
                    <p class="text-slate-500 dark:text-slate-400 mt-1">إدارة حسابك وتفضيلات التطبيق</p>
                </div>
                <div class="flex items-center gap-4">
                    <button
                        class="relative p-2 text-slate-500 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl">
                        <span class="material-symbols-outlined">notifications</span>
                        <span
                            class="absolute top-2 left-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <div
                        class="flex items-center gap-3 bg-white dark:bg-slate-900 p-1.5 pr-4 border border-slate-200 dark:border-slate-800 rounded-full">
                        <span class="text-sm font-bold">أحمد منصور</span>
                        <div class="w-10 h-10 rounded-full bg-cover"
                            data-alt="User profile picture showing a professional smiling man"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBavBWpBHzkk5se6PGUR-3UHV4igZeuRLqP_56V5JzglDPyIEBBSJKfleKJcNI-rJ-1K665HAYHbJ9Obi7hbm2c8T3ABoYvTZZO91eXKYUpP-rqxEv-wbAFlORCJSlI3lVKkARfacGecc4JmIS28vqB1a0ZZcRw1wAKlYvplHeFDrWA7K-8vv4njWbRzSLIRTEydC0qGe3DntJ59S3wc3DQjKvEgrNHELOHF-P4QMZa_7A5iR2hT-XONCzzdjLFrnO9ZJoD5wxwHwPd')">
                        </div>
                    </div>
                </div>
            </header>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Right Column: Profile & Subscription -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Profile Settings -->
                    <section
                        class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">person</span>
                                <h3 class="text-xl font-bold">إعدادات الملف الشخصي</h3>
                            </div>
                            <button
                                class="px-4 py-2 bg-primary/10 text-primary font-bold rounded-lg hover:bg-primary/20 transition-colors">تعديل</button>
                        </div>
                        <div class="flex items-center gap-6 mb-8">
                            <div class="relative group">
                                <div class="w-24 h-24 rounded-full bg-cover border-4 border-primary/20"
                                    data-alt="Close up of user profile photo"
                                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCMDY0dYMwuxUmBEyunpkBu9eU1cccU6HmyIh_n6zdM8m-05GgiZey6O85Neghd7lbl51taE6I9V4_0SEIdm6Qjnx9VPhKsP85ovbd9y44rlW_ntLyLTcc3kHgIb_hhv5YgjfJRvjh7ph-mtN6I28eqZG3BRTuCLzygMlRSFoHVyaZa3iAMnpYWs5isjnInXUX_Xew9w8uXpBFubIh8tDO_D0fp0MaUHzeEzrjdUEOKqrQwq8noJaR7EUljBGp0XPSA4H6Vcc4J50n-')">
                                </div>
                                <button
                                    class="absolute bottom-0 right-0 p-1.5 bg-primary text-white rounded-full border-2 border-white">
                                    <span class="material-symbols-outlined text-sm">photo_camera</span>
                                </button>
                            </div>
                            <div>
                                <p class="text-lg font-bold">أحمد منصور</p>
                                <p class="text-slate-500">ahmed.mansour@email.com</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="text-sm font-medium text-slate-500">الاسم الكامل</label>
                                <input
                                    class="w-full bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary"
                                    type="text" value="أحمد منصور" />
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-sm font-medium text-slate-500">البريد الإلكتروني</label>
                                <input
                                    class="w-full bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary"
                                    type="email" value="ahmed.mansour@email.com" />
                            </div>
                        </div>
                    </section>
                    <!-- Notification Settings -->
                    <section
                        class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="material-symbols-outlined text-primary">notifications_active</span>
                            <h3 class="text-xl font-bold">إعدادات التنبيهات</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                                <div class="flex items-center gap-4">
                                    <span class="material-symbols-outlined text-slate-400">send_to_mobile</span>
                                    <div>
                                        <p class="font-bold">تنبيهات الهاتف (Push)</p>
                                        <p class="text-xs text-slate-500">تلقي إشعارات فورية على هاتفك</p>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input checked="" class="sr-only peer" type="checkbox" />
                                    <div
                                        class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:-translate-x-full rtl:peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:right-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                                    </div>
                                </label>
                            </div>
                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                                <div class="flex items-center gap-4">
                                    <span class="material-symbols-outlined text-slate-400">mail</span>
                                    <div>
                                        <p class="font-bold">البريد الإلكتروني</p>
                                        <p class="text-xs text-slate-500">تقارير أسبوعية ونصائح صحية</p>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input checked="" class="sr-only peer" type="checkbox" />
                                    <div
                                        class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:-translate-x-full rtl:peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:right-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                                    </div>
                                </label>
                            </div>
                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                                <div class="flex items-center gap-4">
                                    <span class="material-symbols-outlined text-slate-400">sms</span>
                                    <div>
                                        <p class="font-bold">رسائل SMS</p>
                                        <p class="text-xs text-slate-500">تنبيهات المواعيد والوجبات الهامة</p>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input class="sr-only peer" type="checkbox" />
                                    <div
                                        class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:-translate-x-full rtl:peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:right-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Left Column: Subscription, Security, Language, Theme -->
                <div class="space-y-8">
                    <!-- Subscription Details -->
                    <section
                        class="bg-primary text-white rounded-2xl p-6 shadow-xl shadow-primary/20 relative overflow-hidden">
                        <div class="relative z-10">
                            <h3 class="text-lg font-bold opacity-80">الاشتراك الحالي</h3>
                            <p class="text-3xl font-black mt-2">باقة الاحتراف (Pro)</p>
                            <div class="mt-4 flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">event</span>
                                <span class="text-sm">تاريخ التجديد: 12 أكتوبر 2024</span>
                            </div>
                            <button
                                class="mt-6 w-full py-2 bg-white text-primary font-bold rounded-xl hover:bg-slate-100 transition-colors">إدارة
                                الاشتراك</button>
                        </div>
                        <span
                            class="material-symbols-outlined absolute -bottom-4 -left-4 text-9xl opacity-10">verified</span>
                    </section>
                    <!-- Security -->
                    <section
                        class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="material-symbols-outlined text-primary">security</span>
                            <h3 class="text-xl font-bold">الأمان</h3>
                        </div>
                        <div class="space-y-3">
                            <button
                                class="w-full flex items-center justify-between p-3 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-xl transition-colors">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-slate-400">lock_reset</span>
                                    <span class="font-medium">تغيير كلمة المرور</span>
                                </div>
                                <span class="material-symbols-outlined text-slate-400">chevron_left</span>
                            </button>
                            <button
                                class="w-full flex items-center justify-between p-3 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-xl transition-colors">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-slate-400">key</span>
                                    <span class="font-medium">المصادقة الثنائية</span>
                                </div>
                                <span
                                    class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded-full font-bold">نشط</span>
                            </button>
                        </div>
                    </section>
                    <!-- Language & Theme -->
                    <section
                        class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="material-symbols-outlined text-primary">translate</span>
                            <h3 class="text-xl font-bold">اللغة والمظهر</h3>
                        </div>
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-500">لغة التطبيق</label>
                                <select
                                    class="w-full bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary">
                                    <option selected="">العربية</option>
                                    <option>English</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-500">وضع العرض</label>
                                <div class="flex p-1 bg-slate-100 dark:bg-slate-800 rounded-xl">
                                    <button
                                        class="flex-1 flex items-center justify-center gap-2 py-2 bg-white dark:bg-slate-700 shadow-sm rounded-lg font-bold">
                                        <span class="material-symbols-outlined text-sm">light_mode</span>
                                        فاتح
                                    </button>
                                    <button
                                        class="flex-1 flex items-center justify-center gap-2 py-2 text-slate-500 font-bold">
                                        <span class="material-symbols-outlined text-sm">dark_mode</span>
                                        داكن
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                    <button
                        class="w-full py-4 text-primary font-bold border-2 border-primary/20 rounded-2xl hover:bg-primary/5 transition-colors">
                        حفظ كافة التغييرات
                    </button>
                </div>
            </div>
        </main>
    </div>
</body>

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
            <span class="material-symbols-outlined text-primary mt-0.5">security</span>
            <div>
                <p class="text-sm font-bold">تم تفعيل المصادقة الثنائية</p>
                <p class="text-xs text-slate-400">منذ يومين</p>
            </div>
        </div>
        <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
            <span class="material-symbols-outlined text-blue-500 mt-0.5">verified</span>
            <div>
                <p class="text-sm font-bold">اشتراكك مفعّل حتى أكتوبر 2025</p>
                <p class="text-xs text-slate-400">منذ أسبوع</p>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div id="password-modal" class="hidden fixed inset-0 bg-black/50 z-[998] flex items-center justify-center">
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 w-80 shadow-2xl">
        <h3 class="font-bold text-lg mb-4">تغيير كلمة المرور</h3>
        <div class="space-y-3">
            <div><label class="text-sm text-slate-500">كلمة المرور الحالية</label><input type="password"
                    class="w-full mt-1 bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary" />
            </div>
            <div><label class="text-sm text-slate-500">كلمة المرور الجديدة</label><input type="password"
                    id="new-pass"
                    class="w-full mt-1 bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary" />
            </div>
            <div><label class="text-sm text-slate-500">تأكيد كلمة المرور</label><input type="password"
                    id="confirm-pass"
                    class="w-full mt-1 bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary" />
            </div>
        </div>
        <div class="flex gap-3 mt-5">
            <button onclick="savePassword()"
                class="flex-1 bg-primary text-white py-2 rounded-xl font-bold">حفظ</button>
            <button onclick="document.getElementById('password-modal').classList.add('hidden')"
                class="flex-1 border border-slate-200 py-2 rounded-xl font-bold">إلغاء</button>
        </div>
    </div>
</div>

<!-- Subscription Modal -->
<div id="sub-modal" class="hidden fixed inset-0 bg-black/50 z-[998] flex items-center justify-center">
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 w-80 shadow-2xl">
        <h3 class="font-bold text-lg mb-4">إدارة الاشتراك</h3>
        <div class="space-y-3">
            <div class="p-4 border-2 border-primary rounded-xl bg-primary/5">
                <p class="font-bold text-primary">باقة الاحتراف (Pro) - نشطة</p>
                <p class="text-sm text-slate-500 mt-1">تجديد: 12 أكتوبر 2025</p>
            </div>
            <div class="p-4 border border-slate-200 rounded-xl cursor-pointer hover:border-primary">
                <p class="font-bold">الباقة المجانية</p>
                <p class="text-sm text-slate-500 mt-1">ميزات أساسية</p>
            </div>
        </div>
        <div class="flex gap-3 mt-5">
            <button
                onclick="showToast('تم تجديد الاشتراك بنجاح ✓');document.getElementById('sub-modal').classList.add('hidden')"
                class="flex-1 bg-primary text-white py-2 rounded-xl font-bold">تجديد</button>
            <button onclick="document.getElementById('sub-modal').classList.add('hidden')"
                class="flex-1 border border-slate-200 py-2 rounded-xl font-bold">إغلاق</button>
        </div>
    </div>
</div>

<!-- Photo Upload (hidden input) -->
<input type="file" id="photo-input" accept="image/*" class="hidden" />

<script>
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

    // Edit profile button
    document.querySelectorAll('button').forEach(btn => {
        if (btn.textContent.trim() === 'تعديل') {
            btn.addEventListener('click', () => {
                const inputs = document.querySelectorAll('input[type="text"], input[type="email"]');
                inputs.forEach(inp => inp.focus());
                showToast('يمكنك الآن تعديل بياناتك');
            });
        }
        // Camera / photo
        const icon = btn.querySelector('.material-symbols-outlined');
        if (icon?.textContent.trim() === 'photo_camera') {
            btn.addEventListener('click', () => document.getElementById('photo-input').click());
        }
        // Change password
        if (btn.textContent.includes('تغيير كلمة المرور')) {
            btn.addEventListener('click', () => document.getElementById('password-modal').classList.remove(
                'hidden'));
        }
        // 2FA
        if (btn.textContent.includes('المصادقة الثنائية')) {
            btn.addEventListener('click', () => showToast('المصادقة الثنائية مفعّلة بالفعل ✓'));
        }
        // Subscription
        if (btn.textContent.includes('إدارة الاشتراك')) {
            btn.addEventListener('click', () => document.getElementById('sub-modal').classList.remove(
            'hidden'));
        }
        // Save all
        if (btn.textContent.includes('حفظ كافة التغييرات')) {
            btn.addEventListener('click', () => showToast('تم حفظ جميع التغييرات بنجاح ✓'));
        }
    });

    // Photo upload preview
    document.getElementById('photo-input').addEventListener('change', function() {
        if (this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                document.querySelectorAll('.w-24.h-24.rounded-full').forEach(el => el.style
                    .backgroundImage = `url('${e.target.result}')`);
            };
            reader.readAsDataURL(this.files[0]);
            showToast('تم تحديث الصورة الشخصية ✓');
        }
    });

    // Theme toggle
    document.querySelectorAll('button').forEach(btn => {
        if (btn.textContent.includes('فاتح')) {
            btn.addEventListener('click', () => {
                document.documentElement.classList.remove('dark');
                showToast('تم التبديل للوضع الفاتح');
            });
        }
        if (btn.textContent.includes('داكن')) {
            btn.addEventListener('click', () => {
                document.documentElement.classList.add('dark');
                showToast('تم التبديل للوضع الداكن');
            });
        }
    });

    function savePassword() {
        const np = document.getElementById('new-pass').value;
        const cp = document.getElementById('confirm-pass').value;
        if (!np) {
            showToast('أدخل كلمة المرور الجديدة');
            return;
        }
        if (np !== cp) {
            showToast('كلمتا المرور غير متطابقتين');
            return;
        }
        document.getElementById('password-modal').classList.add('hidden');
        showToast('تم تغيير كلمة المرور بنجاح ✓');
    }
</script>
