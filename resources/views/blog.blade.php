<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - BloggerBD</title>
    
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('homestyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
    <style>
        body { font-family: 'Figtree', sans-serif; }
        .post-card { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .post-card:hover { transform: translateY(-12px); box-shadow: 0 30px 60px rgba(0,0,0,0.15); }
        .gradient-text { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50/50 to-indigo-50/50 min-h-screen">
    
    {{-- <!-- Header -->
    <header class="bg-white/90 backdrop-blur-xl shadow-2xl sticky top-0 z-50 border-b border-white/50">
        <div class="container mx-auto px-6 py-6">
            <nav class="flex items-center justify-between">
                <a href="/" class="text-4xl font-black gradient-text">
                    Blogger<span class="text-red-500">BD</span>
                </a>
                
                <div class="flex items-center gap-6">
                    <a href="{{ route('home') }}" class="text-xl font-semibold text-gray-700 hover:text-blue-600 transition-all duration-300">Home</a>
                    <a href="{{ route('blog') }}" class="text-xl font-bold text-blue-600 border-b-4 border-blue-600 pb-2">Blog</a>
                    
                    @auth
                        <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white px-8 py-4 rounded-2xl font-bold shadow-xl hover:shadow-2xl hover:from-emerald-600 hover:to-emerald-700 transform hover:-translate-y-2 transition-all duration-300">
                            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                        </a>
                    @else
                        <div class="flex gap-3">
                            <a href="{{ route('login') }}" class="text-blue-600 border-2 border-blue-600 px-8 py-4 rounded-2xl font-bold hover:bg-blue-600 hover:text-white transition-all duration-300">Login</a>
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-10 py-4 rounded-2xl font-bold shadow-xl hover:shadow-2xl hover:from-blue-700 hover:to-indigo-700 transform hover:-translate-y-2 transition-all duration-300">
                                <i class="fas fa-user-plus mr-2"></i>Join Now
                            </a>
                        </div>
                    @endauth
                </div>
            </nav>
        </div>
    </header> --}}

    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="/" class="logo">Blogger<span>BD</span></a>
                <div class="nav-links">
                    <a href="{{route('home')}}" class="active">Home</a>
                    {{-- <a href="">Blog</a> --}}
                     <a href="{{ route('blog') }}" class="blog-link">Blog</a>
                    <a href="">About</a>
                    <a href="">Contact</a>
                     {{-- <a href="{{route('register')}}">Register</a> --}}
                    @if (Route::has('register') && Route::has('login'))
                    @auth
                        <a
                            href="{{route('dashboard')}}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                    <a href="{{route('register')}}">Register</a>
                    <a href="{{route('login')}}">Login</a>
                    @endauth

                    @endif
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-blog pt-32 pb-24 text-center bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 text-white">
        <div class="container mx-auto px-6">
            <h1 class="text-6xl md:text-7xl font-black mb-6 leading-tight">
                Latest <span class="text-yellow-300">Blog</span> Posts
            </h1>
            <p class="text-xl md:text-2xl mb-12 opacity-90 max-w-3xl mx-auto leading-relaxed">
                Discover amazing stories, insights, and updates from our community
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
                <span class="px-8 py-4 bg-white/20 backdrop-blur-xl rounded-3xl text-lg font-semibold">
                    {{ $posts->total() }} Total Posts
                </span>
                <span class="px-8 py-4 bg-white/20 backdrop-blur-xl rounded-3xl text-lg font-semibold">
                    {{ $posts->lastPage() }} Pages
                </span>
            </div>
        </div>
    </section>

    <!-- Posts Grid -->
    <section class="posts-grid py-24">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 mb-20">
                @forelse($posts as $post)
                    <article class="post-card group bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:border-blue-200">
                        <!-- Image -->
                        @if($post->image)
                        <div class="h-64 overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                            <img src="{{ asset('img/' . $post->image) }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        @endif
                        
                        <!-- Content -->
                        <div class="p-8">
                            <div class="flex items-center gap-2 text-sm text-blue-600 font-semibold mb-4 uppercase tracking-wide">
                                <i class="fas fa-user"></i>
                                {{ $post->user_name }}
                            </div>
                            
                            <h2 class="text-2xl font-bold text-gray-900 mb-4 leading-tight line-clamp-2 group-hover:text-blue-600 transition-colors">
                                {{ $post->title }}
                            </h2>
                            
                            <p class="text-gray-600 mb-6 line-clamp-3 leading-relaxed text-lg">
                                {{ Str::limit(strip_tags($post->description), 160) }}
                            </p>
                            
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center gap-4 text-sm text-gray-500">
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-calendar"></i>
                                        {{ $post->created_at->format('M j') }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-comments"></i>
                                        {{ $post->comments()->count() }}
                                    </span>
                                </div>
                            </div>
                            
                            <a href="{{ route('fullpost', $post->id) }}" 
                               class="inline-flex items-center gap-3 text-blue-600 font-bold text-lg hover:text-blue-700 group/link transition-all duration-300">
                                Read More
                                <i class="fas fa-arrow-right transform group-hover:translate-x-2 transition-transform"></i>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-32">
                        <i class="fas fa-newspaper text-9xl text-gray-300 mb-8 opacity-75"></i>
                        <h2 class="text-4xl font-bold text-gray-500 mb-4">No posts yet</h2>
                        <p class="text-xl text-gray-400 mb-8">Check back later for amazing content!</p>
                        @auth
                            @if(auth()->user()->usertype != 'admin')
                            <a href="{{ route('user.addpost') }}" class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white px-12 py-6 rounded-3xl font-bold text-xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition-all duration-300">
                                <i class="fas fa-plus-circle mr-3"></i>Be First to Post
                            </a>
                            @endif
                        @endauth
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
            <div class="flex justify-center mt-20">
                {{ $posts->links('pagination::tailwind') }}
            </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-t from-slate-900 to-gray-800 text-white py-20 mt-32">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
                <div>
                    <h3 class="text-3xl font-bold mb-6 gradient-text">BloggerBD</h3>
                    <p class="text-gray-300 text-lg leading-relaxed mb-8">
                        Bangladesh's premier blogging platform. Share your voice with the world.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-2xl font-bold mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition-colors">Home</a></li>
                        <li><a href="{{ route('blog') }}" class="hover:text-blue-400 transition-colors">Blog</a></li>
                        @auth
                            <li><a href="{{ route('dashboard') }}" class="hover:text-blue-400 transition-colors">Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="hover:text-blue-400 transition-colors">Login</a></li>
                            <li><a href="{{ route('register') }}" class="hover:text-blue-400 transition-colors">Register</a></li>
                        @endauth
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-2xl font-bold mb-6">Follow Us</h4>
                    <div class="flex justify-center md:justify-start gap-6">
                        <a href="https://x.com/" class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center hover:bg-white/40 transition-all duration-300">
                            <i class="fab fa-x-twitter text-2xl"></i>
                        </a>
                        <a href="https://www.facebook.com/ridwan.mahmud.ridu" class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center hover:bg-white/40 transition-all duration-300">
                            <i class="fab fa-facebook text-2xl"></i>
                        </a>
                        <a href="https://www.linkedin.com/feed/" class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center hover:bg-white/40 transition-all duration-300">
                            <i class="fab fa-linkedin text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-white/20 mt-16 pt-12 text-center">
                <p class="text-gray-400 text-lg">&copy; 2026 BloggerBD.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>