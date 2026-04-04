<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>إدارة المستخدمين | NutriZone</title>
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
                        "background-light": "#f8fdfb",
                        "background-dark": "#06221a",
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
            <header class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 dark:text-white">إدارة المستخدمين</h1>
                    <p class="mt-2 text-slate-500 dark:text-slate-400">إضافة مستخدمين جدد وتعديل الاسم والبريد ونوع الحساب وكلمة المرور من نفس الصفحة.</p>
                </div>

                <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <p class="text-xs text-slate-500">إجمالي الحسابات</p>
                        <p class="mt-2 text-2xl font-black">{{ $managedUsers->count() }}</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <p class="text-xs text-slate-500">المستخدمون</p>
                        <p class="mt-2 text-2xl font-black">{{ $managedUsers->where('role', 'user')->count() }}</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <p class="text-xs text-slate-500">المديرون/المدربون</p>
                        <p class="mt-2 text-2xl font-black">{{ $managedUsers->where('role', 'trainer')->count() }}</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <p class="text-xs text-slate-500">الحسابات النشطة</p>
                        <p class="mt-2 text-2xl font-black">{{ $managedUsers->where('status', 'active')->count() }}</p>
                    </div>
                </div>
            </header>

            @if (session('status'))
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-bold text-emerald-700">
                    {{ session('status') === 'user-created' ? 'تمت إضافة المستخدم بنجاح.' : 'تم تحديث بيانات المستخدم بنجاح.' }}
                </div>
            @endif

            <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <div class="mb-6 flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary">person_add</span>
                    <h2 class="text-xl font-black">إضافة مستخدم من صفحة الإدارة</h2>
                </div>

                <form action="{{ route('trainer.users.store') }}" class="grid grid-cols-1 gap-4 lg:grid-cols-6" method="POST">
                    @csrf

                    <div class="lg:col-span-2">
                        <label class="mb-2 block text-sm font-bold">اسم المستخدم</label>
                        <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="name" type="text" value="{{ old('name') }}" />
                        @error('name')
                            <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="lg:col-span-2">
                        <label class="mb-2 block text-sm font-bold">البريد الإلكتروني</label>
                        <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="email" type="email" value="{{ old('email') }}" />
                        @error('email')
                            <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-bold">نوع الحساب</label>
                        <select class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="role">
                            <option value="user">مستخدم</option>
                            <option value="trainer">أدمن</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-bold">الحالة</label>
                        <select class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="status">
                            <option value="active">نشط</option>
                            <option value="inactive">موقوف</option>
                        </select>
                    </div>

                    <div class="lg:col-span-3">
                        <label class="mb-2 block text-sm font-bold">اسم المستخدم أو الهاتف</label>
                        <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="phone" type="text" value="{{ old('phone') }}" />
                    </div>

                    <div class="lg:col-span-3">
                        <label class="mb-2 block text-sm font-bold">كلمة المرور</label>
                        <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="password" type="password" />
                        @error('password')
                            <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="lg:col-span-3">
                        <label class="mb-2 block text-sm font-bold">تأكيد كلمة المرور</label>
                        <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="password_confirmation" type="password" />
                    </div>

                    <div class="lg:col-span-3 flex items-end">
                        <button class="w-full rounded-2xl bg-primary px-6 py-3 font-black text-white shadow-lg shadow-primary/20 transition hover:bg-emerald-600" type="submit">
                            إضافة المستخدم
                        </button>
                    </div>
                </form>
            </section>

            <section class="space-y-4">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-2xl font-black">قائمة المستخدمين</h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400">يمكنك تعديل الاسم والإيميل أو تعيين كلمة مرور جديدة مباشرة.</p>
                    </div>

                    <div class="relative w-full md:w-80">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                        <input id="userSearch" class="w-full rounded-2xl border border-slate-200 bg-white py-3 pr-12 pl-4 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-900" placeholder="ابحث بالاسم أو الإيميل..." type="text" />
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                    @foreach ($managedUsers as $managedUser)
                        <form action="{{ route('trainer.users.update', $managedUser) }}" class="user-card rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900" data-search="{{ mb_strtolower($managedUser->name.' '.$managedUser->email.' '.$managedUser->role) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-6 flex items-start justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary/10 text-xl font-black text-primary">
                                        {{ mb_substr(trim($managedUser->name), 0, 1) }}
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-black">{{ $managedUser->name }}</h3>
                                        <p class="text-sm text-slate-500">{{ $managedUser->email }}</p>
                                    </div>
                                </div>

                                <span class="rounded-full px-3 py-1 text-xs font-black {{ $managedUser->role === 'trainer' ? 'bg-slate-900 text-white dark:bg-slate-100 dark:text-slate-900' : 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300' }}">
                                    {{ $managedUser->role === 'trainer' ? 'أدمن' : 'مستخدم' }}
                                </span>
                            </div>

                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-sm font-bold">الاسم</label>
                                    <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="name" type="text" value="{{ old('name', $managedUser->name) }}" />
                                </div>
                                <div>
                                    <label class="mb-2 block text-sm font-bold">الإيميل</label>
                                    <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="email" type="email" value="{{ old('email', $managedUser->email) }}" />
                                </div>
                                <div>
                                    <label class="mb-2 block text-sm font-bold">اسم المستخدم / الهاتف</label>
                                    <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="phone" type="text" value="{{ old('phone', $managedUser->phone) }}" />
                                </div>
                                <div>
                                    <label class="mb-2 block text-sm font-bold">الحالة</label>
                                    <select class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="status">
                                        <option @selected(old('status', $managedUser->status ?? 'active') === 'active') value="active">نشط</option>
                                        <option @selected(old('status', $managedUser->status) === 'inactive') value="inactive">موقوف</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="mb-2 block text-sm font-bold">نوع الحساب</label>
                                    <select class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="role">
                                        <option @selected(old('role', $managedUser->role) === 'user') value="user">مستخدم</option>
                                        <option @selected(old('role', $managedUser->role) === 'trainer') value="trainer">أدمن</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="mb-2 block text-sm font-bold">كلمة مرور جديدة</label>
                                    <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="password" placeholder="اتركها فارغة إذا لم تتغير" type="password" />
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="mb-2 block text-sm font-bold">تأكيد كلمة المرور الجديدة</label>
                                <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary dark:border-slate-700 dark:bg-slate-800" name="password_confirmation" type="password" />
                            </div>

                            <div class="mt-6 flex items-center justify-between gap-4 border-t border-slate-100 pt-4 dark:border-slate-800">
                                <div class="text-xs text-slate-500">
                                    آخر تحديث: {{ optional($managedUser->updated_at)->format('Y-m-d H:i') }}
                                </div>

                                <button class="rounded-2xl bg-primary px-5 py-3 text-sm font-black text-white transition hover:bg-emerald-600" type="submit">
                                    حفظ التعديلات
                                </button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </section>
        </main>
    </div>

    <script>
        const searchInput = document.getElementById('userSearch');
        const userCards = document.querySelectorAll('.user-card');

        searchInput?.addEventListener('input', () => {
            const query = searchInput.value.trim().toLowerCase();

            userCards.forEach((card) => {
                const matches = card.dataset.search.includes(query);
                card.classList.toggle('hidden', !matches);
            });
        });
    </script>
</body>

</html>
