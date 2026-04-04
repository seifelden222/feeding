<!DOCTYPE html>
@php
    $user = auth()->user();
@endphp
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>NutriZone - الدردشة المباشرة</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&family=Public+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#10B981",
                        "background-light": "#f8f6f6",
                        "background-dark": "#061310",
                        "surface-light": "#ffffff",
                        "surface-dark": "#0a1f1a",
                    },
                    fontFamily: {
                        "display": ["Cairo", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(16, 185, 129, 0.2);
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen flex">

<x-user-slider />

    <main class="flex-1 flex flex-col overflow-hidden h-screen pr-0 md:pr-64 transition-all duration-300">

        <header
            class="h-20 bg-surface-light dark:bg-surface-dark border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-8 shrink-0">
            <div class="flex items-center gap-4">
                <h2 class="text-xl font-bold">الدردشة المباشرة</h2>
                <div class="h-6 w-px bg-slate-200 dark:bg-slate-800"></div>
                <div class="relative max-w-xs">
                    <span
                        class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                    <input
                        class="w-64 pr-10 pl-4 py-2 bg-slate-100 dark:bg-slate-800 border-none rounded-xl text-sm focus:ring-1 focus:ring-primary"
                        placeholder="البحث في المحادثات..." type="text" />
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button
                    class="size-10 rounded-full flex items-center justify-center bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
                <div class="flex items-center gap-3 pr-4 border-r border-slate-200 dark:border-slate-800">
                    <div class="text-left hidden md:block">
                        <p class="text-sm font-bold">{{ $user?->name }}</p>
                        <p class="text-[10px] text-slate-500">مستخدم نشط</p>
                    </div>
                    <div class="size-10 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6K8ROgtMv_BTuYRWnhTIltaIjsRbsxt5YDaCUOILt93SIx4kp9dRwAbiV_jh6cuMZjKI5OnI0w3JI3jpYg6fURTg2auTgfD83VmP-Zfq7FKyM_ecIUrA5S3gOTASEExNUtHxHEMYnmLVuIdYPc37AYBUTa9T-yizpr9HcDS98zG4k3GwtlcFBV9EJKRGBrHJg74ukXleMkAf3qBsD7ztKCGV_6jAR8863t3Ga_NMWnElJ4KsmRZllTIE4WWQaWt9uMtxc2DjUEQfP" />
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 flex overflow-hidden">
            <div
                class="w-80 bg-surface-light dark:bg-surface-dark border-l border-slate-200 dark:border-slate-800 flex flex-col shrink-0">
                <div class="p-4 border-b border-slate-100 dark:border-slate-800">
                    <div class="flex gap-2 p-1 bg-slate-100 dark:bg-slate-800 rounded-xl">
                        <button
                            class="flex-1 py-1.5 text-xs font-bold rounded-lg bg-white dark:bg-slate-700 shadow-sm">المحادثات</button>
                        <button
                            class="flex-1 py-1.5 text-xs font-bold rounded-lg text-slate-500 hover:bg-white/50 dark:hover:bg-slate-700/50">الخبراء</button>
                    </div>
                </div>
                <div class="flex-1 overflow-y-auto custom-scrollbar">
                    <div
                        class="p-4 flex items-center gap-3 bg-primary/5 border-r-4 border-primary cursor-pointer hover:bg-primary/10 transition-colors">
                        <div class="relative">
                            <div
                                class="size-12 rounded-full overflow-hidden bg-slate-200 border-2 border-white dark:border-slate-800">
                                <img class="w-full h-full object-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDridakKinscNzoKFDmzxiwmA-4OdeUvFK7ULCwZ7vex7aFfGkh-pTHbq41njCOF35ZriUkrByyT8FHV-QcbO1KWzhq1W1517UHe8GroJobB23Gc8IIXHA2ec4sz1w1M-Phsq44VmI-KtNc_LauYO2uKwh1KIXeOcTgRrBuI2PKLwlCq-RuldAockk-Ob7rVWvjPsk5aCfrk96foyIw-yBN3qMHT7zPsy-avZBGF5tRQpGXztK4SfI3h1Si1aaV7gWrHW9tjFZnKnUv" />
                            </div>
                            <div
                                class="absolute bottom-0 left-0 size-3.5 bg-green-500 rounded-full border-2 border-white dark:border-surface-dark">
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start mb-0.5">
                                <h4 class="text-sm font-bold truncate">د. سارة أحمد</h4>
                                <span class="text-[10px] text-primary font-bold">١٠:٣٠ ص</span>
                            </div>
                            <p class="text-xs text-slate-500 dark:text-slate-400 truncate font-medium">نعم، يمكنك
                                استبدال وجبة الشوفان بـ...</p>
                        </div>
                    </div>
                    <div
                        class="p-4 flex items-center gap-3 cursor-pointer hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <div class="relative">
                            <div class="size-12 rounded-full overflow-hidden bg-slate-200 border-2 border-transparent">
                                <img class="w-full h-full object-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCG2WsRJQBuioYoFX1wEt6w1ZhHFqnVZ-Jg-Hf-17okmO9HwEQhyyfQaKvEY_KUNnc3ls8wKhPCsDtGX1O5fm7efm6N7s_M0-pAFIPbR0O_NYcXtaLut-cD22pnDirPQTyz2xTFRO0Gerj9OBTpU3bQzCL3oUx0eS9IhBAO3OjB9B45ZeRg-gA7hlDe9z9LyONlq2MVhD0uSSw8uK62v-EiF5aVNjQDayKNHjACMKCg79AXqJK2pJ0HGI9CWtsaIbw2oSPAnKG_tUjE" />
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start mb-0.5">
                                <h4 class="text-sm font-bold truncate">د. محمد علي</h4>
                                <span class="text-[10px] text-slate-400">أمس</span>
                            </div>
                            <p class="text-xs text-slate-400 dark:text-slate-500 truncate">كيف تشعر بعد أسبوع من النظام
                                الجديد؟</p>
                        </div>
                        <div class="size-5 rounded-full bg-primary flex items-center justify-center">
                            <span class="text-[10px] text-white font-bold">٢</span>
                        </div>
                    </div>
                    <div
                        class="p-4 flex items-center gap-3 cursor-pointer hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <div class="relative">
                            <div class="size-12 rounded-full overflow-hidden bg-slate-200 border-2 border-transparent">
                                <img class="w-full h-full object-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYgz5yFQm7Ho3rmqdGouU87lhwPI4T_Pcj6LamAcO7xob0gKiY5DV4kx1ex5FvKZBm934CTYGw9tAU1OmVOhkMbrKKChh_sXoQCJLBFKwCnGsXGaNv63DY-yOoAw6o69SSRPd4Bl6W_pCXW-fBusT2xowTOwCNqJSai9GpKlcoj13ZwDsZwWbxTbJ0knKniKbVokfx_cF7YXas-_29DmHwSKhLN_MaySTwb9_CtG4Y2sE70eCfFYQIFDzn3l0zolst7OZspvZO" />
                            </div>
                            <div
                                class="absolute bottom-0 left-0 size-3.5 bg-green-500 rounded-full border-2 border-white dark:border-surface-dark">
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start mb-0.5">
                                <h4 class="text-sm font-bold truncate">أ/ ليلى حسن</h4>
                                <span class="text-[10px] text-slate-400">الإثنين</span>
                            </div>
                            <p class="text-xs text-slate-400 dark:text-slate-500 truncate">تم تحديث قائمة المشتريات
                                الخاصة بك</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 flex flex-col bg-slate-50 dark:bg-black/20">
                <div
                    class="px-6 py-3 bg-surface-light dark:bg-surface-dark border-b border-slate-200 dark:border-slate-800 flex items-center justify-between shrink-0">
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-full overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAHT3yeGJwsFe2JPD1cbZxATp8k_weWGAMtN3I5lKEndVsKP3hQKlZnYoCK4jIOLdYHmGWETNG6ucknlHJNnHRu3dgAmIadPrezsNELipHYd6oEDNaMnF0wpynxujFJmSOw3Zlkhq-RpO8QW6ggRzw4LzFkkMrtrHGQP7oUGWnJ5tNJsB2oJwlTK_YxLko3Nt1IUca2I04CASbgg6lIe5NZLZcNWZdzq1YlGmKWC6mMpkbjr1ZwvbtiTlm7zh1ioYkMwfKQpyThqPMA" />
                        </div>
                        <div>
                            <h3 class="text-sm font-bold">د. سارة أحمد</h3>
                            <div class="flex items-center gap-1">
                                <span class="size-2 bg-green-500 rounded-full"></span>
                                <p class="text-[10px] text-slate-500 font-medium">متصل الآن</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <button
                            class="size-9 rounded-xl flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400">
                            <span class="material-symbols-outlined text-xl">videocam</span>
                        </button>
                        <button
                            class="size-9 rounded-xl flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400">
                            <span class="material-symbols-outlined text-xl">call</span>
                        </button>
                        <button
                            class="size-9 rounded-xl flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-400">
                            <span class="material-symbols-outlined text-xl">more_vert</span>
                        </button>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto p-6 space-y-6 custom-scrollbar">
                    <div class="flex justify-center">
                        <span
                            class="text-[10px] font-bold text-slate-400 bg-slate-200 dark:bg-slate-800 px-3 py-1 rounded-full uppercase tracking-wider">اليوم،
                            ٢٣ أكتوبر</span>
                    </div>
                    <div class="flex gap-3 max-w-[80%]">
                        <div class="size-8 rounded-full overflow-hidden shrink-0 mt-1">
                            <img class="w-full h-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCDXdAWkO7MnPyBDAH2Ff67yX9fgSDMaBCS8oUx1VHn0puDd1Ksmlnuu9Fuf3mzkjhyXhZ-BCFLpKLsjkqiyoc9ZU5-I7BfpkB8hNm9uur5_8Ch7OXKVCmvfym-f4f9fuhdFKMHX37TE8BOVmMV9ifxEUuQGfcnd52UeTG7PdO3pPt69kBMQiiT0fe3puxvw41GpH7e-NEJsmu_pq2xauBOTS8NfTguYh6sEEgOrmk11GNR2LKd8tuk2MfTxDxvKVGwzxFGCAFKZQn0" />
                        </div>
                        <div>
                            <div
                                class="bg-white dark:bg-surface-dark p-4 rounded-2xl rounded-tr-none shadow-sm border border-slate-100 dark:border-slate-800">
                                <p class="text-sm leading-relaxed">أهلاً بك يا أحمد. لقد راجعت تقريرك الأخير، مستويات
                                    الطاقة لديك تبدو في تحسن ملحوظ!</p>
                            </div>
                            <span class="text-[10px] text-slate-400 mt-1 block">١٠:١٥ ص</span>
                        </div>
                    </div>
                    <div class="flex flex-row-reverse gap-3 max-w-[80%] mr-auto">
                        <div class="size-8 rounded-full overflow-hidden shrink-0 mt-1">
                            <img class="w-full h-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCrpsdF7gXJ1tw7_BRDtrXZAKuB0s7N-AmMHolsBvl9YzuqD2kwSzDmG5QWJQJlFBI6EzAqJ15IZLjzmgSxdcBvql9UHQldSvaLrHSy6D5_7VzyN_5gfPV4CN9wDdidgnJmgAbTVV2bY5XUepogXp1VVYeA_MrQGFVfGK22kKNtbO1dcLe4BgzW-3_vMvw-rYOYaMVe8zWv6SN1FiDb2E7deMRTYdfekeRpDBuQXKG6Kgz-q7KnClqPd6-k8h7TAAP-Is_f33je_db2" />
                        </div>
                        <div>
                            <div
                                class="bg-primary text-white p-4 rounded-2xl rounded-tl-none shadow-md shadow-primary/10">
                                <p class="text-sm leading-relaxed">شكراً جزيلاً دكتورة. أشعر فعلاً بتحسن، لكن هل يمكنني
                                    استبدال وجبة الشوفان الصباحية بشيء آخر؟</p>
                            </div>
                            <div class="flex justify-end gap-1 mt-1">
                                <span class="text-[10px] text-slate-400">١٠:٢٥ ص</span>
                                <span class="material-symbols-outlined text-xs text-primary">done_all</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-3 max-w-[80%]">
                        <div class="size-8 rounded-full overflow-hidden shrink-0 mt-1">
                            <img class="w-full h-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJQbpPUXaSOdI96NP1oIl7ljxA2h84qMfxo3iRrQZvXBmQjViimmqyninAuOY7XBDr1Cws__6I9BtIzSofohB8CRvWNgMKAEoW5QuuVc8k_StjP7-PH_5t4fI3psXNwQ4MASIEHDgILgdWN-YbFxJADXr7W7nl_fBRilUqgXgYs0fquR1-NUMrm7yVqyRKCRBp26wMXcEZzZAFao-AAowCpbPMFMKjKdE54lbHEAtaVEQwscpj9hMcQnwpXi7gydSlNRkfBsqDwJTS" />
                        </div>
                        <div>
                            <div
                                class="bg-white dark:bg-surface-dark p-4 rounded-2xl rounded-tr-none shadow-sm border border-slate-100 dark:border-slate-800">
                                <p class="text-sm leading-relaxed">بالطبع! يمكنك تناول ٣ بيضات مسلوقة مع نصف ثمرة
                                    أفوكادو وشريحة خبز أسمر كبديل ممتاز غني بالبروتين والدهون الصحية.</p>
                            </div>
                            <span class="text-[10px] text-slate-400 mt-1 block">١٠:٢٨ ص</span>
                        </div>
                    </div>
                    <div class="flex gap-3 items-center">
                        <div class="size-8 rounded-full overflow-hidden shrink-0">
                            <img class="w-full h-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwA1pSWDpaX9VZsSLkua-MG0ZnPJ2chQ1b4WzSFVt5OPB17m7bY1fpvvbl1Q_h6dYdF7734AuFoQDutZdJVV9ni7Hprma1azprLT734FS1tbj5XJX9hu_gCD8udYI_V7aiF6dFi6yxU5xgFGyAMH3UYf0ALb0Iu_BJJKqlhi3-1Nsb2XrKkW6FRkXYeTdgEEwh_StBk4a7VXJYi0nJ9e6L6hK9aom5xSPsYiDUWPs1gxkXNQKUYErJN98qd8ANwkNavGU_1Mgg0I4n" />
                        </div>
                        <div class="flex gap-1">
                            <span class="size-1.5 bg-slate-400 rounded-full animate-bounce"></span>
                            <span
                                class="size-1.5 bg-slate-400 rounded-full animate-bounce [animation-delay:-0.15s]"></span>
                            <span
                                class="size-1.5 bg-slate-400 rounded-full animate-bounce [animation-delay:-0.3s]"></span>
                        </div>
                    </div>
                </div>

                <div
                    class="p-6 bg-surface-light dark:bg-surface-dark border-t border-slate-200 dark:border-slate-800 shrink-0">
                    <div
                        class="flex items-center gap-3 bg-slate-100 dark:bg-slate-800/50 p-2 pr-4 rounded-2xl border border-slate-200 dark:border-slate-700">
                        <button
                            class="text-slate-500 hover:text-primary transition-colors flex items-center justify-center">
                            <span class="material-symbols-outlined">sentiment_satisfied</span>
                        </button>
                        <button
                            class="text-slate-500 hover:text-primary transition-colors flex items-center justify-center">
                            <span class="material-symbols-outlined">attach_file</span>
                        </button>
                        <input class="flex-1 bg-transparent border-none focus:ring-0 text-sm py-2"
                            placeholder="اكتب رسالتك هنا..." type="text" />
                        <button
                            class="size-10 bg-primary text-white rounded-xl flex items-center justify-center hover:bg-primary/90 transition-all shadow-lg shadow-primary/20">
                            <span class="material-symbols-outlined">send</span>
                        </button>
                    </div>
                    <div class="flex justify-center mt-3">
                        <p class="text-[10px] text-slate-400">تواصلك مع الخبراء مشفر وآمن تماماً</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Notifications Popup -->
    <div id="notif-popup"
        class="hidden fixed top-24 left-8 z-[999] w-80 bg-white dark:bg-gray-900 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-800 overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 dark:border-gray-800">
            <span class="font-bold text-slate-800 dark:text-white">الإشعارات</span>
            <button onclick="document.getElementById('notif-popup').classList.add('hidden')"
                class="text-slate-400 hover:text-primary"><span
                    class="material-symbols-outlined text-sm">close</span></button>
        </div>
        <div class="divide-y divide-gray-100 dark:divide-gray-800 max-h-72 overflow-y-auto">
            <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
                <span class="material-symbols-outlined text-primary mt-0.5">chat</span>
                <div>
                    <p class="text-sm font-bold">رسالة جديدة من د. سارة</p>
                    <p class="text-xs text-slate-400">منذ 5 دقائق</p>
                </div>
            </div>
            <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
                <span class="material-symbols-outlined text-blue-500 mt-0.5">videocam</span>
                <div>
                    <p class="text-sm font-bold">موعد فيديو غداً الساعة 4:30</p>
                    <p class="text-xs text-slate-400">تذكير</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Call Modal -->
    <div id="video-modal" class="hidden fixed inset-0 bg-black/80 z-[998] flex items-center justify-center">
        <div class="bg-slate-900 rounded-2xl p-8 w-80 text-center shadow-2xl">
            <div class="w-20 h-20 rounded-full overflow-hidden mx-auto mb-4 border-4 border-primary">
                <img class="w-full h-full object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAHT3yeGJwsFe2JPD1cbZxATp8k_weWGAMtN3I5lKEndVsKP3hQKlZnYoCK4jIOLdYHmGWETNG6ucknlHJNnHRu3dgAmIadPrezsNELipHYd6oEDNaMnF0wpynxujFJmSOw3Zlkhq-RpO8QW6ggRzw4LzFkkMrtrHGQP7oUGWnJ5tNJsB2oJwlTK_YxLko3Nt1IUca2I04CASbgg6lIe5NZLZcNWZdzq1YlGmKWC6mMpkbjr1ZwvbtiTlm7zh1ioYkMwfKQpyThqPMA" />
            </div>
            <p class="text-white font-bold text-lg mb-1">د. سارة أحمد</p>
            <p class="text-slate-400 text-sm mb-6">جارٍ الاتصال...</p>
            <div class="flex justify-center gap-4">
                <button onclick="document.getElementById('video-modal').classList.add('hidden')"
                    class="w-14 h-14 bg-red-500 rounded-full flex items-center justify-center text-white hover:bg-red-600"><span
                        class="material-symbols-outlined">call_end</span></button>
                <button
                    class="w-14 h-14 bg-slate-700 rounded-full flex items-center justify-center text-white hover:bg-slate-600"><span
                        class="material-symbols-outlined">mic_off</span></button>
                <button
                    class="w-14 h-14 bg-slate-700 rounded-full flex items-center justify-center text-white hover:bg-slate-600"><span
                        class="material-symbols-outlined">videocam_off</span></button>
            </div>
        </div>
    </div>

    <!-- Call Modal -->
    <div id="call-modal" class="hidden fixed inset-0 bg-black/80 z-[998] flex items-center justify-center">
        <div class="bg-slate-900 rounded-2xl p-8 w-72 text-center shadow-2xl">
            <div class="w-20 h-20 rounded-full overflow-hidden mx-auto mb-4 border-4 border-green-500">
                <img class="w-full h-full object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAHT3yeGJwsFe2JPD1cbZxATp8k_weWGAMtN3I5lKEndVsKP3hQKlZnYoCK4jIOLdYHmGWETNG6ucknlHJNnHRu3dgAmIadPrezsNELipHYd6oEDNaMnF0wpynxujFJmSOw3Zlkhq-RpO8QW6ggRzw4LzFkkMrtrHGQP7oUGWnJ5tNJsB2oJwlTK_YxLko3Nt1IUca2I04CASbgg6lIe5NZLZcNWZdzq1YlGmKWC6mMpkbjr1ZwvbtiTlm7zh1ioYkMwfKQpyThqPMA" />
            </div>
            <p class="text-white font-bold text-lg mb-1">د. سارة أحمد</p>
            <p class="text-green-400 text-sm mb-6">مكالمة صوتية...</p>
            <button onclick="document.getElementById('call-modal').classList.add('hidden')"
                class="w-14 h-14 bg-red-500 rounded-full flex items-center justify-center text-white hover:bg-red-600 mx-auto"><span
                    class="material-symbols-outlined">call_end</span></button>
        </div>
    </div>

    <!-- More Options Modal -->
    <div id="more-modal"
        class="hidden fixed inset-0 bg-black/30 z-[998] flex items-end justify-center md:items-center">
        <div class="bg-white dark:bg-slate-900 rounded-t-2xl md:rounded-2xl w-full md:w-72 shadow-2xl overflow-hidden">
            <div class="p-4 space-y-1">
                <button
                    onclick="showToast('تم حذف المحادثة');document.getElementById('more-modal').classList.add('hidden')"
                    class="w-full text-right px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-xl text-sm font-bold text-red-500">حذف
                    المحادثة</button>
                <button
                    onclick="showToast('تم كتم الإشعارات');document.getElementById('more-modal').classList.add('hidden')"
                    class="w-full text-right px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-xl text-sm font-bold">كتم
                    الإشعارات</button>
                <button onclick="showToast('تم الإبلاغ');document.getElementById('more-modal').classList.add('hidden')"
                    class="w-full text-right px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-xl text-sm font-bold">الإبلاغ
                    عن مشكلة</button>
                <button onclick="document.getElementById('more-modal').classList.add('hidden')"
                    class="w-full text-right px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-xl text-sm text-slate-400">إلغاء</button>
            </div>
        </div>
    </div>

    <script>
        const html = document.documentElement;
        const savedTheme = localStorage.getItem('nutrizone-theme') || 'light';
        const savedLanguage = localStorage.getItem('nutrizone-language') || 'ar';
        html.classList.toggle('dark', savedTheme === 'dark');
        html.lang = savedLanguage;
        html.dir = savedLanguage === 'ar' ? 'rtl' : 'ltr';

        function showToast(msg) {
            const t = document.createElement('div');
            t.className =
                'fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-sm px-5 py-3 rounded-xl shadow-xl z-[9999]';
            t.textContent = msg;
            document.body.appendChild(t);
            setTimeout(() => t.remove(), 3000);
        }

        // Notifications
        document.querySelectorAll('button').forEach(btn => {
            const icon = btn.querySelector('.material-symbols-outlined');
            if (icon?.textContent.trim() === 'notifications') {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    document.getElementById('notif-popup').classList.toggle('hidden');
                });
            }
            if (icon?.textContent.trim() === 'videocam') btn.addEventListener('click', () => document
                .getElementById('video-modal').classList.remove('hidden'));
            if (icon?.textContent.trim() === 'call') btn.addEventListener('click', () => document.getElementById(
                'call-modal').classList.remove('hidden'));
            if (icon?.textContent.trim() === 'more_vert') btn.addEventListener('click', (e) => {
                e.stopPropagation();
                document.getElementById('more-modal').classList.remove('hidden');
            });
        });
        document.addEventListener('click', (e) => {
            if (!document.getElementById('notif-popup').contains(e.target))
                document.getElementById('notif-popup').classList.add('hidden');
        });

        // Search conversations
        const searchInput = document.querySelector('input[placeholder="البحث في المحادثات..."]');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const q = this.value.toLowerCase();
                document.querySelectorAll('.flex-1.overflow-y-auto .p-4.flex').forEach(item => {
                    const name = item.querySelector('h4')?.textContent.toLowerCase() || '';
                    item.style.display = name.includes(q) ? '' : 'none';
                });
            });
        }

        // Tab switching
        const tabs = document.querySelectorAll('.flex.gap-2.p-1 button');
        tabs.forEach((tab, i) => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => {
                    t.classList.remove('bg-white', 'dark:bg-slate-700', 'shadow-sm');
                    t.classList.add('text-slate-500');
                });
                tab.classList.add('bg-white', 'dark:bg-slate-700', 'shadow-sm');
                tab.classList.remove('text-slate-500');
                if (i === 1) showToast('عرض قائمة الخبراء');
            });
        });

        // Send message
        const msgInput = document.querySelector('input[placeholder="اكتب رسالتك هنا..."]');
        const sendBtn = document.querySelector('button.size-10.bg-primary');
        const msgContainer = document.querySelector('.flex-1.overflow-y-auto.p-6.space-y-6');
        const autoReplies = ['شكراً على رسالتك، سأرد عليك قريباً', 'فكرة ممتازة! سأضيفها لخطتك', 'هذا طبيعي جداً، لا تقلق',
            'أنصحك بزيادة البروتين قليلاً'
        ];
        let replyIdx = 0;

        function sendMessage() {
            if (!msgInput?.value.trim()) return;
            const wrapper = document.createElement('div');
            wrapper.className = 'flex flex-row-reverse gap-3 max-w-[80%] mr-auto';
            wrapper.innerHTML =
                `<div class="size-8 rounded-full overflow-hidden shrink-0 mt-1"><img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCrpsdF7gXJ1tw7_BRDtrXZAKuB0s7N-AmMHolsBvl9YzuqD2kwSzDmG5QWJQJlFBI6EzAqJ15IZLjzmgSxdcBvql9UHQldSvaLrHSy6D5_7VzyN_5gfPV4CN9wDdidgnJmgAbTVV2bY5XUepogXp1VVYeA_MrQGFVfGK22kKNtbO1dcLe4BgzW-3_vMvw-rYOYaMVe8zWv6SN1FiDb2E7deMRTYdfekeRpDBuQXKG6Kgz-q7KnClqPd6-k8h7TAAP-Is_f33je_db2"/></div><div><div class="bg-primary text-white p-4 rounded-2xl rounded-tl-none shadow-md"><p class="text-sm leading-relaxed">${msgInput.value}</p></div></div>`;
            msgContainer.appendChild(wrapper);
            msgInput.value = '';
            msgContainer.scrollTop = msgContainer.scrollHeight;
            setTimeout(() => {
                const replyWrapper = document.createElement('div');
                replyWrapper.className = 'flex gap-3 max-w-[80%]';
                replyWrapper.innerHTML =
                    `<div class="size-8 rounded-full overflow-hidden shrink-0 mt-1"><img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAHT3yeGJwsFe2JPD1cbZxATp8k_weWGAMtN3I5lKEndVsKP3hQKlZnYoCK4jIOLdYHmGWETNG6ucknlHJNnHRu3dgAmIadPrezsNELipHYd6oEDNaMnF0wpynxujFJmSOw3Zlkhq-RpO8QW6ggRzw4LzFkkMrtrHGQP7oUGWnJ5tNJsB2oJwlTK_YxLko3Nt1IUca2I04CASbgg6lIe5NZLZcNWZdzq1YlGmKWC6mMpkbjr1ZwvbtiTlm7zh1ioYkMwfKQpyThqPMA"/></div><div><div class="bg-white dark:bg-slate-800 p-4 rounded-2xl rounded-tr-none shadow-sm border border-slate-100 dark:border-slate-700"><p class="text-sm leading-relaxed">${autoReplies[replyIdx++ % autoReplies.length]}</p></div></div>`;
                msgContainer.appendChild(replyWrapper);
                msgContainer.scrollTop = msgContainer.scrollHeight;
            }, 1000);
        }

        sendBtn?.addEventListener('click', sendMessage);
        msgInput?.addEventListener('keydown', e => {
            if (e.key === 'Enter') sendMessage();
        });

        // Emoji & attach
        document.querySelectorAll('button').forEach(btn => {
            const icon = btn.querySelector('.material-symbols-outlined');
            if (icon?.textContent.trim() === 'sentiment_satisfied') btn.addEventListener('click', () => {
                if (msgInput) msgInput.value += '😊';
                msgInput?.focus();
            });
            if (icon?.textContent.trim() === 'attach_file') btn.addEventListener('click', () => showToast(
                'ميزة إرفاق الملفات قريباً'));
        });

        // Conversation items
        document.querySelectorAll('.flex-1.overflow-y-auto .p-4.flex').forEach(item => {
            item.addEventListener('click', () => {
                document.querySelectorAll('.flex-1.overflow-y-auto .p-4.flex').forEach(i => {
                    i.classList.remove('bg-primary/5', 'border-r-4', 'border-primary');
                });
                item.classList.add('bg-primary/5', 'border-r-4', 'border-primary');
                const name = item.querySelector('h4')?.textContent;
                if (name) document.querySelector('.px-6.py-3 h3').textContent = name;
            });
        });
    </script>
