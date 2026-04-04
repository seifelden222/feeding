<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>خدماتنا | NutriZone مصر</title>
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
            background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.9)), url('https://images.unsplash.com/photo-1490645935967-10de6ba17061?q=80&w=2053&auto=format&fit=crop');
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
  <section class="hero-overlay pt-48 pb-32 text-center text-white">
    <div class="container mx-auto px-6">
      <h1 class="text-5xl md:text-6xl font-black mb-6">خدماتنا</h1>
      <div class="flex items-center justify-center gap-3 text-lg opacity-80">
        <a class="hover:text-primary transition-colors" href="{{ url('/') }}">الرئيسية</a>
        <span class="material-symbols-outlined text-sm">chevron_left</span>
        <span class="text-primary font-bold">خدماتنا</span>
      </div>
    </div>
  </section>
  <section class="py-24">
    <div class="container mx-auto px-6 text-center mb-16">
      <h2 class="text-4xl font-black mb-4 dark:text-white">برامج غذائية متكاملة في مصر</h2>
      <p class="text-slate-500 dark:text-slate-400 max-w-2xl mx-auto text-lg leading-relaxed">
        سواء كنت تفضل زيارة فرعنا في المهندسين أو الاشتراك أونلاين من أي مكان في مصر، نقدم لك حلولاً غذائية مبنية على أسس علمية لتصل إلى هدفك.
      </p>
    </div>
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="bg-white dark:bg-slate-800 p-8 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-50 dark:border-gray-700 group">
          <div class="w-16 h-16 bg-emerald-50 dark:bg-slate-700 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary transition-colors">
            <span class="material-symbols-outlined text-primary group-hover:text-white text-3xl">weight</span>
          </div>
          <h3 class="text-2xl font-bold mb-4 dark:text-white">تخسيس الوزن</h3>
          <p class="text-slate-500 dark:text-slate-400 leading-relaxed mb-6">برامج علمية مخصصة لفقدان الوزن بشكل صحي ومستدام، مع مراعاة طبيعة نمط الحياة المصري.</p>

        </div>
        <div class="bg-white dark:bg-slate-800 p-8 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-50 dark:border-gray-700 group">
          <div class="w-16 h-16 bg-emerald-50 dark:bg-slate-700 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary transition-colors">
            <span class="material-symbols-outlined text-primary group-hover:text-white text-3xl">fitness_center</span>
          </div>
          <h3 class="text-2xl font-bold mb-4 dark:text-white">بناء العضلات</h3>
          <p class="text-slate-500 dark:text-slate-400 leading-relaxed mb-6">تغذية متخصصة للرياضيين تهدف لزيادة الكتلة العضلية وتحسين الأداء البدني بأفضل المكملات والأطعمة.</p>

        </div>
        <div class="bg-white dark:bg-slate-800 p-8 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-50 dark:border-gray-700 group">
          <div class="w-16 h-16 bg-emerald-50 dark:bg-slate-700 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary transition-colors">
            <span class="material-symbols-outlined text-primary group-hover:text-white text-3xl">medical_services</span>
          </div>
          <h3 class="text-2xl font-bold mb-4 dark:text-white">التغذية العلاجية</h3>
          <p class="text-slate-500 dark:text-slate-400 leading-relaxed mb-6">خطط غذائية دقيقة لمرضى السكري، ضغط الدم، وتكيس المبايض تحت إشراف متخصصين.</p>

        </div>
        <div class="bg-white dark:bg-slate-800 p-8 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-50 dark:border-gray-700 group">
          <div class="w-16 h-16 bg-emerald-50 dark:bg-slate-700 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary transition-colors">
            <span class="material-symbols-outlined text-primary group-hover:text-white text-3xl">family_restroom</span>
          </div>
          <h3 class="text-2xl font-bold mb-4 dark:text-white">تغذية الأم والطفل</h3>
          <p class="text-slate-500 dark:text-slate-400 leading-relaxed mb-6">دعم غذائي متكامل خلال فترات الحمل والرضاعة، وبرامج نمو صحية للأطفال والمراهقين.</p>

        </div>
      </div>
    </div>
  </section>
  <section class="py-24 bg-darkTeal text-white overflow-hidden relative">
    <div class="container mx-auto px-6 relative z-10">
      <div class="text-center mb-20">
        <h2 class="text-4xl font-black mb-4">كيف نبدأ رحلتك؟</h2>
        <p class="text-slate-400 max-w-xl mx-auto">ثلاث خطوات بسيطة تفصلك عن الوصول إلى جسمك المثالي</p>
      </div>
      <div class="flex flex-col md:flex-row items-center justify-between gap-12 relative">
        <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 border-t-2 border-dashed border-primary/30 -z-10"></div>
        <div class="flex flex-col items-center text-center gap-6 bg-slate-800/50 p-8 rounded-3xl border border-slate-700 backdrop-blur-sm flex-1">
          <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center text-3xl font-black shadow-lg shadow-primary/20">١</div>
          <h4 class="text-2xl font-bold">التقييم الشامل</h4>
          <p class="text-slate-400">قياس مكونات الجسم (InBody) وتحليل عاداتك الغذائية الحالية.</p>
        </div>
        <div class="flex flex-col items-center text-center gap-6 bg-slate-800/50 p-8 rounded-3xl border border-slate-700 backdrop-blur-sm flex-1">
          <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center text-3xl font-black shadow-lg shadow-primary/20">٢</div>
          <h4 class="text-2xl font-bold">تصميم البرنامج</h4>
          <p class="text-slate-400">تصميم خطة غذائية ورياضية مفصلة تتناسب مع احتياجاتك وهدفك.</p>
        </div>
        <div class="flex flex-col items-center text-center gap-6 bg-slate-800/50 p-8 rounded-3xl border border-slate-700 backdrop-blur-sm flex-1">
          <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center text-3xl font-black shadow-lg shadow-primary/20">٣</div>
          <h4 class="text-2xl font-bold">المتابعة المستمرة</h4>
          <p class="text-slate-400">متابعة أسبوعية لتعديل الخطة والتحفيز المستمر لضمان النتائج.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="py-24">
    <div class="container mx-auto px-6">
      <div class="bg-gradient-to-l from-emerald-600 to-primary rounded-[3rem] p-8 md:p-16 text-white flex flex-col lg:flex-row items-center gap-12">
        <div class="lg:w-1/2">
          <span class="inline-block bg-white/20 px-4 py-1 rounded-full text-sm font-bold mb-6 backdrop-blur-md">الخدمة المميزة</span>
          <h2 class="text-4xl md:text-5xl font-black mb-8">الاشتراك الأونلاين (عبر مصر)</h2>
          <p class="text-xl mb-10 opacity-90 leading-relaxed">
            نوفر لك خبرتنا في جيبك! ابدأ رحلتك من أي محافظة في مصر مع متابعة احترافية عبر الواتساب وتطبيقاتنا الخاصة.
          </p>
          <ul class="space-y-4 mb-10">
            <li class="flex items-center gap-3">
              <span class="material-symbols-outlined bg-white/20 p-1 rounded-full text-sm">check</span>
              متابعة أسبوعية من خبراء التغذية
            </li>
            <li class="flex items-center gap-3">
              <span class="material-symbols-outlined bg-white/20 p-1 rounded-full text-sm">check</span>
              أنظمة غذائية مرنة تناسب الميزانية المصرية
            </li>
            <li class="flex items-center gap-3">
              <span class="material-symbols-outlined bg-white/20 p-1 rounded-full text-sm">check</span>
              رد سريع على كافة الاستفسارات
            </li>
          </ul>
          <button class="bg-white text-primary px-10 py-4 rounded-2xl font-black text-lg shadow-xl hover:scale-105 transition-transform">
            <a href="{{ route('register') }}">اشترك الآن أونلاين</a>
          </button>
        </div>
        <div class="lg:w-1/2 grid grid-cols-2 gap-4">
          <img alt="Healthy Food" class="rounded-3xl shadow-2xl transform translate-y-8" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcwFKKYLTZXygMHtkV5XojT5q7bz8x86imbYCYIydqbv1p0MVa-BD3E8HTfi0PhbQBORvd5qSqqJ0OPWfUMDplPxsWh1-Iluq3bXq3MPEv7C2DLCycO-qpNMgDi4gtSckv2N-yFqVMbSsBIABa4y1MuxvQ4N4e3jTMSqoHuyiwlPpshgL_C3f1yrMsurBgfUmhLpJJ7AgHwXk-FWEgSI-T8x4UKUQGbjPY_qza9ojLt4NUnviEmFytnGlpGRanIRtgWL7RWMCPniAs" />
          <img alt="Nutrition Progress" class="rounded-3xl shadow-2xl" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqgZmehEh63dVAMwAbvhHOeZLuT8WD4BARd1VkCWx4N6NWOFSASKPMLX7YqMi6XE6YiFeHrbKk8sfsdW0Tr3cvjonAsbZYu7gl-TXD1uQ5HhSoT74JnVlLV-2sg7yUnHvrpuYmitmsNbjP4OnXhLZ4ek1kJAqrqybKU4IlFCn3sMwIfexhTXWHndR3sQo0Q65d9e-RdhNIbLwGFW3kwlINuK4ovoc14EBwY7wPv7zjJHtqD07-taW6jBIuxkiu8Yle3scyKEq6gdQB" />
        </div>
      </div>
    </div>
  </section>
  <footer class="bg-slate-950 text-slate-300 pt-24 pb-12">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-20">
        <div class="col-span-1">
          <img src="{{ asset('img/logo.png') }}" alt="NutriZone" style="width: 250px;" class="mb-8">
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
  <div id="modal-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] hidden flex items-center justify-center p-4" onclick="closeAllModals()"></div>

  <div id="modal-service" class="fixed z-[101] hidden top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white dark:bg-slate-900 rounded-3xl shadow-2xl p-8 w-full max-w-md">
    <button onclick="closeAllModals()" class="absolute top-4 left-4 text-slate-400 hover:text-primary transition-colors">
      <span class="material-symbols-outlined text-3xl">close</span>
    </button>
    <div id="modal-service-icon" class="w-16 h-16 bg-emerald-50 dark:bg-emerald-900/30 text-primary rounded-2xl flex items-center justify-center mb-5"></div>
    <h3 id="modal-service-title" class="text-2xl font-black mb-3 dark:text-white"></h3>
    <p id="modal-service-desc" class="text-slate-600 dark:text-slate-400 leading-relaxed mb-6"></p>
    <a href="{{ route('services') }}" class="inline-block bg-primary hover:bg-emerald-600 text-white px-6 py-3 rounded-full font-bold transition-all">اكتشف المزيد</a>
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
