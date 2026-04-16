<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>خطة الوجبات | NutriZone</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: { primary: "#10B981", "background-light": "#F3F4F6", "background-dark": "#111827" },
                    fontFamily: { display: ["Cairo", "sans-serif"] },
                },
            },
        };
    </script>
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="min-h-screen bg-background-light text-slate-800 dark:bg-background-dark dark:text-slate-200">
    <div class="flex min-h-screen">
        <x-user-slider />

        <main class="flex-1 space-y-8 p-4 md:mr-64 md:p-8">
            @php
                $__available_plans = \App\Models\NutritionPlan::query()->where('status', 'active')->get(['id', 'title', 'plan_notes']);
            @endphp
            <script type="application/json" id="__available_plans_json">{!! $__available_plans->toJson() !!}</script>
            <header class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 dark:text-white">خطة وجباتك اليومية</h1>
                    <p class="mt-2 text-slate-500 dark:text-slate-400">وجبات اليوم المضافة من النظرة العامة.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button id="addSystemBtn" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white border border-slate-200 px-4 py-2 font-black text-slate-700 hover:bg-slate-50" type="button">
                        اختيار نظام إضافي
                    </button>
                    <a href="{{ route('user.home') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-primary px-6 py-3 font-black text-white transition hover:bg-emerald-600">
                        <span class="material-symbols-outlined">add</span>
                        إضافة وجبة جديدة
                    </a>
                </div>
            </header>

            @if($meals->isEmpty())
                <div class="rounded-[2rem] border border-dashed border-slate-200 bg-white p-12 text-center dark:border-slate-700 dark:bg-slate-900">
                    <span class="material-symbols-outlined text-slate-300 text-6xl">restaurant</span>
                    <p class="mt-4 text-lg font-black text-slate-400">لم تضف أي وجبات اليوم بعد</p>
                    <a href="{{ route('user.home') }}" class="mt-4 inline-flex items-center gap-2 rounded-2xl bg-primary px-6 py-3 font-black text-white transition hover:bg-emerald-600">
                        إضافة وجبة من النظرة العامة
                    </a>
                </div>
            @else
                <section class="grid grid-cols-1 gap-6 xl:grid-cols-3">
                    @foreach($meals as $meal)
                        @php
                            $typeColors = [
                                'breakfast' => 'text-primary bg-emerald-50',
                                'lunch'     => 'text-blue-500 bg-blue-50',
                                'dinner'    => 'text-amber-500 bg-amber-50',
                                'snack'     => 'text-purple-500 bg-purple-50',
                            ];
                            $isConsumed = $meal->consumed_at !== null;
                        @endphp
                        <article class="overflow-hidden rounded-[2rem] border {{ $isConsumed ? 'border-primary' : 'border-slate-200 dark:border-slate-800' }} bg-white shadow-sm dark:bg-slate-900" id="meal-card-{{ $meal->id }}">
                            <div class="h-52 w-full overflow-hidden bg-slate-100 relative">
                                @if($meal->image_path)
                                    <img alt="{{ $meal->name }}" class="h-full w-full object-cover" src="{{ asset('storage/'.$meal->image_path) }}" />
                                @else
                                    <div class="h-full w-full flex items-center justify-center">
                                        <span class="material-symbols-outlined text-slate-300 text-6xl">restaurant</span>
                                    </div>
                                @endif
                                @if($isConsumed)
                                    <div class="absolute inset-0 bg-primary/20 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-white text-6xl">check_circle</span>
                                    </div>
                                @endif
                            </div>

                            <div class="space-y-5 p-6">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <span class="rounded-full px-3 py-1 text-xs font-black {{ $typeColors[$meal->meal_type] ?? 'text-slate-500 bg-slate-50' }}">
                                            {{ $meal->mealTypeLabel() }}
                                        </span>
                                        <h3 class="mt-3 text-2xl font-black text-slate-900 dark:text-white">{{ $meal->name }}</h3>
                                        @if($meal->notes)
                                            <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">{{ $meal->notes }}</p>
                                        @endif
                                    </div>
                                    @if($meal->calories)
                                        <div class="text-left shrink-0">
                                            <p class="text-2xl font-black text-primary">{{ $meal->calories }}</p>
                                            <p class="text-xs text-slate-500">سعرة</p>
                                        </div>
                                    @endif
                                </div>

                                @if($meal->protein_g || $meal->carb_g || $meal->fat_g)
                                    <div class="grid grid-cols-3 gap-2 text-center text-xs">
                                        <div class="rounded-xl bg-blue-50 p-2">
                                            <p class="text-slate-400">بروتين</p>
                                            <p class="font-black text-blue-600">{{ $meal->protein_g ?? 0 }}g</p>
                                        </div>
                                        <div class="rounded-xl bg-emerald-50 p-2">
                                            <p class="text-slate-400">كارب</p>
                                            <p class="font-black text-primary">{{ $meal->carb_g ?? 0 }}g</p>
                                        </div>
                                        <div class="rounded-xl bg-amber-50 p-2">
                                            <p class="text-slate-400">دهون</p>
                                            <p class="font-black text-amber-600">{{ $meal->fat_g ?? 0 }}g</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="rounded-2xl p-4 text-sm {{ $isConsumed ? 'bg-emerald-50 dark:bg-emerald-900/20' : 'bg-slate-50 dark:bg-slate-800' }}">
                                    <p class="font-bold status-text {{ $isConsumed ? 'text-primary' : 'text-slate-500' }}">
                                        {{ $isConsumed ? 'تم تناول هذه الوجبة ✓' : 'لم يتم التناول بعد' }}
                                    </p>
                                </div>

                                @if(!$isConsumed)
                                    <button
                                        onclick="markConsumed({{ $meal->id }}, this)"
                                        class="w-full rounded-2xl bg-primary px-4 py-3 font-black text-white transition hover:bg-emerald-600">
                                        تم التناول
                                    </button>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </section>
            @endif
        </main>
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        function markConsumed(mealId, btn) {
            fetch(`/user/plans/${mealId}/consume`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
            })
            .then(r => r.json())
            .then(() => {
                const card = document.getElementById('meal-card-' + mealId);
                // update status text
                const statusBox = card.querySelector('.rounded-2xl.p-4');
                statusBox.className = 'rounded-2xl p-4 text-sm bg-emerald-50 dark:bg-emerald-900/20';
                statusBox.querySelector('.status-text').textContent = 'تم تناول هذه الوجبة ✓';
                statusBox.querySelector('.status-text').className = 'font-bold status-text text-primary';
                // add overlay on image
                const imgWrapper = card.querySelector('.h-52');
                const overlay = document.createElement('div');
                overlay.className = 'absolute inset-0 bg-primary/20 flex items-center justify-center';
                overlay.innerHTML = '<span class="material-symbols-outlined text-white text-6xl">check_circle</span>';
                imgWrapper.appendChild(overlay);
                // update border
                card.classList.remove('border-slate-200', 'dark:border-slate-800');
                card.classList.add('border-primary');
                // remove button
                btn.remove();
            });
        }

        // Add system modal + AJAX
        document.addEventListener('DOMContentLoaded', () => {
            const addBtn = document.getElementById('addSystemBtn');
            addBtn?.addEventListener('click', () => {
                const modal = document.createElement('div');
                modal.className = 'fixed inset-0 bg-black/40 z-[200] flex items-center justify-center p-4';
                modal.id = 'add-system-modal';
                modal.innerHTML = `
                    <div class="bg-white dark:bg-slate-900 rounded-2xl w-full max-w-2xl p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-lg">اختر نظامًا إضافيًا</h3>
                            <button id="closeAddSystem" class="text-slate-500">إغلاق</button>
                        </div>
                        <div id="availableSystems" class="grid grid-cols-1 md:grid-cols-2 gap-3 max-h-72 overflow-auto"></div>
                        <div class="mt-4 text-right">
                            <button id="closeAddSystem2" class="px-4 py-2 rounded-2xl bg-slate-100">إغلاق</button>
                        </div>
                    </div>`;

                document.body.appendChild(modal);

                function close() { modal.remove(); }
                document.getElementById('closeAddSystem')?.addEventListener('click', close);
                document.getElementById('closeAddSystem2')?.addEventListener('click', close);

                const available = JSON.parse(document.getElementById('__available_plans_json').textContent || '[]');
                const container = document.getElementById('availableSystems');
                available.forEach(p => {
                    const item = document.createElement('div');
                    item.className = 'rounded-2xl p-3 border border-slate-200 flex items-center justify-between';
                    item.innerHTML = `<div><div class="font-bold">${p.title}</div><div class="text-sm text-slate-500">${p.plan_notes || ''}</div></div><div><button data-id="${p.id}" class="add-system inline-flex items-center gap-2 bg-primary text-white px-3 py-2 rounded-2xl">أضف</button></div>`;
                    container.appendChild(item);
                });

                container.querySelectorAll('.add-system').forEach(btn => {
                    btn.addEventListener('click', async (e) => {
                        const id = e.currentTarget.dataset.id;
                        try {
                            const res = await fetch(`{{ route('user.plans.add') }}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken,
                                    'Accept': 'application/json'
                                },
                                body: JSON.stringify({ nutrition_plan_id: id })
                            });
                            const json = await res.json();
                            alert(json.message || 'تمت الإضافة');
                            close();
                        } catch (err) {
                            alert('حدث خطأ أثناء الإضافة');
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
