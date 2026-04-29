<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloggerBD - Home</title>
    <link rel="stylesheet" href="{{asset('homestyle.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"></head>
<body>
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
    <section class="hero">
        <div class="container">
            <h1>Welcome to BloggerBD</h1>
            <p>Discover amazing articles, news, entertainments, educational in this website.</p>
            <a href="/blog" class="btn btn-primary">Browse Articles</a>
        </div>
    </section>

    <!-- Featured Posts -->
    <div class="container">
        <h2 class="section-title">Featured Posts</h2>
        <div class="featured-posts">
            {{-- All Post --}}

<!-- foreach($post as $posts)-->
@foreach($post->where('status', 'approved') as $posts)
    <div class="post-card">
        <div class="post-image">
            <img src="img/{{$posts->image}}" alt="Laravel Tips">
        </div>

        <div class="post-content">
            <div class="post-meta">
                <span>{{$posts->created_at}}</span>
            </div>

            <h3 class="post-title">{{$posts->title}}</h3>

            <p class="post-excerpt">{{Str::limit($posts->description,100)}}... </p>

            <a href="{{route('fullpost',$posts->id)}}" class="read-more">Read More
            </a>
        </div>
    </div>
@endforeach
        </div>

        <!-- Categories -->
        <h2 class="section-title">Browse Categories</h2>
        <div class="categories">
            <a href="/category/entertainment" class="category-tag">Entertainment</a>
            <a href="/category/news" class="category-tag">News</a>
            <a href="/category/sport" class="category-tag">Sports</a>
            <a href="/category/education" class="category-tag">Education</a>
            <a href="/category/nature" class="category-tag">Nature</a>
            <a href="/category/politics" class="category-tag">Politics</a>
            <a href="/category/environments" class="category-tag">Environments</a>
            <a href="/category/links" class="category-tag">Links</a>
        </div>

        <!-- Newsletter -->
        <div class="newsletter">
            <h3>Subscribe to our Newsletter</h3>
            <p>Get the latest articles and news delivered to your inbox every week. No spam, ever.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>About BloggerBD</h3>
                    <p>A blogger version of Bangladesh.Trying to uphold the picture of peoples mind.</p>
                    <div class="social-links">
                        <a href="https://x.com/"><i class="fab fa-x-twitter"></i></a>
                        <a href="https://github.com/GritRMR"><i class="fab fa-github"></i></a>
                        <a href="https://www.linkedin.com/feed/"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.facebook.com/ridwan.mahmud.ridu"><i class="fab fa-facebook"></i></a>
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
                        <li><a href="/category/nature">Nature</a></li>
                        <li><a href="/category/education">Education</a></li>
                        <li><a href="/category/">link</a></li>
                        <li><a href="/category/vue">Environment</a></li>
                        <li><a href="/category/testing">Sports</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2026 BloggerBD. All rights reserved. Built with Laravel By Ridwan Mahmud.</p>
            </div>
        </div>
    </footer>
</body>
</html>