<!DOCTYPE html>
<html dir="rtl" lang="ar">

@php
    $trainer = auth()->user();
@endphp

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>إعدادات الإدارة | NutriZone</title>
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
                        "background-light": "#f8fafc",
                        "background-dark": "#0f172a",
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
    </style>
</head>

<body class="bg-background-light text-slate-900 dark:bg-background-dark dark:text-slate-100">
    <div class="flex min-h-screen">
        <x-trainer-slider />

        <main class="flex-1 space-y-8 overflow-y-auto p-6 md:p-8">
            <header class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-3xl font-black">إعدادات الإدارة</h1>
                    <p class="text-slate-500 dark:text-slate-400">إدارة بيانات الأدمن، تغيير كلمة المرور، والخصائص الأساسية المرتبطة بالحسابات.</p>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                    <p class="text-sm font-black">{{ $trainer?->name }}</p>
                    <p class="text-xs text-slate-500">{{ $trainer?->email }}</p>
                    <p class="mt-1 text-xs font-bold text-primary">هذا الحساب إداري</p>
                </div>
            </header>

            @if (session('status') === 'profile-updated')
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-bold text-emerald-700">
                    تم تحديث بيانات حساب الأدمن بنجاح.
                </div>
            @endif

            @if (session('status') === 'password-updated')
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-bold text-emerald-700">
                    تم تغيير كلمة المرور بنجاح.
                </div>
            @endif

            <div class="grid grid-cols-1 gap-8 xl:grid-cols-3">
                <div class="space-y-8 xl:col-span-2">
                    <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <div class="mb-6 flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">badge</span>
                            <h2 class="text-xl font-black">بيانات الحساب</h2>
                        </div>

                        <form action="{{ route('profile.update') }}" class="grid grid-cols-1 gap-4 md:grid-cols-2" method="POST">
                            @csrf
                            @method('PATCH')

                            <div>
                                <label class="mb-2 block text-sm font-bold">اسم الأدمن</label>
                                <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="name" type="text" value="{{ old('name', $trainer?->name) }}" />
                                @error('name')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-bold">البريد الإلكتروني</label>
                                <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="email" type="email" value="{{ old('email', $trainer?->email) }}" />
                                @error('email')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2 flex justify-end">
                                <button class="rounded-2xl bg-primary px-6 py-3 font-black text-white transition hover:bg-emerald-600" type="submit">
                                    حفظ البيانات
                                </button>
                            </div>
                        </form>
                    </section>

                    <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <div class="mb-6 flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">lock_reset</span>
                            <h2 class="text-xl font-black">تعديل كلمة المرور</h2>
                        </div>

                        <form action="{{ route('password.update') }}" class="grid grid-cols-1 gap-4 md:grid-cols-2" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-bold">كلمة المرور الحالية</label>
                                <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="current_password" type="password" />
                                @error('current_password', 'updatePassword')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-bold">كلمة المرور الجديدة</label>
                                <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="password" type="password" />
                                @error('password', 'updatePassword')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-bold">تأكيد كلمة المرور</label>
                                <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="password_confirmation" type="password" />
                            </div>

                            <div class="md:col-span-2 flex justify-end">
                                <button class="rounded-2xl border border-primary px-6 py-3 font-black text-primary transition hover:bg-primary hover:text-white" type="submit">
                                    حفظ كلمة المرور
                                </button>
                            </div>
                        </form>
                    </section>
                </div>

                <div class="space-y-8">
                    <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <div class="mb-6 flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">tune</span>
                            <h2 class="text-xl font-black">الخصائص</h2>
                        </div>

                        <div class="space-y-5">
                            <div>
                                <label class="mb-2 block text-sm font-bold">اللغة</label>
                                <select id="languageSelect" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800">
                                    <option value="ar">العربية</option>
                                    <option value="en">English</option>
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-bold">وضع العرض</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <button class="appearance-toggle rounded-2xl border border-slate-200 px-4 py-3 text-sm font-black transition dark:border-slate-700" data-theme="light" type="button">فاتح</button>
                                    <button class="appearance-toggle rounded-2xl border border-slate-200 px-4 py-3 text-sm font-black transition dark:border-slate-700" data-theme="dark" type="button">داكن</button>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <div class="mb-6 flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">payments</span>
                            <h2 class="text-xl font-black">الحسابات للأدمن</h2>
                        </div>

                        <div class="space-y-4">
                            <div class="rounded-2xl bg-primary/10 p-4">
                                <p class="text-sm text-slate-600 dark:text-slate-300">إدارة الأرباح والحسابات مرتبطة بحساب الإدارة الحالي.</p>
                                <p class="mt-3 text-2xl font-black text-primary">12,450 م.ج</p>
                            </div>

                            <button class="w-full rounded-2xl border border-primary px-4 py-3 font-black text-primary transition hover:bg-primary hover:text-white" type="button">
                                تعديل الأرباح
                            </button>
                        </div>
                    </section>

                    <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <div class="mb-6 flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">groups</span>
                            <h2 class="text-xl font-black">إدارة الحسابات</h2>
                        </div>

                        <div class="space-y-3">
                            <a class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-4 transition hover:bg-emerald-50 dark:bg-slate-800 dark:hover:bg-emerald-900/20" href="{{ route('trainer.usermanage') }}">
                                <span class="font-bold">إضافة أو تعديل المستخدمين</span>
                                <span class="material-symbols-outlined text-primary">chevron_left</span>
                            </a>
                            <a class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-4 transition hover:bg-emerald-50 dark:bg-slate-800 dark:hover:bg-emerald-900/20" href="{{ route('trainer.home') }}">
                                <span class="font-bold">الرجوع للوحة التحكم</span>
                                <span class="material-symbols-outlined text-primary">chevron_left</span>
                            </a>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>

    <script>
        const root = document.documentElement;
        const languageSelect = document.getElementById('languageSelect');
        const appearanceButtons = document.querySelectorAll('.appearance-toggle');

        const savedLanguage = localStorage.getItem('nutrizone-language') || 'ar';
        const savedTheme = localStorage.getItem('nutrizone-theme') || 'light';

        root.classList.toggle('dark', savedTheme === 'dark');
        root.lang = savedLanguage;
        root.dir = savedLanguage === 'ar' ? 'rtl' : 'ltr';
        languageSelect.value = savedLanguage;

        const paintThemeButtons = (theme) => {
            appearanceButtons.forEach((button) => {
                const isActive = button.dataset.theme === theme;
                button.classList.toggle('bg-primary', isActive);
                button.classList.toggle('text-white', isActive);
                button.classList.toggle('border-primary', isActive);
            });
        };

        paintThemeButtons(savedTheme);

        languageSelect?.addEventListener('change', () => {
            localStorage.setItem('nutrizone-language', languageSelect.value);
            root.lang = languageSelect.value;
            root.dir = languageSelect.value === 'ar' ? 'rtl' : 'ltr';
        });

        appearanceButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const theme = button.dataset.theme;
                localStorage.setItem('nutrizone-theme', theme);
                root.classList.toggle('dark', theme === 'dark');
                paintThemeButtons(theme);
            });
        });
    </script>
</body>

</html>
