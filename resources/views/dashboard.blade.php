{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::check() && Auth::user()->usertype == 'admin')
            {{ __('Admin Dashboard') }}
            @else
            {{ __('User Dashboard') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in user!") }}
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout> --}}



{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Auth::user()->usertype == 'admin' ? 'Admin Dashboard' : 'User Dashboard' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(Auth::user()->usertype != 'admin')
                    {{-- User Dashboard --}}
                    <div class="text-center">
                        <h3 class="text-2xl mb-6">Welcome, {{ Auth::user()->name }}!</h3>
                        
                        <a href="{{ route('user.addpost') }}" 
                           class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 mb-4 inline-block">
                            📝 Submit New Post
                        </a>
                        
                        <p class="text-gray-600 mt-4">Your posts need admin approval before publishing.</p>
                    </div>
                @else
                    {{-- Admin Dashboard --}}
                    {{ __("You're logged in as Admin!") }}
                @endif
            </div>
        </div>
    </div>
</x-app-layout>


