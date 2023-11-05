<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.post') }}
        </h2>
        
    </x-slot>

            <div class="max-w-5xl mx-auto py-6 px-2">
                <ul class="divide-y"> 
                    @foreach ($posts as $post)

                    <li class="py-4 py-2">   

                    <a href="{{ route('posts.show', $post)}}" class="text-xl font-semibold block">{{$post->title}}</a>
                    
                    <span class="text-sm text-gray-600">
                        {{ $post->created_at->diffForHumans()}} by {{$post->user->name}}
                    </span>

                    </li>

                    @endforeach
                </ul>

                <div>
                    {{ $posts->links()}}
                </div>

            </div>



</x-app-layout>
