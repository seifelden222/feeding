@php
    $trainer = auth()->user();
    $trainerName = $trainer?->name ?? 'المدرب';
    $trainerEmail = $trainer?->email ?? 'trainer@nutrizone.com';
    $trainerAvatar = asset('img/logo.png');

    $navItems = [
        [
            'route' => 'trainer.home',
            'icon' => 'dashboard',
            'label' => 'لوحة القيادة',
        ],
        [
            'route' => 'trainer.usermanage',
            'icon' => 'group',
            'label' => 'المستخدمين',
        ],
        [
            'route' => 'trainer.plansmanage',
            'icon' => 'restaurant_menu',
            'label' => 'الخطط الغذائية',
        ],
        [
            'route' => 'trainer.messages',
            'icon' => 'chat',
            'label' => 'الرسائل',
        ],
        [
            'route' => 'trainer.settings',
            'icon' => 'settings',
            'label' => 'الإعدادات',
        ],
    ];
@endphp

<script>
    (() => {
        const savedTheme = localStorage.getItem('nutrizone-theme') || 'light';
        const savedLanguage = localStorage.getItem('nutrizone-language') || 'ar';

        document.documentElement.classList.toggle('dark', savedTheme === 'dark');
        document.documentElement.lang = savedLanguage;
        document.documentElement.dir = savedLanguage === 'ar' ? 'rtl' : 'ltr';
    })();
</script>

<aside class="sticky top-0 flex h-screen w-64 flex-col border-l border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-900">
    <div class="flex flex-col gap-6 p-6">
        <div class="mb-10 flex justify-center">
            <img src="{{ asset('img/logo.png') }}" alt="NutriZone" class="w-[150px]">
        </div>

        <nav class="flex flex-col gap-1">
            @foreach ($navItems as $item)
                @php
                    $isActive = request()->routeIs($item['route']);
                @endphp

                <a
                    href="{{ route($item['route']) }}"
                    @class([
                        'flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium transition-colors',
                        'bg-primary text-white shadow-sm' => $isActive,
                        'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' => ! $isActive,
                    ])
                >
                    <span @class([
                        'material-symbols-outlined',
                        'text-white' => $isActive,
                        'text-slate-500' => ! $isActive,
                    ])>{{ $item['icon'] }}</span>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>
    </div>

    <div class="mt-auto space-y-4 border-t border-slate-200 p-6 dark:border-slate-800">
        <div class="flex items-center gap-3">
            <div class="h-10 w-10 overflow-hidden rounded-full border border-slate-200 bg-white">
                <img src="{{ $trainerAvatar }}" alt="{{ $trainerName }}" class="h-full w-full object-cover">
            </div>

            <div class="flex min-w-0 flex-1 flex-col overflow-hidden">
                <span class="truncate text-sm font-bold">{{ $trainerName }}</span>
                <span class="truncate text-xs text-slate-500">{{ $trainerEmail }}</span>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-xl border border-rose-200 px-3 py-2 text-sm font-bold text-rose-600 transition-colors hover:bg-rose-50"
            >
                <span class="material-symbols-outlined text-[20px]">logout</span>
                <span>تسجيل الخروج</span>
            </button>
        </form>
    </div>
</aside>
