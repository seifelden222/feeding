<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>اتصل بنا | NutriZone مصر</title>
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
            background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.9)), url('https://images.unsplash.com/photo-1557683316-973673baf926?q=80&w=2029&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
        .map-container {
            filter: grayscale(1) invert(0.9) sepia(0.5) hue-rotate(100deg) saturate(0.5);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 48;
        }
        details > summary::-webkit-details-marker {
            display: none;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-200">
  <x-landing-navbar />

  <section class="hero-overlay pt-48 pb-32 text-center text-white">
    <div class="container mx-auto px-6">
      <h1 class="text-5xl md:text-6xl font-black mb-6">اتصل بنا</h1>
      <div class="flex items-center justify-center gap-3 text-lg opacity-80">
        <a class="hover:text-primary transition-colors" href="{{ url('/') }}">الرئيسية</a>
        <span class="material-symbols-outlined text-sm">chevron_left</span>
        <span class="text-primary font-bold">اتصل بنا</span>
      </div>
    </div>
  </section>
  <section class="py-24 bg-white dark:bg-slate-900">
    <div class="container mx-auto px-6">
      <div class="flex flex-col lg:flex-row gap-16">
        <div class="w-full lg:w-1/3 space-y-8">
          <div>
            <h2 class="text-3xl font-black mb-4 dark:text-white">أهلاً بك في عالم الصحة</h2>
            <p class="text-slate-500 dark:text-slate-400 mb-8 leading-relaxed">
              نحن هنا للإجابة على جميع استفساراتكم في فرعنا بالقاهرة. تواصلوا معنا عبر القنوات المتاحة أو تفضلوا بزيارتنا في مقرنا بالمهندسين.
            </p>
          </div>
          <div class="space-y-6">
            <div class="flex items-start gap-6 p-6 bg-emerald-50 dark:bg-slate-800 rounded-[2rem] border border-emerald-100 dark:border-slate-700">
              <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-white">location_on</span>
              </div>
              <div>
                <h4 class="font-bold text-xl mb-1 dark:text-white">العنوان</h4>
                <p class="text-slate-600 dark:text-slate-400">15 شارع جامعة الدول العربية، المهندسين، الجيزة، مصر</p>
              </div>
            </div>
            <div class="flex items-start gap-6 p-6 bg-emerald-50 dark:bg-slate-800 rounded-[2rem] border border-emerald-100 dark:border-slate-700">
              <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-white">call</span>
              </div>
              <div>
                <h4 class="font-bold text-xl mb-1 dark:text-white">رقم الهاتف</h4>
                <p class="text-slate-600 dark:text-slate-400" dir="ltr">+20 2 3456789</p>
                <p class="text-slate-600 dark:text-slate-400" dir="ltr">+20 123 456 7890</p>
              </div>
            </div>
            <div class="flex items-start gap-6 p-6 bg-emerald-50 dark:bg-slate-800 rounded-[2rem] border border-emerald-100 dark:border-slate-700">
              <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-white">mail</span>
              </div>
              <div>
                <h4 class="font-bold text-xl mb-1 dark:text-white">البريد الإلكتروني</h4>
                <p class="text-slate-600 dark:text-slate-400">info@nutrizone.com.eg</p>
                <p class="text-slate-600 dark:text-slate-400">support@nutrizone.com.eg</p>
              </div>
            </div>
            <div class="flex items-start gap-6 p-6 bg-emerald-50 dark:bg-slate-800 rounded-[2rem] border border-emerald-100 dark:border-slate-700">
              <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-white">schedule</span>
              </div>
              <div>
                <h4 class="font-bold text-xl mb-1 dark:text-white">ساعات العمل</h4>
                <p class="text-slate-600 dark:text-slate-400">السبت - الخميس: 10:00 ص - 9:00 م</p>
                <p class="text-slate-600 dark:text-slate-400">الجمعة: مغلق</p>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full lg:w-2/3">
          <div class="bg-white dark:bg-slate-800 p-8 lg:p-12 rounded-[3rem] shadow-xl shadow-emerald-500/5 border border-gray-100 dark:border-gray-700">
            <form action="#" class="space-y-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                  <label class="block font-bold text-slate-700 dark:text-slate-300 mr-2">الاسم الكامل</label>
                  <input class="w-full px-6 py-4 rounded-2xl border-gray-100 dark:border-gray-700 dark:bg-slate-900 focus:ring-primary focus:border-primary transition-all" placeholder="أدخل اسمك هنا" type="text" />
                </div>
                <div class="space-y-2">
                  <label class="block font-bold text-slate-700 dark:text-slate-300 mr-2">البريد الإلكتروني</label>
                  <input class="w-full px-6 py-4 rounded-2xl border-gray-100 dark:border-gray-700 dark:bg-slate-900 focus:ring-primary focus:border-primary transition-all" placeholder="example@domain.com" type="email" />
                </div>
              </div>
              <div class="space-y-2">
                <label class="block font-bold text-slate-700 dark:text-slate-300 mr-2">الموضوع</label>
                <input class="w-full px-6 py-4 rounded-2xl border-gray-100 dark:border-gray-700 dark:bg-slate-900 focus:ring-primary focus:border-primary transition-all" placeholder="ما هو موضوع استفسارك؟" type="text" />
              </div>
              <div class="space-y-2">
                <label class="block font-bold text-slate-700 dark:text-slate-300 mr-2">الرسالة</label>
                <textarea class="w-full px-6 py-4 rounded-2xl border-gray-100 dark:border-gray-700 dark:bg-slate-900 focus:ring-primary focus:border-primary transition-all resize-none" placeholder="اكتب رسالتك بالتفصيل هنا..." rows="6"></textarea>
              </div>
              <button class="w-full bg-primary hover:bg-emerald-600 text-white py-5 rounded-2xl font-black text-lg transition-all transform hover:translate-y-[-2px] shadow-lg shadow-emerald-500/20 flex items-center justify-center gap-3" type="submit">
                <span class="material-symbols-outlined">send</span>
                إرسال الرسالة
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="w-full h-[450px] relative overflow-hidden bg-slate-100 dark:bg-slate-800">
    <div class="absolute inset-0 z-0 map-container">
      <iframe allowfullscreen="" height="100%" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13813.9723508498!2d31.1923186!3d30.0513943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14584128f785b96b%3A0xc3972685713c7a21!2sGamaet%20Al%20Dowal%20Al%20Arabiya%2C%20Al%20Agouzah%2C%20Giza%20Governorate!5e0!3m2!1sen!2seg!4v1715695000000!5m2!1sen!2seg" style="border:0;" width="100%"></iframe>
    </div>
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
      <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center shadow-2xl animate-pulse">
        <span class="material-symbols-outlined text-white text-3xl">location_on</span>
      </div>
    </div>
  </section>
  <section class="py-24 bg-background-light dark:bg-slate-900">
    <div class="container mx-auto px-6 max-w-4xl">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-black mb-6 dark:text-white">الأسئلة الشائعة</h2>
        <p class="text-lg text-slate-500 dark:text-slate-400">إليك بعض الإجابات السريعة على أكثر الأسئلة تكراراً لعملائنا في مصر</p>
      </div>
      <div class="space-y-4">
        <details class="group bg-white dark:bg-slate-800 rounded-3xl p-6 border border-gray-100 dark:border-gray-700 transition-all duration-300">
          <summary class="flex items-center justify-between cursor-pointer list-none font-bold text-xl dark:text-white">
            كيف يمكنني حجز موعد في فرع المهندسين؟
            <span class="material-symbols-outlined transition-transform group-open:rotate-180 text-primary">expand_more</span>
          </summary>
          <div class="pt-6 text-slate-600 dark:text-slate-400 leading-relaxed">
            يمكنك حجز موعد من خلال الضغط على زر "ابدأ رحلتك الآن" في الأعلى وتعبئة بياناتك، أو من خلال الاتصال بنا مباشرة عبر أرقام الهاتف المصرية الموضحة.
          </div>
        </details>
        <details class="group bg-white dark:bg-slate-800 rounded-3xl p-6 border border-gray-100 dark:border-gray-700 transition-all duration-300">
          <summary class="flex items-center justify-between cursor-pointer list-none font-bold text-xl dark:text-white">
            هل توفرون استشارات أونلاين داخل مصر؟
            <span class="material-symbols-outlined transition-transform group-open:rotate-180 text-primary">expand_more</span>
          </summary>
          <div class="pt-6 text-slate-600 dark:text-slate-400 leading-relaxed">
            نعم، نوفر خدمة الاستشارات عن بُعد عبر مكالمات الفيديو لعملائنا في جميع محافظات مصر، مع توفير خطط غذائية تتناسب مع طبيعة الأكل المصري الصحي.
          </div>
        </details>
        <details class="group bg-white dark:bg-slate-800 rounded-3xl p-6 border border-gray-100 dark:border-gray-700 transition-all duration-300">
          <summary class="flex items-center justify-between cursor-pointer list-none font-bold text-xl dark:text-white">
            ما هي طرق الدفع المتاحة؟
            <span class="material-symbols-outlined transition-transform group-open:rotate-180 text-primary">expand_more</span>
          </summary>
          <div class="pt-6 text-slate-600 dark:text-slate-400 leading-relaxed">
            نقبل الدفع النقدي في الفرع، والتحويلات البنكية، بالإضافة إلى الدفع عبر المحافظ الإلكترونية (فودافون كاش وغيرها) لسهولة التعامل.
          </div>
        </details>
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
