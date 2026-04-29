{{-- resources/views/user/addpost.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submit New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="text-align: center; border: 1px solid green">
                    @if(session('status'))
                        <div style="background-color: lightgreen" class="alert alert-success mb-4 p-3">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('user.storepost')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="title" placeholder="Enter Post Title" class="w-full p-3 border mb-4" required><br>
                        
                        <textarea style="width: 500px; height: 300px;" name="description" placeholder="Write your post here..." required></textarea><br><br>
                        
                        <input type="file" name="image" class="w-full p-3 border mb-4" required><br><br>
                        
                        <input style="border: 1px solid green; text-align: center; padding: 12px; background: lightgreen" 
                               type="submit" value="Submit for Approval">
                    </form>
                    
                    <div class="mt-6 text-sm text-gray-600">
                        <p><strong>Note:</strong> Your post will be reviewed by admin before publishing.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>