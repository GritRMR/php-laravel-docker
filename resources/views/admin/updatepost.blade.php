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
                <div class="p-6 text-gray-900" style="text-align: center; border: 1px solid blue">
                   
                 <form action="{{route('admin.postupdate',$post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                 <input type="text" name="title" value="{{$post->title}}"> <br><br><br>
                  <textarea style="width: 400px; height: 400px;" name="description" id="">
                                    {{$post->title}}
                       </textarea> <br><br><br>
                       <label style="background-color: lightblue;">Old Image</label>
                       <img src="{{asset('img/'.$post->image)}}" style="width: 100px; height: 100px;"
                        alt="{{$post->image}}" style="width: 100px; height: 100px;">
                        <label style="background-color: lightblue;">Upload New Image</label>
                     <input type="file" name="image"> <br><br><br>
                      <input style="border: 1px solid blue; text-align: center; padding: 10px" 
                     type="submit" name="submit" value="update post" >
                     </form>
               </div>
            </div>
        </div>
    </div>
    
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            @if(Auth::check() && Auth::user()->usertype == 'admin')
                Admin Dashboard
            @else
                User Dashboard
            @endif
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white shadow-lg rounded-2xl p-8">

                <h3 class="text-2xl font-bold text-gray-700 mb-6 text-center">
                    Update Post
                </h3>

                <form action="{{ route('admin.postupdate', $post->id) }}" 
                      method="POST" 
                      enctype="multipart/form-data"
                      class="space-y-6">
                    
                    @csrf

                    <!-- Title -->
                    <div>
                        <label class="block text-gray-600 font-medium mb-2">Title</label>
                        <input 
                            type="text" 
                            name="title" 
                            value="{{ $post->title }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            placeholder="Enter post title">
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-gray-600 font-medium mb-2">Description</label>
                        <textarea 
                            name="description"
                            rows="6"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            placeholder="Enter description">{{ $post->description }}</textarea>
                    </div>

                    <!-- Old Image -->
                    <div>
                        <label class="block text-gray-600 font-medium mb-2">Current Image</label>
                        <div class="flex items-center gap-4">
                            <img 
                                src="{{ asset('img/'.$post->image) }}" 
                                alt="{{ $post->image }}"
                                class="w-32 h-32 object-cover rounded-lg border">
                        </div>
                    </div>

                    <!-- Upload New Image -->
                    <div>
                        <label class="block text-gray-600 font-medium mb-2">Upload New Image</label>
                        <input 
                            type="file" 
                            name="image"
                            class="w-full border p-2 rounded-lg bg-gray-50">
                    </div>

                    <!-- Submit -->
                    <div class="text-center">
                        <button 
                            type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200 shadow-md">
                            Update Post
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
