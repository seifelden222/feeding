@php
    $user = auth()->user();
    $userName = $user?->name ?? 'المستخدم';
    $userEmail = $user?->email ?? 'user@nutrizone.com';
    $userRoleLabel = $user?->isTrainer() ? 'مدرب' : 'مشترك';
    $userInitial = mb_substr(trim($userName), 0, 1);

    $defaultLinkClasses = 'flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-400 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 hover:text-primary transition-all';
    $activeLinkClasses = 'flex items-center gap-3 px-4 py-3 rounded-xl bg-primary text-white font-bold';

    $userLinks = [
        [
            'label' => 'نظرة عامة',
            'icon' => 'dashboard',
            'route' => 'user.home',
        ],
        [
            'label' => 'خطة الوجبات',
            'icon' => 'restaurant_menu',
            'route' => 'user.plans',
        ],
        [
            'label' => 'تتبع التقدم',
            'icon' => 'monitoring',
            'route' => 'user.progress',
        ],
        [
            'label' => 'الاستشارات',
            'icon' => 'medical_services',
            'route' => 'user.quest',
        ],
        [
            'label' => 'الإعدادات',
            'icon' => 'settings',
            'route' => 'user.settings',
            'extra_classes' => 'mt-8',
        ],
    ];
@endphp

<aside
    class="fixed inset-y-0 right-0 z-50 w-64 bg-white dark:bg-gray-900 border-l border-gray-100 dark:border-gray-800 transform transition-transform duration-300 md:translate-x-0 translate-x-full"
    id="sidebar">
    <div class="flex h-full flex-col p-6">
        <div class="mb-10 flex justify-center">
            <img src="{{ asset('img/logo.png') }}" alt="NutriZone" style="width: 150px;">
        </div>

        <nav class="flex-1 space-y-2">
            @foreach ($userLinks as $link)
                <a
                    class="{{ request()->routeIs($link['route']) ? $activeLinkClasses : $defaultLinkClasses }} {{ $link['extra_classes'] ?? '' }}"
                    href="{{ route($link['route']) }}">
                    <span class="material-symbols-outlined">{{ $link['icon'] }}</span>
                    <span>{{ $link['label'] }}</span>
                </a>
            @endforeach
        </nav>

        <div class="space-y-4 border-t border-gray-100 pt-6 dark:border-gray-800">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-full border-2 border-primary bg-emerald-50 text-base font-black text-primary dark:bg-emerald-900/20">
                    {{ $userInitial }}
                </div>

                <div class="min-w-0 flex-1">
                    <p class="truncate text-sm font-bold dark:text-white">{{ $userName }}</p>
                    <p class="truncate text-xs text-slate-500">{{ $userEmail }}</p>
                    <p class="text-xs font-medium text-primary">{{ $userRoleLabel }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center justify-center gap-2 rounded-xl border border-rose-200 px-3 py-2.5 text-sm font-bold text-rose-600 transition-colors hover:bg-rose-50">
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                    <span>تسجيل الخروج</span>
                </button>
            </form>
        </div>
    </div>
</aside>
