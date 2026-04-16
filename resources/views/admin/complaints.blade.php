<!doctype html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>الشكاوى | لوحة الأدمن</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: { primary: "#10B981", "background-light": "#f8fdfb", "background-dark": "#064e3b" },
                    fontFamily: { display: ["Cairo", "sans-serif"] },
                },
            },
        };
    </script>
    <style>body{font-family:'Cairo', sans-serif}</style>
</head>
<body class="bg-background-light text-slate-900">
    <div class="flex min-h-screen">
        @include('admin.partials.sidebar')
        <main class="flex-1 p-8 space-y-6">
            <header>
                <h1 class="text-2xl font-black">الشكاوى</h1>
                <p class="text-sm text-slate-500">قائمة الشكاوى الواردة من المستخدمين والمتابعين.</p>
            </header>

            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                محتوى الشكاوى (سيتم ملؤه لاحقًا).
            </div>
        </main>
    </div>
</body>
</html>
