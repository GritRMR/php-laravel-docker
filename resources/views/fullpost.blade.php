{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Blog - Home</title>
    <link rel="stylesheet" href="{{asset('homestyle.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="/" class="logo">Lara<span>Blog</span></a>
                <div class="nav-links">
                    <a href="{{route('home')}}" class="active">Home</a>
                    <a href="">Blog</a>
                    <a href="">About</a>
                    <a href="">Contact</a>
                    @if (Route::has('login'))
                    @auth
                        <a
                            href="{{route('dashboard')}}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                    <a href="{{route('login')}}">Login</a>
                    @endauth

                    @endif
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Welcome to LaraBlog</h1>
            <p>Discover amazing articles, tutorials, and insights about web development, Laravel, and modern PHP practices.</p>
            <a href="/blog" class="btn btn-primary">Browse Articles</a>
        </div>
    </section>

    <!-- Featured Posts -->
    <div class="container">
        <h2 class="section-title">All Posts</h2>
        <div class="featured-posts">
            <!-- single Post  -->

            <div class="max-w-4xl mx-auto px-4 py-8">
                <!-- Post Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $post->title }}</h1>
                    <div class="flex items-center text-gray-500 text-sm">
                        <span>Published on {{ $post->created_at->format('F j, Y') }}</span>
                        <span class="mx-2">•</span>
                    </div>
                </div>

                <!-- Featured Image -->
                @if($post->image)
                <div class="mb-8 rounded-lg overflow-hidden">
                    <img style="width: 800px;" src="{{ asset('img/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover">
                </div>
                @endif

                <!-- Post Content -->
                <div class="prose max-w-none mb-12">
                    {!! $post->description !!}
                </div>
            </div>
        </div>

        <!-- Categories -->
        <h2 class="section-title">Browse Categories</h2>
        <div class="categories">
            <a href="/category/laravel" class="category-tag">Laravel</a>
            <a href="/category/php" class="category-tag">PHP</a>
            <a href="/category/javascript" class="category-tag">JavaScript</a>
            <a href="/category/vue" class="category-tag">Vue.js</a>
            <a href="/category/tailwind" class="category-tag">Tailwind CSS</a>
            <a href="/category/testing" class="category-tag">Testing</a>
            <a href="/category/deployment" class="category-tag">Deployment</a>
            <a href="/category/performance" class="category-tag">Performance</a>
        </div>

        <!--comment https://shorturl.at/GMsks -->
        {{-- <div class="newsletter">
           <livewire:comments :model="$post"/>
        </div>
    </div> --}}
    <!-- Comments Section -->
{{-- <section class="comments-section py-12 bg-gray-50">
    <div class="container">
        <div class="max-w-4xl mx-auto">
            <!-- Comments Header -->
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-900">
                    💬 {{ $post->comments()->count() }} Comments
                </h2>
                
                <!-- Toggle Button (Optional - for future read-only mode) -->
                <span class="text-sm text-gray-500">Live comments powered by Livewire</span>
            </div>

            <!-- Livewire Comments Component -->
            <div class="comment-container bg-white rounded-2xl shadow-xl border border-gray-200">
                <livewire:comments :model="$post" />
            </div>

            <!-- Comments Stats (Optional Enhancement) -->
            <div class="mt-8 text-center text-sm text-gray-500">
                <p>👍 Like/Unlike • 🧵 Nested replies • @️⃣ Mentions supported</p>
            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>About LaraBlog</h3>
                    <p>A blog dedicated to Laravel, PHP, and modern web development practices. We share tutorials, tips, and industry insights.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/privacy">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Categories</h3>
                    <ul class="footer-links">
                        <li><a href="/category/laravel">Laravel</a></li>
                        <li><a href="/category/php">PHP</a></li>
                        <li><a href="/category/javascript">JavaScript</a></li>
                        <li><a href="/category/vue">Vue.js</a></li>
                        <li><a href="/category/testing">Testing</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 LaraBlog. All rights reserved. Built with Laravel.</p>
            </div>
        </div>
    </footer>
</body>
</html> --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <!-- Full Post Content -->
    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Post Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    {{ $post->title }}
                </h1>
                <div class="flex items-center justify-center text-gray-500 text-lg mb-8">
                    <span>By {{ $post->user_name }} • {{ $post->created_at->format('F j, Y') }}</span>
                </div>
            </div>

            <!-- Featured Image -->
            @if($post->image)
            <div class="mb-12 rounded-3xl overflow-hidden shadow-2xl">
                <img src="{{ asset('img/' . $post->image) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-96 object-cover">
            </div>
            @endif

            <!-- Post Content -->
            <article class="prose prose-lg max-w-none bg-white rounded-3xl p-12 shadow-2xl">
                {!! $post->description !!}
            </article>

            <!-- Comments Section -->
            <section class="mt-20">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-3xl p-8 mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2 flex items-center">
                        💬 {{ $post->comments()->count() }} Comments
                    </h2>
                    <p class="text-gray-600 text-lg">Join the discussion</p>
                </div>
                
                <!-- Commentify Livewire Component -->
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
                    <livewire:comments :model="$post" />
                </div>
            </section>
        </div>
    </div>
</x-app-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - BloggerBD</title>
    
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('homestyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Livewire (CRITICAL) -->
    @livewireStyles
    
    <!-- Custom Comment Styles -->
    <style>
        body { font-family: 'Figtree', sans-serif; }
        
        /* Comment Form */
        .comment-textarea {
            @apply w-full p-6 border-2 border-gray-200 rounded-3xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100/50 min-h-[140px] resize-vertical placeholder-gray-500 text-lg font-medium shadow-lg;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .comment-textarea:focus {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
        }
        
        /* Submit Button */
        .comment-submit {
            @apply bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-10 py-5 rounded-3xl font-bold text-lg shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition-all duration-300 ml-4 whitespace-nowrap;
        }
        
        /* Comment Cards */
        .comment-card {
            @apply bg-gradient-to-br from-white to-slate-50/70 border border-gray-100/50 backdrop-blur-sm rounded-3xl p-8 mb-6 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-1;
        }
        
        .comment-author {
            @apply font-bold text-xl text-gray-900 mb-1;
        }
        
        .comment-meta {
            @apply text-gray-500 text-lg mb-4 flex items-center gap-2;
        }
        
        /* Like Button */
        .like-btn {
            @apply inline-flex items-center gap-2 px-6 py-3 rounded-2xl font-semibold border-2 border-gray-200 hover:border-blue-300 hover:bg-blue-50 text-gray-700 hover:text-blue-700 transition-all duration-300 shadow-md hover:shadow-lg;
        }
        
        .like-btn.liked {
            @apply bg-gradient-to-r from-blue-500 to-blue-600 text-white border-blue-500 shadow-xl font-bold;
        }
        
        /* Nested Comments */
        .reply-comment {
            @apply ml-20 border-l-4 border-blue-100 pl-8 py-4 bg-blue-50/50 rounded-2xl;
        }
        
        /* Post Content */
        .post-content {
            @apply prose prose-lg max-w-none bg-gradient-to-br from-white via-blue-50/30 to-indigo-50/30 rounded-3xl p-12 shadow-2xl border border-blue-100/50;
        }
        
        .hero-image {
            @apply rounded-3xl shadow-2xl overflow-hidden border-8 border-white/50;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
    
    <!-- Header (Same as home) -->
    @include('layouts.partials.header')
    
    <!-- Main Content -->
    <div class="container mx-auto px-4 py-16 max-w-5xl">
        
        <!-- Post Header -->
        <div class="text-center mb-20">
            <h1 class="text-5xl md:text-6xl font-black bg-gradient-to-r from-gray-900 via-blue-900 to-indigo-900 bg-clip-text text-transparent mb-8 leading-tight">
                {{ $post->title }}
            </h1>
            <div class="flex flex-wrap items-center justify-center gap-6 text-xl text-gray-600 mb-12">
                <span class="flex items-center gap-2">
                    <i class="fas fa-user text-blue-600"></i>
                    {{ $post->user_name }}
                </span>
                <span class="flex items-center gap-2">
                    <i class="fas fa-calendar text-green-600"></i>
                    {{ $post->created_at->format('F j, Y') }}
                </span>
                <span class="flex items-center gap-2">
                    <i class="fas fa-comments text-purple-600"></i>
                    {{ $post->comments()->count() }} Comments
                </span>
            </div>
        </div>

        <!-- Featured Image -->
        @if($post->image)
        <div class="hero-image mb-16 mx-auto max-w-4xl">
            <img src="{{ asset('img/' . $post->image) }}" 
                 alt="{{ $post->title }}" 
                 class="w-full h-[500px] md:h-[600px] object-cover">
        </div>
        @endif

        <!-- Post Content -->
        <div class="post-content mb-24">
            {!! $post->description !!}
        </div>

        <!-- Comments Section -->
        <section class="comments-section">
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/50 overflow-hidden">
                <!-- Comments Header -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-8">
                    <div class="flex items-center justify-between">
                        <h2 class="text-3xl font-black flex items-center gap-4">
                            <i class="fas fa-comments"></i>
                            Comments ({{ $post->comments()->count() }})
                        </h2>
                        <div class="text-blue-100 text-lg font-medium">
                            Join the conversation
                        </div>
                    </div>
                </div>
                
                <!-- Livewire Comments -->
                <div class="p-8">
                    <livewire:comments :model="$post" />
                </div>
            </div>
        </section>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
    
    <!-- Smooth Animations -->
    <script>
    document.addEventListener('livewire:load', function () {
        // New comment animation
        Livewire.hook('message.processed', () => {
            document.querySelectorAll('.comment-card:last-child').forEach(card => {
                card.style.animation = 'slideInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            });
        });
    });
    </script>

    <style>
    @keyframes slideInUp {
        from { opacity: 0; transform: translateY(30px) scale(0.95); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }
    </style>
</body>
</html>