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

        <main class="flex-1 p-8 space-y-8 overflow-y-auto">
            <header class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-3xl font-black">إدارة المستخدمين</h1>
                    <p class="text-slate-500 mt-1">إضافة وتعديل وحذف المستخدمين والمدربين</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white px-5 py-4 text-sm font-bold text-slate-600 shadow-sm">
                    إجمالي الحسابات: {{ $users->count() }}
                </div>
            </header>

            @if(session('status'))
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-bold text-emerald-700">
                    @if(session('status') === 'user-created') تمت إضافة المستخدم بنجاح.
                    @elseif(session('status') === 'user-updated') تم تحديث البيانات بنجاح.
                    @elseif(session('status') === 'user-deleted') تم حذف المستخدم بنجاح.
                    @endif
                </div>
            @endif

            {{-- Add User Form --}}
            <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="mb-6 flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary">person_add</span>
                    <h2 class="text-xl font-black">إضافة مستخدم جديد</h2>
                </div>
                <form action="{{ route('admin.users.store') }}" method="POST" class="grid grid-cols-1 gap-4 lg:grid-cols-6">
                    @csrf
                    <div class="lg:col-span-2">
                        <label class="mb-2 block text-sm font-bold">الاسم</label>
                        <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="name" type="text" value="{{ old('name') }}" />
                        @error('name')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="lg:col-span-2">
                        <label class="mb-2 block text-sm font-bold">البريد الإلكتروني</label>
                        <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="email" type="email" value="{{ old('email') }}" />
                        @error('email')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="lg:col-span-1">
                        <label class="mb-2 block text-sm font-bold">النوع</label>
                        <select class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="role">
                            <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>مستخدم</option>
                            <option value="trainer" {{ old('role') === 'trainer' ? 'selected' : '' }}>مدرب</option>
                        </select>
                    </div>
                    <div class="lg:col-span-1">
                        <label class="mb-2 block text-sm font-bold">الحالة</label>
                        <select class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="status">
                            <option value="active">نشط</option>
                            <option value="inactive">غير نشط</option>
                        </select>
                    </div>
                    <div class="lg:col-span-2">
                        <label class="mb-2 block text-sm font-bold">كلمة المرور</label>
                        <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="password" type="password" />
                        @error('password')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="lg:col-span-2">
                        <label class="mb-2 block text-sm font-bold">تأكيد كلمة المرور</label>
                        <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="password_confirmation" type="password" />
                    </div>
                    <div class="lg:col-span-2 flex items-end">
                        <button type="submit" class="w-full bg-primary hover:bg-emerald-600 text-white py-3 rounded-2xl font-black transition-all">
                            إضافة المستخدم
                        </button>
                    </div>
                </form>
            </section>

            {{-- Users Table --}}
            <section class="rounded-[2rem] border border-slate-200 bg-white shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary">group</span>
                    <h2 class="text-xl font-black">قائمة المستخدمين</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50 text-slate-500">
                            <tr>
                                <th class="text-right px-6 py-4 font-bold">#</th>
                                <th class="text-right px-6 py-4 font-bold">الاسم</th>
                                <th class="text-right px-6 py-4 font-bold">البريد</th>
                                <th class="text-right px-6 py-4 font-bold">الهاتف</th>
                                <th class="text-right px-6 py-4 font-bold">النوع</th>
                                <th class="text-right px-6 py-4 font-bold">الحالة</th>
                                <th class="text-right px-6 py-4 font-bold">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($users as $u)
                            <tr class="hover:bg-slate-50 transition-colors" id="row-{{ $u->id }}">
                                <td class="px-6 py-4 text-slate-400">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-bold">{{ $u->name }}</td>
                                <td class="px-6 py-4 text-slate-500">{{ $u->email }}</td>
                                <td class="px-6 py-4 text-slate-500">{{ $u->phone ?? '—' }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $u->role === 'trainer' ? 'bg-blue-50 text-blue-600' : 'bg-emerald-50 text-primary' }}">
                                        {{ $u->role === 'trainer' ? 'مدرب' : 'مستخدم' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $u->status === 'active' ? 'bg-emerald-50 text-primary' : 'bg-red-50 text-red-500' }}">
                                        {{ $u->status === 'active' ? 'نشط' : 'غير نشط' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <button onclick="openEdit({{ $u->id }}, '{{ $u->name }}', '{{ $u->email }}', '{{ $u->phone }}', '{{ $u->role }}', '{{ $u->status }}')"
                                            class="p-2 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors">
                                            <span class="material-symbols-outlined text-base">edit</span>
                                        </button>
                                        <form action="{{ route('admin.users.destroy', $u) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-xl bg-red-50 text-red-500 hover:bg-red-100 transition-colors">
                                                <span class="material-symbols-outlined text-base">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-slate-400 font-bold">لا يوجد مستخدمون بعد</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    {{-- Edit Modal --}}
    <div id="editModal" class="hidden fixed inset-0 bg-black/40 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-[2rem] shadow-2xl w-full max-w-lg p-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-black">تعديل بيانات المستخدم</h3>
                <button onclick="closeEdit()" class="text-slate-400 hover:text-slate-600">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form id="editForm" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')
                <div>
                    <label class="mb-2 block text-sm font-bold">الاسم</label>
                    <input id="edit-name" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="name" type="text" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold">البريد الإلكتروني</label>
                    <input id="edit-email" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="email" type="email" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold">الهاتف</label>
                    <input id="edit-phone" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="phone" type="text" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="mb-2 block text-sm font-bold">النوع</label>
                        <select id="edit-role" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="role">
                            <option value="user">مستخدم</option>
                            <option value="trainer">مدرب</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold">الحالة</label>
                        <select id="edit-status" class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="status">
                            <option value="active">نشط</option>
                            <option value="inactive">غير نشط</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold">كلمة مرور جديدة (اختياري)</label>
                    <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="password" type="password" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold">تأكيد كلمة المرور</label>
                    <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-primary focus:ring-primary" name="password_confirmation" type="password" />
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="submit" class="flex-1 bg-primary hover:bg-emerald-600 text-white py-3 rounded-2xl font-black transition-all">حفظ التعديلات</button>
                    <button type="button" onclick="closeEdit()" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 py-3 rounded-2xl font-black transition-all">إلغاء</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const baseUrl = '{{ url("admin/users") }}';

        function openEdit(id, name, email, phone, role, status) {
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-email').value = email;
            document.getElementById('edit-phone').value = phone !== 'null' ? phone : '';
            document.getElementById('edit-role').value = role;
            document.getElementById('edit-status').value = status;
            document.getElementById('editForm').action = baseUrl + '/' + id;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEdit() {
            document.getElementById('editModal').classList.add('hidden');
        }

        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) closeEdit();
        });
    </script>
</body>
</html>
