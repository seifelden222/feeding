    <aside class="w-64 bg-white dark:bg-slate-900 border-l border-slate-200 dark:border-slate-800 flex flex-col sticky top-0 h-screen">
      <div class="p-6 flex flex-col gap-6">
        <div class="flex justify-center mb-10">
          <img src="../logo.png" alt="NutriZone" style="width:150px;">
        </div>
        <nav class="flex flex-col gap-1">
          <a class="flex items-center gap-3 px-3 py-2 rounded-xl bg-primary text-white shadow-sm" href="{{route('trainer.home')}}">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-sm font-medium">لوحة القيادة</span>
          </a>
          <a class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors" href="{{route('trainer.usermanage')}}">
            <span class="material-symbols-outlined">group</span>
            <span class="text-sm font-medium">المستخدمين</span>
          </a>
          <a class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors" href="{{route('trainer.plansmanage')}}">
            <span class="material-symbols-outlined text-slate-500">restaurant_menu</span>
            <span class="text-sm font-medium">الخطط الغذائية</span>
          </a>
          <a class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors" href="{{route('trainer.messages')}}">
            <span class="material-symbols-outlined text-slate-500">chat</span>
            <span class="text-sm font-medium">الرسائل</span>
          </a>
          <a class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors" href="{{route('trainer.settings')}}">
            <span class="material-symbols-outlined text-slate-500">settings</span>
            <span class="text-sm font-medium">الإعدادات</span>
          </a>
        </nav>
      </div>
      <div class="mt-auto p-6 border-t border-slate-200 dark:border-slate-800">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full bg-slate-200 overflow-hidden">
            <img alt="Coach Profile" class="w-full h-full object-cover" data-alt="Professional profile photo of a male coach" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAlI2RJpRqsVKFpXMYWBPhnOcscVajxb0Qn7JOJEIvyIPMONrD8LrVAzCHrv4xIO7p6uv3rpgpxFmtX08i1xcujtffNHPcWzAlYQaioL7d0EQjjmtsLGitMKi9tBHVEr8zRKekAmHcBrZorCdrVnZiyoGQ6Li4NtiE4K7bKwUOnA_M8ncFA6Mqxi_gKxk36pnqTNwcEs0Rgy9eKh2zv_xSPkfpnZGH9XoQY4MoxwnGuLESvGEskXXohV1AhTe_sNwmm2G7g7N5o5428" />
          </div>
          <div class="flex flex-col overflow-hidden">
            <span class="text-sm font-bold truncate">كابتن أحمد سعيد</span>
            <span class="text-xs text-slate-500 truncate">ahmed@nutrizone.com</span>
          </div>
        </div>
      </div>
    </aside>