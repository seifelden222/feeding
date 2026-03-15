<!DOCTYPE html>

<html dir="rtl" lang="ar">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..900&amp;family=Public+Sans:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#10b981", // Emerald green highlight
            "background-light": "#f8fdfb",
            "background-dark": "#06221a",
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
  </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <x-trainer-slider />

    <!-- Main Content -->
    <main class="flex-1 flex flex-col p-8 overflow-y-auto">
      <!-- Header -->
      <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
          <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">إدارة المتدربين</h2>
          <p class="text-slate-500 mt-1">تابع تقدم متدربيك وحفزهم للوصول لأهدافهم الصحية</p>
        </div>

      </header>
      <!-- Search and Filter -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 mb-8">
        <div class="lg:col-span-8 relative">
          <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
          <input id="userSearch" class="w-full pr-12 pl-4 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all shadow-sm text-sm" placeholder="ابحث عن متدرب بالاسم، الهدف أو التاريخ..." type="text" />
        </div>
        <div class="lg:col-span-4 flex gap-2 relative">
          <button id="filterBtn" class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all text-sm font-medium">
            <span class="material-symbols-outlined text-slate-500">filter_list</span>
            <span>تصفية</span>
          </button>
          <button id="gridToggleBtn" class="px-4 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all text-slate-500">
            <span class="material-symbols-outlined">grid_view</span>
          </button>
          <!-- Filter Popup -->
          <div id="filterPopup" class="hidden absolute top-14 right-0 z-50 w-64 bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-700 p-4">
            <p class="font-bold text-sm mb-3">تصفية حسب الهدف</p>
            <div class="space-y-2">
              <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="filter-check accent-emerald-500" value="فقدان وزن" checked><span class="text-sm">فقدان وزن</span></label>
              <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="filter-check accent-emerald-500" value="بناء عضلات" checked><span class="text-sm">بناء عضلات</span></label>
              <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="filter-check accent-emerald-500" value="تنشيف" checked><span class="text-sm">تنشيف</span></label>
            </div>
            <button id="applyFilter" class="mt-4 w-full bg-primary text-white py-2 rounded-xl text-sm font-bold">تطبيق</button>
          </div>
        </div>
      </div>
      <!-- Trainee Grid -->
      <div id="traineeGrid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <!-- Trainee Card 1 -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col gap-4 shadow-sm hover:shadow-md transition-shadow">
          <div class="flex items-start justify-between">
            <div class="flex items-center gap-4">
              <div class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-primary/10">
                <img alt="Trainee" class="w-full h-full object-cover" data-alt="Trainee profile photo smiling person" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDH7w2D-UDyo1ufV5-E8GqbmQkXT4929otlbmV4dLY8FH6mvPAbQlcWb9nyXqqnI-wCqY92BDiqZGTbb4QbkECQclMIbenfpOYC2Oj6cQbhCXXMe2BV4qYzABBi1L9fD14Ogp1rHVf6RaIyJ_sblP3bcvB07o1JNJ9sPFPjeQro0GLzcSCOpMM4MhtWb-4sFbG_-4vIss8EMyrgQEXq1mj7XviBHcYoknIED7PamlUH2rIp_sQxn_oU-VT-p0MmFyI5RcKF7sGsrnVG" />
              </div>
              <div>
                <h3 class="text-lg font-bold">محمد العتيبي</h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">فقدان وزن</span>
              </div>
            </div>
            <button class="text-slate-400 hover:text-primary">
              <span class="material-symbols-outlined">more_vert</span>
            </button>
          </div>
          <div class="space-y-2 mt-2">
            <div class="flex justify-between text-xs font-medium mb-1">
              <span>التقدم نحو الهدف</span>
              <span class="text-primary">75%</span>
            </div>
            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2">
              <div class="bg-primary h-2 rounded-full" style="width: 75%"></div>
            </div>
          </div>
          <div class="flex items-center justify-between py-3 border-t border-slate-100 dark:border-slate-800 mt-2">
            <div class="flex flex-col">
              <span class="text-[10px] text-slate-500 uppercase tracking-wider">آخر تحديث</span>
              <span class="text-sm font-medium">منذ ساعتين</span>
            </div>
            <button class="text-primary hover:bg-primary/10 px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-1 transition-colors">
              <span>عرض الملف</span>
              <span class="material-symbols-outlined text-sm">chevron_left</span>
            </button>
          </div>
        </div>
        <!-- Trainee Card 2 -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col gap-4 shadow-sm hover:shadow-md transition-shadow">
          <div class="flex items-start justify-between">
            <div class="flex items-center gap-4">
              <div class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-primary/10">
                <img alt="Trainee" class="w-full h-full object-cover" data-alt="Female trainee profile photo smiling" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBkvhMNEoXt1VqOYl4n2ehLIZ26Fsuey-hgGyhV1pxBn7M6k9cDaPN4WcDOP2X8Tum-eNCCDKXtGVzyi2kU-PG6sHIBetENQmzeegFGqd-_C0AXWWj4kM9lI5ROtecDJuoV-ymjUEsCFS6LZ_6h-fqimoyAfkEjEUWcRFmRFflEqh6Wgtfb7pQhSW13-I6zHZVXXevbQamwXlluNMgy1re0Thh2QFU3ocsnCxUOpDYz2V5KoQYgO2_fw4J7uD0gzAbpYYfj2dcJ_o0W" />
              </div>
              <div>
                <h3 class="text-lg font-bold">سارة المنصور</h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300">بناء عضلات</span>
              </div>
            </div>
            <button class="text-slate-400 hover:text-primary">
              <span class="material-symbols-outlined">more_vert</span>
            </button>
          </div>
          <div class="space-y-2 mt-2">
            <div class="flex justify-between text-xs font-medium mb-1">
              <span>التقدم نحو الهدف</span>
              <span class="text-primary">40%</span>
            </div>
            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2">
              <div class="bg-primary h-2 rounded-full" style="width: 40%"></div>
            </div>
          </div>
          <div class="flex items-center justify-between py-3 border-t border-slate-100 dark:border-slate-800 mt-2">
            <div class="flex flex-col">
              <span class="text-[10px] text-slate-500 uppercase tracking-wider">آخر تحديث</span>
              <span class="text-sm font-medium">أمس، 10:00 م</span>
            </div>
            <button class="text-primary hover:bg-primary/10 px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-1 transition-colors">
              <span>عرض الملف</span>
              <span class="material-symbols-outlined text-sm">chevron_left</span>
            </button>
          </div>
        </div>
        <!-- Trainee Card 3 -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col gap-4 shadow-sm hover:shadow-md transition-shadow">
          <div class="flex items-start justify-between">
            <div class="flex items-center gap-4">
              <div class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-primary/10">
                <img alt="Trainee" class="w-full h-full object-cover" data-alt="Young male trainee profile photo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBtanvL9QcdjjiR2lPBVyM2vNNYF-5PFY53lsiuggzHOMy_yZ_7qPQqFIhcP861-uS9IJi7IKSd4fg5tqOfpWq-ep-Y2PSwbBKqu5Ff5refop2EWHbjpY7JZE75Jfd3GPpuXuoqUVV2pWMJ3SM1dxaEQEUJ4V7A9jdsGbhUSZ47m9p-hpAYXcOhfixGXnaK3d9dXJMSAmF-rppPCFW1K9SU_5Dqsb3RLK1DN0gGnlEeVyCpkCicRnTAsq2G3vdLQ0MBYi7oPYKN_lOr" />
              </div>
              <div>
                <h3 class="text-lg font-bold">ياسر القحطاني</h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-300">تنشيف</span>
              </div>
            </div>
            <button class="text-slate-400 hover:text-primary">
              <span class="material-symbols-outlined">more_vert</span>
            </button>
          </div>
          <div class="space-y-2 mt-2">
            <div class="flex justify-between text-xs font-medium mb-1">
              <span>التقدم نحو الهدف</span>
              <span class="text-primary">92%</span>
            </div>
            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2">
              <div class="bg-primary h-2 rounded-full" style="width: 92%"></div>
            </div>
          </div>
          <div class="flex items-center justify-between py-3 border-t border-slate-100 dark:border-slate-800 mt-2">
            <div class="flex flex-col">
              <span class="text-[10px] text-slate-500 uppercase tracking-wider">آخر تحديث</span>
              <span class="text-sm font-medium">15 مايو 2024</span>
            </div>
            <button class="text-primary hover:bg-primary/10 px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-1 transition-colors">
              <span>عرض الملف</span>
              <span class="material-symbols-outlined text-sm">chevron_left</span>
            </button>
          </div>
        </div>
        <!-- Trainee Card 4 -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col gap-4 shadow-sm hover:shadow-md transition-shadow">
          <div class="flex items-start justify-between">
            <div class="flex items-center gap-4">
              <div class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-primary/10">
                <img alt="Trainee" class="w-full h-full object-cover" data-alt="Smiling trainee profile" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDojs6sEO-MlCixfI-V58XRA_owXwChdJ438V0O83LwwM_V-obJrnab_jAe5kxc5-xpisR8uBTIsgme_g_SWcsEfjlrNC2dti8dngWA8-iK6yaIGZyPOY_FQsu_YYk3fOlXV5yDWGzZHybMnQdYscksxp1UjThV370zAali3cEehiQA_uy9rgo6c9AK0kgKlpcC6Q2X5_jXHyVqCruFN6tZBEdM_yHzIW4Ob_HNKas7hyrgO6ZiOHObhJTjzgN4CLDRDWBb1MXXHmaG" />
              </div>
              <div>
                <h3 class="text-lg font-bold">ليلى حسن</h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">فقدان وزن</span>
              </div>
            </div>
            <button class="text-slate-400 hover:text-primary">
              <span class="material-symbols-outlined">more_vert</span>
            </button>
          </div>
          <div class="space-y-2 mt-2">
            <div class="flex justify-between text-xs font-medium mb-1">
              <span>التقدم نحو الهدف</span>
              <span class="text-primary">15%</span>
            </div>
            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2">
              <div class="bg-primary h-2 rounded-full" style="width: 15%"></div>
            </div>
          </div>
          <div class="flex items-center justify-between py-3 border-t border-slate-100 dark:border-slate-800 mt-2">
            <div class="flex flex-col">
              <span class="text-[10px] text-slate-500 uppercase tracking-wider">آخر تحديث</span>
              <span class="text-sm font-medium">منذ 3 أيام</span>
            </div>
            <button class="text-primary hover:bg-primary/10 px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-1 transition-colors">
              <span>عرض الملف</span>
              <span class="material-symbols-outlined text-sm">chevron_left</span>
            </button>
          </div>
        </div>
        <!-- Trainee Card 5 -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col gap-4 shadow-sm hover:shadow-md transition-shadow">
          <div class="flex items-start justify-between">
            <div class="flex items-center gap-4">
              <div class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-primary/10">
                <img alt="Trainee" class="w-full h-full object-cover" data-alt="Male trainee headshot" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAYGzMX27BPzEdZoB2UKOW_uc_OIhv_848WDt7i_u6fXDKzI0Wx8ryCK4wPKT1oDexb2343BAl_GcEHVPlAPfRxBUWluxlDvQIuGjrXTb_F3E47ABdDRzTqHepQ0XBBTY1bgvqQmWh6BVuG4NvYj58POsmQqTXG2gvy5OMnksLu6xUPq_SehV0JrIGBfgrURdPtWl9Vu_MuVGL-xi_rz69ZU0f1Tzn4bh1JC_LnObdOKHGatsD4Y8o5B0BbIrz9DeiBlEitXkI305ot" />
              </div>
              <div>
                <h3 class="text-lg font-bold">خالد محمود</h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300">بناء عضلات</span>
              </div>
            </div>
            <button class="text-slate-400 hover:text-primary">
              <span class="material-symbols-outlined">more_vert</span>
            </button>
          </div>
          <div class="space-y-2 mt-2">
            <div class="flex justify-between text-xs font-medium mb-1">
              <span>التقدم نحو الهدف</span>
              <span class="text-primary">60%</span>
            </div>
            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2">
              <div class="bg-primary h-2 rounded-full" style="width: 60%"></div>
            </div>
          </div>
          <div class="flex items-center justify-between py-3 border-t border-slate-100 dark:border-slate-800 mt-2">
            <div class="flex flex-col">
              <span class="text-[10px] text-slate-500 uppercase tracking-wider">آخر تحديث</span>
              <span class="text-sm font-medium">10 مايو 2024</span>
            </div>
            <button class="text-primary hover:bg-primary/10 px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-1 transition-colors">
              <span>عرض الملف</span>
              <span class="material-symbols-outlined text-sm">chevron_left</span>
            </button>
          </div>
        </div>
        <!-- Trainee Card 6 -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col gap-4 shadow-sm hover:shadow-md transition-shadow">
          <div class="flex items-start justify-between">
            <div class="flex items-center gap-4">
              <div class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-primary/10">
                <img alt="Trainee" class="w-full h-full object-cover" data-alt="Professional trainee profile photo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCujKMA1RoxYi7tBJjsgaZAGkkzecGJfF2bou4ya_Zx21MuVj2hqGiPl_u1fwlTyi3XmsrXw015YVMAVbJEie3UFJKRqEe0VNoF9OWiThtRz8JPqc8Gf2L-IicOkzsG0H-7RWNLxiL8MOBKP0lJEPg89mIoG5gy6ug0pqgVrZXo3rXdjiLFcQZ032jp8HoMV5UGYfXxK0tWumOZIMsLMFPbhp4VqkhWjb8SFYTPkeKmoIc7EoQWNbQev8rkDYjMHGa1aM6EtVYgNH3r" />
              </div>
              <div>
                <h3 class="text-lg font-bold">نورة العلي</h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-300">تنشيف</span>
              </div>
            </div>
            <button class="text-slate-400 hover:text-primary">
              <span class="material-symbols-outlined">more_vert</span>
            </button>
          </div>
          <div class="space-y-2 mt-2">
            <div class="flex justify-between text-xs font-medium mb-1">
              <span>التقدم نحو الهدف</span>
              <span class="text-primary">30%</span>
            </div>
            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2">
              <div class="bg-primary h-2 rounded-full" style="width: 30%"></div>
            </div>
          </div>
          <div class="flex items-center justify-between py-3 border-t border-slate-100 dark:border-slate-800 mt-2">
            <div class="flex flex-col">
              <span class="text-[10px] text-slate-500 uppercase tracking-wider">آخر تحديث</span>
              <span class="text-sm font-medium">منذ أسبوع</span>
            </div>
            <button class="text-primary hover:bg-primary/10 px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-1 transition-colors">
              <span>عرض الملف</span>
              <span class="material-symbols-outlined text-sm">chevron_left</span>
            </button>
          </div>
        </div>
      </div>
      <!-- Pagination -->
      <div class="flex items-center justify-center gap-2 mt-12 pb-8">
        <button class="w-10 h-10 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center justify-center hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-400">
          <span class="material-symbols-outlined">chevron_right</span>
        </button>
        <button class="w-10 h-10 rounded-xl bg-primary text-white font-bold">1</button>
        <button class="w-10 h-10 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center justify-center hover:bg-slate-50 dark:hover:bg-slate-800 font-medium">2</button>
        <button class="w-10 h-10 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center justify-center hover:bg-slate-50 dark:hover:bg-slate-800 font-medium">3</button>
        <span class="mx-1 text-slate-400">...</span>
        <button class="w-10 h-10 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center justify-center hover:bg-slate-50 dark:hover:bg-slate-800 font-medium">12</button>
        <button class="w-10 h-10 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center justify-center hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-400">
          <span class="material-symbols-outlined">chevron_left</span>
        </button>
      </div>
    </main>
  </div>
  <script>
    // ===== DATA from actual cards =====
    const grid = document.getElementById('traineeGrid');
    const allCards = [...grid.querySelectorAll(':scope > div')];

    // ===== LIVE SEARCH on actual card names & goals =====
    const userSearch = document.getElementById('userSearch');
    userSearch.addEventListener('input', () => {
      const q = userSearch.value.trim().toLowerCase();
      let visible = 0;
      allCards.forEach(card => {
        const name = card.querySelector('h3')?.textContent.toLowerCase() || '';
        const goal = card.querySelector('span.inline-flex')?.textContent.toLowerCase() || '';
        const show = !q || name.includes(q) || goal.includes(q);
        card.style.display = show ? '' : 'none';
        if (show) visible++;
      });
      // show empty state
      let empty = document.getElementById('emptyState');
      if (!visible) {
        if (!empty) {
          empty = document.createElement('div');
          empty.id = 'emptyState';
          empty.className = 'col-span-3 text-center py-16 text-slate-400';
          empty.innerHTML = '<span class="material-symbols-outlined text-5xl block mb-3">search_off</span><p class="font-bold">لا توجد نتائج لـ "' + userSearch.value + '"</p>';
          grid.appendChild(empty);
        }
      } else {
        empty?.remove();
      }
    });

    // ===== FILTER POPUP =====
    const filterBtn = document.getElementById('filterBtn');
    const filterPopup = document.getElementById('filterPopup');
    filterBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      filterPopup.classList.toggle('hidden');
    });
    document.getElementById('applyFilter').addEventListener('click', () => {
      const checked = [...document.querySelectorAll('.filter-check:checked')].map(c => c.value);
      let visible = 0;
      allCards.forEach(card => {
        const goal = card.querySelector('span.inline-flex')?.textContent.trim() || '';
        const show = checked.length === 0 || checked.some(c => goal.includes(c));
        card.style.display = show ? '' : 'none';
        if (show) visible++;
      });
      filterPopup.classList.add('hidden');
      showToast(`تم تطبيق الفلتر - ${visible} متدرب`);
    });

    // ===== GRID / LIST TOGGLE =====
    const gridToggleBtn = document.getElementById('gridToggleBtn');
    let isGrid = true;

    // save original card classes
    const originalCardClasses = allCards.map(c => c.className);

    gridToggleBtn.addEventListener('click', () => {
      isGrid = !isGrid;
      if (isGrid) {
        // restore grid
        grid.className = 'grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6';
        gridToggleBtn.querySelector('span').textContent = 'grid_view';
        allCards.forEach((card, i) => {
          card.className = originalCardClasses[i];
          // restore inner layout
          const imgWrap = card.querySelector('.w-16');
          if (imgWrap) {
            imgWrap.className = 'w-16 h-16 rounded-2xl overflow-hidden border-2 border-primary/10';
          }
          const progressSection = card.querySelector('.space-y-2');
          if (progressSection) progressSection.style.display = '';
          const footer = card.querySelector('.border-t');
          if (footer) footer.style.display = '';
        });
      } else {
        // switch to list
        grid.className = 'flex flex-col gap-3';
        gridToggleBtn.querySelector('span').textContent = 'view_list';
        allCards.forEach(card => {
          card.className = 'bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 px-5 py-4 flex flex-row items-center gap-5 shadow-sm hover:shadow-md transition-shadow';
          // shrink image
          const imgWrap = card.querySelector('.w-16');
          if (imgWrap) {
            imgWrap.className = 'w-12 h-12 rounded-xl overflow-hidden border-2 border-primary/10 shrink-0';
          }
          // hide progress bar & footer in list mode
          const progressSection = card.querySelector('.space-y-2');
          if (progressSection) progressSection.style.display = 'none';
          const footer = card.querySelector('.border-t');
          if (footer) footer.style.display = 'none';
          // show inline progress text
          const nameDiv = card.querySelector('h3')?.parentElement;
          if (nameDiv && !nameDiv.querySelector('.list-progress')) {
            const pct = card.querySelector('.text-primary')?.textContent || '';
            const goal = card.querySelector('span.inline-flex')?.textContent.trim() || '';
            const update = card.querySelectorAll('span.text-sm.font-medium')[0]?.textContent || '';
            const badge = document.createElement('div');
            badge.className = 'list-progress flex items-center gap-3 mt-1 text-xs text-slate-500';
            badge.innerHTML = `<span class="font-bold text-primary">${pct}</span><span>${goal}</span><span class="text-slate-300">|</span><span>${update}</span>`;
            nameDiv.appendChild(badge);
          }
          // push view button to end
          const viewBtnList = [...card.querySelectorAll('button')].find(b => b.textContent.includes('عرض الملف'));
          if (viewBtnList) {
            card.appendChild(viewBtnList);
            viewBtnList.classList.add('mr-auto', 'shrink-0');
          }
        });
      }
    });

    // ===== VIEW PROFILE MODAL =====
    allCards.forEach(card => {
      const viewBtn = [...card.querySelectorAll('button')].find(b => b.textContent.includes('عرض الملف'));
      const name = card.querySelector('h3')?.textContent || '';
      const goal = card.querySelector('span.inline-flex')?.textContent.trim() || '';
      const progress = card.querySelector('span.text-primary')?.textContent || '';
      const lastUpdate = card.querySelectorAll('span.text-sm.font-medium')[0]?.textContent || '';
      const img = card.querySelector('img')?.src || '';

      viewBtn?.addEventListener('click', () => {
        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4';
        modal.innerHTML = `
      <div class="bg-white dark:bg-slate-900 rounded-2xl w-full max-w-md shadow-2xl overflow-hidden">
        <div class="bg-primary/10 p-6 flex items-center gap-4">
          <img src="${img}" class="w-16 h-16 rounded-2xl object-cover border-2 border-primary/30"/>
          <div>
            <h3 class="text-xl font-bold">${name}</h3>
            <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-0.5 rounded-full">${goal}</span>
          </div>
          <button onclick="this.closest('.fixed').remove()" class="mr-auto text-slate-400 hover:text-slate-600">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
        <div class="p-6 space-y-3 text-sm">
          <div class="flex justify-between p-3 bg-slate-50 dark:bg-slate-800 rounded-xl"><span class="text-slate-500">الهدف</span><strong>${goal}</strong></div>
          <div class="flex justify-between p-3 bg-slate-50 dark:bg-slate-800 rounded-xl"><span class="text-slate-500">التقدم</span><strong class="text-primary">${progress}</strong></div>
          <div class="flex justify-between p-3 bg-slate-50 dark:bg-slate-800 rounded-xl"><span class="text-slate-500">آخر تحديث</span><strong>${lastUpdate}</strong></div>
          <div class="flex justify-between p-3 bg-slate-50 dark:bg-slate-800 rounded-xl"><span class="text-slate-500">الوزن</span><strong>85 كجم</strong></div>
          <div class="flex justify-between p-3 bg-slate-50 dark:bg-slate-800 rounded-xl"><span class="text-slate-500">مدة الاشتراك</span><strong>3 أشهر</strong></div>
        </div>
        <div class="px-6 pb-6 flex gap-3">
          <a href="messages.html" class="flex-1 bg-primary text-white py-3 rounded-xl font-bold text-center text-sm">مراسلة</a>
          <a href="plansmanage.html" class="flex-1 border border-primary text-primary py-3 rounded-xl font-bold text-center text-sm">تعديل الخطة</a>
        </div>
      </div>`;
        document.body.appendChild(modal);
        modal.addEventListener('click', e => {
          if (e.target === modal) modal.remove();
        });
      });

      // more_vert menu
      const moreBtn = card.querySelector('button .material-symbols-outlined') ? [...card.querySelectorAll('button')].find(b => b.querySelector('.material-symbols-outlined')?.textContent.trim() === 'more_vert') :
        null;
      moreBtn?.addEventListener('click', (e) => {
        e.stopPropagation();
        // remove any existing menus
        document.querySelectorAll('.ctx-menu').forEach(m => m.remove());
        const menu = document.createElement('div');
        menu.className = 'ctx-menu absolute left-0 top-8 z-50 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 dark:border-slate-700 w-44 overflow-hidden';
        menu.innerHTML = `
      <a href="messages.html" class="flex items-center gap-2 px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-700 text-sm"><span class="material-symbols-outlined text-sm">chat</span>مراسلة</a>
      <a href="plansmanage.html" class="flex items-center gap-2 px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-700 text-sm"><span class="material-symbols-outlined text-sm">restaurant_menu</span>تعديل الخطة</a>
      <button class="w-full flex items-center gap-2 px-4 py-3 hover:bg-red-50 text-red-500 text-sm" onclick="this.closest('.bg-white.dark\\\\:bg-slate-900').style.display='none';this.closest('.ctx-menu').remove();showToast('تم حذف المتدرب')"><span class="material-symbols-outlined text-sm">delete</span>حذف</button>`;
        moreBtn.style.position = 'relative';
        moreBtn.appendChild(menu);
        setTimeout(() => document.addEventListener('click', () => menu.remove(), {
          once: true
        }), 0);
      });
    });

    // ===== PAGINATION =====
    document.querySelectorAll('.flex.items-center.justify-center.gap-2 button').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.flex.items-center.justify-center.gap-2 button').forEach(b => {
          b.classList.remove('bg-primary', 'text-white');
          b.classList.add('border', 'border-slate-200');
        });
        btn.classList.add('bg-primary', 'text-white');
        btn.classList.remove('border', 'border-slate-200');
        showToast('الصفحة ' + (btn.textContent.trim() || ''));
      });
    });

    function showToast(msg) {
      const t = document.createElement('div');
      t.className = 'fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-6 py-3 rounded-xl shadow-xl text-sm font-bold z-50';
      t.textContent = msg;
      document.body.appendChild(t);
      setTimeout(() => t.remove(), 2500);
    }

    document.addEventListener('click', () => filterPopup.classList.add('hidden'));
    filterPopup.addEventListener('click', e => e.stopPropagation());
  </script>
</body>