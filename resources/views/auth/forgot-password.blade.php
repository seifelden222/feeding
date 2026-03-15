<!DOCTYPE html>
<html dir="rtl" lang="ar">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <title>نسيت كلمة المرور | NutriZone مصر</title>
        <link href="https://fonts.googleapis.com" rel="preconnect"/>
        <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800;900&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <script>
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: { primary: "#10B981", darkTeal: "#0F172A" },
                        fontFamily: { display: ["Cairo", "sans-serif"], body: ["Cairo", "sans-serif"] },
                    },
                },
            };
        </script>
        <style>
            body { font-family: 'Cairo', sans-serif; }
            .bg-auth-overlay {
                background: linear-gradient(rgba(243,244,246,0.85), rgba(243,244,246,0.85)),
                            url('{{ asset('img/Low-fat-diet-WP-image-.jpg') }}');
                background-size: cover; background-position: center; background-attachment: fixed;
            }
            .auth-card { backdrop-filter: blur(12px); }
            .field-error { border-color: #ef4444 !important; box-shadow: 0 0 0 2px rgba(239,68,68,0.1); }
            .field-ok { border-color: #10B981 !important; box-shadow: 0 0 0 2px rgba(16,185,129,0.1); }
        </style>
    </head>
    <body class="bg-auth-overlay min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white/95 auth-card rounded-[2.5rem] shadow-2xl border border-white/60 p-8 md:p-12 relative overflow-hidden">
            <div class="absolute -top-24 -left-24 w-48 h-48 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-48 h-48 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="relative z-10">
                <div class="text-center mb-10">
                    <div class="flex items-center justify-center mb-6">
                        <img src="{{ asset('img/logo.png') }}" alt="NutriZone" style="width:250px;">
                    </div>
                    <div id="icon-wrap" class="w-16 h-16 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-symbols-outlined text-primary text-4xl">
                            {{ session('status') ? 'mark_email_read' : 'lock_reset' }}
                        </span>
                    </div>
                    <h1 class="text-2xl font-bold text-darkTeal">نسيت كلمة المرور؟</h1>
                    <p class="text-slate-500 mt-2 font-medium">أدخل بريدك الإلكتروني وسنرسل لك رابط الاستعادة</p>
                </div>

                @if (! session('status'))
                    <div id="step-email">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="space-y-2 mb-6">
                                <label class="block text-sm font-bold text-darkTeal pr-1" for="fp-email">البريد الإلكتروني</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">mail</span>
                                    <input
                                        id="fp-email"
                                        name="email"
                                        type="email"
                                        value="{{ old('email') }}"
                                        class="w-full pr-12 pl-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl transition-all text-right placeholder:text-slate-400 outline-none @if($errors->has('email')) field-error @endif"
                                        placeholder="example@gmail.com"
                                        autocomplete="username"
                                        required
                                        autofocus
                                    />
                                </div>
                                <p id="fp-email-err" class="text-red-500 text-xs pr-1 {{ $errors->has('email') ? '' : 'hidden' }}">
                                    {{ $errors->first('email') }}
                                </p>
                            </div>
                            <button
                                class="w-full bg-primary hover:bg-emerald-600 text-white py-4 rounded-2xl font-extrabold text-lg shadow-lg shadow-primary/30 transition-all transform hover:scale-[1.01] active:scale-95"
                                type="submit"
                            >
                                إرسال رابط الاستعادة
                            </button>
                        </form>
                    </div>
                @else
                    <div id="step-success" class="text-center">
                        <div class="w-16 h-16 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="material-symbols-outlined text-primary text-4xl">mark_email_read</span>
                        </div>
                        <p class="text-slate-600 font-medium leading-relaxed mb-6">
                            تم إرسال رابط استعادة كلمة المرور إلى بريدك الإلكتروني. تحقق من صندوق الوارد.
                        </p>
                        <a
                            href="{{ route('login') }}"
                            class="inline-block bg-primary hover:bg-emerald-600 text-white px-8 py-3 rounded-2xl font-bold transition-all"
                        >
                            العودة لتسجيل الدخول
                        </a>
                    </div>
                @endif

                <div class="mt-8 text-center border-t border-slate-100 pt-6">
                    <a href="{{ route('login') }}" class="text-primary font-bold hover:underline flex items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        العودة لتسجيل الدخول
                    </a>
                </div>
            </div>
        </div>

        <script>
            const knownDomains = ['gmail.com', 'yahoo.com', 'yahoo.co.uk', 'hotmail.com', 'hotmail.co.uk', 'outlook.com', 'outlook.sa', 'live.com', 'icloud.com', 'me.com', 'mac.com', 'protonmail.com', 'proton.me', 'mail.com', 'aol.com', 'yandex.com', 'yandex.ru', 'gmx.com', 'zoho.com', 'msn.com'];

            function validateEmail(val) {
                const parts = val.split('@');
                if (parts.length !== 2) return 'صيغة البريد غير صحيحة';
                const domain = parts[1].toLowerCase();
                if (!knownDomains.includes(domain)) return 'يرجى استخدام دومين معروف مثل gmail.com أو outlook.com';
                return '';
            }

            const fpEmail = document.getElementById('fp-email');
            const fpErr = document.getElementById('fp-email-err');

            if (fpEmail && fpErr) {
                fpEmail.addEventListener('input', () => {
                    const err = validateEmail(fpEmail.value);

                    if (fpEmail.value === '') {
                        fpEmail.classList.remove('field-error', 'field-ok');
                        fpErr.classList.add('hidden');
                        fpErr.textContent = '';
                        return;
                    }

                    if (err) {
                        fpEmail.classList.remove('field-ok');
                        fpEmail.classList.add('field-error');
                        fpErr.textContent = err;
                        fpErr.classList.remove('hidden');
                    } else {
                        fpEmail.classList.remove('field-error');
                        fpEmail.classList.add('field-ok');
                        fpErr.classList.add('hidden');
                        fpErr.textContent = '';
                    }
                });
            }
        </script>
    </body>
</html>
