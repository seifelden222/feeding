<!DOCTYPE html>
<html dir="rtl" lang="ar">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <title>إنشاء حساب جديد | NutriZone مصر</title>
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
                            "background-light": "#F8FAFC",
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

            .bg-auth {
                background-color: #F8FAFC;
                background-image: radial-gradient(#10B981 0.5px, transparent 0.5px), radial-gradient(#10B981 0.5px, #F8FAFC 0.5px);
                background-size: 20px 20px;
                background-position: 0 0, 10px 10px;
                background-attachment: fixed;
                opacity: 1;
            }

            .bg-overlay {
                background: linear-gradient(rgba(248, 250, 252, 0.85), rgba(248, 250, 252, 0.85));
            }

            .auth-card {
                backdrop-filter: blur(12px);
            }

            input:focus {
                ring-color: #10B981;
                border-color: #10B981;
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
    </head>
    <body class="bg-auth min-h-screen flex items-center justify-center p-4 md:p-6 relative">
        <div class="absolute inset-0 bg-overlay pointer-events-none"></div>

        <div class="relative z-10 w-full max-w-[560px]">
            <div class="bg-white/95 auth-card rounded-[2.5rem] shadow-2xl border border-white/50 p-8 md:p-12">
                <div class="text-center mb-10">
                    <div class="flex items-center justify-center gap-3 mb-6">
                        <img src="{{ asset('img/logo.png') }}" alt="NutriZone مصر" style="width: 200px;">
                    </div>

                    <h1 class="text-3xl font-black text-darkTeal mb-3">إنشاء حساب جديد</h1>
                    <p class="text-slate-500 font-medium">ابدأ رحلتك نحو حياة صحية ومثالية اليوم</p>
                </div>

                <form class="space-y-5" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="space-y-3">
                        <label class="block text-sm font-extrabold text-darkTeal pr-1">نوع الحساب</label>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label class="cursor-pointer">
                                <input class="peer sr-only" name="role" type="radio" value="user" {{ old('role', 'user') === 'user' ? 'checked' : '' }}>
                                <div class="rounded-2xl border-2 border-slate-200 bg-slate-50 px-5 py-4 transition-all peer-checked:border-primary peer-checked:bg-emerald-50 peer-checked:shadow-lg peer-checked:shadow-primary/10">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="font-black text-darkTeal">مستخدم</span>
                                        <span class="material-symbols-outlined text-primary">person</span>
                                    </div>
                                    <p class="text-sm text-slate-500 font-medium">للمتابعة اليومية والخطط وتتبع التقدم.</p>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input class="peer sr-only" name="role" type="radio" value="trainer" {{ old('role') === 'trainer' ? 'checked' : '' }}>
                                <div class="rounded-2xl border-2 border-slate-200 bg-slate-50 px-5 py-4 transition-all peer-checked:border-primary peer-checked:bg-emerald-50 peer-checked:shadow-lg peer-checked:shadow-primary/10">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="font-black text-darkTeal">Trainer</span>
                                        <span class="material-symbols-outlined text-primary">fitness_center</span>
                                    </div>
                                    <p class="text-sm text-slate-500 font-medium">لإدارة العملاء والبرامج والمتابعة.</p>
                                </div>
                            </label>
                        </div>

                        <p class="text-red-500 text-xs pr-1 {{ $errors->has('role') ? '' : 'hidden' }}">
                            {{ $errors->first('role') }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-extrabold text-darkTeal pr-1" for="su-name">الاسم الكامل</label>

                        <div class="relative">
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">person</span>
                            <input
                                id="su-name"
                                class="w-full pr-12 pl-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none transition-all placeholder:text-slate-400 @if($errors->has('name')) field-error @endif"
                                name="name"
                                placeholder="أدخل اسمك بالكامل"
                                required=""
                                type="text"
                                value="{{ old('name') }}"
                                autocomplete="name"
                                autofocus
                            />
                        </div>

                        <p id="su-name-err" class="text-red-500 text-xs pr-1 {{ $errors->has('name') ? '' : 'hidden' }}">
                            {{ $errors->first('name') }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-extrabold text-darkTeal pr-1 text-right" for="display-phone">رقم الهاتف</label>

                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">call</span>
                            <div class="absolute left-3 flex items-center gap-2 text-slate-600 font-bold border-r border-slate-200 pr-3" dir="ltr">
                                <span class="text-xl">🇪🇬</span>
                                <span class="text-base">+20</span>
                            </div>
                            <input
                                id="display-phone"
                                name="phone"
                                class="w-full pr-12 pl-24 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none transition-all text-left font-sans"
                                dir="ltr"
                                placeholder="1XXXXXXXXX"
                                type="tel"
                                inputmode="numeric"
                                value="{{ old('phone') }}"
                            />
                        </div>

                        <p id="su-phone-err" class="text-red-500 text-xs pr-1 {{ $errors->has('phone') ? '' : 'hidden' }}">
                            {{ $errors->first('phone') }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-extrabold text-darkTeal pr-1" for="su-email">البريد الإلكتروني</label>

                        <div class="relative">
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">mail</span>
                            <input
                                id="su-email"
                                class="w-full pr-12 pl-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none transition-all placeholder:text-slate-400 @if($errors->has('email')) field-error @endif"
                                name="email"
                                placeholder="example@gmail.com"
                                required=""
                                type="email"
                                value="{{ old('email') }}"
                                autocomplete="username"
                            />
                        </div>

                        <p id="su-email-err" class="text-red-500 text-xs pr-1 {{ $errors->has('email') ? '' : 'hidden' }}">
                            {{ $errors->first('email') }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-extrabold text-darkTeal pr-1" for="su-pass">كلمة المرور</label>

                            <div class="relative">
                                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">lock</span>
                                <input
                                    id="su-pass"
                                    class="w-full pr-12 pl-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none transition-all @if($errors->has('password')) field-error @endif"
                                    name="password"
                                    placeholder="••••••••"
                                    required=""
                                    type="password"
                                    autocomplete="new-password"
                                />
                            </div>

                            <p id="su-pass-err" class="text-red-500 text-xs pr-1 {{ $errors->has('password') ? '' : 'hidden' }}">
                                {{ $errors->first('password') }}
                            </p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-extrabold text-darkTeal pr-1" for="su-pass2">تأكيد كلمة المرور</label>

                            <div class="relative">
                                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">lock_reset</span>
                                <input
                                    id="su-pass2"
                                    class="w-full pr-12 pl-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none transition-all @if($errors->has('password_confirmation')) field-error @endif"
                                    name="password_confirmation"
                                    placeholder="••••••••"
                                    required=""
                                    type="password"
                                    autocomplete="new-password"
                                />
                            </div>

                            <p id="su-pass2-err" class="text-red-500 text-xs pr-1 {{ $errors->has('password_confirmation') ? '' : 'hidden' }}">
                                {{ $errors->first('password_confirmation') }}
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-extrabold text-darkTeal pr-1" for="su-age">السن (سنة)</label>
                            <input id="su-age" name="age" type="number" min="10" max="120" value="{{ old('age') }}" class="w-full pr-4 pl-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none transition-all @if($errors->has('age')) field-error @endif" placeholder="مثال: 30" />
                            <p class="text-red-500 text-xs pr-1 {{ $errors->has('age') ? '' : 'hidden' }}">
                                {{ $errors->first('age') }}
                            </p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-extrabold text-darkTeal pr-1" for="su-system">اختيار النظام (اختياري)</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">task_alt</span>
                                <select id="su-system" name="selected_system" class="w-full pr-12 pl-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none transition-all @if($errors->has('selected_system')) field-error @endif">
                                    <option value="">بدون اختيار</option>
                                    <option value="diabetes" {{ old('selected_system') === 'diabetes' ? 'selected' : '' }}>نظام السكري</option>
                                    <option value="weight_loss" {{ old('selected_system') === 'weight_loss' ? 'selected' : '' }}>خسارة الوزن</option>
                                    <option value="muscle_building" {{ old('selected_system') === 'muscle_building' ? 'selected' : '' }}>بناء العضلات</option>
                                </select>
                            </div>

                            <p id="su-system-err" class="text-red-500 text-xs pr-1 {{ $errors->has('selected_system') ? '' : 'hidden' }}">
                                {{ $errors->first('selected_system') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 py-3">
                        <input class="mt-1 w-5 h-5 text-primary border-slate-300 rounded-lg focus:ring-primary cursor-pointer" id="terms" type="checkbox"/>
                        <label class="text-sm text-slate-600 font-semibold leading-relaxed cursor-pointer" for="terms">
                            أوافق على <a class="text-primary font-bold hover:underline transition-all" href="#">الشروط والأحكام</a> و <a class="text-primary font-bold hover:underline transition-all" href="#">سياسة الخصوصية</a> الخاصة بـ NutriZone مصر.
                        </label>
                    </div>
                    <p id="su-terms-err" class="text-red-500 text-xs pr-1 hidden">يجب الموافقة على الشروط والأحكام للمتابعة</p>

                    <button class="w-full bg-primary hover:bg-emerald-600 text-white py-5 rounded-2xl font-black text-xl shadow-xl shadow-primary/30 transition-all transform hover:scale-[1.01] active:scale-95" type="submit">
                        إنشاء حساب
                    </button>
                </form>

                <div class="mt-10 text-center border-t border-slate-100 pt-8">
                    <p class="text-slate-500 font-medium">
                        لديك حساب بالفعل؟
                        <a class="text-primary font-black hover:text-emerald-700 transition-colors mr-2 text-lg" href="{{ route('login') }}">تسجيل الدخول</a>
                    </p>
                </div>
            </div>

            <p class="text-center text-slate-400 text-xs mt-8 font-medium">
                © 2026 NutriZone مصر - جميع الحقوق محفوظة
            </p>
        </div>

        <script>
            const knownDomains = ['gmail.com', 'yahoo.com', 'yahoo.co.uk', 'hotmail.com', 'hotmail.co.uk', 'outlook.com', 'outlook.sa', 'live.com', 'icloud.com', 'me.com', 'mac.com', 'protonmail.com', 'proton.me', 'mail.com', 'aol.com', 'yandex.com', 'yandex.ru', 'gmx.com', 'zoho.com', 'msn.com'];

            function validateName(val) {
                if (/\d/.test(val)) {
                    return 'الاسم يجب أن يحتوي على حروف فقط بدون أرقام';
                }

                return '';
            }

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

            function validatePass(val) {
                if (!val) {
                    return '';
                }

                if (val.length < 8) {
                    return 'كلمة المرور قصيرة جداً (يجب أن تكون 8 أحرف على الأقل)';
                }

                if (!/\p{L}/u.test(val)) {
                    return 'كلمة المرور يجب أن تحتوي على حرف واحد على الأقل';
                }

                if (!/\p{N}/u.test(val)) {
                    return 'كلمة المرور يجب أن تحتوي على رقم واحد على الأقل';
                }

                if (!/[\p{P}\p{S}]/u.test(val)) {
                    return 'كلمة المرور يجب أن تحتوي على رمز واحد على الأقل مثل: ! @ #';
                }

                return '';
            }

            function validatePass2(val) {
                const p1 = document.getElementById('su-pass').value;

                if (val.length > 0 && val !== p1) {
                    return 'كلمتا المرور غير متطابقتين';
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

            liveValidate(document.getElementById('su-name'), document.getElementById('su-name-err'), validateName);
            liveValidate(document.getElementById('su-email'), document.getElementById('su-email-err'), validateEmail);
            liveValidate(document.getElementById('su-pass'), document.getElementById('su-pass-err'), validatePass);
            liveValidate(document.getElementById('su-pass2'), document.getElementById('su-pass2-err'), validatePass2);

            function validatePhone(val) {
                // allow international formats and separators (spaces, +, -, parentheses)
                if (!val) {
                    return '';
                }

                const digits = val.replace(/\D+/g, '');

                if (digits.length > 0 && digits.length < 10) {
                    return 'رقم الهاتف يجب ألا يقل عن 10 أرقام';
                }

                if (val.length > 30) {
                    return 'رقم الهاتف طويل جداً';
                }

                return '';
            }

            liveValidate(document.getElementById('display-phone'), document.getElementById('su-phone-err'), validatePhone);

            document.querySelector('form').addEventListener('submit', function (e) {
                const terms = document.getElementById('terms');
                const termsErr = document.getElementById('su-terms-err');
                if (!terms.checked) {
                    e.preventDefault();
                    termsErr.classList.remove('hidden');
                } else {
                    termsErr.classList.add('hidden');
                }
            });

            document.getElementById('terms').addEventListener('change', function () {
                document.getElementById('su-terms-err').classList.toggle('hidden', this.checked);
            });
        </script>
    </body>
</html>
