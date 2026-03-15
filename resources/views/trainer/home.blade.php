<!DOCTYPE html>

<html dir="rtl" lang="ar">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>لوحة تحكم نوتري زون - مدرب التغذية</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&amp;family=Public+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#10b981", // Emerald Green
            "background-light": "#f8fdfb",
            "background-dark": "#06130e",
          },
          fontFamily: {
            "display": ["Cairo", "Public Sans", "sans-serif"]
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

    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
  </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar Navigation -->
    <x-trainer-slider />
    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col overflow-y-auto bg-background-light dark:bg-background-dark">
      <!-- Header -->
      <header class="flex items-center justify-between px-8 py-5 bg-white dark:bg-background-dark/50 backdrop-blur-md sticky top-0 z-10 border-b border-slate-200 dark:border-slate-800">
        <div class="flex items-center gap-4">
          <h2 class="text-2xl font-bold">مرحباً كابتن سامر 👋</h2>
        </div>
        <div class="flex items-center gap-4">
          <div class="relative">
            <span class="material-symbols-outlined absolute right-3 top-2.5 text-slate-400">search</span>
            <input id="searchInput" class="pr-10 pl-4 py-2 bg-slate-100 dark:bg-slate-800 border-none rounded-xl focus:ring-2 focus:ring-primary w-64 text-sm transition-all" placeholder="البحث عن متدرب..." type="text" />
          </div>
          <button id="notifBtn" class="relative w-10 h-10 flex items-center justify-center rounded-xl bg-slate-100 dark:bg-slate-800 hover:bg-primary/10 hover:text-primary transition-colors">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-background-dark"></span>
          </button>
        </div>
      </header>

      <!-- Notifications Popup -->
      <div id="notifPopup" class="hidden fixed top-20 left-8 z-50 w-80 bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100 dark:border-slate-800">
          <h3 class="font-bold text-slate-900 dark:text-white">الإشعارات</h3>
          <span class="text-xs bg-red-100 text-red-600 font-bold px-2 py-0.5 rounded-full">3 جديد</span>
        </div>
        <div class="divide-y divide-slate-100 dark:divide-slate-800 max-h-72 overflow-y-auto">
          <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
            <div class="w-9 h-9 rounded-full bg-emerald-100 flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-primary text-sm">person_add</span></div>
            <div>
              <p class="text-sm font-medium">انضم متدرب جديد: <strong>فيصل الأحمد</strong></p>
              <p class="text-xs text-slate-400 mt-0.5">منذ 5 دقائق</p>
            </div>
          </div>
          <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
            <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-blue-500 text-sm">chat</span></div>
            <div>
              <p class="text-sm font-medium">رسالة جديدة من <strong>سارة خالد</strong></p>
              <p class="text-xs text-slate-400 mt-0.5">منذ 20 دقيقة</p>
            </div>
          </div>
          <div class="flex gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
            <div class="w-9 h-9 rounded-full bg-amber-100 flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-amber-500 text-sm">pending_actions</span></div>
            <div>
              <p class="text-sm font-medium">استفسار معلق من <strong>أحمد محمد</strong></p>
              <p class="text-xs text-slate-400 mt-0.5">منذ ساعة</p>
            </div>
          </div>
        </div>
        <div class="px-5 py-3 text-center border-t border-slate-100 dark:border-slate-800">
          <button class="text-primary text-sm font-bold hover:underline">عرض كل الإشعارات</button>
        </div>
      </div>

      <!-- Search Results Popup -->
      <div id="searchPopup" class="hidden fixed top-20 right-64 z-50 w-80 bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="px-5 py-3 border-b border-slate-100 dark:border-slate-800">
          <p class="text-xs text-slate-500 font-medium">نتائج البحث</p>
        </div>
        <div id="searchResults" class="divide-y divide-slate-100 dark:divide-slate-800 max-h-64 overflow-y-auto"></div>
      </div>
      <div class="p-8 space-y-8">
        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-100 dark:border-slate-700/50 shadow-sm flex flex-col gap-2">
            <div class="w-10 h-10 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 flex items-center justify-center mb-2">
              <span class="material-symbols-outlined">groups</span>
            </div>
            <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">إجمالي المتدربين</p>
            <div class="flex items-end justify-between">
              <h3 class="text-3xl font-bold">45</h3>
              <span class="text-xs font-bold text-emerald-500 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-1 rounded-full">+5%</span>
            </div>
          </div>
          <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-100 dark:border-slate-700/50 shadow-sm flex flex-col gap-2">
            <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-2">
              <span class="material-symbols-outlined">assignment</span>
            </div>
            <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">الخطط النشطة</p>
            <div class="flex items-end justify-between">
              <h3 class="text-3xl font-bold">38</h3>
              <span class="text-xs font-bold text-emerald-500 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-1 rounded-full">+2%</span>
            </div>
          </div>
          <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-100 dark:border-slate-700/50 shadow-sm flex flex-col gap-2">
            <div class="w-10 h-10 rounded-lg bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 flex items-center justify-center mb-2">
              <span class="material-symbols-outlined">pending_actions</span>
            </div>
            <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">الاستفسارات المعلقة</p>
            <div class="flex items-end justify-between">
              <h3 class="text-3xl font-bold">12</h3>
              <span class="text-xs font-bold text-amber-500 bg-amber-50 dark:bg-amber-900/20 px-2 py-1 rounded-full">تنبيه</span>
            </div>
          </div>
          <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-100 dark:border-slate-700/50 shadow-sm flex flex-col gap-2">
            <div class="w-10 h-10 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-2">
              <span class="material-symbols-outlined">payments</span>
            </div>
            <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">دخل الشهر الحالي</p>
            <div class="flex items-end justify-between">
              <h3 class="text-3xl font-bold">15,000 ج.م</h3>
              <span class="text-xs font-bold text-emerald-500 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-1 rounded-full">+12%</span>
            </div>
          </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          <!-- Upcoming Consultations -->
          <div class="lg:col-span-2 space-y-4">
            <div class="flex items-center justify-between">
              <h2 class="text-xl font-bold flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">event</span>
                الاستشارات القادمة
              </h2>
              <button class="text-primary text-sm font-bold hover:underline">عرض الكل</button>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-100 dark:border-slate-700/50 overflow-hidden">
              <div class="divide-y divide-slate-100 dark:divide-slate-700/50">
                <!-- Appointment 1 -->
                <div class="flex items-center justify-between p-4 hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-colors">
                  <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-cover bg-center" data-alt="Portrait of Ahmed Mohammed" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCljV2_pF9FlWMOCyN-iq_JEgMtB5zHMKoHoPYVv3H3JUfQpo-O4gNpkU-MQSchwwIIuHMPIqL-pf87mvtV9qmOas5ueSrP4TT3Jcqeokv0SdkgBW5aOWIduad84cWieYCwb08dU6NoDIoxr71HbomfXZKZMr6e3xKOFUvfnxlE4wOetUXQIrenwM4pw6Yjo68GNdA73AWt4D-3ovbP9j8L7q_oookrOfs1TtrGgVVqfIbiBhhMfgiirz98Vd5UmKlY6IlOepptq5Bn')"></div>
                    <div>
                      <p class="font-bold">أحمد محمد</p>
                      <p class="text-sm text-slate-500 flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">schedule</span>
                        اليوم - 10:30 صباحاً
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full">استشارة أولية</span>
                    <button class="bg-primary text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-emerald-600 transition-colors">انضم للجلسة</button>
                  </div>
                </div>
                <!-- Appointment 2 -->
                <div class="flex items-center justify-between p-4 hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-colors">
                  <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-cover bg-center" data-alt="Portrait of Sarah Ali" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAdTUwQgYk1jcVkC3UoIat9sEdtIXDI8cOtis9F0lHdGchry38Wceu2LBBJHIaJmJIf0FCj6wpY025XPCdOx9KEnjDyWPEDTLIt2x4v7Y19wF6nbO3sA6hE-EprKk7BKTIJJ8fDg121LTbs-hh_bU3Qf602lvCAlQBiSW_C5a-9_8V1wjrJ0ceH3uMnmubdRPkFj63G1GcJfZEWgaE7djZHisYl1N4YggQ5XHtymMgLqq6EHgytOf_91wjgK2kjE9RlB1KlPArnbKfe')"></div>
                    <div>
                      <p class="font-bold">سارة علي</p>
                      <p class="text-sm text-slate-500 flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">schedule</span>
                        اليوم - 01:00 مساءً
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="px-3 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs font-bold rounded-full">متابعة أسبوعية</span>
                    <button class="bg-slate-100 dark:bg-slate-700 text-slate-400 px-4 py-2 rounded-xl text-sm font-bold cursor-not-allowed">انتظار</button>
                  </div>
                </div>
                <!-- Appointment 3 -->
                <div class="flex items-center justify-between p-4 hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-colors">
                  <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-cover bg-center" data-alt="Portrait of Khalid Fahd" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD3mn87tA6urx_dYBLXM0IsWmNVHtuoORc43Cfjvbaoq-Z6UtufbPgmXTJkssTyPK3StbrSI1JDL8yXf0N_iUwr4oIVwg_V2H8dT3PsUBmIU0MD-zNR37imk2fl0OT8fZTekGfDf5hJpDz_Xwf2jdhfTswDFPAH_xVY_f1Hw4sT1UGkWynTTfg5SJDSYejC82Fk3xlw2avdli_6kVpKD9O90IVzaR_g5lBGn88Hbe8P3vcR3Kg8zsytP4Dy1virVhC-WKbD2CuaT9GO')"></div>
                    <div>
                      <p class="font-bold">خالد فهد</p>
                      <p class="text-sm text-slate-500 flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">schedule</span>
                        غداً - 11:00 صباحاً
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full">تعديل خطة</span>
                    <button class="bg-slate-100 dark:bg-slate-700 text-slate-400 px-4 py-2 rounded-xl text-sm font-bold cursor-not-allowed">انتظار</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Recent Activity -->
          <div class="space-y-4">
            <div class="flex items-center justify-between">
              <h2 class="text-xl font-bold flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">history</span>
                النشاط الأخير
              </h2>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-100 dark:border-slate-700/50 p-6">
              <div class="relative space-y-6 before:absolute before:right-6 before:top-2 before:bottom-2 before:w-0.5 before:bg-slate-100 dark:before:bg-slate-700">
                <!-- Activity 1 -->
                <div class="relative flex gap-4 pr-10">
                  <div class="absolute right-4 top-1 w-4 h-4 rounded-full bg-emerald-500 border-4 border-white dark:border-slate-800 z-10"></div>
                  <div>
                    <p class="text-sm leading-relaxed">قام <strong>ياسر القحطاني</strong> بتحديث وزنه الحالي: <strong>84 كجم</strong> (نقص 1.5 كجم).</p>
                    <p class="text-xs text-slate-400 mt-1">منذ 10 دقائق</p>
                  </div>
                </div>
                <!-- Activity 2 -->
                <div class="relative flex gap-4 pr-10">
                  <div class="absolute right-4 top-1 w-4 h-4 rounded-full bg-primary border-4 border-white dark:border-slate-800 z-10"></div>
                  <div>
                    <p class="text-sm leading-relaxed">سجلت <strong>مريم عبدالله</strong> وجبة الإفطار: "شوفان بالفواكه والمكسرات".</p>
                    <p class="text-xs text-slate-400 mt-1">منذ 45 دقيقة</p>
                  </div>
                </div>
                <!-- Activity 3 -->
                <div class="relative flex gap-4 pr-10">
                  <div class="absolute right-4 top-1 w-4 h-4 rounded-full bg-blue-500 border-4 border-white dark:border-slate-800 z-10"></div>
                  <div>
                    <p class="text-sm leading-relaxed">أكمل <strong>فهد الجاسم</strong> جميع تمارين اليوم بنجاح.</p>
                    <p class="text-xs text-slate-400 mt-1">منذ ساعتين</p>
                  </div>
                </div>
                <!-- Activity 4 -->
                <div class="relative flex gap-4 pr-10">
                  <div class="absolute right-4 top-1 w-4 h-4 rounded-full bg-amber-500 border-4 border-white dark:border-slate-800 z-10"></div>
                  <div>
                    <p class="text-sm leading-relaxed">أضافت <strong>نورة سالم</strong> ملاحظة جديدة حول شعورها بالتعب المستمر.</p>
                    <p class="text-xs text-slate-400 mt-1">منذ 4 ساعات</p>
                  </div>
                </div>
              </div>
              <button class="w-full mt-6 py-2 text-sm font-bold text-slate-500 hover:text-primary transition-colors flex items-center justify-center gap-2 bg-slate-50 dark:bg-slate-900/40 rounded-xl">
                <span>عرض المزيد من الأنشطة</span>
                <span class="material-symbols-outlined text-base">expand_more</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script>
    // ===== NOTIFICATIONS =====
    const notifBtn = document.getElementById('notifBtn');
    const notifPopup = document.getElementById('notifPopup');
    notifBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      notifPopup.classList.toggle('hidden');
      searchPopup.classList.add('hidden');
    });
    // Mark notification as read on click
    notifPopup.querySelectorAll('.divide-y > div').forEach(item => {
      item.addEventListener('click', () => {
        item.style.opacity = '0.5';
        item.querySelector('p')?.classList.add('line-through');
        // reduce badge count
        const badge = notifPopup.querySelector('.bg-red-100');
        if (badge) {
          let count = parseInt(badge.textContent) - 1;
          badge.textContent = count > 0 ? count + ' جديد' : 'لا يوجد';
          if (count <= 0) badge.classList.replace('bg-red-100', 'bg-slate-100'), badge.classList.replace('text-red-600', 'text-slate-500');
          // update dot on bell
          if (count <= 0) notifBtn.querySelector('.bg-red-500')?.remove();
        }
      });
    });

    // ===== SEARCH (filters actual appointment rows) =====
    const searchInput = document.getElementById('searchInput');
    const searchPopup = document.getElementById('searchPopup');
    const searchResults = document.getElementById('searchResults');

    // collect real appointment rows
    const appointmentRows = document.querySelectorAll('.divide-y.divide-slate-100 > div');

    searchInput.addEventListener('input', () => {
      const q = searchInput.value.trim();
      if (!q) {
        searchPopup.classList.add('hidden');
        appointmentRows.forEach(r => r.style.display = '');
        return;
      }
      // filter appointment rows live
      let found = 0;
      appointmentRows.forEach(row => {
        const name = row.querySelector('p.font-bold')?.textContent || '';
        const type = row.querySelector('span.rounded-full')?.textContent || '';
        if (name.includes(q) || type.includes(q)) {
          row.style.display = '';
          found++;
        } else {
          row.style.display = 'none';
        }
      });
      // also show dropdown with matches
      const matches = [...appointmentRows].filter(r => r.style.display !== 'none');
      if (!matches.length) {
        searchResults.innerHTML = '<p class="text-center text-slate-400 text-sm py-6">لا توجد نتائج</p>';
      } else {
        searchResults.innerHTML = matches.map(r => {
          const name = r.querySelector('p.font-bold')?.textContent || '';
          const type = r.querySelector('span.rounded-full')?.textContent || '';
          return `<div class="flex items-center gap-3 px-5 py-3 hover:bg-slate-50 cursor-pointer" onclick="document.getElementById('searchInput').value='';document.getElementById('searchPopup').classList.add('hidden');document.querySelectorAll('.divide-y.divide-slate-100 > div').forEach(x=>x.style.display='')">
        <span class="material-symbols-outlined text-primary text-sm">person</span>
        <div><p class="text-sm font-bold">${name}</p><p class="text-xs text-slate-400">${type}</p></div>
      </div>`;
        }).join('');
      }
      searchPopup.classList.remove('hidden');
    });

    // ===== JOIN SESSION =====
    document.querySelectorAll('button').forEach(btn => {
      if (btn.textContent.trim() === 'انضم للجلسة') {
        btn.addEventListener('click', () => {
          btn.textContent = '✓ انضممت';
          btn.classList.replace('bg-primary', 'bg-emerald-700');
          btn.disabled = true;
          showToast('✅ تم الانضمام للجلسة بنجاح');
        });
      }
    });

    // ===== LOAD MORE ACTIVITIES =====
    const activitiesContainer = document.querySelector('.relative.space-y-6');
    const moreBtn = document.querySelector('button.w-full.mt-6');
    const extraActivities = [{
        color: 'bg-purple-500',
        text: 'طلب <strong>فيصل الأحمد</strong> تعديل خطة التغذية الأسبوعية.',
        time: 'منذ 5 ساعات'
      },
      {
        color: 'bg-red-400',
        text: 'أبلغت <strong>رنا محمد</strong> عن صعوبة في الالتزام بوجبة العشاء.',
        time: 'منذ 6 ساعات'
      },
      {
        color: 'bg-teal-500',
        text: 'حقق <strong>سامي العمري</strong> هدف الوزن الشهري بنجاح 🎉',
        time: 'منذ 8 ساعات'
      },
    ];
    let extraLoaded = false;
    moreBtn?.addEventListener('click', () => {
      if (extraLoaded) return;
      extraLoaded = true;
      extraActivities.forEach(a => {
        const div = document.createElement('div');
        div.className = 'relative flex gap-4 pr-10';
        div.innerHTML = `<div class="absolute right-4 top-1 w-4 h-4 rounded-full ${a.color} border-4 border-white dark:border-slate-800 z-10"></div>
      <div><p class="text-sm leading-relaxed">${a.text}</p><p class="text-xs text-slate-400 mt-1">${a.time}</p></div>`;
        activitiesContainer.insertBefore(div, moreBtn.parentElement);
      });
      moreBtn.textContent = 'لا يوجد المزيد';
      moreBtn.disabled = true;
      moreBtn.classList.add('opacity-50');
    });

    // ===== CLOSE POPUPS =====
    document.addEventListener('click', () => {
      notifPopup.classList.add('hidden');
      searchPopup.classList.add('hidden');
    });
    [notifPopup, searchPopup, searchInput].forEach(el => el.addEventListener('click', e => e.stopPropagation()));

    function showToast(msg) {
      const t = document.createElement('div');
      t.className = 'fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-6 py-3 rounded-xl shadow-xl text-sm font-bold z-50';
      t.textContent = msg;
      document.body.appendChild(t);
      setTimeout(() => t.remove(), 2500);
    }
  </script>
</body>