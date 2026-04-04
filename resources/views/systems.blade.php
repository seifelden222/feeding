<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>البرامج الغذائية المتخصصة | NutriZone مصر</title>
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            primary: "#10B981",
            darkTeal: "#0F172A",
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
        .hero-overlay {
            background: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.85)), url('https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 48;
        }
        .program-card:hover .program-image {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-200">
  <header class="fixed w-full z-50 bg-white/90 dark:bg-gray-900/90 backdrop-blur-md border-b border-gray-100 dark:border-gray-800">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
      <img src="logo.png" alt="NutriZone" style="width: 150px;">
      <nav class="hidden md:flex items-center gap-8">
        <a class="font-medium hover:text-primary transition-colors" href="{{url('/')}}">الرئيسية</a>
        <a class="font-medium hover:text-primary transition-colors" href="{{url('aboutus')}}">من نحن</a>
        <a class="font-medium hover:text-primary transition-colors" href="{{url('services')}}">خدماتنا</a>
        <a class="font-medium hover:text-primary transition-colors" href="{{url('articles')}}">المقالات</a>
        <a class="font-medium hover:text-primary transition-colors" href="{{url('contactus')}}">اتصل بنا</a>
        <a class="font-medium hover:text-primary transition-colors" href="{{url('systems')}}">نظامنا</a>
        <a class="font-medium hover:text-primary transition-colors" href="{{url('diseases')}}">لأمراض المزمنة</a>

      </nav>
      <button class="bg-primary hover:bg-emerald-600 text-white px-6 py-2.5 rounded-full font-bold transition-all transform hover:scale-105">
        <a href="{{route('login')}}">ابدأ رحلتك الآن</a>
      </button>
    </div>
  </header>
  <section class="hero-overlay pt-48 pb-32 text-center text-white">
    <div class="container mx-auto px-6">
      <h1 class="text-5xl md:text-6xl font-black mb-6">البرامج الغذائية المتخصصة</h1>
      <div class="flex items-center justify-center gap-3 text-lg opacity-80">
        <a class="hover:text-primary transition-colors" href="{{url('/')}}">الرئيسية</a>
        <span class="material-symbols-outlined text-sm">chevron_left</span>
        <span class="text-primary font-bold">البرامج الغذائية</span>
      </div>
    </div>
  </section>
  <section class="py-24">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        <div class="program-card bg-white dark:bg-slate-800 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all border border-gray-50 dark:border-gray-700 flex flex-col group">
          <div class="relative h-72 overflow-hidden">
            <img alt="Weight Loss Program" class="program-image w-full h-full object-cover transition-transform duration-500" src="https://www.allrecipes.com/thmb/AfZ5pJYvZSrlltkHiimLIOdEtjE=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/229156-Zesty-Quinoa-Salad-ddmps-4x3-104421-df647e343ce543769a038cccf4c6419c.jpg" />
            <div class="absolute top-6 right-6 bg-primary text-white px-4 py-1.5 rounded-full text-sm font-bold shadow-lg">الأكثر طلباً</div>
          </div>
          <div class="p-8 flex flex-col flex-grow">
            <h3 class="text-2xl font-bold mb-4 dark:text-white leading-tight">برنامج إنقاص الوزن</h3>
            <p class="text-slate-500 dark:text-slate-400 text-base mb-6 leading-relaxed">نظام غذائي متكامل مصمم خصيصاً لمساعدتك على الوصول للوزن المثالي بطريقة صحية ومستدامة دون حرمان.</p>
            <ul class="space-y-4 mb-8">
              <li class="flex items-center gap-3 text-slate-600 dark:text-slate-300">
                <span class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-md">restaurant</span>
                <span class="text-sm font-medium">وجبات محسوبة السعرات</span>
              </li>
              <li class="flex items-center gap-3 text-slate-600 dark:text-slate-300">
                <span class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-md">monitoring</span>
                <span class="text-sm font-medium">متابعة أسبوعية مع أخصائي</span>
              </li>
              <li class="flex items-center gap-3 text-slate-600 dark:text-slate-300">
                <span class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-md">local_shipping</span>
                <span class="text-sm font-medium">توصيل يومي للمنزل</span>
              </li>
            </ul>
            <div class="mt-auto flex items-center justify-between border-t border-gray-100 dark:border-gray-700 pt-6">
              <div>
                <span class="text-xs text-slate-400 block">تبدأ من</span>
                <span class="text-2xl font-black text-darkTeal dark:text-white">2,500 <span class="text-sm font-bold">ج.م</span></span>
              </div>
              <button class="bg-primary hover:bg-emerald-600 text-white px-8 py-3 rounded-2xl font-bold transition-all shadow-md hover:shadow-primary/30">
                <a href="{{ route('login') }}"> اشترك الآن</a>
              </button>
            </div>
          </div>
        </div>
        <div class="program-card bg-white dark:bg-slate-800 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all border border-gray-50 dark:border-gray-700 flex flex-col group">
          <div class="relative h-72 overflow-hidden">
            <img alt="Athletic Bulking" class="program-image w-full h-full object-cover transition-transform duration-500" src="https://www.mygsn.co.uk/wp-content/uploads/2024/05/19.02.23-GSN-Egg-Fried-Rice-8-of-9-2-copy.jpg" />
          </div>
          <div class="p-8 flex flex-col flex-grow">
            <h3 class="text-2xl font-bold mb-4 dark:text-white leading-tight">برنامج التضخيم الرياضي</h3>
            <p class="text-slate-500 dark:text-slate-400 text-base mb-6 leading-relaxed">برنامج عالي البروتين مصمم للرياضيين الراغبين في زيادة الكتلة العضلية وتحسين الأداء البدني.</p>
            <ul class="space-y-4 mb-8">
              <li class="flex items-center gap-3 text-slate-600 dark:text-slate-300">
                <span class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-md">fitness_center</span>
                <span class="text-sm font-medium">توزيع ماكروز مخصص</span>
              </li>
              <li class="flex items-center gap-3 text-slate-600 dark:text-slate-300">
                <span class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-md">egg_alt</span>
                <span class="text-sm font-medium">وجبات غنية بالبروتين</span>
              </li>
              <li class="flex items-center gap-3 text-slate-600 dark:text-slate-300">
                <span class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-md">history</span>
                <span class="text-sm font-medium">تقييم مستويات الطاقة</span>
              </li>
            </ul>
            <div class="mt-auto flex items-center justify-between border-t border-gray-100 dark:border-gray-700 pt-6">
              <div>
                <span class="text-xs text-slate-400 block">تبدأ من</span>
                <span class="text-2xl font-black text-darkTeal dark:text-white">3,200 <span class="text-sm font-bold">ج.م</span></span>
              </div>
              <button class="bg-primary hover:bg-emerald-600 text-white px-8 py-3 rounded-2xl font-bold transition-all shadow-md hover:shadow-primary/30">
                <a href="{{ route('login') }}"> اشترك الآن</a>
              </button>
            </div>
          </div>
        </div>
        <div class="program-card bg-white dark:bg-slate-800 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all border border-gray-50 dark:border-gray-700 flex flex-col group">
          <div class="relative h-72 overflow-hidden">
            <img alt="Diabetes Management" class="program-image w-full h-full object-cover transition-transform duration-500" src="https://images.squarespace-cdn.com/content/v1/59f0e6beace8641044d76e9c/1754922156904-P3U662RLK5NMY3EPCS72/Social+Balanced+diabetes+plate.jpg" />
          </div>
          <div class="p-8 flex flex-col flex-grow">
            <h3 class="text-2xl font-bold mb-4 dark:text-white leading-tight">تغذية مرضى السكري</h3>
            <p class="text-slate-500 dark:text-slate-400 text-base mb-6 leading-relaxed">تحكم في مستويات السكر في دمك من خلال خطة غذائية علمية تعتمد على الأطعمة منخفضة المؤشر الجلايسيمي.</p>
            <ul class="space-y-4 mb-8">
              <li class="flex items-center gap-3 text-slate-600 dark:text-slate-300">
                <span class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-md">medical_services</span>
                <span class="text-sm font-medium">إشراف طبي متخصص</span>
              </li>
              <li class="flex items-center gap-3 text-slate-600 dark:text-slate-300">
                <span class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-md">scale</span>
                <span class="text-sm font-medium">موازنة الكربوهيدرات</span>
              </li>
              <li class="flex items-center gap-3 text-slate-600 dark:text-slate-300">
                <span class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-md">spa</span>
                <span class="text-sm font-medium">نمط حياة صحي شامل</span>
              </li>
            </ul>
            <div class="mt-auto flex items-center justify-between border-t border-gray-100 dark:border-gray-700 pt-6">
              <div>
                <span class="text-xs text-slate-400 block">تبدأ من</span>
                <span class="text-2xl font-black text-darkTeal dark:text-white">2,800 <span class="text-sm font-bold">ج.م</span></span>
              </div>
              <button class="bg-primary hover:bg-emerald-600 text-white px-8 py-3 rounded-2xl font-bold transition-all shadow-md hover:shadow-primary/30">
                <a href="{{ route('login') }}"> اشترك الآن</a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-24 bg-slate-50 dark:bg-slate-900">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-black mb-4 dark:text-white">لماذا تختار برامجنا؟</h2>
        <div class="w-20 h-1.5 bg-primary mx-auto rounded-full"></div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
        <div class="text-center p-8 bg-white dark:bg-slate-800 rounded-[3rem] shadow-sm">
          <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
            <span class="material-symbols-outlined text-primary text-4xl">science</span>
          </div>
          <h4 class="text-xl font-bold mb-4 dark:text-white">دراسات علمية</h4>
          <p class="text-slate-500 dark:text-slate-400">جميع برامجنا مصممة بناءً على أحدث الأبحاث العلمية في مجال التغذية السريرية والرياضية.</p>
        </div>
        <div class="text-center p-8 bg-white dark:bg-slate-800 rounded-[3rem] shadow-sm">
          <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
            <span class="material-symbols-outlined text-primary text-4xl">verified</span>
          </div>
          <h4 class="text-xl font-bold mb-4 dark:text-white">نتائج مضمونة</h4>
          <p class="text-slate-500 dark:text-slate-400">نضمن لك الوصول لأهدافك الصحية عند الالتزام بالخطة المقترحة والمتابعة الدورية معنا.</p>
        </div>
        <div class="text-center p-8 bg-white dark:bg-slate-800 rounded-[3rem] shadow-sm">
          <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
            <span class="material-symbols-outlined text-primary text-4xl">dynamic_feed</span>
          </div>
          <h4 class="text-xl font-bold mb-4 dark:text-white">مرونة كاملة</h4>
          <p class="text-slate-500 dark:text-slate-400">يمكنك تعديل الوجبات أو إيقاف الاشتراك مؤقتاً بما يتناسب مع ظروف حياتك اليومية.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="py-24 overflow-hidden">
    <div class="container mx-auto px-6">
      <div class="flex flex-col md:flex-row items-center justify-between mb-16 gap-6">
        <div>
          <h2 class="text-4xl font-black mb-4 dark:text-white">قصص نجاح عملائنا</h2>
          <p class="text-slate-500 dark:text-slate-400">تحولات حقيقية لأشخاص غيروا حياتهم مع NutriZone</p>
        </div>
        <div class="flex gap-4">
          <button class="w-12 h-12 rounded-full border-2 border-primary text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-all">
            <span class="material-symbols-outlined">arrow_forward</span>
          </button>
          <button class="w-12 h-12 rounded-full border-2 border-primary text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-all">
            <span class="material-symbols-outlined">arrow_back</span>
          </button>
        </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="relative rounded-[2rem] overflow-hidden aspect-[4/5] shadow-lg group">
          <img alt="Success Story" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://hips.hearstapps.com/hmg-prod/images/mh-12-18-transformation-social-1576705630.jpg?crop=0.888888888888889xw:1xh;center,top&resize=1200:*" />
          <div class="absolute inset-0 bg-gradient-to-t from-darkTeal/90 to-transparent p-6 flex flex-col justify-end">
            <span class="text-primary font-bold mb-2">فقدان 15 كجم</span>
            <p class="text-white text-sm font-medium">"أفضل قرار اتخذته هو الاشتراك في برنامج إنقاص الوزن، الوجبات لذيذة جداً."</p>
          </div>
        </div>
        <div class="relative rounded-[2rem] overflow-hidden aspect-[4/5] shadow-lg group">
          <img alt="Success Story" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://static.boredpanda.com/blog/wp-content/uploads/2017/05/591c679228648.png" />
          <div class="absolute inset-0 bg-gradient-to-t from-darkTeal/90 to-transparent p-6 flex flex-col justify-end">
            <span class="text-primary font-bold mb-2">زيادة كتلة عضلية</span>
            <p class="text-white text-sm font-medium">"النتائج في الجيم تحسنت بشكل ملحوظ بعد تعديل نظامي الغذائي."</p>
          </div>
        </div>
        <div class="relative rounded-[2rem] overflow-hidden aspect-[4/5] shadow-lg group">
          <img alt="Success Story" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://media-cldnry.s-nbcnews.com/image/upload/rockcms/2024-07/before-after-inline-2-cz-240705-4ec0d5.jpg" />
          <div class="absolute inset-0 bg-gradient-to-t from-darkTeal/90 to-transparent p-6 flex flex-col justify-end">
            <span class="text-primary font-bold mb-2">تحسن صحي</span>
            <p class="text-white text-sm font-medium">"استطعت تنظيم مستويات السكر في دمي بفضل التغذية العلاجية."</p>
          </div>
        </div>
        <div class="relative rounded-[2rem] overflow-hidden aspect-[4/5] shadow-lg group">
          <img alt="Success Story" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://preview.redd.it/1-year-transformation-v0-c874kuvw7p6c1.jpeg?auto=webp&s=614cdb007179dbfaa04133f765bbe1919e6e8547" />
          <div class="absolute inset-0 bg-gradient-to-t from-darkTeal/90 to-transparent p-6 flex flex-col justify-end">
            <span class="text-primary font-bold mb-2">نمط حياة جديد</span>
            <p class="text-white text-sm font-medium">"تعلمت كيف آكل بطريقة صحية دون الشعور بالحرمان أو التعب."</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-20 bg-primary">
    <div class="container mx-auto px-6">
      <div class="flex flex-col lg:flex-row items-center justify-between gap-12 bg-white/10 backdrop-blur-md p-10 md:p-16 rounded-[3rem] text-white border border-white/20">
        <div class="lg:w-1/2 text-center lg:text-right">
          <h2 class="text-3xl md:text-4xl font-black mb-4">هل تحتاج لاستشارة خاصة؟</h2>
          <p class="text-xl opacity-90 leading-relaxed">تواصل مع خبرائنا لمساعدتك في اختيار البرنامج الأمثل لحالتك الصحية وأهدافك البدنية.</p>
        </div>
        <div class="lg:w-1/2 flex justify-center">
          <button class="bg-darkTeal text-white px-12 py-5 rounded-2xl font-black text-xl hover:scale-105 transition-transform shadow-2xl">
            <a href="{{ route('login') }}">احجز استشارتك المجانية</a>
          </button>
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
            <li><a class="hover:text-primary transition-colors" href="{{ url('/') }}">الرئيسية</a></li>
            <li><a class="hover:text-primary transition-colors" href="{{ route('aboutus') }}">من نحن</a></li>
            <li><a class="hover:text-primary transition-colors" href="{{ route('services') }}">خدماتنا</a></li>
            <li><a class="hover:text-primary transition-colors" href="{{ route('contactus') }}">اتصل بنا</a></li>
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
    <button onclick="closeAllModals()" class="absolute top-4 left-4 text-slate-400 hover:text-primary transition-colors"><span class="material-symbols-outlined text-3xl">close</span></button>
    <div id="modal-service-icon" class="w-16 h-16 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-2xl flex items-center justify-center mb-5"></div>
    <h3 id="modal-service-title" class="text-2xl font-black mb-3 dark:text-white"></h3>
    <p id="modal-service-desc" class="text-slate-600 dark:text-slate-400 leading-relaxed mb-6"></p>
    <a href="{{ route('services') }}" class="inline-block bg-primary hover:bg-emerald-600 text-white px-6 py-3 rounded-full font-bold transition-all">اكتشف المزيد</a>
  </div>
  <div id="modal-map" class="fixed z-[101] hidden top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white dark:bg-slate-900 rounded-3xl shadow-2xl overflow-hidden w-full max-w-lg">
    <div class="flex items-center justify-between p-5 border-b border-gray-100 dark:border-gray-700">
      <div class="flex items-center gap-2"><span class="material-symbols-outlined text-primary">location_on</span><span class="font-bold dark:text-white">موقعنا على الخريطة</span></div>
      <button onclick="closeAllModals()" class="text-slate-400 hover:text-primary transition-colors"><span class="material-symbols-outlined text-3xl">close</span></button>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.5!2d31.2001!3d30.0444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14584587b4e5e6b1%3A0x0!2z2YXYudmHZCDYrNin2YXYudYpINin2YTYr9mI2YQ!5e0!3m2!1sar!2seg!4v1" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="p-4 text-sm text-slate-500 dark:text-slate-400 text-center">15 شارع جامعة الدول العربية، المهندسين، الجيزة، مصر</div>
  </div>
  <div id="modal-chat" class="fixed z-[101] hidden bottom-6 left-6 bg-white dark:bg-slate-900 rounded-3xl shadow-2xl w-80 flex flex-col overflow-hidden" style="height:420px;">
    <div class="bg-primary p-4 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <div class="w-9 h-9 bg-white/20 rounded-full flex items-center justify-center"><span class="material-symbols-outlined text-white text-xl">support_agent</span></div>
        <div>
          <p class="text-white font-bold text-sm">فريق NutriZone</p>
          <p class="text-emerald-100 text-xs">متاح الآن</p>
        </div>
      </div>
      <button onclick="closeAllModals()" class="text-white/70 hover:text-white transition-colors"><span class="material-symbols-outlined">close</span></button>
    </div>
    <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-3 bg-slate-50 dark:bg-slate-800">
      <div class="flex gap-2">
        <div class="w-7 h-7 bg-primary rounded-full flex items-center justify-center flex-shrink-0 mt-1"><span class="material-symbols-outlined text-white text-sm">eco</span></div>
        <div class="bg-white dark:bg-slate-700 rounded-2xl rounded-tr-sm p-3 text-sm text-slate-700 dark:text-slate-200 shadow-sm max-w-[85%]">أهلاً بك في NutriZone! كيف يمكنني مساعدتك اليوم؟ 😊</div>
      </div>
    </div>
    <div class="p-3 border-t border-gray-100 dark:border-gray-700 flex gap-2">
      <input id="chat-input" type="text" placeholder="اكتب رسالتك..." dir="rtl" class="flex-1 bg-slate-100 dark:bg-slate-700 rounded-full px-4 py-2 text-sm outline-none dark:text-white" onkeydown="if(event.key==='Enter') sendChatMsg()" />
      <button onclick="sendChatMsg()" class="w-9 h-9 bg-primary rounded-full flex items-center justify-center hover:bg-emerald-600 transition-colors flex-shrink-0"><span class="material-symbols-outlined text-white text-lg">send</span></button>
    </div>
  </div>
  <script>
    const services = [{
      icon: 'restaurant',
      title: 'خطط وجبات مخصصة',
      desc: 'جداول غذائية مرنة ومحسوبة السعرات تناسب ذوقك واحتياجاتك اليومية، مصممة خصيصاً لجسمك وأهدافك.'
    }, {
      icon: 'fitness_center',
      title: 'برامج خسارة الوزن',
      desc: 'فقدان الوزن بطريقة صحية دون حرمان، مع التركيز على حرق الدهون وبناء العادات الصحية المستدامة.'
    }, {
      icon: 'sports_gymnastics',
      title: 'بناء العضلات',
      desc: 'تغذية رياضية متقدمة لزيادة الكتلة العضلية وتحسين الأداء الرياضي العام بأسس علمية.'
    }, {
      icon: 'health_and_safety',
      title: 'التغذية العلاجية',
      desc: 'إدارة الحالات الصحية مثل السكري والضغط من خلال أنظمة غذائية طبية متخصصة ومعتمدة.'
    }];

    function openServiceModal(i) {
      const s = services[i];
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
      const c = document.getElementById('chat-messages');
      c.innerHTML += `<div class="flex gap-2 justify-start flex-row-reverse"><div class="bg-primary rounded-2xl rounded-tl-sm p-3 text-sm text-white shadow-sm max-w-[85%]">${msg}</div></div>`;
      input.value = '';
      c.scrollTop = c.scrollHeight;
      setTimeout(() => {
        c.innerHTML += `<div class="flex gap-2"><div class="w-7 h-7 bg-primary rounded-full flex items-center justify-center flex-shrink-0 mt-1"><span class="material-symbols-outlined text-white text-sm">eco</span></div><div class="bg-white dark:bg-slate-700 rounded-2xl rounded-tr-sm p-3 text-sm text-slate-700 dark:text-slate-200 shadow-sm max-w-[85%]">${autoReplies[replyIdx++%autoReplies.length]}</div></div>`;
        c.scrollTop = c.scrollHeight;
      }, 800);
    }
  </script>
</body>

</html>
