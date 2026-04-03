<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>المقالات الصحية | NutriZone مصر</title>
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
            background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.9)), url('https://images.unsplash.com/photo-1498837167922-ddd27525d352?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 48;
        }
        .category-btn.active {
            @apply bg-primary text-white;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-200">
  <x-landing-navbar />

  <section class="hero-overlay pt-48 pb-32 text-center text-white">
    <div class="container mx-auto px-6">
      <h1 class="text-5xl md:text-6xl font-black mb-6">المقالات الصحية</h1>
      <div class="flex items-center justify-center gap-3 text-lg opacity-80">
        <a class="hover:text-primary transition-colors" href="{{ url('/') }}">الرئيسية</a>
        <span class="material-symbols-outlined text-sm">chevron_left</span>
        <span class="text-primary font-bold">المقالات</span>
      </div>
    </div>
  </section>
  <section class="py-16 -mt-16 relative z-10">
    <div class="container mx-auto px-6">
      <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] overflow-hidden shadow-2xl flex flex-col lg:flex-row border border-gray-50 dark:border-gray-700">
        <div class="lg:w-1/2 relative h-[300px] lg:h-auto">
          <img alt="Featured Article" class="absolute inset-0 w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC12ps703frj80mtLL4K_WiyT5O_wUJSuAiiCKOvI50g6I0LzPd6s2Y1XCtDaHK1BmdASoQ50yCr-sjvE0l1l8WQnOkzPdzwGa2z-hlwSYV3EnzlwgRP0scoJ6es828-cU9hCP-ajk3oqzhldQrJJCDVT_ojljIenenEu14znKRHZcSr5ObMsxqHMFImIAAdslg5p-ln0ZNLJOuEg2-SdcSzw3GJAjPAmNql4e7jKg4wK7t0O7B0eKk8l8p_00tPdf37EK4MnYo2zDM" />
          <div class="absolute top-6 right-6">
            <span class="bg-primary text-white px-4 py-1.5 rounded-full text-sm font-bold">نصائح غذائية</span>
          </div>
        </div>
        <div class="lg:w-1/2 p-10 md:p-16 flex flex-col justify-center">
          <h2 class="text-3xl md:text-4xl font-black mb-6 leading-tight dark:text-white">أهمية شرب الماء في الصيف وكيفية الحفاظ على الترطيب</h2>
          <p class="text-slate-500 dark:text-slate-400 text-lg leading-relaxed mb-8">
            مع ارتفاع درجات الحرارة في الصيف المصري، يصبح الحفاظ على توازن السوائل في الجسم أمراً حيوياً. اكتشف الكمية المناسبة لجسمك وأفضل الأوقات لشرب الماء لتجنب الجفاف وتحسين عملية الهضم.
          </p>
          <div class="flex items-center gap-4 mb-8 text-sm text-slate-400">
            <div class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">calendar_today</span> 15 يوليو 2024</div>
            <div class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">schedule</span> 5 دقائق قراءة</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-12">
    <div class="container mx-auto px-6">
      <div class="flex flex-wrap items-center justify-center gap-4">
        <button onclick="filterArticles('الكل')" class="category-btn active px-8 py-3 rounded-2xl font-bold border-2 border-primary transition-all" data-cat="الكل">الكل</button>
        <button onclick="filterArticles('تخسيس')" class="category-btn px-8 py-3 rounded-2xl font-bold border-2 border-transparent bg-white dark:bg-slate-800 hover:border-primary transition-all" data-cat="تخسيس">تخسيس</button>
        <button onclick="filterArticles('وصفات صحية')" class="category-btn px-8 py-3 rounded-2xl font-bold border-2 border-transparent bg-white dark:bg-slate-800 hover:border-primary transition-all" data-cat="وصفات صحية">وصفات صحية</button>
        <button onclick="filterArticles('رياضة')" class="category-btn px-8 py-3 rounded-2xl font-bold border-2 border-transparent bg-white dark:bg-slate-800 hover:border-primary transition-all" data-cat="رياضة">رياضة</button>
        <button onclick="filterArticles('تغذية علاجية')" class="category-btn px-8 py-3 rounded-2xl font-bold border-2 border-transparent bg-white dark:bg-slate-800 hover:border-primary transition-all" data-cat="تغذية علاجية">تغذية علاجية</button>
        <button onclick="filterArticles('نصائح غذائية')" class="category-btn px-8 py-3 rounded-2xl font-bold border-2 border-transparent bg-white dark:bg-slate-800 hover:border-primary transition-all" data-cat="نصائح غذائية">نصائح غذائية</button>
      </div>
    </div>
  </section>
  <section class="pb-24">
    <div class="container mx-auto px-6">
      <div id="articles-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        <div data-cat="وصفات صحية" class="article-card bg-white dark:bg-slate-800 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all border border-gray-50 dark:border-gray-700 flex flex-col">
          <div class="relative h-64">
            <img alt="Article" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCjC_aZbh-sPJlxacjXRGg0Os3l3ClZ9zu6djdyjgd5H5_vs7Xeq5mi8Lp3LiAzWI-P03NnE06E4UgZFlNhR-y_NyhXZEmcK70II8aPTAG9t8TsNrVJT8hvQzqt7a50Vxm6YOj_L8Wmu72dvqLP_BCY6jbiPfW0QHp2fzW9heRdwWYtPKG4oRzAc6op06uf0CyUXc_VrBthjaNL0mTAYsY6mQfsMfhHvyC4HFdcSKsP5DR2nIe-JvIctA566aNKvFWxub2XFRQC1Q-P" />
            <span class="absolute top-4 right-4 bg-primary/90 backdrop-blur-md text-white px-3 py-1 rounded-lg text-xs font-bold">وصفات صحية</span>
          </div>
          <div class="p-8 flex flex-col flex-grow">
            <div class="flex items-center gap-4 text-xs text-slate-400 mb-4">
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">calendar_today</span> 10 يوليو 2024</span>
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">schedule</span> 4 دقائق</span>
            </div>
            <h3 class="text-xl font-bold mb-4 dark:text-white leading-snug">أفضل 5 وجبات فطور صحية لبدء يومك بنشاط وحيوية</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">تعرف على وصفات سهلة وسريعة التحضير توفر لك الطاقة اللازمة دون الشعور بالخمول أو الثقل.</p>

          </div>
        </div>
        <div data-cat="رياضة" class="article-card bg-white dark:bg-slate-800 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all border border-gray-50 dark:border-gray-700 flex flex-col">
          <div class="relative h-64">
            <img alt="Article" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaZ659LzBBtm0SzAMENkcf3rPXCI-KwkdfVTkJnnBW6kIbFwLsEser0Ei0MlimxKDViLP3Lt0C36reBDUJeA2xMM6tSbwAT2SjP44MeYw72LKG5BW029WE43dpc19D1CzI6T_3WXPYmLU_lRpeDqCu2GKo-VXqA1L8HoGbH3xMHoG2Uiq8rJoDNOmYDKa_3_fuuNIBdDr34UtAeD6g8sVJ-FkFur0yqrPJG_u1FM786k7D_g4eNoeAGza4HTmKRdneoxQcDqRxgJkO" />
            <span class="absolute top-4 right-4 bg-primary/90 backdrop-blur-md text-white px-3 py-1 rounded-lg text-xs font-bold">رياضة</span>
          </div>
          <div class="p-8 flex flex-col flex-grow">
            <div class="flex items-center gap-4 text-xs text-slate-400 mb-4">
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">calendar_today</span> 8 يوليو 2024</span>
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">schedule</span> 6 دقائق</span>
            </div>
            <h3 class="text-xl font-bold mb-4 dark:text-white leading-snug">كيفية تنسيق الوجبات مع التمارين الرياضية لنتائج أسرع</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">متى تأكل قبل التمرين؟ وما هي الوجبة المثالية بعد الجيم؟ كل الأجوبة في هذا المقال.</p>

          </div>
        </div>
        <div data-cat="تخسيس" class="article-card bg-white dark:bg-slate-800 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all border border-gray-50 dark:border-gray-700 flex flex-col">
          <div class="relative h-64">
            <img alt="Article" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsVJKhKeKufjXpAGgvcO3Jto6puw6U4t4aBF5qRbY5cF7X68ASxAwTGHFrCtndwOXL494A77QBiXWdLvwlsiB3bp2CM-t1vjOCxws7te9gLQEivT58keHBa2m26oHOh8hjZ7FT10mB0uVHvARXllIF13bxtXyafRhBRgckziCPqxfvPdwXTzOm8q1WNeHbWXRZ0X2gzaM78O35tskhJ2tG8acRDR_hhjG1RjCsra3rB8P9C4msjaSACiZ66ztNpjgs2HfdDLjKIZ8U" />
            <span class="absolute top-4 right-4 bg-primary/90 backdrop-blur-md text-white px-3 py-1 rounded-lg text-xs font-bold">تخسيس</span>
          </div>
          <div class="p-8 flex flex-col flex-grow">
            <div class="flex items-center gap-4 text-xs text-slate-400 mb-4">
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">calendar_today</span> 5 يوليو 2024</span>
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">schedule</span> 8 دقائق</span>
            </div>
            <h3 class="text-xl font-bold mb-4 dark:text-white leading-snug">خرافات حول إنقاص الوزن يجب أن تتوقف عن تصديقها</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">هل الامتناع عن الكربوهيدرات هو الحل؟ نكشف لك الحقائق العلمية وراء أشهر شائعات التخسيس.</p>

          </div>
        </div>
        <div data-cat="تغذية علاجية" class="article-card bg-white dark:bg-slate-800 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all border border-gray-50 dark:border-gray-700 flex flex-col">
          <div class="relative h-64">
            <img alt="Article" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDb0HWQtvzDOw2bdhozfSgqaeDwArdwMYtOXvuZL7yF9UVa7DJxa8zogWTAFwIlbVSNbDZNhnJoBK0PEgtqZo87S-Qu-xZ8vtSIB5UW3_Rgjx3w_k3QWQSBcNkQeQvWk8kfjBwRXMKXKGVvIz-3ZQ_JWEbuVI4wE5w_sFWCs6CdnFAssa4xa901lMQOnTiPmZO-8S0WpoewH9UtsMSJP5g6ppiGCGTPqpiGxy3A_fFBxVHNFValYgCDZxwTD9rhh53pPbcGk1saiT6F" />
            <span class="absolute top-4 right-4 bg-primary/90 backdrop-blur-md text-white px-3 py-1 rounded-lg text-xs font-bold">تغذية علاجية</span>
          </div>
          <div class="p-8 flex flex-col flex-grow">
            <div class="flex items-center gap-4 text-xs text-slate-400 mb-4">
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">calendar_today</span> 1 يوليو 2024</span>
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">schedule</span> 7 دقائق</span>
            </div>
            <h3 class="text-xl font-bold mb-4 dark:text-white leading-snug">دور التغذية في التحكم بمرض السكري من النوع الثاني</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">كيف تختار الأطعمة ذات المؤشر الجلايسيمي المنخفض لتحسين مستويات السكر في الدم.</p>

          </div>
        </div>
        <div data-cat="نصائح غذائية" class="article-card bg-white dark:bg-slate-800 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all border border-gray-50 dark:border-gray-700 flex flex-col">
          <div class="relative h-64">
            <img alt="Article" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD_DGp2kpZLN9XaAwVcA1rdMQqQMl8scHQwxvqvRwoFCImMukHRBzefOmz44Dx8ymYOc0VJz8MZPMHAZlj6W4ce_8vu6sR6fwHR7g3_o5_qOuGYaOY-TWPDpMLgo4OmbbQRJ_Qmn-d0VKy3kAbvq17QYfoP_xtuF7pstscUb9kZPv26I11g4uVCqxEAp7rn7kuWZiXfOhqof_jMeY-fyqmDvQYMFU1jL1xhcaICYK3IgHQdEBoVPOjR1KlrtsGH-hIQPAd2islffap6" />
            <span class="absolute top-4 right-4 bg-primary/90 backdrop-blur-md text-white px-3 py-1 rounded-lg text-xs font-bold">نصائح غذائية</span>
          </div>
          <div class="p-8 flex flex-col flex-grow">
            <div class="flex items-center gap-4 text-xs text-slate-400 mb-4">
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">calendar_today</span> 28 يونيو 2024</span>
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">schedule</span> 5 دقائق</span>
            </div>
            <h3 class="text-xl font-bold mb-4 dark:text-white leading-snug">العلاقة بين الصحة النفسية وما نأكله من طعام</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">أطعمة تحسن المزاج وتقلل التوتر: العلم يثبت أن صحتك النفسية تبدأ من أمعائك.</p>

          </div>
        </div>
        <div data-cat="وصفات صحية" class="article-card bg-white dark:bg-slate-800 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all border border-gray-50 dark:border-gray-700 flex flex-col">
          <div class="relative h-64">
            <img alt="Article" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB5J9HsRXjj_MlslDhDbFDE3NRRf7j9isnBW__m9Sxr3VVqw734WXFSroXWePLuJkuorD1dp2qRUzItOPzCPcMtcIOwPU9j5JxXFQr4njaWu1K_kdNfD0dtrqxgwtxKWoPWBr2vTXyTxgvcjssWbiVE563mrupP1A4wdM9WY1thpEyw424H1hd3mBj5tbO43L9Zwi9PpoZ6MCnwDzaxfGZs9ApZ-EaQUeOyRkwO89FdAHkncPn4gZVg6xjQCMT-Vzpx3eV2Xsju-OJ-" />
            <span class="absolute top-4 right-4 bg-primary/90 backdrop-blur-md text-white px-3 py-1 rounded-lg text-xs font-bold">وصفات صحية</span>
          </div>
          <div class="p-8 flex flex-col flex-grow">
            <div class="flex items-center gap-4 text-xs text-slate-400 mb-4">
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">calendar_today</span> 25 يونيو 2024</span>
              <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">schedule</span> 4 دقائق</span>
            </div>
            <h3 class="text-xl font-bold mb-4 dark:text-white leading-snug">بدائل صحية للمكونات التقليدية في المطبخ المصري</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">كيف تجعل المحشي والملوخية أكثر صحة بتبديلات بسيطة وذكية في المكونات.</p>

          </div>
        </div>
      </div>
      <p id="no-results" class="hidden text-center text-slate-400 py-16 text-lg">لا توجد مقالات في هذا القسم حالياً.</p>
    </div>
  </section>
  <section class="py-20 bg-primary">
    <div class="container mx-auto px-6">
      <div class="flex flex-col lg:flex-row items-center justify-between gap-12 bg-white/10 backdrop-blur-md p-10 md:p-16 rounded-[3rem] text-white">
        <div class="lg:w-1/2">
          <h2 class="text-3xl md:text-4xl font-black mb-4">انضم إلى مجتمعنا الصحي</h2>
          <p class="text-xl opacity-90">اشترك في نشرتنا البريدية لتصلك أحدث نصائح التغذية والوصفات الحصرية مباشرة إلى بريدك الإلكتروني.</p>
        </div>
        <div class="lg:w-1/2 w-full">
          <div id="sub-form-wrap">
            <div class="flex flex-col sm:flex-row gap-4">
              <input id="sub-email" class="flex-grow bg-white px-6 py-4 rounded-2xl text-slate-900 border-2 border-transparent focus:outline-none font-medium placeholder:text-slate-400" placeholder="بريدك الإلكتروني" type="email" />
              <button onclick="submitSubscribe()" class="bg-darkTeal text-white px-10 py-4 rounded-2xl font-black hover:scale-105 transition-transform">اشتراك</button>
            </div>
            <p id="sub-err" class="text-white/80 text-sm mt-2 hidden"></p>
          </div>
          <div id="sub-success" class="hidden flex items-center gap-3 bg-white/20 rounded-2xl px-6 py-4">
            <span class="material-symbols-outlined text-white text-3xl">mark_email_read</span>
            <p class="text-white font-bold">تم الاشتراك بنجاح! سنراسلك قريباً 🎉</p>
          </div>
          <p class="text-sm mt-4 opacity-70">نحن نحترم خصوصيتك، لا نرسل رسائل مزعجة.</p>
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
              <span class="material-symbols-outlined text-base">share</span>
            </button>
            <button onclick="openChatModal()" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-primary transition-colors text-white" title="تواصل معنا">
              <span class="material-symbols-outlined text-base">forum</span>
            </button>
          </div>
        </div>
        <div>
          <h5 class="text-white font-black text-xl mb-8">روابط سريعة</h5>
          <ul class="space-y-4">
            <li><a class="hover:text-primary transition-colors" href="{{ url('/') }}">الرئيسية</a></li>
            <li><a class="hover:text-primary transition-colors" href="{{ url('/aboutus') }}">من نحن</a></li>
            <li><a class="hover:text-primary transition-colors" href="{{ url('/services') }}">خدماتنا</a></li>
            <li><a class="hover:text-primary transition-colors" href="{{ url('/contactus') }}">اتصل بنا</a></li>
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
    <a href="{{ url('/services') }}" class="inline-block bg-primary hover:bg-emerald-600 text-white px-6 py-3 rounded-full font-bold transition-all">اكتشف المزيد</a>
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
    // ---- Article Filters ----
    const knownDomains = ['gmail.com', 'yahoo.com', 'yahoo.co.uk', 'hotmail.com', 'hotmail.co.uk', 'outlook.com', 'outlook.sa', 'live.com', 'icloud.com', 'me.com', 'mac.com', 'protonmail.com', 'proton.me', 'mail.com', 'aol.com', 'yandex.com', 'yandex.ru', 'gmx.com', 'zoho.com', 'msn.com'];

    function filterArticles(cat) {
      const cards = document.querySelectorAll('.article-card');
      const noRes = document.getElementById('no-results');
      let visible = 0;
      cards.forEach(card => {
        const show = cat === 'الكل' || card.dataset.cat === cat;
        card.style.display = show ? '' : 'none';
        if (show) visible++;
      });
      noRes.classList.toggle('hidden', visible > 0);
      document.querySelectorAll('.category-btn').forEach(btn => {
        btn.classList.toggle('active', btn.dataset.cat === cat);
        if (btn.dataset.cat === cat) {
          btn.classList.add('bg-primary', 'text-white');
          btn.classList.remove('bg-white', 'dark:bg-slate-800');
        } else {
          btn.classList.remove('bg-primary', 'text-white');
          btn.classList.add('bg-white', 'dark:bg-slate-800');
        }
      });
    }

    // ---- Email Subscription ----
    function validateEmail(val) {
      const parts = val.split('@');
      if (parts.length !== 2 || !parts[0]) return 'صيغة البريد غير صحيحة';
      if (!knownDomains.includes(parts[1].toLowerCase())) return 'يرجى استخدام دومين معروف مثل gmail.com أو outlook.com';
      return '';
    }

    const subEmailEl = document.getElementById('sub-email');
    subEmailEl.addEventListener('input', () => {
      const err = validateEmail(subEmailEl.value);
      subEmailEl.style.borderColor = subEmailEl.value ? (err ? '#ef4444' : '#10B981') : '';
      const errEl = document.getElementById('sub-err');
      if (err && subEmailEl.value) {
        errEl.textContent = err;
        errEl.classList.remove('hidden');
      } else {
        errEl.classList.add('hidden');
      }
    });

    function submitSubscribe() {
      const err = validateEmail(subEmailEl.value);
      const errEl = document.getElementById('sub-err');
      if (!subEmailEl.value) {
        errEl.textContent = 'يرجى إدخال بريدك الإلكتروني';
        errEl.classList.remove('hidden');
        return;
      }
      if (err) {
        errEl.textContent = err;
        errEl.classList.remove('hidden');
        return;
      }
      document.getElementById('sub-form-wrap').classList.add('hidden');
      document.getElementById('sub-success').classList.remove('hidden');
    }
  </script>
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
