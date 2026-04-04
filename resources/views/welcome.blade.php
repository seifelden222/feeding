<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NutriZone | صحتك تبدأ من طبقك</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#10B981", // Emerald 500 equivalent to the green in image
                        "background-light": "#F9FAFB",
                        "background-dark": "#111827",
                    },
                    fontFamily: {
                        display: ["Cairo", "sans-serif"],
                        body: ["Cairo", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.75rem",
                    },
                },
            },
        };
    </script>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .hero-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-200 transition-colors duration-300">
    <x-landing-navbar />
    <section class="hero-bg min-h-screen flex items-center justify-center pt-20">
        <div class="container mx-auto px-6 text-center max-w-4xl">
            <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-8">
                صحتك تبدأ من طبقك.. رحلتك لحياة أفضل تبدأ هنا
            </h1>
            <p class="text-xl md:text-2xl text-gray-200 mb-12 leading-relaxed">
                نقدم لك في NutriZone برامج غذائية متكاملة قائمة على أسس علمية لتحقيق أهدافك الصحية والبدنية بفعالية وأمان مع نخبة من الخبراء.
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <button class="bg-primary hover:bg-emerald-600 text-white px-10 py-4 rounded-full font-bold text-lg transition-all">
                    <a href="{{url('diseases')}}"> البرامج الغذائية للأمراض المزمنة </a>
                </button>
                <button class="bg-white/10 hover:bg-white/20 text-white border border-white/30 backdrop-blur-md px-10 py-4 rounded-full font-bold text-lg transition-all">
                    <a href="{{url('systems')}}">البرامج الغذائية المتخصصة</a>
                </button>
            </div>
        </div>
    </section>
    <section class="py-24 bg-white dark:bg-slate-900 overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2 relative">
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-primary/10 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-primary/10 rounded-full blur-2xl"></div>
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <img alt="Doctor specialized in nutrition" class="w-full h-auto" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCE9IoKEwBgwIxPEv9VZ99CuvTdVj3WSDPSwwKBN7tcsYADBEs9lUDCmd-nUD5BNYv9H4Jw1pBnaTivpfzjUUHpZzR1vvUxaXjgdCXOO58ZuzUCk6ouktNdqelFuiFg1uQ7mTbbi7h5mIGfn04fv_MWAfRphb26WtlIa4_JIJB2kXM9OYuX8HI0k7mgX8MmQWTYCDRLd1JcVwQxXbUICYIjZ1_wv74Cvz5gizdd3evY0qTNuLaV8qQPu9HvzqNwoQdz-ePcYcmobzVN" />
                        <div class="absolute bottom-6 right-6 bg-primary text-white p-4 rounded-2xl shadow-lg flex items-center gap-3">
                            <span class="text-4xl font-black">+15</span>
                            <span class="text-sm font-bold leading-tight">سنة من الخبرة<br />في التغذية</span>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <span class="text-primary font-bold tracking-widest uppercase mb-4 block">من NutriZone</span>
                    <h2 class="text-4xl font-extrabold mb-6 leading-snug dark:text-white">خبرة علمية في التغذية الحديثة تضع صحتك أولاً</h2>
                    <p class="text-lg text-slate-600 dark:text-slate-400 mb-8 leading-relaxed">
                        نحن في NutriZone نؤمن بأن التغذية هي حجر الزاوية لحياة صحية. يقود فريقنا خبراء متخصصون في تقديم الحلول الغذائية المبتكرة والمدعومة بالأبحاث العلمية لضمان أفضل النتائج لعملائنا. نحن لا نقدم مجرد حمية غذائية، بل نصمم أسلوب حياة.
                    </p>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary font-bold">check_circle</span>
                            <span class="font-semibold text-slate-700 dark:text-slate-300">خطط معتمدة طبياً وعلمياً</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary font-bold">check_circle</span>
                            <span class="font-semibold text-slate-700 dark:text-slate-300">متابعة دقيقة ومستمرة</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary font-bold">check_circle</span>
                            <span class="font-semibold text-slate-700 dark:text-slate-300">نتائج ملموسة ومستدامة</span>
                        </li>
                    </ul>
                    <a class="inline-flex items-center gap-2 text-primary font-bold hover:underline transition-all" href="{{ route('aboutus') }}">
                        اقرأ المزيد عن منهجيتنا
                        <span class="material-symbols-outlined">arrow_back</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-24 bg-background-light dark:bg-slate-800">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <h2 class="text-4xl font-black mb-4 dark:text-white">خدماتنا المتخصصة</h2>
                <p class="text-lg text-slate-500 dark:text-slate-400">حلول غذائية شاملة من NutriZone مصممة خصيصاً لتناسب احتياجات جسمك وأهدافك الشخصية</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-slate-900 p-8 rounded-[2rem] shadow-sm hover:shadow-xl transition-all group border border-gray-100 dark:border-gray-700">
                    <div class="w-14 h-14 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-3xl">restaurant</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 dark:text-white">خطط وجبات مخصصة</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">جداول غذائية مرنة ومحسوبة السعرات تناسب ذوقك واحتياجاتك اليومية.</p>
                    <a class="text-primary font-bold flex items-center gap-1 group-hover:gap-2 transition-all" href="{{ route('services') }}">اكتشف المزيد <span class="material-symbols-outlined">chevron_left</span></a>
                </div>
                <div class="bg-white dark:bg-slate-900 p-8 rounded-[2rem] shadow-sm hover:shadow-xl transition-all group border border-gray-100 dark:border-gray-700">
                    <div class="w-14 h-14 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-3xl">fitness_center</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 dark:text-white">برامج خسارة الوزن</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">فقدان الوزن بطريقة صحية دون حرمان، مع التركيز على حرق الدهون وبناء العادات.</p>
                    <a class="text-primary font-bold flex items-center gap-1 group-hover:gap-2 transition-all" href="{{ route('services') }}">اكتشف المزيد <span class="material-symbols-outlined">chevron_left</span></a>
                </div>
                <div class="bg-white dark:bg-slate-900 p-8 rounded-[2rem] shadow-sm hover:shadow-xl transition-all group border border-gray-100 dark:border-gray-700">
                    <div class="w-14 h-14 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-3xl">sports_gymnastics</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 dark:text-white">بناء العضلات</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">تغذية رياضية متقدمة لزيادة الكتلة العضلية وتحسين الأداء الرياضي العام.</p>
                    <a class="text-primary font-bold flex items-center gap-1 group-hover:gap-2 transition-all" href="{{ route('services') }}">اكتشف المزيد <span class="material-symbols-outlined">chevron_left</span></a>
                </div>
                <div class="bg-white dark:bg-slate-900 p-8 rounded-[2rem] shadow-sm hover:shadow-xl transition-all group border border-gray-100 dark:border-gray-700">
                    <div class="w-14 h-14 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-3xl">health_and_safety</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 dark:text-white">التغذية العلاجية</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">إدارة الحالات الصحية مثل السكري والضغط من خلال أنظمة غذائية طبية متخصصة.</p>
                    <a class="text-primary font-bold flex items-center gap-1 group-hover:gap-2 transition-all" href="{{ route('services') }}">اكتشف المزيد <span class="material-symbols-outlined">chevron_left</span></a>
                </div>
                <div class="bg-white dark:bg-slate-900 p-8 rounded-[2rem] shadow-sm hover:shadow-xl transition-all group border border-gray-100 dark:border-gray-700">
                    <div class="w-14 h-14 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-3xl">devices</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 dark:text-white">متابعة أونلاين</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">تواصل مباشر وجلسات استشارية من أي مكان في العالم عبر تطبيقاتنا الرقمية.</p>
                    <a class="text-primary font-bold flex items-center gap-1 group-hover:gap-2 transition-all" href="{{ route('services') }}">اكتشف المزيد <span class="material-symbols-outlined">chevron_left</span></a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 bg-white dark:bg-slate-900">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-12 h-12 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                    <h4 class="text-xl font-bold mb-1 dark:text-white">خطط شخصية</h4>
                    <p class="text-slate-500 dark:text-slate-400 text-sm">ليست مجرد قوالب جاهزة بل تصميم فريد لك</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-symbols-outlined">support_agent</span>
                    </div>
                    <h4 class="text-xl font-bold mb-1 dark:text-white">دعم مستمر</h4>
                    <p class="text-slate-500 dark:text-slate-400 text-sm">فريقنا معك خطوة بخطوة للإجابة على أي استفسار</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-symbols-outlined">biotech</span>
                    </div>
                    <h4 class="text-xl font-bold mb-1 dark:text-white">أساس علمي</h4>
                    <p class="text-slate-500 dark:text-slate-400 text-sm">نعتمد على آخر ما توصلت إليه أبحاث التغذية</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-symbols-outlined">trending_up</span>
                    </div>
                    <h4 class="text-xl font-bold mb-1 dark:text-white">نتائج حقيقية</h4>
                    <p class="text-slate-500 dark:text-slate-400 text-sm">آلاف قصص النجاح التي بدأت بخطوة واحدة</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-24 bg-background-light dark:bg-slate-800">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black mb-4 dark:text-white">قصص نجاح عملائنا</h2>
                <div class="flex justify-center gap-1 text-yellow-400">
                    <span class="material-symbols-outlined fill-current">star</span>
                    <span class="material-symbols-outlined fill-current">star</span>
                    <span class="material-symbols-outlined fill-current">star</span>
                    <span class="material-symbols-outlined fill-current">star</span>
                    <span class="material-symbols-outlined fill-current">star</span>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center gap-4 mb-6">
                        <img alt="Ahmed Mansour" class="w-14 h-14 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgDRqwI6NPZhfDkbecnNOowu2KEqAKZkHtPK2hE6GinUOnzfqW72ZKdYs13qoe2RmSQNzCpuZCjtW6yNVGvO66lZdjdqso5AvdtDoreO0j6EGdjR7di2RMrATi8_MK9T3u7g4kh4NsG6XSoktm2m2XQEIivISdJp7_oTU83TyEZxHVlqI-U-cyTKYo8I38Cr6koA9Myu4WlpfN_dwi_SU8uS3U4FYpCj-JNjrFHXT1zwwi3ZFkeG0dncIUJr3DlMig9_PTQ3uVFSRt" />
                        <div>
                            <h4 class="font-bold dark:text-white">أحمد منصور</h4>
                            <p class="text-sm text-slate-500 dark:text-slate-400">فقد 15 كجم في 3 أشهر</p>
                        </div>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 italic leading-relaxed">"لم أكن أتخيل أن فقدان الوزن يمكن أن يكون بهذه السهولة بدون جوع. النظام كان مرناً جداً ويناسب طبيعة عملي المزدحمة."</p>
                </div>
                <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center gap-4 mb-6">
                        <img alt="Sara Khalid" class="w-14 h-14 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDErZ6gcxwu2phkld2I8jBWQxqsveaSdGMYELRHKlW329rgUuVpE6o1oZ2x8iwGl9zKcpQCZtfuyArkeSlIBjYfCslFWssS-h1LOkAs507rVkj21YVuQOxEzqbWURoWZTShwQXSBmyqIheNqp8GBzjBXCdrYKMILgspVP6QgiTdIjKsUFaPjBazIpSc-PhZImxhpKKjxhBN_KBh9Mu6QLS5-cQmIGV7S9I1NR8nmC7NTxSQN5HNQPSyaV8GbUjnmso0Iws4anaumkJN" />
                        <div>
                            <h4 class="font-bold dark:text-white">سارة خالد</h4>
                            <p class="text-sm text-slate-500 dark:text-slate-400">تحسن مستويات الطاقة والنشاط</p>
                        </div>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 italic leading-relaxed">"التغيير لم يكن فقط في الميزان، بل في طاقتي اليومية وجودة نومي. شكراً لفريق NutriZone على المتابعة الاحترافية."</p>
                </div>
                <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center gap-4 mb-6">
                        <img alt="Mohamed Naser" class="w-14 h-14 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAGEe8N5wqPWO62D2S9bKxng3g5eBJbbNmNrFklStE-pr9rHW_kIJOpXu0yYEZIuNz9wfrdzuUi1h2hzgcd3gJm3ZLtYi05ymk2dnWGBtVKCiQce21qX6musKelCOL6mS3GvIRBvF96jxdOAnLstxpd2xwW4oROxKxoOkcp87GMAVJG-e07rQ6MiFWgs_wwfZvqYe62XubajgrtT9TMbmGF63FQWU3nDX_DnlYmwDPZGkyZAeE9H6ncFvutl3EwtBy9rF7GOMU6ByGX" />
                        <div>
                            <h4 class="font-bold dark:text-white">محمد النصر</h4>
                            <p class="text-sm text-slate-500 dark:text-slate-400">بناء كتلة عضلية صافية</p>
                        </div>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 italic leading-relaxed">"أفضل مكان للتغذية الرياضية. الخطط دقيقة ومبنية على قياسات الجسم الفعلية وليس مجرد توقعات عشوائية."</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-24 bg-white dark:bg-slate-900">
        <div class="container mx-auto px-6">
            <div class="flex items-end justify-between mb-16">
                <div>
                    <h2 class="text-4xl font-black mb-4 dark:text-white">أحدث المقالات والنصائح</h2>
                    <p class="text-lg text-slate-500 dark:text-slate-400">ابقِ على اطلاع بأحدث المعلومات الغذائية من خبراء NutriZone</p>
                </div>
                <a class="hidden md:flex items-center gap-2 text-primary font-bold border-b-2 border-primary pb-1" href="{{ route('articles') }}">مشاهدة كل المقالات</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="group cursor-pointer">
                    <div class="rounded-3xl overflow-hidden mb-6 h-64 shadow-lg">
                        <img alt="Water hydration" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAX3nzpkagU3QVrevat_0vjmntDN7F8obOCXT753TYUmt80nGntr2sAKuIU5rDETvyAm0UDpmiq_pAxGNsCOW-N6s0LaGmEUZrkv1GtxGxXa3uWVguSiQSacQMg5vOERAW0LQ17mGcjuncv73pPfN53L_5MQte7YpPlRaTrr_2j_pb3ERr0crFs_eSLl0NYDKwz6YRmVg9GCysCTb9fIb8PA0dqRCQWa14SMwsD0fOXqQfQ2gIiRwCvx8xTQBZEb5cYNkfVHlcD6uyx" />
                    </div>
                    <span class="text-primary text-sm font-bold bg-emerald-50 dark:bg-emerald-900/30 px-3 py-1 rounded-full mb-4 inline-block">نصائح سريعة</span>
                    <h3 class="text-xl font-extrabold mb-3 group-hover:text-primary transition-colors dark:text-white">أهمية الترطيب: كم لتراً من الماء يحتاجه جسمك فعلياً؟</h3>
                    <p class="text-slate-600 dark:text-slate-400 line-clamp-2">دليل شامل حول كمية الماء المثالية لكل جسم وكيف يؤثر الجفاف على عملية حرق الدهون والتحصيل الغذائي.</p>
                </div>
                <div class="group cursor-pointer">
                    <div class="rounded-3xl overflow-hidden mb-6 h-64 shadow-lg">
                        <img alt="Healthy sleep and food" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgBXkOkUd9XBOPKFQaN_D6kPtdN-ISmtwfaHHCck95l-FfyJ1r9TU4ihsd_FaUXbfrqrqPEpwJkCfZd7vBkctA9ybGmhGxGMRNaZSnpzU1geNOgysN965g10AEvQG9DhO96tVytGi8NNdKMIHig65vxCJBaIOAnbVNdUgm5b_7CqNm84m3Na6ZBpVDSIobeEd5-RVQx8fm0BJv-VMT6VAfxLCSw1eaDKbin_88p5dzK3EXB7pJYZ1xzr4EMknV4AsaGBedlXzpg2Il" />
                    </div>
                    <span class="text-primary text-sm font-bold bg-emerald-50 dark:bg-emerald-900/30 px-3 py-1 rounded-full mb-4 inline-block">جودة الحياة</span>
                    <h3 class="text-xl font-extrabold mb-3 group-hover:text-primary transition-colors dark:text-white">علاقة الغذاء بالنوم: أطعمة تساعدك على الاسترخاء</h3>
                    <p class="text-slate-600 dark:text-slate-400 line-clamp-2">تعرف على قائمة الأطعمة التي تحسن من جودة نومك وتساعدك في الاستيقاظ بنشاط أكبر كل صباح.</p>
                </div>
                <div class="group cursor-pointer">
                    <div class="rounded-3xl overflow-hidden mb-6 h-64 shadow-lg">
                        <img alt="Bread and carbs" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3BtzJvLGrBnNd9miojPvHfYlwvFUnOwZmgWYuQtlo4VBhuhPZx5IY0he84L1DxpiQswosXhOS_ZMjeN3OeVw-ZCmfxjc7RJyDO1mQPI04kgEq_-PqGw1-r1L0BeTPmsMnZ5FKayvYxypGvxIAmZYAvSheW0Q9KfOwb17UK3Yb-RPJZ6rk5SRD5aKELTidkx2TPBH59TeSgTKP-yAcyNNN1GUtqoL1gOA4fQYP7lDMZLXmxEnMFEx7YKAwvzZKsCrKd8J_Rd1zKGxt" />
                    </div>
                    <span class="text-primary text-sm font-bold bg-emerald-50 dark:bg-emerald-900/30 px-3 py-1 rounded-full mb-4 inline-block">خرافات غذائية</span>
                    <h3 class="text-xl font-extrabold mb-3 group-hover:text-primary transition-colors dark:text-white">5 خرافات شائعة عن الكربوهيدرات يجب أن تعرفها</h3>
                    <p class="text-slate-600 dark:text-slate-400 line-clamp-2">هل الكربوهيدرات هي العدو فعلاً؟ نكشف لك الحقائق العلمية خلف أشهر الخرافات حول تناول الخبز والمعكرونة.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 px-6">
        <div class="container mx-auto bg-primary rounded-[3rem] p-12 md:p-20 text-center text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-emerald-900/20 rounded-full blur-3xl -ml-32 -mb-32"></div>
            <div class="relative z-10">
                <h2 class="text-4xl md:text-5xl font-black mb-6">هل أنت مستعد لبدء التغيير؟</h2>
                <p class="text-xl md:text-2xl text-emerald-50 mb-12 max-w-2xl mx-auto opacity-90">
                    انضم إلى آلاف الأشخاص الذين غيروا حياتهم للأفضل من خلال برامجنا الغذائية المتكاملة في NutriZone.
                </p>
                <button class="bg-slate-900 hover:bg-black text-white px-12 py-5 rounded-2xl font-black text-xl transition-all shadow-2xl">
                    <a href="{{ route('login') }}"> احجز استشارتك الآن</a>
                </button>
            </div>
        </div>
    </section>
    <footer class="bg-slate-950 text-slate-300 pt-24 pb-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-20">
                <div class="col-span-1">
                    <img src="{{ asset('img/logo.png') }}" alt="NutriZone" style="width: 250px;">
                    <p class="leading-relaxed mb-8 opacity-70">
                        تمكين الأفراد في مصر من عيش حياة أكثر صحة وسعادة من خلال التوعية الغذائية والبرامج المتخصصة المبنية على العلم.
                    </p>
                    <div class="flex gap-4">
                        <button onclick="doShare()" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-primary transition-colors text-white" title="مشاركة">
                            <span class="material-symbols-outlined">share</span>
                        </button>
                        <button onclick="openChatModal()" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-primary transition-colors text-white" title="تواصل معنا">
                            <span class="material-symbols-outlined">forum</span>
                        </button>
                    </div>
                </div>
                <div>
                    <h5 class="text-white font-black text-xl mb-8">روابط سريعة</h5>
                    <ul class="space-y-4">
                        <li><a class="hover:text-primary transition-colors" href="{{ url('/') }}">الرئيسية</a></li>
                        <li><a class="hover:text-primary transition-colors" href="{{ route('aboutus') }}">من نحن</a></li>
                        <li><a class="hover:text-primary transition-colors" href="{{ route('services') }}">خدماتنا</a></li>
                        <li><a class="hover:text-primary transition-colors" href="{{ route('contactus') }}">اتصل بنا</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-white font-black text-xl mb-8"><a href="mailto:info@nutrizone.com.eg" class="hover:text-primary transition-colors">خدماتنا</a></h5>
                    <ul class="space-y-4">
                        <li><button onclick="openServiceModal(1)" class="hover:text-primary transition-colors cursor-pointer text-right">خسارة الوزن</button></li>
                        <li><button onclick="openServiceModal(2)" class="hover:text-primary transition-colors cursor-pointer text-right">بناء العضلات</button></li>
                        <li><button onclick="openServiceModal(0)" class="hover:text-primary transition-colors cursor-pointer text-right">خطط وجبات مخصصة</button></li>
                        <li><button onclick="openServiceModal(3)" class="hover:text-primary transition-colors cursor-pointer text-right">التغذية العلاجية</button></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-white font-black text-xl mb-8">تواصل معنا</h5>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <button onclick="openMapModal()" class="flex items-start gap-4 text-right hover:text-primary transition-colors w-full">
                                <span class="material-symbols-outlined text-primary">location_on</span>
                                <span class="opacity-70">15 شارع جامعة الدول العربية، المهندسين، الجيزة، مصر</span>
                            </button>
                        </li>
                        <li class="flex items-start gap-4">
                            <a href="tel:+201234567890" class="flex items-start gap-4 hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-primary">call</span>
                                <span class="opacity-70" dir="ltr">+20 123 456 7890</span>
                            </a>
                        </li>
                        <li class="flex items-start gap-4">
                            <a href="mailto:info@nutrizone.com.eg" class="flex items-start gap-4 hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-primary">mail</span>
                                <span class="opacity-70">info@nutrizone.com.eg</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-slate-900 flex flex-col md:flex-row items-center justify-between gap-6">
                <p class="text-sm opacity-50">© 2026 NutriZone مصر. جميع الحقوق محفوظة</p>

            </div>
        </div>
    </footer>


    <!-- ===== MODALS ===== -->

    <!-- Services Popups -->
    <div id="modal-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] hidden flex items-center justify-center p-4" onclick="closeAllModals()">
    </div>

    <!-- Service Modal Template (reused) -->
    <div id="modal-service" class="fixed z-[101] hidden top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white dark:bg-slate-900 rounded-3xl shadow-2xl p-8 w-full max-w-md">
        <button onclick="closeAllModals()" class="absolute top-4 left-4 text-slate-400 hover:text-primary transition-colors">
            <span class="material-symbols-outlined text-3xl">close</span>
        </button>
        <div id="modal-service-icon" class="w-16 h-16 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-2xl flex items-center justify-center mb-5">
            <span class="material-symbols-outlined text-4xl">restaurant</span>
        </div>
        <h3 id="modal-service-title" class="text-2xl font-black mb-3 dark:text-white"></h3>
        <p id="modal-service-desc" class="text-slate-600 dark:text-slate-400 leading-relaxed mb-6"></p>
        <a href="{{ route('services') }}" class="inline-block bg-primary hover:bg-emerald-600 text-white px-6 py-3 rounded-full font-bold transition-all">اكتشف المزيد</a>
    </div>

    <!-- Map Modal -->
    <div id="modal-map" class="fixed z-[101] hidden top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white dark:bg-slate-900 rounded-3xl shadow-2xl overflow-hidden w-full max-w-lg">
        <div class="flex items-center justify-between p-5 border-b border-gray-100 dark:border-gray-700">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">location_on</span>
                <span class="font-bold dark:text-white">موقعنا على الخريطة</span>
            </div>
            <button onclick="closeAllModals()" class="text-slate-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-3xl">close</span>
            </button>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.5!2d31.2001!3d30.0444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14584587b4e5e6b1%3A0x0!2z2YXYudmHZCDYrNin2YXYudYpINin2YTYr9mI2YQ!5e0!3m2!1sar!2seg!4v1"
            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <div class="p-4 text-sm text-slate-500 dark:text-slate-400 text-center">15 شارع جامعة الدول العربية، المهندسين، الجيزة، مصر</div>
    </div>

    <!-- Chat Modal -->
    <div id="modal-chat" class="fixed z-[101] hidden bottom-6 left-6 bg-white dark:bg-slate-900 rounded-3xl shadow-2xl w-80 flex flex-col overflow-hidden" style="height:420px;">
        <div class="bg-primary p-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-white/20 rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-white text-xl">support_agent</span>
                </div>
                <div>
                    <p class="text-white font-bold text-sm">فريق NutriZone</p>
                    <p class="text-emerald-100 text-xs">متاح الآن</p>
                </div>
            </div>
            <button onclick="closeAllModals()" class="text-white/70 hover:text-white transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-3 bg-slate-50 dark:bg-slate-800">
            <div class="flex gap-2">
                <div class="w-7 h-7 bg-primary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                    <span class="material-symbols-outlined text-white text-sm">eco</span>
                </div>
                <div class="bg-white dark:bg-slate-700 rounded-2xl rounded-tr-sm p-3 text-sm text-slate-700 dark:text-slate-200 shadow-sm max-w-[85%]">
                    أهلاً بك في NutriZone! كيف يمكنني مساعدتك اليوم؟ 😊
                </div>
            </div>
        </div>
        <div class="p-3 border-t border-gray-100 dark:border-gray-700 flex gap-2">
            <input id="chat-input" type="text" placeholder="اكتب رسالتك..." dir="rtl"
                class="flex-1 bg-slate-100 dark:bg-slate-700 rounded-full px-4 py-2 text-sm outline-none dark:text-white"
                onkeydown="if(event.key==='Enter') sendChatMsg()" />
            <button onclick="sendChatMsg()" class="w-9 h-9 bg-primary rounded-full flex items-center justify-center hover:bg-emerald-600 transition-colors flex-shrink-0">
                <span class="material-symbols-outlined text-white text-lg">send</span>
            </button>
        </div>
    </div>

    <script>
        // ---- Services data ----
        const services = [{
                icon: 'restaurant',
                title: 'خطط وجبات مخصصة',
                desc: 'جداول غذائية مرنة ومحسوبة السعرات تناسب ذوقك واحتياجاتك اليومية، مصممة خصيصاً لجسمك وأهدافك.'
            },
            {
                icon: 'fitness_center',
                title: 'برامج خسارة الوزن',
                desc: 'فقدان الوزن بطريقة صحية دون حرمان، مع التركيز على حرق الدهون وبناء العادات الصحية المستدامة.'
            },
            {
                icon: 'sports_gymnastics',
                title: 'بناء العضلات',
                desc: 'تغذية رياضية متقدمة لزيادة الكتلة العضلية وتحسين الأداء الرياضي العام بأسس علمية.'
            },
            {
                icon: 'health_and_safety',
                title: 'التغذية العلاجية',
                desc: 'إدارة الحالات الصحية مثل السكري والضغط من خلال أنظمة غذائية طبية متخصصة ومعتمدة.'
            },
        ];

        function openServiceModal(index) {
            const s = services[index];
            document.getElementById('modal-service-icon').innerHTML = `<span class="material-symbols-outlined text-4xl">${s.icon}</span>`;
            document.getElementById('modal-service-title').textContent = s.title;
            document.getElementById('modal-service-desc').textContent = s.desc;
            showModal('modal-service');
        }

        function showModal(id) {
            document.getElementById('modal-overlay').classList.remove('hidden');
            document.getElementById(id).classList.remove('hidden');
        }

        function closeAllModals() {
            document.getElementById('modal-overlay').classList.add('hidden');
            ['modal-service', 'modal-map', 'modal-chat'].forEach(id => {
                document.getElementById(id).classList.add('hidden');
            });
        }

        // Stop overlay click from closing chat (it's positioned differently)
        document.getElementById('modal-overlay').addEventListener('click', function(e) {
            if (e.target === this) closeAllModals();
        });

        // ---- Map ----
        function openMapModal() {
            showModal('modal-map');
        }

        // ---- Share ----
        function doShare() {
            if (navigator.share) {
                navigator.share({
                    title: 'NutriZone',
                    text: 'صحتك تبدأ من طبقك - NutriZone',
                    url: window.location.href
                });
            } else {
                navigator.clipboard.writeText(window.location.href).then(() => alert('تم نسخ الرابط!'));
            }
        }

        // ---- Chat ----
        function openChatModal() {
            document.getElementById('modal-chat').classList.remove('hidden');
            document.getElementById('chat-input').focus();
        }

        const autoReplies = [
            'شكراً على تواصلك! سيرد عليك أحد المختصين قريباً.',
            'سؤال رائع! يمكنك الاطلاع على خدماتنا للمزيد من التفاصيل.',
            'نحن هنا لمساعدتك في رحلتك الصحية 💚',
        ];
        let replyIdx = 0;

        function sendChatMsg() {
            const input = document.getElementById('chat-input');
            const msg = input.value.trim();
            if (!msg) return;
            const container = document.getElementById('chat-messages');

            // User bubble
            container.innerHTML += `
    <div class="flex gap-2 justify-start flex-row-reverse">
      <div class="bg-primary rounded-2xl rounded-tl-sm p-3 text-sm text-white shadow-sm max-w-[85%]">${msg}</div>
    </div>`;
            input.value = '';
            container.scrollTop = container.scrollHeight;

            // Auto reply
            setTimeout(() => {
                container.innerHTML += `
      <div class="flex gap-2">
        <div class="w-7 h-7 bg-primary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
          <span class="material-symbols-outlined text-white text-sm">eco</span>
        </div>
        <div class="bg-white dark:bg-slate-700 rounded-2xl rounded-tr-sm p-3 text-sm text-slate-700 dark:text-slate-200 shadow-sm max-w-[85%]">
          ${autoReplies[replyIdx % autoReplies.length]}
        </div>
      </div>`;
                replyIdx++;
                container.scrollTop = container.scrollHeight;
            }, 800);
        }
    </script>
</body>

</html>
