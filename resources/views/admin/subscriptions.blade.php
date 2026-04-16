@php $admin = auth()->user(); @endphp
<!doctype html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>الاشتراكات | لوحة الأدمن</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: { primary: "#10B981", "background-light": "#f8fdfb" },
                    fontFamily: { display: ["Cairo", "sans-serif"] },
                },
            },
        };
    </script>
    <style>body{font-family:Cairo, sans-serif}</style>
</head>
<body class="bg-background-light text-slate-900 dark:bg-background-dark dark:text-slate-100">
    <div class="flex min-h-screen">
        @include('admin.partials.sidebar')
        <main class="flex-1 p-8 space-y-6">
            <header class="flex items-start justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-black">الاشتراكات</h1>
                    <p class="text-sm text-slate-500">متابعة تعيين الأنظمة الغذائية للمستخدمين.</p>
                </div>
                <a href="{{ route('admin.usermanage') }}" class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-bold text-slate-700 hover:bg-slate-50">
                    إدارة المستخدمين
                </a>
            </header>

            <section class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-3">
                <article class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                    <p class="text-sm text-slate-500">إجمالي الاشتراكات</p>
                    <p class="mt-2 text-3xl font-black">{{ number_format($stats['total']) }}</p>
                </article>
                <article class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                    <p class="text-sm text-slate-500">الاشتراكات الأساسية</p>
                    <p class="mt-2 text-3xl font-black text-primary">{{ number_format($stats['primary']) }}</p>
                </article>
                <article class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                    <p class="text-sm text-slate-500">إضافات هذا الأسبوع</p>
                    <p class="mt-2 text-3xl font-black text-blue-600">{{ number_format($stats['newThisWeek']) }}</p>
                </article>
            </section>

            <section class="mt-6 rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-black">آخر الاشتراكات</h2>
                    <span class="text-xs text-slate-500">{{ $subscriptions->total() }} سجل</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[760px] text-sm">
                        <thead>
                            <tr class="border-b border-slate-100 text-right text-slate-400">
                                <th class="px-3 py-3 font-bold">المستخدم</th>
                                <th class="px-3 py-3 font-bold">البريد</th>
                                <th class="px-3 py-3 font-bold">النظام</th>
                                <th class="px-3 py-3 font-bold">النوع</th>
                                <th class="px-3 py-3 font-bold">تاريخ الإضافة</th>
                                <th class="px-3 py-3 font-bold">الحالة</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($subscriptions as $item)
                                <tr class="hover:bg-slate-50/70">
                                    <td class="px-3 py-3 font-bold text-slate-800">{{ $item->user?->name ?? 'غير معروف' }}</td>
                                    <td class="px-3 py-3 text-slate-500">{{ $item->user?->email ?? '-' }}</td>
                                    <td class="px-3 py-3 text-slate-700">{{ $item->nutritionPlan?->title ?? 'بدون عنوان' }}</td>
                                    <td class="px-3 py-3">
                                        <span class="rounded-full px-2 py-1 text-xs font-bold {{ $item->is_primary ? 'bg-emerald-50 text-primary' : 'bg-amber-50 text-amber-700' }}">
                                            {{ $item->is_primary ? 'أساسي' : 'إضافي' }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-3 text-slate-500">{{ optional($item->assigned_at ?? $item->created_at)->format('Y-m-d H:i') }}</td>
                                    <td class="px-3 py-3">
                                        @php $active = ($item->user?->status ?? null) === 'active'; @endphp
                                        <span class="rounded-full px-2 py-1 text-xs font-bold {{ $active ? 'bg-emerald-50 text-primary' : 'bg-rose-50 text-rose-600' }}">
                                            {{ $active ? 'نشط' : 'غير نشط' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-3 py-10 text-center text-slate-500">لا توجد اشتراكات مسجلة حتى الآن.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $subscriptions->links() }}
                </div>
            </section>

            <div class="mt-6 rounded-2xl border border-dashed border-slate-200 bg-white/60 p-4 text-xs text-slate-500">
                هذه النسخة تعرض البيانات الفعلية من جدول `user_nutrition_plans`.
            </div>
        </main>
    </div>
</body>
</html>
