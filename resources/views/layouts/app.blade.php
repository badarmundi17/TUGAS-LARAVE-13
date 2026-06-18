<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Event | Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@500;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0B0F19; color: #E2E8F0; }
        h1, h2, h3, .font-outfit { font-family: 'Outfit', sans-serif; }
        
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #A855F7 0%, #3B82F6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gradient-btn {
            background: linear-gradient(135deg, #6366F1 0%, #A855F7 100%);
            transition: all 0.3s ease;
        }
        .gradient-btn:hover {
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.4);
            transform: translateY(-2px);
        }

        .blob {
            position: absolute;
            filter: blur(80px);
            z-index: -1;
            opacity: 0.4;
        }
        .blob-1 { top: -100px; left: -100px; width: 400px; height: 400px; background: #3B82F6; border-radius: 50%; }
        .blob-2 { bottom: -100px; right: -100px; width: 500px; height: 500px; background: #A855F7; border-radius: 50%; }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="relative min-h-screen overflow-x-hidden antialiased">
    <!-- Background Orbs -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2 fixed"></div>

    <nav class="sticky top-0 z-50 glass-panel border-b border-white/10 px-6 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('events.index') }}" class="text-2xl font-outfit font-bold text-white tracking-tight flex items-center gap-2">
                <span class="text-3xl">✨</span> <span class="gradient-text">Nusantara Event</span>
            </a>
            <div class="flex items-center gap-6">
                <a href="{{ route('events.index') }}" class="text-sm font-medium text-gray-300 hover:text-white transition-colors duration-200">Beranda</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-12 relative z-10">
        @if(session('success'))
            <div class="fade-in-up glass-panel border-l-4 border-emerald-500 text-emerald-100 p-4 mb-8 rounded-r-lg flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.style.display='none'" class="text-emerald-400 hover:text-emerald-200">&times;</button>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
