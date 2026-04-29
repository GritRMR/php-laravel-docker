<header class="bg-white/80 backdrop-blur-xl shadow-xl border-b border-white/50 sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4">
        <nav class="flex items-center justify-between">
            <a href="/" class="text-3xl font-black bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                Blogger<span class="text-orange-500">BD</span>
            </a>
            
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-700 hover:text-blue-600 transition-colors">Home</a>
                <a href="#" class="text-lg font-semibold text-gray-700 hover:text-blue-600 transition-colors">Blog</a>
                
                @auth
                    <a href="{{ route('dashboard') }}" 
                       class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white px-8 py-3 rounded-2xl font-bold shadow-lg hover:shadow-xl hover:from-emerald-600 hover:to-emerald-700 transform hover:-translate-y-1 transition-all duration-300">
                        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="text-blue-600 border-2 border-blue-600 px-8 py-3 rounded-2xl font-bold hover:bg-blue-600 hover:text-white transition-all duration-300">
                        Login
                    </a>
                    <a href="{{ route('register') }}" 
                       class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-3 rounded-2xl font-bold shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-indigo-700 transform hover:-translate-y-1 transition-all duration-300">
                        <i class="fas fa-user-plus mr-2"></i>Register
                    </a>
                @endauth
            </div>
        </nav>
    </div>
</header>