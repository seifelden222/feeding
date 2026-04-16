<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>لوحة تحكم الأدمن | NutriZone</title>
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
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-background-light text-slate-900">
    <div class="flex min-h-screen">
        @include('admin.partials.sidebar')

        <main class="flex-1 p-8 space-y-8">
            <header>
                <h1 class="text-3xl font-black text-slate-900">لوحة التحكم</h1>
                <p class="text-slate-500 mt-1">مرحباً، {{ auth()->user()->name }}</p>
            </header>

            @php
                $totalUsers    = \App\Models\User::where('role', 'user')->count();
                $totalTrainers = \App\Models\User::where('role', 'trainer')->count();
                $totalAll      = \App\Models\User::where('role', '!=', 'admin')->count();
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-primary flex items-center justify-center">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm font-medium">إجمالي المستخدمين</p>
                        <h3 class="text-3xl font-black">{{ $totalUsers }}</h3>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <span class="material-symbols-outlined">fitness_center</span>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm font-medium">المدربين</p>
                        <h3 class="text-3xl font-black">{{ $totalTrainers }}</h3>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                        <span class="material-symbols-outlined">manage_accounts</span>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm font-medium">إجمالي الحسابات</p>
                        <h3 class="text-3xl font-black">{{ $totalAll }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-black">آخر المسجلين</h2>
                    <a href="{{ route('admin.usermanage') }}" class="text-primary text-sm font-bold hover:underline">عرض الكل</a>
                </div>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-slate-400 border-b border-slate-100">
                            <th class="text-right pb-3 font-bold">الاسم</th>
                            <th class="text-right pb-3 font-bold">البريد</th>
                            <th class="text-right pb-3 font-bold">النوع</th>
                            <th class="text-right pb-3 font-bold">الحالة</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach(\App\Models\User::where('role', '!=', 'admin')->latest()->take(5)->get() as $u)
                        <tr class="hover:bg-slate-50">
                            <td class="py-3 font-bold">{{ $u->name }}</td>
                            <td class="py-3 text-slate-500">{{ $u->email }}</td>
                            <td class="py-3">
                                <span class="px-2 py-1 rounded-full text-xs font-bold {{ $u->role === 'trainer' ? 'bg-blue-50 text-blue-600' : 'bg-emerald-50 text-primary' }}">
                                    {{ $u->role === 'trainer' ? 'مدرب' : 'مستخدم' }}
                                </span>
                            </td>
                            <td class="py-3">
                                <span class="px-2 py-1 rounded-full text-xs font-bold {{ $u->status === 'active' ? 'bg-emerald-50 text-primary' : 'bg-red-50 text-red-500' }}">
                                    {{ $u->status === 'active' ? 'نشط' : 'غير نشط' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
