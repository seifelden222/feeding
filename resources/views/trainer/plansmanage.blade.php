<!DOCTYPE html>

<html dir="rtl" lang="ar">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&amp;family=Public+Sans:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#10b981", // Emerald Green as requested
            "background-light": "#f8f6f6",
            "background-dark": "#064e3b",
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
    <main class="flex-1 flex flex-col overflow-hidden">
      <!-- Header -->
      <header class="h-16 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-8 shrink-0">
        <div class="flex items-center gap-4">
          <h2 class="text-xl font-bold">بناء الخطة المخصصة</h2>
        </div>
        <div class="flex items-center gap-4">
          <div class="relative">
            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
            <input id="planSearch" class="pr-10 pl-4 py-2 bg-slate-100 dark:bg-slate-800 border-none rounded-xl focus:ring-2 focus:ring-primary w-64 text-sm" placeholder="بحث..." type="text" />
          </div>
          <button id="saveTemplateBtn" class="bg-primary text-white px-6 py-2 rounded-xl text-sm font-bold hover:bg-primary/90 flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">save</span>
            حفظ كقالب
          </button>
          <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700" data-alt="User profile avatar circle"></div>
        </div>
      </header>

      <!-- Search Results Popup -->
      <div id="planSearchPopup" class="hidden fixed top-16 right-64 z-50 w-72 bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="px-5 py-3 border-b border-slate-100 dark:border-slate-800">
          <p class="text-xs text-slate-500 font-medium">نتائج البحث</p>
        </div>
        <div id="planSearchResults" class="max-h-56 overflow-y-auto"></div>
      </div>

      <!-- Previous Plans Modal -->
      <div id="prevPlansModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-900 rounded-2xl w-full max-w-lg shadow-2xl overflow-hidden">
          <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 dark:border-slate-800">
            <h3 class="text-lg font-bold">الخطط السابقة</h3>
            <button onclick="document.getElementById('prevPlansModal').classList.add('hidden')" class="text-slate-400 hover:text-slate-600"><span class="material-symbols-outlined">close</span></button>
          </div>
          <div class="divide-y divide-slate-100 dark:divide-slate-800 max-h-80 overflow-y-auto">
            <div class="flex items-center justify-between px-6 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
              <div>
                <p class="font-bold text-sm">خطة فقدان الوزن - أحمد محمد</p>
                <p class="text-xs text-slate-400 mt-0.5">1850 سعرة | 160ج بروتين</p>
              </div>
              <span class="text-xs text-slate-400">15 مايو 2024</span>
            </div>
            <div class="flex items-center justify-between px-6 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
              <div>
                <p class="font-bold text-sm">خطة بناء العضلات - سارة علي</p>
                <p class="text-xs text-slate-400 mt-0.5">2200 سعرة | 200ج بروتين</p>
              </div>
              <span class="text-xs text-slate-400">10 مايو 2024</span>
            </div>
            <div class="flex items-center justify-between px-6 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
              <div>
                <p class="font-bold text-sm">خطة التنشيف - خالد حسن</p>
                <p class="text-xs text-slate-400 mt-0.5">1600 سعرة | 180ج بروتين</p>
              </div>
              <span class="text-xs text-slate-400">5 مايو 2024</span>
            </div>
            <div class="flex items-center justify-between px-6 py-4 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer">
              <div>
                <p class="font-bold text-sm">خطة الصيانة - أحمد محمد</p>
                <p class="text-xs text-slate-400 mt-0.5">2000 سعرة | 150ج بروتين</p>
              </div>
              <span class="text-xs text-slate-400">1 مايو 2024</span>
            </div>
          </div>
          <div class="px-6 py-4 border-t border-slate-100 dark:border-slate-800 text-center">
            <p class="text-xs text-slate-400">اضغط على خطة لتحميلها في المحرر</p>
          </div>
        </div>
      </div>

      <!-- Preview Modal -->
      <div id="previewModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-900 rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden">
          <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 dark:border-slate-800">
            <h3 class="text-lg font-bold">معاينة الخطة الغذائية</h3>
            <button onclick="document.getElementById('previewModal').classList.add('hidden')" class="text-slate-400 hover:text-slate-600"><span class="material-symbols-outlined">close</span></button>
          </div>
          <div id="previewContent" class="p-6 max-h-[70vh] overflow-y-auto space-y-4"></div>
          <div class="px-6 py-4 border-t border-slate-100 dark:border-slate-800 flex gap-3">
            <button onclick="document.getElementById('previewModal').classList.add('hidden')" class="flex-1 border border-slate-200 dark:border-slate-700 py-3 rounded-xl font-bold text-sm text-slate-600 dark:text-slate-400">إغلاق</button>
            <button onclick="document.getElementById('publishPlanBtn').click();document.getElementById('previewModal').classList.add('hidden')" class="flex-1 bg-primary text-white py-3 rounded-xl font-bold text-sm">نشر الخطة</button>
          </div>
        </div>
      </div>
      <div id="saveModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-8 w-full max-w-sm shadow-2xl">
          <h3 class="text-xl font-bold mb-4">حفظ كقالب</h3>
          <input id="templateName" type="text" placeholder="اسم القالب..." class="w-full border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-sm mb-4 focus:ring-2 focus:ring-primary outline-none dark:bg-slate-800" />
          <div class="flex gap-3">
            <button id="confirmSave" class="flex-1 bg-primary text-white py-3 rounded-xl font-bold">حفظ</button>
            <button id="cancelSave" class="flex-1 border border-slate-200 dark:border-slate-700 py-3 rounded-xl font-bold text-slate-600 dark:text-slate-400">إلغاء</button>
          </div>
        </div>
      </div>
      <!-- Split Screen Container -->
      <div class="flex-1 flex overflow-hidden">
        <!-- Left Side: Select Trainee (30%) -->
        <section class="w-80 border-l border-slate-200 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-900/50 flex flex-col">
          <div class="p-6">
            <h3 class="font-bold text-slate-700 dark:text-slate-300 mb-4 flex items-center gap-2">
              <span class="material-symbols-outlined text-primary">person_search</span>
              اختر المتدرب
            </h3>
            <div class="space-y-3 overflow-y-auto">
              <!-- Trainee Card Active -->
              <div class="p-4 bg-white dark:bg-slate-800 border-2 border-primary rounded-xl shadow-sm cursor-pointer">
                <div class="flex items-center gap-3">
                  <div class="w-12 h-12 rounded-full bg-slate-100 dark:bg-slate-700 overflow-hidden">
                    <img alt="Trainee Avatar" data-alt="Portrait of Ahmed, a fit male trainee" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDSqHDY61Z6hfNH949yxpp320v0IzISQOyHQexb6Nl80dNTxCreCUWosw6DUMoIno0FxtuKnfaVBjDqQZh-TL7pgiVEPwxVj6WM7gtNKh5KcFv8cDUbomWBQoN1zNvwdkazeNlfHahhQbQTLM4P1MFvg4oFiOEZTdlW-CzMnwpWvUa74A1AJkyLkUJ6xcm44UYppbuuGXm-K_jnRNPPUKB7DMAYjCDOtbtlyIDOGVZehSBFvsnWmd-OMbZUfcykN1AraHVIeBortmGB" />
                  </div>
                  <div>
                    <h4 class="font-bold text-sm">أحمد محمد</h4>
                    <p class="text-xs text-slate-500">خسارة وزن - المستوى 2</p>
                  </div>
                </div>
                <div class="mt-3 grid grid-cols-2 gap-2 text-[10px] text-slate-500 uppercase tracking-wider">
                  <div class="bg-slate-100 dark:bg-slate-700 p-1 rounded text-center">85 كجم</div>
                  <div class="bg-slate-100 dark:bg-slate-700 p-1 rounded text-center">180 سم</div>
                </div>
              </div>
              <!-- Trainee Card -->
              <div class="p-4 bg-white dark:bg-slate-800 border border-transparent hover:border-slate-200 dark:hover:border-slate-700 rounded-xl cursor-pointer transition-all">
                <div class="flex items-center gap-3">
                  <div class="w-12 h-12 rounded-full bg-slate-100 dark:bg-slate-700 overflow-hidden">
                    <img alt="Trainee Avatar" data-alt="Portrait of Sara, a female fitness trainee" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCa7jb4FSaxwwKETrFjaTXVe7CF860CCZYx5AUtqbnbca5zpywW9yqDqeHTDOTaODLHj879uAX9btvSmkkWohcGz4jIsnwsw50KYNIbxNwmhnME94Og2vDpMZM3juCoBUlGrroOUXa0C8M481hrt6C60uhyr-umTFKXfe5kU5sOqrCDdFBFbrlvybAG0DBvimg1ye8IjpmVg4h9weAY4NDO0isFE7hMGs23ZInad0XLPiXmGWjuUgEB91FLLjzxl7_dlUEjLe5NKUuC" />
                  </div>
                  <div>
                    <h4 class="font-bold text-sm">سارة علي</h4>
                    <p class="text-xs text-slate-500">بناء عضلات - المستوى 1</p>
                  </div>
                </div>
              </div>
              <!-- Trainee Card -->
              <div class="p-4 bg-white dark:bg-slate-800 border border-transparent hover:border-slate-200 dark:hover:border-slate-700 rounded-xl cursor-pointer transition-all">
                <div class="flex items-center gap-3">
                  <div class="w-12 h-12 rounded-full bg-slate-100 dark:bg-slate-700 overflow-hidden">
                    <img alt="Trainee Avatar" data-alt="Portrait of Khaled, a middle-aged male trainee" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCJeoXZjGHiVwN-6VM9IM4Wb-IXLTa6Yp88c1SitEPc33E1hweQkRcO1Lu6h2SHMiDbiYvrT9M4B_afnEZx05lphCKklYnjNiB3s_Q-LSyF3zktm_JGMlkDypA3QzGujziMLofJKB7xK9wzEZqIXgMKnoPtDbAPnleEsoExTPzx249Qm7JOgF9RTmpgvdnowCAsINfKeo_BFHwVUPsfUrCDiqzr-C-PymyjIbfgirOut2vhj37XHhTfgtRwmdJIIidSGa2XKmOc5j2b" />
                  </div>
                  <div>
                    <h4 class="font-bold text-sm">خالد حسن</h4>
                    <p class="text-xs text-slate-500">تنشيف - المستوى 3</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Right Side: Plan Builder (70%) -->
        <section class="flex-1 overflow-y-auto bg-white dark:bg-background-dark p-8">
          <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between mb-8">
              <div>
                <h3 class="text-2xl font-bold mb-1">تصميم النظام الغذائي</h3>
                <p class="text-slate-500">قم بإضافة الوجبات والمكونات بدقة للمتدرب</p>
              </div>
              <div class="flex gap-2">
                <button id="prevPlansBtn" class="px-4 py-2 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-bold text-sm flex items-center gap-2">
                  <span class="material-symbols-outlined text-sm">history</span>
                  الخطط السابقة
                </button>
                <button id="addDayBtn" class="px-4 py-2 rounded-xl bg-primary/10 text-primary font-bold text-sm flex items-center gap-2 border border-primary/20">
                  <span class="material-symbols-outlined text-sm">add</span>
                  إضافة يوم جديد
                </button>
              </div>
            </div>
            <!-- Meal Sections Container -->
            <div class="space-y-6">
              <!-- Breakfast Section -->
              <div class="bg-slate-50 dark:bg-slate-800/40 rounded-2xl p-6 border border-slate-100 dark:border-slate-800">
                <div class="flex items-center justify-between mb-4">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-orange-100 dark:bg-orange-900/30 text-orange-600 flex items-center justify-center">
                      <span class="material-symbols-outlined">light_mode</span>
                    </div>
                    <h4 class="font-bold text-lg">الإفطار</h4>
                  </div>
                  <div class="flex gap-4 text-sm font-medium text-slate-500">
                    <span>450 سعرة</span>
                    <span>35 ج بروتين</span>
                  </div>
                </div>
                <div class="grid grid-cols-12 gap-4 items-end">
                  <div class="col-span-4">
                    <label class="block text-xs font-bold text-slate-400 mb-1">اسم الوجبة</label>
                    <input class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" type="text" value="شوفان بالموز والمكسرات" />
                  </div>
                  <div class="col-span-2">
                    <label class="block text-xs font-bold text-slate-400 mb-1">السعرات</label>
                    <input class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" type="number" value="450" />
                  </div>
                  <div class="col-span-2">
                    <label class="block text-xs font-bold text-slate-400 mb-1">الماكروز (P/C/F)</label>
                    <input class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" placeholder="30/50/10" type="text" />
                  </div>
                  <div class="col-span-4 flex gap-2">
                    <div class="flex-1">
                      <label class="block text-xs font-bold text-slate-400 mb-1">المكونات</label>
                      <input class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" placeholder="مثلاً: 50ج شوفان، 1 موز..." type="text" />
                    </div>
                    <button class="bg-slate-200 dark:bg-slate-700 p-2 rounded-lg text-slate-600 dark:text-slate-300">
                      <span class="material-symbols-outlined">delete</span>
                    </button>
                  </div>
                </div>
              </div>
              <!-- Lunch Section -->
              <div class="bg-slate-50 dark:bg-slate-800/40 rounded-2xl p-6 border border-slate-100 dark:border-slate-800">
                <div class="flex items-center justify-between mb-4">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 flex items-center justify-center">
                      <span class="material-symbols-outlined">wb_sunny</span>
                    </div>
                    <h4 class="font-bold text-lg">الغداء</h4>
                  </div>
                  <div class="flex gap-4 text-sm font-medium text-slate-500">
                    <span>0 سعرة</span>
                    <span>0 ج بروتين</span>
                  </div>
                </div>
                <div class="grid grid-cols-12 gap-4 items-end">
                  <div class="col-span-4">
                    <label class="block text-xs font-bold text-slate-400 mb-1">اسم الوجبة</label>
                    <input class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" placeholder="مثلاً: صدر دجاج مع أرز" type="text" />
                  </div>
                  <div class="col-span-2">
                    <label class="block text-xs font-bold text-slate-400 mb-1">السعرات</label>
                    <input class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" type="number" />
                  </div>
                  <div class="col-span-2">
                    <label class="block text-xs font-bold text-slate-400 mb-1">الماكروز</label>
                    <input class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" type="text" />
                  </div>
                  <div class="col-span-4 flex gap-2">
                    <div class="flex-1">
                      <label class="block text-xs font-bold text-slate-400 mb-1">المكونات</label>
                      <input class="w-full bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" type="text" />
                    </div>
                    <button class="bg-primary text-white p-2 rounded-lg">
                      <span class="material-symbols-outlined">add</span>
                    </button>
                  </div>
                </div>
              </div>
              <!-- Dinner Section -->
              <div class="bg-slate-50 dark:bg-slate-800/40 rounded-2xl p-6 border border-slate-100 dark:border-slate-800 opacity-60">
                <div class="flex items-center justify-between mb-4">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 flex items-center justify-center">
                      <span class="material-symbols-outlined">bedtime</span>
                    </div>
                    <h4 class="font-bold text-lg">العشاء</h4>
                  </div>
                </div>
                <div class="text-center py-4 border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-xl">
                  <p class="text-slate-400 text-sm">لم يتم إضافة وجبة عشاء بعد</p>
                </div>
              </div>
              <!-- Snacks Section -->
              <div class="bg-slate-50 dark:bg-slate-800/40 rounded-2xl p-6 border border-slate-100 dark:border-slate-800">
                <div class="flex items-center justify-between mb-4">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 flex items-center justify-center">
                      <span class="material-symbols-outlined">ios</span>
                    </div>
                    <h4 class="font-bold text-lg">سناك</h4>
                  </div>
                </div>
                <div class="flex items-center justify-center">
                  <button id="addSnackBtn" class="text-primary font-bold flex items-center gap-2 hover:underline">
                    <span class="material-symbols-outlined">add_circle</span>
                    إضافة وجبة خفيفة
                  </button>
                </div>
              </div>
            </div>
            <!-- Footer Actions -->
            <div class="mt-12 p-6 bg-primary rounded-2xl text-white flex items-center justify-between">
              <div class="flex gap-8">
                <div>
                  <p class="text-white/70 text-xs font-medium mb-1">إجمالي السعرات</p>
                  <p class="text-2xl font-black tracking-wider">1850 <span class="text-sm font-normal">سعرة</span></p>
                </div>
                <div>
                  <p class="text-white/70 text-xs font-medium mb-1">البروتين المستهدف</p>
                  <p class="text-2xl font-black tracking-wider">160 <span class="text-sm font-normal">جرام</span></p>
                </div>
              </div>
              <div class="flex gap-3">
                <button id="publishPlanBtn" class="px-8 py-3 bg-white text-primary rounded-xl font-bold hover:bg-slate-50 transition-all">
                  نشر الخطة للمتدرب
                </button>
                <button id="previewPlanBtn" class="px-6 py-3 bg-primary-dark/20 border border-white/30 rounded-xl font-bold hover:bg-white/10 transition-all">
                  معاينة
                </button>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
  </div>
  <script>
    // Search on actual trainee cards in sidebar
    const planSearch = document.getElementById('planSearch');
    const planSearchPopup = document.getElementById('planSearchPopup');
    const planSearchResults = document.getElementById('planSearchResults');
    const traineeCards = document.querySelectorAll('section.w-80 .p-4.bg-white');

    planSearch.addEventListener('input', () => {
      const q = planSearch.value.trim();
      if (!q) {
        planSearchPopup.classList.add('hidden');
        return;
      }
      const matches = [...traineeCards].filter(card => {
        const name = card.querySelector('h4')?.textContent || '';
        const goal = card.querySelector('p.text-xs')?.textContent || '';
        return name.includes(q) || goal.includes(q);
      });
      planSearchResults.innerHTML = matches.length ?
        matches.map(card => {
          const name = card.querySelector('h4')?.textContent || '';
          const goal = card.querySelector('p.text-xs')?.textContent || '';
          return `<div class="px-5 py-3 hover:bg-slate-50 dark:hover:bg-slate-800 cursor-pointer text-sm flex items-center gap-3" onclick="selectTraineeCard('${name}');document.getElementById('planSearch').value='';document.getElementById('planSearchPopup').classList.add('hidden')">
          <span class="material-symbols-outlined text-primary text-sm">person</span>
          <div><p class="font-bold">${name}</p><p class="text-xs text-slate-400">${goal}</p></div>
        </div>`;
        }).join('') :
        '<p class="text-center text-slate-400 text-sm py-4">لا توجد نتائج</p>';
      planSearchPopup.classList.remove('hidden');
    });

    function selectTraineeCard(name) {
      traineeCards.forEach(card => {
        const cardName = card.querySelector('h4')?.textContent || '';
        if (cardName === name) {
          card.click();
        }
      });
    }

    // Save template modal
    const saveModal = document.getElementById('saveModal');
    document.getElementById('saveTemplateBtn').addEventListener('click', () => saveModal.classList.remove('hidden'));
    document.getElementById('cancelSave').addEventListener('click', () => saveModal.classList.add('hidden'));
    document.getElementById('confirmSave').addEventListener('click', () => {
      const name = document.getElementById('templateName').value.trim();
      saveModal.classList.add('hidden');
      showToast(name ? `تم حفظ القالب: ${name}` : 'تم حفظ القالب');
    });

    // Trainee selection
    const traineeCardsAll = document.querySelectorAll('section.w-80 .p-4.bg-white');
    traineeCardsAll.forEach(card => {
      card.addEventListener('click', () => {
        traineeCardsAll.forEach(c => {
          c.classList.remove('border-primary', 'border-2');
          c.classList.add('border-transparent');
        });
        card.classList.add('border-primary', 'border-2');
        card.classList.remove('border-transparent');
        const name = card.querySelector('h4')?.textContent || '';
        const goal = card.querySelector('p.text-xs')?.textContent || '';
        // update plan header
        document.querySelector('section.flex-1 h3').textContent = `تصميم النظام الغذائي - ${name}`;
        document.querySelector('section.flex-1 p.text-slate-500').textContent = goal;
        showToast('تم اختيار: ' + name);
      });
    });

    // Add meal buttons
    let dayCount = 1;

    document.getElementById('addDayBtn').addEventListener('click', () => {
      dayCount++;
      const mealsContainer = document.querySelector('.space-y-6');
      const newDay = document.createElement('div');
      newDay.className = 'bg-slate-50 dark:bg-slate-800/40 rounded-2xl p-6 border border-slate-100 dark:border-slate-800';
      newDay.innerHTML = `
    <div class="flex items-center justify-between mb-4">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center">
          <span class="material-symbols-outlined">calendar_today</span>
        </div>
        <h4 class="font-bold text-lg">اليوم ${dayCount}</h4>
      </div>
      <button onclick="this.closest('.rounded-2xl').remove();showToast('تم حذف اليوم')" class="text-red-400 hover:text-red-600 text-sm flex items-center gap-1">
        <span class="material-symbols-outlined text-sm">delete</span>حذف
      </button>
    </div>
    <div class="grid grid-cols-12 gap-4 items-end">
      <div class="col-span-4"><label class="block text-xs font-bold text-slate-400 mb-1">اسم الوجبة</label>
        <input class="w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" type="text" placeholder="مثلاً: صدر دجاج مع أرز"/></div>
      <div class="col-span-2"><label class="block text-xs font-bold text-slate-400 mb-1">السعرات</label>
        <input class="w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" type="number" placeholder="0"/></div>
      <div class="col-span-2"><label class="block text-xs font-bold text-slate-400 mb-1">الماكروز</label>
        <input class="w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" type="text" placeholder="P/C/F"/></div>
      <div class="col-span-4 flex gap-2"><div class="flex-1"><label class="block text-xs font-bold text-slate-400 mb-1">المكونات</label>
        <input class="w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" type="text" placeholder="المكونات..."/></div>
        <button onclick="this.closest('.rounded-2xl').remove();showToast('تم حذف الوجبة')" class="self-end bg-slate-200 dark:bg-slate-700 p-2 rounded-lg text-slate-600">
          <span class="material-symbols-outlined text-sm">delete</span>
        </button>
      </div>
    </div>`;
      mealsContainer.appendChild(newDay);
      newDay.scrollIntoView({
        behavior: 'smooth',
        block: 'center'
      });
      showToast(`تم إضافة اليوم ${dayCount}`);
    });

    document.getElementById('prevPlansBtn').addEventListener('click', () => {
      document.getElementById('prevPlansModal').classList.remove('hidden');
    });
    document.querySelectorAll('#prevPlansModal .divide-y > div').forEach(row => {
      row.addEventListener('click', () => {
        const name = row.querySelector('p.font-bold')?.textContent || '';
        document.getElementById('prevPlansModal').classList.add('hidden');
        showToast('تم تحميل: ' + name);
      });
    });

    document.getElementById('publishPlanBtn').addEventListener('click', function() {
      this.innerHTML = '✓ تم النشر';
      this.disabled = true;
      this.classList.add('opacity-75');
      showToast('✅ تم نشر الخطة للمتدرب بنجاح');
    });

    document.getElementById('previewPlanBtn').addEventListener('click', () => {
      // collect all meal sections
      const sections = document.querySelectorAll('.space-y-6 > div');
      const content = document.getElementById('previewContent');
      content.innerHTML = '';
      sections.forEach(sec => {
        const title = sec.querySelector('h4')?.textContent.trim() || '';
        const inputs = sec.querySelectorAll('input');
        if (!title) return;
        const card = document.createElement('div');
        card.className = 'bg-slate-50 dark:bg-slate-800 rounded-xl p-4';
        let rows = `<h4 class="font-bold text-sm mb-3 flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">restaurant_menu</span>${title}</h4>`;
        inputs.forEach(inp => {
          if (inp.value) rows += `<div class="flex justify-between text-xs py-1 border-b border-slate-100 dark:border-slate-700"><span class="text-slate-500">${inp.placeholder || inp.type}</span><span class="font-medium">${inp.value}</span></div>`;
        });
        card.innerHTML = rows;
        content.appendChild(card);
      });
      if (!content.children.length) {
        content.innerHTML = '<p class="text-center text-slate-400 py-8">لا توجد وجبات مضافة بعد</p>';
      }
      document.getElementById('previewModal').classList.remove('hidden');
    });

    // إضافة وجبة خفيفة
    document.getElementById('addSnackBtn').addEventListener('click', function() {
      const snackSection = this.closest('.bg-slate-50, .rounded-2xl');
      if (!snackSection) return;
      const row = document.createElement('div');
      row.className = 'mt-3 grid grid-cols-12 gap-4 items-end';
      row.innerHTML = `
    <div class="col-span-5"><label class="block text-xs font-bold text-slate-400 mb-1">اسم الوجبة الخفيفة</label>
      <input class="w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" type="text" placeholder="مثلاً: تفاحة + مكسرات"/></div>
    <div class="col-span-3"><label class="block text-xs font-bold text-slate-400 mb-1">السعرات</label>
      <input class="w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" type="number" placeholder="0"/></div>
    <div class="col-span-4 flex gap-2 items-end">
      <div class="flex-1"><label class="block text-xs font-bold text-slate-400 mb-1">المكونات</label>
        <input class="w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm px-4 py-2" type="text" placeholder="المكونات..."/></div>
      <button onclick="this.closest('.mt-3').remove();showToast('تم حذف الوجبة الخفيفة')" class="bg-red-100 text-red-500 p-2 rounded-lg shrink-0">
        <span class="material-symbols-outlined text-sm">delete</span>
      </button>
    </div>`;
      this.closest('.flex.items-center.justify-center').before(row);
      showToast('تم إضافة وجبة خفيفة');
    });

    // Delete existing meal sections
    document.querySelectorAll('.space-y-6 > div button').forEach(btn => {
      if (btn.querySelector('span')?.textContent.trim() === 'delete') {
        btn.addEventListener('click', () => {
          btn.closest('.bg-slate-50, .rounded-2xl')?.remove();
          showToast('تم حذف الوجبة');
        });
      }
      // add row button (الغداء)
      if (btn.querySelector('span')?.textContent.trim() === 'add' && btn.classList.contains('bg-primary')) {
        btn.addEventListener('click', () => {
          const section = btn.closest('.bg-slate-50, .rounded-2xl');
          const row = section?.querySelector('.grid.grid-cols-12');
          if (row) {
            const newRow = row.cloneNode(true);
            newRow.querySelectorAll('input').forEach(i => i.value = '');
            row.after(newRow);
            showToast('تم إضافة وجبة جديدة');
          }
        });
      }
    });

    function showToast(msg) {
      const t = document.createElement('div');
      t.className = 'fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-6 py-3 rounded-xl shadow-xl text-sm font-bold z-50';
      t.textContent = msg;
      document.body.appendChild(t);
      setTimeout(() => t.remove(), 2500);
    }

    document.addEventListener('click', () => planSearchPopup.classList.add('hidden'));
    [planSearchPopup, planSearch].forEach(el => el.addEventListener('click', e => e.stopPropagation()));
    saveModal.addEventListener('click', (e) => {
      if (e.target === saveModal) saveModal.classList.add('hidden');
    });
  </script>
</body>