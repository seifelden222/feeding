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
                    <p class="mt-2 text-slate-500 dark:text-slate-400">تعديل بيانات المتدربين ومتابعة حساباتهم.</p>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white px-5 py-4 text-sm font-bold text-slate-600 shadow-sm dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300">
                    عدد المستخدمين المتاحين حالياً: {{ $managedUsers->count() }}
                </div>
            </header>

            @if (session('status'))
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-bold text-emerald-700">
                    {{ session('status') === 'user-created' ? 'تمت إضافة المستخدم بنجاح.' : 'تم تحديث بيانات المستخدم بنجاح.' }}
                </div>
            @endif

            <section class="space-y-4">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-2xl font-black">قائمة المتدربين</h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400">عرض بيانات المتدربين المسجلين.</p>
                    </div>

                    <div class="relative w-full md:w-80">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                        <input id="userSearch" class="w-full rounded-2xl border border-slate-200 bg-white py-3 pr-12 pl-4 text-sm focus:border-primary focus:ring-primary dark:border-slate-800 dark:bg-slate-900" placeholder="ابحث بالاسم أو الإيميل..." type="text" />
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                    @foreach ($managedUsers as $managedUser)
                        <div class="user-card rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900" data-search="{{ mb_strtolower($managedUser->name.' '.$managedUser->email) }}">

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
                                <span class="rounded-full px-3 py-1 text-xs font-black bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300">
                                    مستخدم
                                </span>
                            </div>

                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-sm font-bold">الاسم</label>
                                    <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 dark:border-slate-700 dark:bg-slate-800 cursor-not-allowed text-slate-500" type="text" value="{{ $managedUser->name }}" readonly />
                                </div>
                                <div>
                                    <label class="mb-2 block text-sm font-bold">الإيميل</label>
                                    <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 dark:border-slate-700 dark:bg-slate-800 cursor-not-allowed text-slate-500" type="email" value="{{ $managedUser->email }}" readonly />
                                </div>
                                <div>
                                    <label class="mb-2 block text-sm font-bold">اسم المستخدم / الهاتف</label>
                                    <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 dark:border-slate-700 dark:bg-slate-800 cursor-not-allowed text-slate-500" type="text" value="{{ $managedUser->phone ?? '—' }}" readonly />
                                </div>
                                <div>
                                    <label class="mb-2 block text-sm font-bold">الحالة</label>
                                    <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 dark:border-slate-700 dark:bg-slate-800 cursor-not-allowed text-slate-500" type="text" value="{{ $managedUser->status === 'active' ? 'نشط' : 'موقوف' }}" readonly />
                                </div>
                            </div>

                            <div class="mt-6 flex items-center justify-between gap-4 border-t border-slate-100 pt-4 dark:border-slate-800">
                                <div class="text-xs text-slate-500">
                                    آخر تحديث: {{ optional($managedUser->updated_at)->format('Y-m-d H:i') }}
                                </div>
                                <a class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-black text-slate-600 transition hover:bg-slate-50 dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-800" href="{{ route('trainer.messages') }}">
                                    مراسلة المتدرب
                                </a>
                            </div>
                        </div>
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
