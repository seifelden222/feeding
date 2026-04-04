<!DOCTYPE html>
<html dir="rtl" lang="ar">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <title>تسجيل الدخول | NutriZone مصر</title>
        <link href="https://fonts.googleapis.com" rel="preconnect"/>
        <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <script>
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            primary: "#10B981",
                            darkTeal: "#0F172A",
                            "background-light": "#F3F4F6",
                        },
                        fontFamily: {
                            display: ["Cairo", "sans-serif"],
                            body: ["Cairo", "sans-serif"],
                        },
                    },
                },
            };
        </script>
        <style type="text/tailwindcss">
            body {
                font-family: 'Cairo', sans-serif;
            }

            .bg-auth-overlay {
                background: linear-gradient(rgba(243, 244, 246, 0.85), rgba(243, 244, 246, 0.85)),
                    url('{{ asset('img/Low-fat-diet-WP-image-.jpg') }}');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }

            .auth-card {
                backdrop-filter: blur(12px);
            }

            input:focus {
                outline: none;
                border-color: #10B981;
                box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.1);
            }

            .field-error {
                border-color: #ef4444 !important;
                box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.1) !important;
            }

            .field-ok {
                border-color: #10B981 !important;
                box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.1) !important;
            }
        </style>
        <script>
            (() => {
                const savedTheme = localStorage.getItem('nutrizone-theme') || 'light';
                const savedLanguage = localStorage.getItem('nutrizone-language') || 'ar';

                document.documentElement.classList.toggle('dark', savedTheme === 'dark');
                document.documentElement.lang = savedLanguage;
                document.documentElement.dir = savedLanguage === 'ar' ? 'rtl' : 'ltr';
            })();
        </script>
    </head>
    <body class="bg-auth-overlay min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white/95 auth-card rounded-[2.5rem] shadow-2xl border border-white/60 p-8 md:p-12 relative overflow-hidden">
            <div class="absolute -top-24 -left-24 w-48 h-48 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-48 h-48 bg-primary/5 rounded-full blur-3xl"></div>

            <div class="relative z-10">
                <div class="text-center mb-10">
                    <div class="flex items-center justify-center gap-2.5 mb-6">
                        <img src="{{ asset('img/logo.png') }}" alt="NutriZone مصر" style="width: 250px;">
                    </div>

                    <h1 class="text-2xl font-bold text-darkTeal mt-6">تسجيل الدخول</h1>
                    <p class="text-slate-500 mt-2 font-medium">مرحباً بك مجدداً في رحلتك الصحية</p>
                </div>

                @if (session('status'))
                    <div class="mb-4 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-darkTeal pr-1" for="login-email">البريد الإلكتروني</label>

                        <div class="relative">
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">mail</span>
                            <input
                                id="login-email"
                                class="w-full pr-12 pl-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl transition-all text-right placeholder:text-slate-400 outline-none @if($errors->has('email')) field-error @endif"
                                name="email"
                                placeholder="example@gmail.com"
                                required=""
                                type="email"
                                value="{{ old('email') }}"
                                autocomplete="username"
                                autofocus
                            />
                        </div>

                        <p id="login-email-err" class="text-red-500 text-xs pr-1 {{ $errors->has('email') ? '' : 'hidden' }}">
                            {{ $errors->first('email') }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-center justify-between px-1">
                            <label class="block text-sm font-bold text-darkTeal" for="login-pass">كلمة المرور</label>
                        </div>

                        <div class="relative">
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">lock</span>
                            <input
                                id="login-pass"
                                class="w-full pr-12 pl-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl transition-all text-right placeholder:text-slate-400 outline-none @if($errors->has('password')) field-error @endif"
                                name="password"
                                placeholder="••••••••"
                                required=""
                                type="password"
                                autocomplete="current-password"
                            />
                        </div>

                        <p id="login-pass-err" class="text-red-500 text-xs pr-1 {{ $errors->has('password') ? '' : 'hidden' }}">
                            {{ $errors->first('password') }}
                        </p>

                        <div class="flex items-center justify-between pt-1">
                            <div class="flex items-center gap-2">
                                <input id="remember" type="checkbox" name="remember" class="rounded border-slate-300 text-primary focus:ring-primary" />
                                <label for="remember" class="text-sm font-medium text-slate-500">تذكرني</label>
                            </div>

                            <div class="flex justify-start">
                                <a class="text-sm font-bold text-primary hover:text-emerald-700 transition-colors" href="{{ route('password.request') }}">نسيت كلمة المرور؟</a>
                            </div>
                        </div>
                    </div>

                    <button style="padding: 10px;" class="w-full bg-primary hover:bg-emerald-600 text-white py-4.5 rounded-2xl font-extrabold text-lg shadow-lg shadow-primary/30 transition-all transform hover:scale-[1.01] active:scale-95 mt-4" type="submit">
                        دخول
                    </button>
                </form>

                <div class="mt-10 text-center border-t border-slate-100 pt-8">
                    <p class="text-slate-500 font-medium">
                        ليس لديك حساب؟
                        <a class="text-primary font-extrabold hover:underline mr-1" href="{{ route('register') }}">سجل الآن</a>
                    </p>
                </div>
            </div>
        </div>

        <script>
            const knownDomains = ['gmail.com', 'yahoo.com', 'yahoo.co.uk', 'hotmail.com', 'hotmail.co.uk', 'outlook.com', 'outlook.sa', 'live.com', 'icloud.com', 'me.com', 'mac.com', 'protonmail.com', 'proton.me', 'mail.com', 'aol.com', 'yandex.com', 'yandex.ru', 'gmx.com', 'zoho.com', 'msn.com'];

            function validateEmail(val) {
                const parts = val.split('@');
                if (parts.length !== 2) {
                    return 'صيغة البريد غير صحيحة';
                }

                if (!knownDomains.includes(parts[1].toLowerCase())) {
                    return 'يرجى استخدام دومين معروف مثل gmail.com';
                }

                return '';
            }

            function liveValidate(input, errEl, validateFn) {
                input.addEventListener('input', () => {
                    if (!input.value) {
                        input.classList.remove('field-error', 'field-ok');
                        errEl.classList.add('hidden');
                        errEl.textContent = '';
                        return;
                    }

                    const err = validateFn(input.value);

                    if (err) {
                        input.classList.add('field-error');
                        input.classList.remove('field-ok');
                        errEl.textContent = err;
                        errEl.classList.remove('hidden');
                    } else {
                        input.classList.add('field-ok');
                        input.classList.remove('field-error');
                        errEl.classList.add('hidden');
                        errEl.textContent = '';
                    }
                });
            }

            liveValidate(document.getElementById('login-email'), document.getElementById('login-email-err'), validateEmail);
        </script>
    </body>
</html>
