{{-- resources/views/admin/pendingposts.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pending Posts for Approval
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if(session('status'))
                        <div style="background-color: lightgreen" class="alert alert-success p-3 mb-6">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="text-2xl font-bold mb-6 text-center">Posts Awaiting Approval</h1>
                    
                    @forelse($posts as $post)
                        <div class="border p-6 mb-6 rounded-lg bg-gray-50">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-bold">{{ $post->title }}</h3>
                                <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full text-sm">
                                    Pending
                                </span>
                            </div>
                            
                            <img src="{{ asset('img/' . $post->image) }}" 
                                 alt="{{ $post->title }}" class="w-32 h-32 object-cover rounded mb-4">
                            
                            <p>{{ Str::limit($post->description, 200) }}</p>
                            <p class="text-sm text-gray-500 mt-2">By: {{ $post->user_name }}</p>
                            
                            <div class="flex gap-3 mt-6">
                                <a href="{{ route('admin.approve', $post->id) }}" 
                                   class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                                   onclick="return confirm('Approve this post?')">
                                    ✅ Approve
                                </a>
                                
                                <form action="{{ route('admin.reject', $post->id) }}" method="POST" class="inline">
                                    @csrf
                                    <textarea name="reason" placeholder="Reason for rejection" 
                                              class="w-64 p-2 border rounded mb-2" required></textarea>
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                        ❌ Reject
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <p class="text-gray-500 text-lg">No pending posts for approval.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>