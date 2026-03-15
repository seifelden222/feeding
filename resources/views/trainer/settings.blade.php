<!DOCTYPE html>

<html dir="rtl" lang="ar">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>إعدادات المدرب - نوتري زون</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#10B981",
            "background-light": "#f8fafc",
            "background-dark": "#0f172a",
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

    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
  </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">
  <div class="flex min-h-screen">
    <x-trainer-slider />

    <main class="flex-1 p-8 overflow-y-auto">
      <div class="max-w-4xl mx-auto space-y-8">
        <!-- Header -->
        <div class="flex flex-col gap-1">
          <h1 class="text-3xl font-bold text-slate-900 dark:text-white">إعدادات الحساب</h1>
          <p class="text-slate-500 dark:text-slate-400">إدارة ملفك الشخصي، التفضيلات المهنية، والبيانات المالية</p>
        </div>
        <!-- Section 1: Personal Profile -->
        <section class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
          <div class="p-6 border-b border-slate-100 dark:border-slate-700">
            <h2 class="text-xl font-bold flex items-center gap-2">
              <span class="material-symbols-outlined text-primary">person</span>
              الملف الشخصي المهني
            </h2>
          </div>
          <div class="p-6 space-y-6">
            <div class="flex flex-col md:flex-row items-center gap-6">
              <div class="relative group">
                <div class="w-32 h-32 rounded-full border-4 border-primary/20 bg-cover bg-center" data-alt="صورة شخصية للمدرب الرياضي" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBlwDb1O9THRHQ7778ZI_Me9Vhzv5ANuTsCCUjprEqF8ipnCqBj_QJfe3IibUXDQ2DSMF_6X44n9_nNfba0aClV4X9oqy4bCjOJ6uJ-clfds_Di2h49kRspc96lqzj_MNhCxPN0BO1Uy1A0I8oHllQim3-zJf9UfDfWtifQRHm3GvXZqV2tvcgR0QqB9BeUP5rK3WscovBirrktcmCWa7q7Gn0-0rMp6vs7fpPQkIyEQRZQEwG7VFw9BCG_oFUMWz6SploZhGM46moX')"></div>
                <button class="absolute bottom-0 right-0 bg-primary text-white p-2 rounded-full hover:bg-primary/90 shadow-lg">
                  <span class="material-symbols-outlined text-sm">edit</span>
                </button>
              </div>
              <div class="flex-1 w-full space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">الاسم الكامل</label>
                    <input class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-slate-700" type="text" value="أحمد علي" />
                  </div>
                  <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">التخصص</label>
                    <input class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-slate-700" type="text" value="أخصائي تغذية رياضية" />
                  </div>
                </div>
                <div class="space-y-2">
                  <label class="text-sm font-medium text-slate-700 dark:text-slate-300">السيرة الذاتية المهنية</label>
                  <textarea class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-slate-700" rows="3">خبرة 10 سنوات في تصميم الخطط الغذائية المخصصة للرياضيين ومتابعة الأداء البدني.</textarea>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Section 2: Account Settings -->
        <section class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
          <div class="p-6 border-b border-slate-100 dark:border-slate-700">
            <h2 class="text-xl font-bold flex items-center gap-2">
              <span class="material-symbols-outlined text-primary">security</span>
              إعدادات الحساب والأمان
            </h2>
          </div>
          <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="space-y-2">
                <label class="text-sm font-medium text-slate-700 dark:text-slate-300">البريد الإلكتروني</label>
                <input class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-slate-700" type="email" value="coach.ahmed@nutrizone.com" />
              </div>
              <div class="space-y-2">
                <label class="text-sm font-medium text-slate-700 dark:text-slate-300">تغيير كلمة المرور</label>
                <button class="w-full h-[42px] px-4 py-2 text-primary border border-primary rounded-lg hover:bg-primary/10 font-medium transition-colors">تحديث كلمة المرور</button>
              </div>
            </div>
            <div class="pt-4 border-t border-slate-100 dark:border-slate-700">
              <label class="text-sm font-medium text-slate-700 dark:text-slate-300 block mb-3">الشهادات المهنية (PDF أو صور)</label>
              <div class="flex items-center justify-center w-full">
                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-slate-300 rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 dark:hover:bg-slate-900 dark:bg-slate-900 dark:border-slate-700 transition-colors">
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <span class="material-symbols-outlined text-slate-400 mb-2">upload_file</span>
                    <p class="mb-2 text-sm text-slate-500 dark:text-slate-400">انقر للتحميل أو اسحب الملفات هنا</p>
                  </div>
                  <input class="hidden" multiple="" type="file" />
                </label>
              </div>
            </div>
          </div>
        </section>
        <!-- Section 3: Availability & Notifications -->
        <section class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
          <div class="p-6 border-b border-slate-100 dark:border-slate-700">
            <h2 class="text-xl font-bold flex items-center gap-2">
              <span class="material-symbols-outlined text-primary">notifications_active</span>
              التوافر والإشعارات
            </h2>
          </div>
          <div class="p-6 space-y-6">
            <div class="space-y-4">
              <h3 class="font-semibold text-slate-800 dark:text-slate-200">ساعات العمل الأسبوعية</h3>
              <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <div class="p-3 border border-slate-200 dark:border-slate-700 rounded-lg text-center bg-primary/5">
                  <p class="text-xs text-slate-500">من</p>
                  <p class="font-bold">08:00 AM</p>
                </div>
                <div class="p-3 border border-slate-200 dark:border-slate-700 rounded-lg text-center bg-primary/5">
                  <p class="text-xs text-slate-500">إلى</p>
                  <p class="font-bold">04:00 PM</p>
                </div>
                <button class="md:col-span-2 p-3 border border-dashed border-primary text-primary rounded-lg font-medium hover:bg-primary/5">تعديل المواعيد</button>
              </div>
            </div>
            <div class="space-y-4 pt-4">
              <div class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-900/50 rounded-lg">
                <div>
                  <p class="font-medium">تنبيهات المتدربين الجدد</p>
                  <p class="text-xs text-slate-500">استلم إشعاراً فورياً عند انضمام متدرب جديد لخطة</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                  <input checked="" class="sr-only peer" type="checkbox" />
                  <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:-border-white after:content-[''] after:absolute after:top-[2px] after:right-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                </label>
              </div>
              <div class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-900/50 rounded-lg">
                <div>
                  <p class="font-medium">تذكير بالاستشارات</p>
                  <p class="text-xs text-slate-500">تذكير قبل 15 دقيقة من موعد استشارة الفيديو</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                  <input checked="" class="sr-only peer" type="checkbox" />
                  <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:-border-white after:content-[''] after:absolute after:top-[2px] after:right-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                </label>
              </div>
            </div>
          </div>
        </section>
        <!-- Section 4: Payout Settings -->
        <section class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
          <div class="p-6 border-b border-slate-100 dark:border-slate-700">
            <h2 class="text-xl font-bold flex items-center gap-2">
              <span class="material-symbols-outlined text-primary">payments</span>
              الإعدادات المالية
            </h2>
          </div>
          <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
              <div class="p-4 bg-primary/10 rounded-xl border border-primary/20">
                <p class="text-slate-600 dark:text-slate-400 text-sm mb-1">إجمالي الأرباح المتاحة</p>
                <p class="text-3xl font-black text-primary">12,450.00 م.ج</p>
                <button class="mt-4 bg-primary text-white px-6 py-2 rounded-lg text-sm font-bold hover:bg-primary/90 transition-all">طلب سحب الأرباح</button>
              </div>
              <div class="space-y-4">
                <h3 class="font-semibold text-slate-800 dark:text-slate-200">الحساب البنكي المربوط</h3>
                <div class="flex items-center gap-4 p-3 border border-slate-200 dark:border-slate-700 rounded-lg">
                  <div class="w-10 h-10 bg-slate-100 dark:bg-slate-700 rounded flex items-center justify-center">
                    <span class="material-symbols-outlined">account_balance</span>
                  </div>
                  <div class="flex-1">
                    <p class="font-medium text-sm">بنك مصر</p>
                    <p class="text-xs text-slate-500">EGP12 **** **** **** 4567</p>
                  </div>
                  <button class="text-primary hover:underline text-sm font-medium">تغيير</button>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="flex justify-end gap-4 py-6">
          <button class="px-8 py-3 text-slate-600 dark:text-slate-400 font-bold">إلغاء التغييرات</button>
          <button class="px-8 py-3 bg-primary text-white rounded-xl font-bold shadow-lg shadow-primary/30 hover:scale-[1.02] transition-transform">حفظ كافة الإعدادات</button>
        </div>
      </div>
    </main>

  </div>
  <script>
    // Save all settings
    document.querySelectorAll('button').forEach(btn => {
      const txt = btn.textContent.trim();

      if (txt === 'حفظ كافة الإعدادات') {
        btn.addEventListener('click', () => {
          showToast('✅ تم حفظ كافة الإعدادات بنجاح');
        });
      }

      if (txt === 'إلغاء التغييرات') {
        btn.addEventListener('click', () => showToast('تم إلغاء التغييرات'));
      }

      if (txt === 'تحديث كلمة المرور') {
        btn.addEventListener('click', () => showPasswordModal());
      }

      if (txt === 'طلب سحب الأرباح') {
        btn.addEventListener('click', () => showWithdrawModal());
      }

      if (txt === 'تغيير') {
        btn.addEventListener('click', () => showToast('فتح إعدادات الحساب البنكي'));
      }

      if (txt === 'تعديل المواعيد') {
        btn.addEventListener('click', () => showScheduleModal());
      }

      if (txt === 'تعديل') {
        btn.addEventListener('click', () => showToast('تعديل الصورة الشخصية'));
      }
    });

    // Toggle switches
    document.querySelectorAll('input[type="checkbox"]').forEach(toggle => {
      toggle.addEventListener('change', () => {
        showToast(toggle.checked ? '🔔 تم تفعيل الإشعار' : '🔕 تم إيقاف الإشعار');
      });
    });

    // Password modal
    function showPasswordModal() {
      showModal('تغيير كلمة المرور', `
    <div class="space-y-3">
      <input type="password" placeholder="كلمة المرور الحالية" class="w-full border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-sm dark:bg-slate-800 focus:ring-2 focus:ring-primary outline-none"/>
      <input type="password" placeholder="كلمة المرور الجديدة" class="w-full border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-sm dark:bg-slate-800 focus:ring-2 focus:ring-primary outline-none"/>
      <input type="password" placeholder="تأكيد كلمة المرور" class="w-full border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-sm dark:bg-slate-800 focus:ring-2 focus:ring-primary outline-none"/>
    </div>`, 'تحديث', () => showToast('✅ تم تحديث كلمة المرور'));
    }

    // Withdraw modal
    function showWithdrawModal() {
      showModal('طلب سحب الأرباح', `
    <div class="space-y-3">
      <div class="p-4 bg-primary/10 rounded-xl text-center">
        <p class="text-slate-500 text-sm">الرصيد المتاح</p>
        <p class="text-2xl font-black text-primary">12,450.00 م.ج</p>
      </div>
      <input type="number" placeholder="المبلغ المطلوب سحبه..." class="w-full border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-sm dark:bg-slate-800 focus:ring-2 focus:ring-primary outline-none"/>
    </div>`, 'تأكيد السحب', () => showToast('✅ تم إرسال طلب السحب'));
    }

    // Schedule modal
    function showScheduleModal() {
      showModal('تعديل ساعات العمل', `
    <div class="grid grid-cols-2 gap-3">
      <div><label class="text-xs text-slate-500 block mb-1">من</label><input type="time" value="08:00" class="w-full border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-sm dark:bg-slate-800 focus:ring-2 focus:ring-primary outline-none"/></div>
      <div><label class="text-xs text-slate-500 block mb-1">إلى</label><input type="time" value="16:00" class="w-full border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-sm dark:bg-slate-800 focus:ring-2 focus:ring-primary outline-none"/></div>
    </div>`, 'حفظ', () => showToast('✅ تم تحديث ساعات العمل'));
    }

    function showModal(title, bodyHTML, confirmText, onConfirm) {
      const modal = document.createElement('div');
      modal.className = 'fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4';
      modal.innerHTML = `
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-8 w-full max-w-sm shadow-2xl">
      <div class="flex items-center justify-between mb-5">
        <h3 class="text-xl font-bold">${title}</h3>
        <button class="close-modal text-slate-400 hover:text-slate-600"><span class="material-symbols-outlined">close</span></button>
      </div>
      ${bodyHTML}
      <div class="flex gap-3 mt-5">
        <button class="confirm-btn flex-1 bg-primary text-white py-3 rounded-xl font-bold">${confirmText}</button>
        <button class="close-modal flex-1 border border-slate-200 dark:border-slate-700 py-3 rounded-xl font-bold text-slate-600 dark:text-slate-400">إلغاء</button>
      </div>
    </div>`;
      document.body.appendChild(modal);
      modal.querySelectorAll('.close-modal').forEach(b => b.addEventListener('click', () => modal.remove()));
      modal.querySelector('.confirm-btn').addEventListener('click', () => {
        modal.remove();
        onConfirm();
      });
      modal.addEventListener('click', (e) => {
        if (e.target === modal) modal.remove();
      });
    }

    function showToast(msg) {
      const t = document.createElement('div');
      t.className = 'fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-6 py-3 rounded-xl shadow-xl text-sm font-bold z-50';
      t.textContent = msg;
      document.body.appendChild(t);
      setTimeout(() => t.remove(), 2500);
    }
  </script>
</body>