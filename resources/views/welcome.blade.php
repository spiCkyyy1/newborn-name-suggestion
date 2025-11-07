<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Family Baby Name Hub</title>

    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gradient-to-b from-sky-50 to-white min-h-screen flex items-center justify-center text-slate-700">

<div class="max-w-2xl mx-auto text-center px-6 py-12 bg-white shadow-2xl rounded-3xl border border-slate-100">
    <div class="mb-8">
        <div class="text-6xl mb-3">👶💖</div>
        <h1 class="text-4xl font-extrabold text-sky-700">
            Welcome to Our Family Name Hub
        </h1>
    </div>

    <p class="text-lg text-slate-600 leading-relaxed">
        Only invited family members are allowed to use this service.<br>
        Please reach out to the <span class="font-semibold text-sky-600">admin</span> to receive your invite link.
    </p>

    <div class="mt-10">
        <a
            href="mailto:admin@example.com"
            class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-sky-600 hover:bg-sky-700 text-white font-semibold shadow-md transition-all duration-300"
        >
            ✉️ Contact Admin
        </a>
    </div>

    <footer class="mt-10 text-sm text-slate-500">
        © {{ date('Y') }} Our Family — Made with ❤️
    </footer>
</div>

</body>
</html>
