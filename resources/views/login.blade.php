<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Sistem Informasi KKN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-['Inter'] min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-blue-600 text-white shadow-md mb-2">
                <i class="fa-solid fa-graduation-cap text-xl"></i>
            </div>
            <h1 class="text-xl font-bold text-slate-900">Sistem Informasi KKN</h1>
            <p class="text-xs text-slate-500">Silakan masuk menggunakan akun kelompok Anda</p>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-xl shadow-slate-100 p-8">
            
            @if($errors->has('loginError'))
            <div class="mb-4 p-3 bg-rose-50 border border-rose-100 rounded-xl flex items-start gap-2.5 text-rose-700 text-xs font-medium">
                <i class="fa-solid fa-circle-exclamation text-sm shrink-0 mt-0.5"></i>
                <span>{{ $errors->first('loginError') }}</span>
            </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 text-xs">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="kkn@desa.com"
                            class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Kata Sandi</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 text-xs">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password" required placeholder="••••••••"
                            class="w-full pl-9 pr-10 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-slate-600">
                            <i class="fa-solid fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                    <label for="remember" class="ml-2 text-xs font-medium text-slate-500 cursor-pointer select-none">Ingat saya di perangkat ini</label>
                </div>

                <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl transition-colors shadow-sm flex items-center justify-center gap-2">
                    <span>Masuk</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePasswordBtn = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePasswordBtn.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            if(type === 'text') {
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
</body>
</html>