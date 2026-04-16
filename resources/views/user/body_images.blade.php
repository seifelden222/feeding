@php
    $user = auth()->user();
@endphp

<!doctype html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>صور الجسم | NutriZone</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
<body class="bg-background-light text-slate-900 dark:bg-background-dark dark:text-slate-100">
    <div class="flex min-h-screen">
        <x-user-slider />

        <main class="flex-1 space-y-6 p-4 md:mr-64 md:p-8">
            <header class="mb-6">
                <h1 class="text-2xl font-black">صور الجسم</h1>
                <p class="text-sm text-slate-500">عرض صور الجسم المسجلة للتتبع والمتابعة.</p>
            </header>

            @if(session('status') === 'body-image-deleted')
                <div class="rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-bold text-rose-700">تم حذف الصورة.</div>
            @endif

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 mt-6">
                @forelse($images as $img)
                    <div class="rounded-2xl border bg-white p-4 shadow-sm dark:bg-slate-900">
                        <div class="h-48 w-full rounded-md bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $img->path) }}')"></div>
                        <div class="mt-3 flex items-center justify-between">
                            <div>
                                <div class="text-sm font-bold">{{ $img->recorded_at?->format('Y-m-d H:i') ?? $img->created_at->format('Y-m-d') }}</div>
                                @if($img->notes)
                                    <div class="text-xs text-slate-500">{{ $img->notes }}</div>
                                @endif
                            </div>
                            <form method="POST" action="{{ route('user.body-images.destroy', $img) }}" onsubmit="return confirm('حذف هذه الصورة؟');">
                                @csrf
                                @method('DELETE')
                                <button class="rounded-xl border border-rose-200 px-3 py-2 text-sm font-bold text-rose-600">حذف</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full rounded-2xl border bg-white p-6 text-center shadow-sm dark:bg-slate-900">
                        لم يتم رفع أية صور بعد.
                    </div>
                @endforelse
            </div>
        </main>
    </div>
</body>
</html>
