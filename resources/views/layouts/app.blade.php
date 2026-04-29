{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Livewire Styles (REQUIRED for Commentify) -->
    @livewireStyles
    
    <!-- Commentify Custom Styles -->
    <style>
        /* Comment Form */
        .comment-form textarea {
            min-height: 120px !important;
            border: 2px solid #e5e7eb !important;
            border-radius: 20px !important;
            padding: 20px !important;
            font-size: 16px !important;
            font-family: 'Figtree', sans-serif !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
            transition: all 0.3s ease !important;
        }
        
        .comment-form textarea:focus {
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1), 0 4px 12px rgba(0, 0, 0, 0.15) !important;
            transform: translateY(-1px) !important;
        }
        
        /* Submit Button */
        [wire\:click="submitComment"],
        .comment-submit-btn {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%) !important;
            border-radius: 20px !important;
            padding: 16px 32px !important;
            font-weight: 600 !important;
            font-size: 16px !important;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3) !important;
            border: none !important;
            color: white !important;
            font-family: 'Figtree', sans-serif !important;
        }
        
        [wire\:click="submitComment"]:hover,
        .comment-submit-btn:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 12px 35px rgba(59, 130, 246, 0.4) !important;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%) !important;
        }
        
        /* Comment Items */
        .comment-item,
        [wire\:model="comments.*"] {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%) !important;
            border: 1px solid #e5e7eb !important;
            border-radius: 20px !important;
            padding: 24px !important;
            margin-bottom: 20px !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important;
        }
        
        /* Comment Header */
        .comment-header,
        .comment-author {
            font-weight: 700 !important;
            color: #1f2937 !important;
            font-size: 18px !important;
            font-family: 'Figtree', sans-serif !important;
        }
        
        /* Like Button */
        .like-btn,
        [wire\:click*="like"] {
            @apply inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold border-2 border-gray-200 hover:bg-gray-50 transition-all duration-200 hover:shadow-md;
        }
        
        .like-btn.liked,
        [wire\:click*="like"].liked {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%) !important;
            border-color: #3b82f6 !important;
            color: #1d4ed8 !important;
            font-weight: 700 !important;
        }
        
        /* Nested Comments */
        .nested-comment {
            margin-left: 60px !important;
            border-left: 4px solid #dbeafe !important;
            padding-left: 24px !important;
        }
        
        /* Loading States */
        [wire\:loading] {
            opacity: 0.7 !important;
            pointer-events: none !important;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .nested-comment {
                margin-left: 20px !important;
                padding-left: 16px !important;
            }
            
            .comment-form textarea {
                padding: 16px !important;
                min-height: 100px !important;
            }
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <!-- Livewire Scripts (REQUIRED) -->
    @livewireScripts
    
    <!-- Commentify Alpine.js Enhancement -->
    <script>
    document.addEventListener('livewire:init', () => {
        // Auto-focus comment textarea
        Livewire.find('comments').then(component => {
            const textarea = component.$el.querySelector('textarea');
            if (textarea) textarea.focus();
        });
        
        // New comment animation
        Livewire.hook('message.processed', () => {
            document.querySelectorAll('.comment-item:last-child').forEach(el => {
                el.style.animation = 'slideInUp 0.4s ease-out';
            });
        });
    });
    </script>

    <style>
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</body>
</html>
