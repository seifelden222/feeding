<!DOCTYPE html>

<html dir="rtl" lang="ar">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#10b981",
            "background-light": "#f8f6f6",
            "background-dark": "#111827",
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

    .custom-scrollbar::-webkit-scrollbar {
      width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
      background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
      background: #e5e7eb;
      border-radius: 10px;
    }
  </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100">
  <div class="flex h-screen overflow-hidden">
    <!-- Main Content Area (LHS in RTL) -->
    <x-trainer-slider />
    <main class="flex-1 flex overflow-hidden">
      <!-- Trainee Profile Summary (Left Sidebar) -->
      <aside class="w-80 border-l border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 flex flex-col shrink-0">
        <div class="p-6">
          <h2 class="text-xl font-bold mb-4">الرسائل</h2>
          <div class="relative">
            <span class="material-symbols-outlined absolute right-3 top-2.5 text-slate-400">search</span>
            <input id="msgSearch" class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-xl pr-10 text-sm py-2" placeholder="البحث عن متدرب..." type="text" />
          </div>
          <!-- Search Results -->
          <div id="msgSearchResults" class="hidden mt-2 bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden shadow-lg"></div>
        </div>
        <div class="flex-1 overflow-y-auto custom-scrollbar">
          <!-- Chat Item Active -->
          <div class="px-4 py-3 bg-primary/5 border-r-4 border-primary cursor-pointer">
            <div class="flex gap-3">
              <div class="relative">
                <div class="w-12 h-12 rounded-full bg-cover bg-center" data-alt="Contact avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuByiAiq0R-jt90ygnEMhakCphMVkKj1Iln3tDkyqW1Aljfso3iZcRA8R62W0whEy0w_gnKj_StI_BgFoomavTy_rEVZsi2qnCQ2qfBqtBFqVInpY_SCvG45ISU3cD-87JqtTSyNkjyZPR-btShJcaaAN9Jc0u3fVHMUJ2apNUQlxU1L1CaqWrw-kf3p58l__hD6VZwJR1gItYvwQVog0fjofNmpDAb1g5P6ypWq5-p9Bvhz8k2Lcq49X6O3dSUniDc2XEfte-f2P0rP')"></div>
                <span class="absolute bottom-0 left-0 w-3 h-3 bg-primary rounded-full border-2 border-white dark:border-slate-900"></span>
              </div>
              <div class="flex-1 overflow-hidden">
                <div class="flex justify-between items-center mb-0.5">
                  <h4 class="text-sm font-bold truncate">سارة خالد</h4>
                  <span class="text-[10px] text-slate-500">10:05 ص</span>
                </div>
                <p class="text-xs text-primary font-medium truncate">ممتاز، شكراً جزيلاً! سألتزم بذلك.</p>
              </div>
            </div>
          </div>
          <!-- Chat Item -->
          <div class="px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-800/50 cursor-pointer border-r-4 border-transparent">
            <div class="flex gap-3">
              <div class="relative">
                <div class="w-12 h-12 rounded-full bg-cover bg-center" data-alt="Contact avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD2Sd2Z07cd15AFGuVjJIjkWs3mCjpQDJLvZ8FV9pgdvqsEXJiL0h2Hn9c9CxXRzXCn6pk_r-NOd_YwLuYf8TwLQSqo7jZVzKb2WkCmctps2s7XuU17p9c5vF9TLTUJ10UPjTX-XkeSVB0UWzdrGB5Mx3FLw-ro4WPzrzWAvQq5pub2TeEISox1OwJxvj4oW_FpY7jNVA1hEo-lh9-WMB0-IXsm0BC6I914aRKfFO1W5aPagWkoYNBhNVFsYBHfRpi2fNYxMq1uPLhp')"></div>
              </div>
              <div class="flex-1 overflow-hidden">
                <div class="flex justify-between items-center mb-0.5">
                  <h4 class="text-sm font-bold truncate">أحمد محمد</h4>
                  <span class="text-[10px] text-slate-500">أمس</span>
                </div>
                <p class="text-xs text-slate-500 truncate">كابتن هل يمكن زيادة كمية البروتين؟</p>
              </div>
              <div class="shrink-0 flex items-center">
                <span class="bg-primary text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full">2</span>
              </div>
            </div>
          </div>
          <!-- Chat Item -->
          <div class="px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-800/50 cursor-pointer border-r-4 border-transparent">
            <div class="flex gap-3">
              <div class="w-12 h-12 rounded-full bg-cover bg-center" data-alt="Contact avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCd5OpzkOb9F6B_fz0hyYQ1Tzm-_0MIMnqikTK99Q6-vdr68Znf0SS7vb62ykDjoWDaloNV-QCeWBmgd0EoCS8hhR_75b_JB7ugEQXYVVR8EIVN4DG-yDHgbIMO9QKnjZ0FVzr9uucfPsEcOshW5cuqoDu1JbWvSHyXbaOGxulwaht0L0F0auiaRWQkqRFh6CkPQ9Og2GupK1FWT7wrgOvfRXg5Uow6jxYMj0sQukj-v_7gE88U6MAx8L9FoawjVqMf-sG0offgPqPL')"></div>
              <div class="flex-1 overflow-hidden">
                <div class="flex justify-between items-center mb-0.5">
                  <h4 class="text-sm font-bold truncate">ليلى علي</h4>
                  <span class="text-[10px] text-slate-500">الأحد</span>
                </div>
                <p class="text-xs text-slate-500 truncate">تم إكمال تمارين اليوم بنجاح!</p>
              </div>
            </div>
          </div>
          <!-- Chat Item -->
          <div class="px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-800/50 cursor-pointer border-r-4 border-transparent">
            <div class="flex gap-3">
              <div class="w-12 h-12 rounded-full bg-cover bg-center" data-alt="Contact avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuASAm49Dx3ybexBJBi10ZkI6gHYtrOkbh4ygPkanwV0NLpbkfo6AfJHqu6Iic6mcEMvRfzgNRDLX5uYmm8smNsGRa8WV6ySlsMMrWAcio-3ItZERDnfeUPgl5nlszjsA5d8LlT0n4BC39bCoCY5lU2fj8ONYl0eerJHzCzf4JO-fUo2Kqe4lE0gogxe_Go6Ikc7x8D1xrNekRd4GA0Sc2BHmuB44XxFvLnCqH52hPtJnxwAXINvivvo0058Ebhjt_6FOTH4fnB4FFgt')"></div>
              <div class="flex-1 overflow-hidden">
                <div class="flex justify-between items-center mb-0.5">
                  <h4 class="text-sm font-bold truncate">عمر ياسين</h4>
                  <span class="text-[10px] text-slate-500">24 مايو</span>
                </div>
                <p class="text-xs text-slate-500 truncate">سأقوم بقياس الوزن غداً صباحاً.</p>
              </div>
            </div>
          </div>
        </div>
      </aside>
      <!-- Chat Window (Center) -->
      <section class="flex-1 flex flex-col bg-white dark:bg-slate-900 relative">
        <!-- Chat Header -->
        <header class="h-16 px-6 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between shrink-0">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-cover bg-center" data-alt="Active contact avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCzpgjKhCWENL9LYpqu0ONH5WaNHFijajYOMNgfgmBqEEj5E_Wljl56cM2P1tVRs7OvaZyXFCJr2p0OljFS9lWAyCmfbjcstJzAxYT_18xmS_pNsVYdi8wZ9uiZZIeeuBMwOxUU27u0IoFN0q4EG2_X-uSXL-yC4fM4tIhHSBQ8D79d8LJbVZNA6a5305UE5ZDNzbXmipXDGAnAretfxtLZ0kuN1BWeq989VkCpImZw2YqHrfvP1FdIR5rSLirjx4ISWsEhqGg7BWTQ')"></div>
            <div>
              <h4 class="text-sm font-bold">سارة خالد</h4>
              <div class="flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-primary"></span>
                <p class="text-[10px] text-slate-500">متصل الآن</p>
              </div>
            </div>
          </div>
          <div class="flex gap-2">
            <button class="p-2 text-slate-500 hover:text-primary transition-colors"><span class="material-symbols-outlined">call</span></button>
            <button class="p-2 text-slate-500 hover:text-primary transition-colors"><span class="material-symbols-outlined">videocam</span></button>
            <button class="p-2 text-slate-500 hover:text-primary transition-colors"><span class="material-symbols-outlined">more_vert</span></button>
          </div>
        </header>
        <!-- Messages Display -->
        <div id="messagesArea" class="flex-1 overflow-y-auto p-6 space-y-4 custom-scrollbar">
          <div class="flex justify-center my-4">
            <span class="text-[10px] bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full text-slate-500 uppercase font-bold tracking-wider">اليوم</span>
          </div>
          <!-- Trainee Message -->
          <div class="flex items-start gap-3 max-w-[80%]">
            <div class="w-8 h-8 rounded-full bg-cover bg-center shrink-0" data-alt="Trainee avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCFSO9CJqC_snHwKM0tpvh38rmf6qLMtTNu-eGWW1Du-wLvQtX6CLkcaBGfhtF045aS4PGLE92_2_NdN1dc8CKKn92WLuuLAWHxINXmBYyWVcu5gxGYAzGE2Syteda5QOTMqp7MZCD8RvPGFgAHLabufD6zHGEBa59FP6NCwCVtRphZk65-fbVXauFKuKmtDwCiRbHaMa8AXGQ3kVeR-BWIy_2UutNxoRrJixylufWHf1o99ir8Bqz8TS1wP4Zy_sP_gAyIV7Uxfr6l')"></div>
            <div class="flex flex-col gap-1">
              <div class="bg-slate-100 dark:bg-slate-800 p-4 rounded-xl rounded-tr-none text-sm">
                السلام عليكم كابتن، هل يمكنني استبدال حصة الكارديو الصباحية بالمشي السريع في المساء؟ عندي اجتماع مهم غداً.
              </div>
              <span class="text-[10px] text-slate-400 self-start">09:45 ص</span>
            </div>
          </div>
          <!-- Trainer Message -->
          <div class="flex items-start gap-3 max-w-[80%] flex-row-reverse self-end">
            <div class="w-8 h-8 rounded-full bg-cover bg-center shrink-0" data-alt="Trainer avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCizHguQfC9j7PsiEA3X8RXP9qEWdutvTfuv-UtHFtpWcqyhJJSblJNHbur9z0xxaNb9PO8O-0Y9FawvA6h6bK6O4OCVcmgXdu2ijKA2m2qLaT9Poap30HQYOaBGRAFYj_BtwyOMSCo9dgvjRQEW6jGwf_fO95Q-AfP5TsLJ6I4TPDLa6O3lv4vvtjjF14ZED39rsk42rbjcZmhUtiGYbGoZOAeb60FzOcMRDHJUAQjnBnRyqHDiIT9xt-XfEPavZpEgLVmxnqHPRb3')"></div>
            <div class="flex flex-col gap-1 items-end">
              <div class="bg-primary text-white p-4 rounded-xl rounded-tl-none text-sm shadow-sm">
                وعليكم السلام سارة. بالتأكيد، المشي السريع لمدة 45 دقيقة سيكون بديلاً ممتازاً. تأكدي فقط من الحفاظ على نبضات قلبك في منطقة حرق الدهون.
              </div>
              <span class="text-[10px] text-slate-400 self-end">10:02 ص</span>
            </div>
          </div>
          <!-- Trainee Message -->
          <div class="flex items-start gap-3 max-w-[80%]">
            <div class="w-8 h-8 rounded-full bg-cover bg-center shrink-0" data-alt="Trainee avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAfcRpHb97CT6939tKVQbCw_6QTDvCUocI1BQ9PuMw2xUSOBa7AEMu1KlzKB2RpRxzDKK5Sj1xZGU-P6ayGKR7jdsrGZNpimg3URGZIXeSMk3qXZ0xTChs53gvKzY_kK0Sd7duW9a7cQFNnWaeh0wa33nSkqXO26O4ERioqpWY5V8slmGxwtbSdA5QVycLInHX94tZLTKndRE4h7DnJrhKMb0Pzb8d8LRJXf4tqZqBCS_VvxsQP5S3dW8A3u5NXgklysTMqJOK2ldRC')"></div>
            <div class="flex flex-col gap-1">
              <div class="bg-slate-100 dark:bg-slate-800 p-4 rounded-xl rounded-tr-none text-sm">
                ممتاز، شكراً جزيلاً! سألتزم بذلك.
              </div>
              <span class="text-[10px] text-slate-400 self-start">10:05 ص</span>
            </div>
          </div>
        </div>
        <!-- Message Input -->
        <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 shrink-0">
          <div class="relative flex items-center gap-2">
            <button id="attachBtn" class="p-2 text-slate-400 hover:text-primary transition-colors"><span class="material-symbols-outlined">attach_file</span></button>
            <div class="flex-1">
              <input id="msgInput" class="w-full bg-slate-100 dark:bg-slate-800 border-none focus:ring-2 focus:ring-primary/50 rounded-xl py-3 px-4 text-sm" placeholder="اكتب رسالتك هنا..." type="text" />
            </div>
            <button id="emojiBtn" class="p-2 text-slate-400 hover:text-primary transition-colors"><span class="material-symbols-outlined">mood</span></button>
            <button id="sendBtn" class="w-12 h-12 bg-primary text-white rounded-xl flex items-center justify-center shadow-lg shadow-primary/20 hover:scale-105 active:scale-95 transition-transform">
              <span class="material-symbols-outlined">send</span>
            </button>
          </div>
        </div>
      </section>
      <!-- Hidden file input -->
      <input id="fileInput" type="file" accept="image/*,video/*,.pdf,.doc,.docx" class="hidden" multiple />

      <!-- Emoji Picker -->
      <div id="emojiPicker" class="hidden absolute bottom-20 left-16 z-50 bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-700 p-3 w-72">
        <div class="grid grid-cols-8 gap-1">
        </div>
      </div>

    </main>
    <!-- Sidebar Navigation (Right - RTL) -->

  </div>
  <script>
    // ===== CONVERSATION DATA =====
    const conversations = {
      'سارة خالد': {
        avatar: 'https://lh3.googleusercontent.com/aida-public/AB6AXuByiAiq0R-jt90ygnEMhakCphMVkKj1Iln3tDkyqW1Aljfso3iZcRA8R62W0whEy0w_gnKj_StI_BgFoomavTy_rEVZsi2qnCQ2qfBqtBFqVInpY_SCvG45ISU3cD-87JqtTSyNkjyZPR-btShJcaaAN9Jc0u3fVHMUJ2apNUQlxU1L1CaqWrw-kf3p58l__hD6VZwJR1gItYvwQVog0fjofNmpDAb1g5P6ypWq5-p9Bvhz8k2Lcq49X6O3dSUniDc2XEfte-f2P0rP',
        online: true,
        messages: [{
            from: 'them',
            text: 'السلام عليكم كابتن، هل يمكنني استبدال حصة الكارديو الصباحية بالمشي السريع في المساء؟ عندي اجتماع مهم غداً.',
            time: '09:45 ص'
          },
          {
            from: 'me',
            text: 'وعليكم السلام سارة. بالتأكيد، المشي السريع لمدة 45 دقيقة سيكون بديلاً ممتازاً. تأكدي فقط من الحفاظ على نبضات قلبك في منطقة حرق الدهون.',
            time: '10:02 ص'
          },
          {
            from: 'them',
            text: 'ممتاز، شكراً جزيلاً! سألتزم بذلك.',
            time: '10:05 ص'
          },
        ],
        replies: ['حسناً، سأتابع معك غداً 💪', 'أي وقت تحتاجين مساعدة أنا هنا', 'ممتاز! استمري على هذا المستوى', 'تذكري شرب الماء الكافي أيضاً 💧']
      },
      'أحمد محمد': {
        avatar: 'https://lh3.googleusercontent.com/aida-public/AB6AXuD2Sd2Z07cd15AFGuVjJIjkWs3mCjpQDJLvZ8FV9pgdvqsEXJiL0h2Hn9c9CxXRzXCn6pk_r-NOd_YwLuYf8TwLQSqo7jZVzKb2WkCmctps2s7XuU17p9c5vF9TLTUJ10UPjTX-XkeSVB0UWzdrGB5Mx3FLw-ro4WPzrzWAvQq5pub2TeEISox1OwJxvj4oW_FpY7jNVA1hEo-lh9-WMB0-IXsm0BC6I914aRKfFO1W5aPagWkoYNBhNVFsYBHfRpi2fNYxMq1uPLhp',
        online: false,
        messages: [{
            from: 'them',
            text: 'كابتن هل يمكن زيادة كمية البروتين؟',
            time: 'أمس'
          },
          {
            from: 'them',
            text: 'أشعر أن العضلات لا تتعافى بشكل كافٍ',
            time: 'أمس'
          },
        ],
        replies: ['نعم يمكن زيادة البروتين تدريجياً', 'سأعدل الخطة الغذائية لك', 'حاول إضافة وجبة بروتين قبل النوم', 'التعافي يحتاج وقتاً، استمر 💪']
      },
      'ليلى علي': {
        avatar: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCd5OpzkOb9F6B_fz0hyYQ1Tzm-_0MIMnqikTK99Q6-vdr68Znf0SS7vb62ykDjoWDaloNV-QCeWWBmgd0EoCS8hhR_75b_JB7ugEQXYVVR8EIVN4DG-yDHgbIMO9QKnjZ0FVzr9uucfPsEcOshW5cuqoDu1JbWvSHyXbaOGxulwaht0L0F0auiaRWQkqRFh6CkPQ9Og2GupK1FWT7wrgOvfRXg5Uow6jxYMj0sQukj-v_7gE88U6MAx8L9FoawjVqMf-sG0offgPqPL',
        online: false,
        messages: [{
          from: 'them',
          text: 'تم إكمال تمارين اليوم بنجاح!',
          time: 'الأحد'
        }, ],
        replies: ['ممتاز! أداء رائع 🎉', 'استمري على هذا الإيقاع', 'كيف كانت التمارين؟', 'أحسنتِ، هكذا نصل للهدف']
      },
      'عمر ياسين': {
        avatar: 'https://lh3.googleusercontent.com/aida-public/AB6AXuASAm49Dx3ybexBJBi10ZkI6gHYtrOkbh4ygPkanwV0NLpbkfo6AfJHqu6Iic6mcEMvRfzgNRDLX5uYmm8smNsGRa8WV6ySlsMMrWAcio-3ItZERDnfeUPgl5nlszjsA5d8LlT0n4BC39bCoCY5lU2fj8ONYl0eerJHzCzf4JO-fUo2Kqe4lE0gogxe_Go6Ikc7x8D1xrNekRd4GA0Sc2BHmuB44XxFvLnCqH52hPtJnxwAXINvivvo0058Ebhjt_6FOTH4fnB4FFgt',
        online: false,
        messages: [{
          from: 'them',
          text: 'سأقوم بقياس الوزن غداً صباحاً.',
          time: '24 مايو'
        }, ],
        replies: ['ممتاز، أخبرني بالنتيجة', 'قِس الوزن قبل الأكل وبعد الاستيقاظ مباشرة', 'تذكر تسجيل القياس في التطبيق', 'بالتوفيق 💪']
      }
    };

    let activeContact = 'سارة خالد';

    // ===== CHAT LIST =====
    const chatList = document.querySelector('.flex-1.overflow-y-auto.custom-scrollbar');
    const chatItems = chatList.querySelectorAll('[class*="px-4 py-3"]');

    function setActiveChat(name) {
      activeContact = name;
      // update sidebar highlight
      chatItems.forEach(item => {
        const itemName = item.querySelector('h4')?.textContent.trim();
        if (itemName === name) {
          item.classList.add('bg-primary/5', 'border-primary');
          item.classList.remove('border-transparent', 'hover:bg-slate-50');
        } else {
          item.classList.remove('bg-primary/5', 'border-primary');
          item.classList.add('border-transparent');
        }
      });
      // update chat header
      const conv = conversations[name];
      const headerAvatar = document.querySelector('section header .w-10.h-10');
      const headerName = document.querySelector('section header h4');
      const headerStatus = document.querySelector('section header p');
      if (headerAvatar) headerAvatar.style.backgroundImage = `url('${conv.avatar}')`;
      if (headerName) headerName.textContent = name;
      if (headerStatus) headerStatus.textContent = conv.online ? 'متصل الآن' : 'غير متصل';
      // render messages
      renderMessages(name);
    }

    function renderMessages(name) {
      const conv = conversations[name];
      const area = document.getElementById('messagesArea');
      area.innerHTML = `<div class="flex justify-center my-4">
    <span class="text-[10px] bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full text-slate-500 uppercase font-bold tracking-wider">اليوم</span>
  </div>`;
      conv.messages.forEach(msg => appendBubble(msg.from, msg.text, msg.time, false));
      area.scrollTop = area.scrollHeight;
    }

    function appendBubble(from, text, time, animate = true) {
      const area = document.getElementById('messagesArea');
      const conv = conversations[activeContact];
      const bubble = document.createElement('div');
      if (from === 'me') {
        bubble.className = 'flex items-start gap-3 max-w-[80%] flex-row-reverse self-end ml-auto';
        bubble.innerHTML = `
      <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center shrink-0 mt-1">
        <span class="material-symbols-outlined text-primary text-sm">person</span>
      </div>
      <div class="flex flex-col gap-1 items-end">
        <div class="bg-primary text-white p-4 rounded-xl rounded-tl-none text-sm shadow-sm">${text}</div>
        <div class="flex items-center gap-1">
          <span class="text-[10px] text-slate-400">${time}</span>
          <span class="material-symbols-outlined text-[12px] text-primary">done_all</span>
        </div>
      </div>`;
      } else {
        bubble.className = 'flex items-start gap-3 max-w-[80%]';
        bubble.innerHTML = `
      <div class="w-8 h-8 rounded-full bg-cover bg-center shrink-0" style="background-image:url('${conv.avatar}')"></div>
      <div class="flex flex-col gap-1">
        <div class="bg-slate-100 dark:bg-slate-800 p-4 rounded-xl rounded-tr-none text-sm">${text}</div>
        <span class="text-[10px] text-slate-400 self-start">${time}</span>
      </div>`;
      }
      if (animate) bubble.style.animation = 'fadeIn 0.2s ease';
      area.appendChild(bubble);
      area.scrollTop = area.scrollHeight;
    }

    // ===== SEND MESSAGE =====
    const msgInput = document.getElementById('msgInput');
    const sendBtn = document.getElementById('sendBtn');

    function sendMessage() {
      const text = msgInput.value.trim();
      if (!text) return;
      const time = new Date().toLocaleTimeString('ar-EG', {
        hour: '2-digit',
        minute: '2-digit'
      });
      // add to conversation data
      conversations[activeContact].messages.push({
        from: 'me',
        text,
        time
      });
      appendBubble('me', text, time);
      msgInput.value = '';
      // update last message in sidebar
      const activeItem = [...chatItems].find(i => i.querySelector('h4')?.textContent.trim() === activeContact);
      if (activeItem) {
        const preview = activeItem.querySelector('p.text-xs');
        if (preview) {
          preview.textContent = text;
          preview.className = 'text-xs text-primary font-medium truncate';
        }
        const timeEl = activeItem.querySelector('span.text-\\[10px\\]');
        if (timeEl) timeEl.textContent = time;
      }
      // simulate typing indicator then auto-reply
      showTyping();
      const delay = 1000 + Math.random() * 1500;
      setTimeout(() => {
        hideTyping();
        const conv = conversations[activeContact];
        const reply = conv.replies[Math.floor(Math.random() * conv.replies.length)];
        const replyTime = new Date().toLocaleTimeString('ar-EG', {
          hour: '2-digit',
          minute: '2-digit'
        });
        conv.messages.push({
          from: 'them',
          text: reply,
          time: replyTime
        });
        appendBubble('them', reply, replyTime);
        // update sidebar preview
        if (activeItem) {
          const preview = activeItem.querySelector('p.text-xs');
          if (preview) {
            preview.textContent = reply;
            preview.className = 'text-xs text-slate-500 truncate';
          }
        }
      }, delay);
    }

    let typingEl = null;

    function showTyping() {
      const area = document.getElementById('messagesArea');
      const conv = conversations[activeContact];
      typingEl = document.createElement('div');
      typingEl.id = 'typingIndicator';
      typingEl.className = 'flex items-center gap-3 max-w-[80%]';
      typingEl.innerHTML = `
    <div class="w-8 h-8 rounded-full bg-cover bg-center shrink-0" style="background-image:url('${conv.avatar}')"></div>
    <div class="bg-slate-100 dark:bg-slate-800 px-4 py-3 rounded-xl rounded-tr-none flex gap-1 items-center">
      <span class="w-2 h-2 bg-slate-400 rounded-full animate-bounce" style="animation-delay:0ms"></span>
      <span class="w-2 h-2 bg-slate-400 rounded-full animate-bounce" style="animation-delay:150ms"></span>
      <span class="w-2 h-2 bg-slate-400 rounded-full animate-bounce" style="animation-delay:300ms"></span>
    </div>`;
      area.appendChild(typingEl);
      area.scrollTop = area.scrollHeight;
    }

    function hideTyping() {
      document.getElementById('typingIndicator')?.remove();
    }

    sendBtn.addEventListener('click', sendMessage);
    msgInput.addEventListener('keydown', e => {
      if (e.key === 'Enter') sendMessage();
    });

    // ===== CHAT ITEM SWITCHING =====
    chatItems.forEach(item => {
      item.addEventListener('click', () => {
        const name = item.querySelector('h4')?.textContent.trim();
        if (name && conversations[name]) setActiveChat(name);
        // remove unread badge
        item.querySelector('.bg-primary.text-white.rounded-full')?.remove();
      });
    });

    // ===== SEARCH =====
    const msgSearch = document.getElementById('msgSearch');
    const msgSearchResults = document.getElementById('msgSearchResults');
    msgSearch.addEventListener('input', () => {
      const q = msgSearch.value.trim();
      if (!q) {
        msgSearchResults.classList.add('hidden');
        return;
      }
      const names = Object.keys(conversations).filter(n => n.includes(q));
      msgSearchResults.innerHTML = names.length ?
        names.map(n => `<div class="px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-700 cursor-pointer text-sm font-medium" onclick="setActiveChat('${n}');document.getElementById('msgSearch').value='';document.getElementById('msgSearchResults').classList.add('hidden')">${n}</div>`).join('') :
        '<p class="text-center text-slate-400 text-sm py-3">لا توجد نتائج</p>';
      msgSearchResults.classList.remove('hidden');
    });

    // ===== EMOJI PICKER =====
    const emojis = [
      '😊', '😂', '🥰', '😍', '🤩', '😎', '🥳', '😅',
      '👍', '👏', '🙌', '💪', '🤝', '✌️', '🫶', '❤️',
      '🔥', '⭐', '✅', '🎯', '💯', '🏆', '🎉', '🎊',
      '🍎', '🥗', '🥦', '🍗', '🥩', '🥑', '🍌', '💧',
      '😴', '🤔', '😤', '😮', '🙏', '👋', '🫡', '💬'
    ];
    const emojiPicker = document.getElementById('emojiPicker');
    const emojiGrid = emojiPicker.querySelector('.grid');
    emojis.forEach(e => {
      const btn = document.createElement('button');
      btn.textContent = e;
      btn.className = 'text-xl hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg p-1 transition-colors';
      btn.addEventListener('click', (ev) => {
        ev.stopPropagation();
        msgInput.value += e;
        msgInput.focus();
      });
      emojiGrid.appendChild(btn);
    });

    document.getElementById('emojiBtn').addEventListener('click', (e) => {
      e.stopPropagation();
      emojiPicker.classList.toggle('hidden');
    });
    emojiPicker.addEventListener('click', e => e.stopPropagation());

    // ===== FILE ATTACHMENT =====
    const fileInput = document.getElementById('fileInput');
    document.getElementById('attachBtn').addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', () => {
      const files = [...fileInput.files];
      if (!files.length) return;
      files.forEach(file => {
        const time = new Date().toLocaleTimeString('ar-EG', {
          hour: '2-digit',
          minute: '2-digit'
        });
        const isImage = file.type.startsWith('image/');
        const area = document.getElementById('messagesArea');
        const conv = conversations[activeContact];
        const bubble = document.createElement('div');
        bubble.className = 'flex items-start gap-3 max-w-[80%] flex-row-reverse self-end ml-auto';
        if (isImage) {
          const url = URL.createObjectURL(file);
          bubble.innerHTML = `
        <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center shrink-0 mt-1">
          <span class="material-symbols-outlined text-primary text-sm">person</span>
        </div>
        <div class="flex flex-col gap-1 items-end">
          <div class="bg-primary/10 rounded-xl overflow-hidden border border-primary/20 max-w-[200px]">
            <img src="${url}" class="w-full rounded-xl object-cover cursor-pointer" onclick="window.open('${url}')"/>
          </div>
          <div class="flex items-center gap-1">
            <span class="text-[10px] text-slate-400">${time}</span>
            <span class="material-symbols-outlined text-[12px] text-primary">done_all</span>
          </div>
        </div>`;
        } else {
          bubble.innerHTML = `
        <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center shrink-0 mt-1">
          <span class="material-symbols-outlined text-primary text-sm">person</span>
        </div>
        <div class="flex flex-col gap-1 items-end">
          <div class="bg-primary text-white px-4 py-3 rounded-xl rounded-tl-none text-sm shadow-sm flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">attach_file</span>
            <span class="truncate max-w-[150px]">${file.name}</span>
            <span class="text-white/70 text-xs">${(file.size/1024).toFixed(0)} KB</span>
          </div>
          <div class="flex items-center gap-1">
            <span class="text-[10px] text-slate-400">${time}</span>
            <span class="material-symbols-outlined text-[12px] text-primary">done_all</span>
          </div>
        </div>`;
        }
        area.appendChild(bubble);
        area.scrollTop = area.scrollHeight;
        // auto reply after file
        showTyping();
        setTimeout(() => {
          hideTyping();
          const replies = ['وصلني الملف، شكراً 👍', 'تم استلام الصورة ✅', 'شكراً على الإرسال!'];
          const reply = replies[Math.floor(Math.random() * replies.length)];
          const replyTime = new Date().toLocaleTimeString('ar-EG', {
            hour: '2-digit',
            minute: '2-digit'
          });
          appendBubble('them', reply, replyTime);
        }, 1500);
      });
      fileInput.value = '';
    });

    // ===== HEADER BUTTONS =====
    document.querySelectorAll('section header button').forEach(btn => {
      const icon = btn.querySelector('.material-symbols-outlined')?.textContent?.trim();
      if (icon === 'call') btn.addEventListener('click', () => showToast('جاري الاتصال...'));
      if (icon === 'videocam') btn.addEventListener('click', () => showToast('جاري فتح مكالمة الفيديو...'));
      if (icon === 'more_vert') btn.addEventListener('click', () => showToast('خيارات إضافية'));
    });

    function showToast(msg) {
      const t = document.createElement('div');
      t.className = 'fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-6 py-3 rounded-xl shadow-xl text-sm font-bold z-50';
      t.textContent = msg;
      document.body.appendChild(t);
      setTimeout(() => t.remove(), 2500);
    }

    document.addEventListener('click', () => msgSearchResults.classList.add('hidden'));
    [msgSearchResults, msgSearch].forEach(el => el.addEventListener('click', e => e.stopPropagation()));

    // ===== INIT =====
    setActiveChat('سارة خالد');
  </script>
</body>