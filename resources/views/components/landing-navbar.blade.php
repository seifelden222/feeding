@php
    $defaultNavClasses = 'font-medium hover:text-primary transition-colors';
    $activeNavClasses = 'font-semibold text-primary';
    $authenticatedUser = auth()->user();
@endphp

<header class="fixed w-full z-50 bg-white/90 dark:bg-gray-900/90 backdrop-blur-md border-b border-gray-100 dark:border-gray-800">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" alt="NutriZone" style="width: 150px;">
        </a>

        <nav class="hidden md:flex items-center gap-8">
            <a class="{{ url()->current() === url('/') ? $activeNavClasses : $defaultNavClasses }}" href="{{ url('/') }}">الرئيسية</a>
            <a class="{{ request()->routeIs('aboutus') ? $activeNavClasses : $defaultNavClasses }}" href="{{ url('aboutus') }}">من نحن</a>
            <a class="{{ request()->routeIs('services') ? $activeNavClasses : $defaultNavClasses }}" href="{{ url('services') }}">خدماتنا</a>
            <a class="{{ request()->routeIs('articles') ? $activeNavClasses : $defaultNavClasses }}" href="{{ url('articles') }}">المقالات</a>
            <a class="{{ request()->routeIs('contactus') ? $activeNavClasses : $defaultNavClasses }}" href="{{ url('contactus') }}">اتصل بنا</a>
            <a class="{{ request()->routeIs('systems') ? $activeNavClasses : $defaultNavClasses }}" href="{{ url('systems') }}">نظامنا</a>
            <a class="{{ request()->routeIs('diseases') ? $activeNavClasses : $defaultNavClasses }}" href="{{ url('diseases') }}">لأمراض المزمنة</a>
        </nav>

        @auth
            <a href="{{ route($authenticatedUser->homeRouteName()) }}" class="rounded-full border border-emerald-200 bg-emerald-50 px-5 py-2.5 text-sm font-bold text-primary transition-all hover:bg-emerald-100">
                <span class="block">{{ $authenticatedUser->name }}</span>
                <span class="block text-[11px] text-slate-500">{{ $authenticatedUser->email }}</span>
            </a>
        @else
            <a href="{{ url('login') }}" class="bg-primary hover:bg-emerald-600 text-white px-6 py-2.5 rounded-full font-bold transition-all transform hover:scale-105">
                ابدأ رحلتك الآن
            </a>
        @endauth
    </div>
</header>
