<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>من نحن | NutriZone</title>
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            primary: "#10B981",
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
  <style type="text/tailwindcss">
    body {
            font-family: 'Cairo', sans-serif;
        }
        .hero-pattern {
            background: linear-gradient(rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.9)), url('https://images.unsplash.com/photo-1490818387583-1baba5e638af?q=80&w=2064&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 48;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-200">
  <x-landing-navbar />
  <section class="hero-pattern pt-48 pb-32 text-center text-white">
    <div class="container mx-auto px-6">
      <h1 class="text-5xl md:text-6xl font-black mb-6">من نحن</h1>
      <div class="flex items-center justify-center gap-3 text-lg opacity-80">
        <a class="hover:text-primary transition-colors" href="index.html">الرئيسية</a>
        <span class="material-symbols-outlined text-sm">chevron_left</span>
        <span class="text-primary font-bold">من نحن</span>
      </div>
    </div>
  </section>
  <section class="py-24 bg-white dark:bg-slate-900 overflow-hidden">
    <div class="container mx-auto px-6">
      <div class="flex flex-col md:flex-row items-center gap-16">
        <div class="w-full md:w-1/2">
          <span class="text-primary font-bold tracking-widest uppercase mb-4 block">قصتنا وبدايتنا</span>
          <h2 class="text-4xl font-extrabold mb-8 leading-snug dark:text-white">نحول العلم إلى أسلوب حياة صحي ومستدام</h2>
          <div class="space-y-6 text-lg text-slate-600 dark:text-slate-400 leading-relaxed">
            <p>
              تأسست NutriZone برؤية واضحة: سد الفجوة بين الأبحاث العلمية المعقدة في مجال التغذية وبين الممارسات اليومية للأفراد. بدأنا كفريق صغير من المتخصصين الشغوفين، واليوم نفخر بكوننا الوجهة الرائدة لمن يبحث عن الصحة الحقيقية.
            </p>
            <p>
              نحن لا نؤمن بالحلول السريعة أو الأنظمة الغذائية القاسية. بدلاً من ذلك، نعتمد على منهجية شاملة تجمع بين التحليل الدقيق للجسم وبين العوامل النفسية والبيئية لكل عميل، مما يضمن نتائج لا تقتصر على فقدان الوزن فقط، بل تمتد لتشمل جودة الحياة بأكملها.
            </p>
          </div>
        </div>
        <div class="w-full md:w-1/2 relative">
          <div class="relative rounded-[3rem] overflow-hidden shadow-2xl">
            <img alt="NutriZone Team Workshop" class="w-full h-auto object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCE9IoKEwBgwIxPEv9VZ99CuvTdVj3WSDPSwwKBN7tcsYADBEs9lUDCmd-nUD5BNYv9H4Jw1pBnaTivpfzjUUHpZzR1vvUxaXjgdCXOO58ZuzUCk6ouktNdqelFuiFg1uQ7mTbbi7h5mIGfn04fv_MWAfRphb26WtlIa4_JIJB2kXM9OYuX8HI0k7mgX8MmQWTYCDRLd1JcVwQxXbUICYIjZ1_wv74Cvz5gizdd3evY0qTNuLaV8qQPu9HvzqNwoQdz-ePcYcmobzVN" />
          </div>
          <div class="absolute -bottom-10 -right-10 bg-white dark:bg-slate-800 p-8 rounded-3xl shadow-xl hidden lg:block border border-gray-100 dark:border-gray-700">
            <div class="flex items-center gap-4">
              <div class="w-16 h-16 bg-emerald-50 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-4xl">verified</span>
              </div>
              <div>
                <div class="text-3xl font-black text-slate-900 dark:text-white">100%</div>
                <div class="text-sm text-slate-500 font-bold">برامج علمية معتمدة</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-24 bg-background-light dark:bg-slate-800">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <div class="bg-white dark:bg-slate-900 p-12 rounded-[3rem] shadow-sm border border-gray-100 dark:border-gray-700 relative group overflow-hidden">
          <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-[100%] transition-all group-hover:w-40 group-hover:h-40"></div>
          <div class="w-16 h-16 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-2xl flex items-center justify-center mb-8">
            <span class="material-symbols-outlined text-4xl">visibility</span>
          </div>
          <h3 class="text-3xl font-black mb-6 dark:text-white">رؤيتنا</h3>
          <p class="text-xl text-slate-600 dark:text-slate-400 leading-relaxed">
            أن نكون المرجع الأول والموثوق في العالم العربي للتحول الصحي، من خلال تقديم ابتكارات غذائية تغير مفهوم "الرجيم" إلى "الوعي الصحي الشامل".
          </p>
        </div>
        <div class="bg-white dark:bg-slate-900 p-12 rounded-[3rem] shadow-sm border border-gray-100 dark:border-gray-700 relative group overflow-hidden">
          <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-[100%] transition-all group-hover:w-40 group-hover:h-40"></div>
          <div class="w-16 h-16 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-2xl flex items-center justify-center mb-8">
            <span class="material-symbols-outlined text-4xl">rocket_launch</span>
          </div>
          <h3 class="text-3xl font-black mb-6 dark:text-white">رسالتنا</h3>
          <p class="text-xl text-slate-600 dark:text-slate-400 leading-relaxed">
            تمكين كل فرد من استعادة السيطرة على صحته من خلال خطط غذائية مخصصة مبنية على العلم، وبدعم من فريق مختص يرافقه في كل خطوة نحو التغيير.
          </p>
        </div>
      </div>
    </div>
  </section>
  <section class="py-24 bg-white dark:bg-slate-900">
    <div class="container mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-20">
        <h2 class="text-4xl font-black mb-6 dark:text-white">قيمنا الجوهرية</h2>
        <p class="text-lg text-slate-500 dark:text-slate-400">المبادئ التي تقودنا في كل استشارة وكل خطة غذائية نصممها لك</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="text-center p-8">
          <div class="w-20 h-20 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-3xl flex items-center justify-center mx-auto mb-6 transform rotate-3 hover:rotate-0 transition-transform">
            <span class="material-symbols-outlined text-4xl">science</span>
          </div>
          <h4 class="text-xl font-bold mb-4 dark:text-white">النزاهة العلمية</h4>
          <p class="text-slate-600 dark:text-slate-400">لا نعتمد إلا على الحقائق العلمية المثبتة بعيداً عن الصيحات الزائفة.</p>
        </div>
        <div class="text-center p-8">
          <div class="w-20 h-20 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-3xl flex items-center justify-center mx-auto mb-6 transform -rotate-3 hover:rotate-0 transition-transform">
            <span class="material-symbols-outlined text-4xl">person_pin</span>
          </div>
          <h4 class="text-xl font-bold mb-4 dark:text-white">التركيز على العميل</h4>
          <p class="text-slate-600 dark:text-slate-400">احتياجاتك وظروفك الشخصية هي بوصلتنا الأساسية في التصميم.</p>
        </div>
        <div class="text-center p-8">
          <div class="w-20 h-20 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-3xl flex items-center justify-center mx-auto mb-6 transform rotate-3 hover:rotate-0 transition-transform">
            <span class="material-symbols-outlined text-4xl">psychology</span>
          </div>
          <h4 class="text-xl font-bold mb-4 dark:text-white">الابتكار</h4>
          <p class="text-slate-600 dark:text-slate-400">نسعى دائماً لتطوير أدواتنا ومنهجياتنا لتقديم حلول أسهل وأكثر فعالية.</p>
        </div>
        <div class="text-center p-8">
          <div class="w-20 h-20 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-3xl flex items-center justify-center mx-auto mb-6 transform -rotate-3 hover:rotate-0 transition-transform">
            <span class="material-symbols-outlined text-4xl">self_improvement</span>
          </div>
          <h4 class="text-xl font-bold mb-4 dark:text-white">الصحة الشمولية</h4>
          <p class="text-slate-600 dark:text-slate-400">ننظر إلى الإنسان ككل، نهتم بصحة العقل والجسد والروح معاً.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="py-24 bg-background-light dark:bg-slate-800">
    <div class="container mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-20">
        <h2 class="text-4xl font-black mb-6 dark:text-white">فريق خبراء NutriZone</h2>
        <p class="text-lg text-slate-500 dark:text-slate-400">نخبة من الكفاءات المعتمدة عالمياً لمرافقتك في رحلة التغيير</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
        <div class="group">
          <div class="relative mb-8 rounded-[2.5rem] overflow-hidden">
            <img alt="Dr. Amira Saeed" class="w-full aspect-[4/5] object-cover transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCE9IoKEwBgwIxPEv9VZ99CuvTdVj3WSDPSwwKBN7tcsYADBEs9lUDCmd-nUD5BNYv9H4Jw1pBnaTivpfzjUUHpZzR1vvUxaXjgdCXOO58ZuzUCk6ouktNdqelFuiFg1uQ7mTbbi7h5mIGfn04fv_MWAfRphb26WtlIa4_JIJB2kXM9OYuX8HI0k7mgX8MmQWTYCDRLd1JcVwQxXbUICYIjZ1_wv74Cvz5gizdd3evY0qTNuLaV8qQPu9HvzqNwoQdz-ePcYcmobzVN" />
            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-8">
              <div class="flex gap-4 text-white">
                <span class="material-symbols-outlined cursor-pointer hover:scale-110">alternate_email</span>
                <span class="material-symbols-outlined cursor-pointer hover:scale-110">share</span>
              </div>
            </div>
          </div>
          <h4 class="text-2xl font-bold mb-2 dark:text-white">د. أميرة سعيد</h4>
          <p class="text-primary font-bold mb-4">كبيرة اختصاصيي التغذية العلاجية</p>
          <p class="text-slate-600 dark:text-slate-400 leading-relaxed">خبرة 12 عاماً في إدارة الأمراض المزمنة من خلال البرامج الغذائية المتقدمة والطب الوقائي.</p>
        </div>
        <div class="group">
          <div class="relative mb-8 rounded-[2.5rem] overflow-hidden">
            <img alt="Dr. Omar Farouk" class="w-full aspect-[4/5] object-cover transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgDRqwI6NPZhfDkbecnNOowu2KEqAKZkHtPK2hE6GinUOnzfqW72ZKdYs13qoe2RmSQNzCpuZCjtW6yNVGvO66lZdjdqso5AvdtDoreO0j6EGdjR7di2RMrATi8_MK9T3u7g4kh4NsG6XSoktm2m2XQEIivISdJp7_oTU83TyEZxHVlqI-U-cyTKYo8I38Cr6koA9Myu4WlpfN_dwi_SU8uS3U4FYpCj-JNjrFHXT1zwwi3ZFkeG0dncIUJr3DlMig9_PTQ3uVFSRt" />
            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-8">
              <div class="flex gap-4 text-white">
                <span class="material-symbols-outlined cursor-pointer hover:scale-110">alternate_email</span>
                <span class="material-symbols-outlined cursor-pointer hover:scale-110">share</span>
              </div>
            </div>
          </div>
          <h4 class="text-2xl font-bold mb-2 dark:text-white">د. عمر فاروق</h4>
          <p class="text-primary font-bold mb-4">خبير التغذية الرياضية والأداء</p>
          <p class="text-slate-600 dark:text-slate-400 leading-relaxed">متخصص في تحسين الأداء البدني وبناء الكتلة العضلية للرياضيين المحترفين والهواة.</p>
        </div>
        <div class="group">
          <div class="relative mb-8 rounded-[2.5rem] overflow-hidden">
            <img alt="Dr. Laila Hassan" class="w-full aspect-[4/5] object-cover transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDErZ6gcxwu2phkld2I8jBWQxqsveaSdGMYELRHKlW329rgUuVpE6o1oZ2x8iwGl9zKcpQCZtfuyArkeSlIBjYfCslFWssS-h1LOkAs507rVkj21YVuQOxEzqbWURoWZTShwQXSBmyqIheNqp8GBzjBXCdrYKMILgspVP6QgiTdIjKsUFaPjBazIpSc-PhZImxhpKKjxhBN_KBh9Mu6QLS5-cQmIGV7S9I1NR8nmC7NTxSQN5HNQPSyaV8GbUjnmso0Iws4anaumkJN" />
            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-8">
              <div class="flex gap-4 text-white">
                <span class="material-symbols-outlined cursor-pointer hover:scale-110">alternate_email</span>
                <span class="material-symbols-outlined cursor-pointer hover:scale-110">share</span>
              </div>
            </div>
          </div>
          <h4 class="text-2xl font-bold mb-2 dark:text-white">د. ليلى حسن</h4>
          <p class="text-primary font-bold mb-4">مستشارة السلوك الغذائي</p>
          <p class="text-slate-600 dark:text-slate-400 leading-relaxed">تركز على تعديل العادات الغذائية وبناء علاقة صحية مع الطعام من منظور نفسي وسلوكي.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="py-16 bg-white dark:bg-slate-900 border-t border-gray-100 dark:border-gray-800">
    <div class="container mx-auto px-6">
      <div class="flex flex-wrap items-center justify-center gap-12 md:gap-20 opacity-40 grayscale hover:grayscale-0 transition-all">
        <div class="flex items-center gap-2">
          <span class="material-symbols-outlined text-4xl">health_and_safety</span>
          <span class="font-bold text-xl uppercase tracking-tighter">Medical Board</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="material-symbols-outlined text-4xl">award_star</span>
          <span class="font-bold text-xl uppercase tracking-tighter">Nutrition Assoc</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="material-symbols-outlined text-4xl">verified_user</span>
          <span class="font-bold text-xl uppercase tracking-tighter">Global Wellness</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="material-symbols-outlined text-4xl">clinical_notes</span>
          <span class="font-bold text-xl uppercase tracking-tighter">Science Certified</span>
        </div>
      </div>
    </div>
  </section>
  <footer class="bg-slate-950 text-slate-300 pt-24 pb-12">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-20">
        <div class="col-span-1">
          <img src="logo.png" alt="NutriZone" style="width: 250px;" class="mb-8">
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
            <li><a class="hover:text-primary transition-colors" href="index.html">الرئيسية</a></li>
            <li><a class="hover:text-primary transition-colors" href="aboutus.html">من نحن</a></li>
            <li><a class="hover:text-primary transition-colors" href="services.html">خدماتنا</a></li>
            <li><a class="hover:text-primary transition-colors" href="contactus.html">اتصل بنا</a></li>
          </ul>
        </div>
        <div>
          <h5 class="text-white font-black text-xl mb-8">خدماتنا</h5>
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
  <div id="modal-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] hidden flex items-center justify-center p-4" onclick="closeAllModals()"></div>

  <div id="modal-service" class="fixed z-[101] hidden top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white dark:bg-slate-900 rounded-3xl shadow-2xl p-8 w-full max-w-md">
    <button onclick="closeAllModals()" class="absolute top-4 left-4 text-slate-400 hover:text-primary transition-colors">
      <span class="material-symbols-outlined text-3xl">close</span>
    </button>
    <div id="modal-service-icon" class="w-16 h-16 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-2xl flex items-center justify-center mb-5"></div>
    <h3 id="modal-service-title" class="text-2xl font-black mb-3 dark:text-white"></h3>
    <p id="modal-service-desc" class="text-slate-600 dark:text-slate-400 leading-relaxed mb-6"></p>
    <a href="services.html" class="inline-block bg-primary hover:bg-emerald-600 text-white px-6 py-3 rounded-full font-bold transition-all">اكتشف المزيد</a>
  </div>

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
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.5!2d31.2001!3d30.0444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14584587b4e5e6b1%3A0x0!2z2YXYudmHZCDYrNin2YXYudYpINin2YTYr9mI2YQ!5e0!3m2!1sar!2seg!4v1"
      width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="p-4 text-sm text-slate-500 dark:text-slate-400 text-center">15 شارع جامعة الدول العربية، المهندسين، الجيزة، مصر</div>
  </div>

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
      ['modal-service', 'modal-map', 'modal-chat'].forEach(id => document.getElementById(id).classList.add('hidden'));
    }

    function openMapModal() {
      showModal('modal-map');
    }

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

    function openChatModal() {
      document.getElementById('modal-chat').classList.remove('hidden');
      document.getElementById('chat-input').focus();
    }
    const autoReplies = ['شكراً على تواصلك! سيرد عليك أحد المختصين قريباً.', 'سؤال رائع! يمكنك الاطلاع على خدماتنا للمزيد من التفاصيل.', 'نحن هنا لمساعدتك في رحلتك الصحية 💚'];
    let replyIdx = 0;

    function sendChatMsg() {
      const input = document.getElementById('chat-input');
      const msg = input.value.trim();
      if (!msg) return;
      const container = document.getElementById('chat-messages');
      container.innerHTML += `<div class="flex gap-2 justify-start flex-row-reverse"><div class="bg-primary rounded-2xl rounded-tl-sm p-3 text-sm text-white shadow-sm max-w-[85%]">${msg}</div></div>`;
      input.value = '';
      container.scrollTop = container.scrollHeight;
      setTimeout(() => {
        container.innerHTML += `<div class="flex gap-2"><div class="w-7 h-7 bg-primary rounded-full flex items-center justify-center flex-shrink-0 mt-1"><span class="material-symbols-outlined text-white text-sm">eco</span></div><div class="bg-white dark:bg-slate-700 rounded-2xl rounded-tr-sm p-3 text-sm text-slate-700 dark:text-slate-200 shadow-sm max-w-[85%]">${autoReplies[replyIdx++ % autoReplies.length]}</div></div>`;
        container.scrollTop = container.scrollHeight;
      }, 800);
    }
  </script>
</body>

</html>