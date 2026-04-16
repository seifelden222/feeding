<aside class="w-64 bg-white border-l border-slate-100 flex flex-col min-h-screen shadow-sm">
    <div class="p-6 border-b border-slate-100 flex flex-col items-center">
        <img src="{{ asset('img/logo.png') }}" alt="NutriZone" class="w-[150px]">
        <p class="text-xs text-slate-400 mt-2 font-bold">لوحة الأدمن</p>
    </div>

    <nav class="flex-1 p-4 space-y-1">
        <a href="{{ route('admin.home') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-colors {{ request()->routeIs('admin.home') ? 'bg-primary text-white' : 'text-slate-600 hover:bg-slate-50' }}">
            <span class="material-symbols-outlined">dashboard</span>
            الرئيسية
        </a>
        <a href="{{ route('admin.usermanage') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-colors {{ request()->routeIs('admin.usermanage') ? 'bg-primary text-white' : 'text-slate-600 hover:bg-slate-50' }}">
            <span class="material-symbols-outlined">manage_accounts</span>
            إدارة المستخدمين
        </a>
    </nav>

    <div class="p-4 border-t border-slate-100">
        <div class="flex items-center gap-3 px-4 py-3 mb-2">
            <div class="w-9 h-9 rounded-full bg-primary/10 flex items-center justify-center">
                <span class="material-symbols-outlined text-primary text-lg">admin_panel_settings</span>
            </div>
            <div>
                <p class="text-sm font-black text-slate-800">{{ auth()->user()->name }}</p>
                <p class="text-xs text-slate-400">أدمن</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold text-red-500 hover:bg-red-50 transition-colors">
                <span class="material-symbols-outlined text-[20px]">logout</span>
                تسجيل الخروج
            </button>
        </form>
    </div>
</aside>
