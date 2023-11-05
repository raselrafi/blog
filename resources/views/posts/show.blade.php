<x-app-layout>

    <div class="mt-2 ml-2">
        <a href="{{ url()->previous() }}" class="px-3 py-1 bg-gray-500 rounded pointer"><i class="fa fa-angle-left"></i> Back</a>

        <div class="max-w-5xl mx-auto px-2 py-6">
            <div>
                <h1 class="text-3xl font-semibold">{{$post->title}}</h1>

            <span class="text-sm text-gray-600">
                {{$post->created_at->diffForHumans()}} by {{ $post->user->name}}
            </span>
            </div>

            <div class="prose mt-6">
                {{$post->body}}
            </div>
        </div>

            <div class="mt-10">
                <h2 id="comments" class="text-2xl font-semibold">Comments</h2>

            @auth
            <form action="{{route('posts.comments.store', $post)}}" method="post">

                @csrf
                <textarea name="body" id="body" cols="30" rows="5"></textarea>
                <br>
                <x-primary-button type="submit">Add Comment </x-primary-button>

            </form>
            @endauth


                <ul class="divide-y mt-5">
                    @foreach($comments as $comment)

                    <li class="py-4 px-2">
                        <p>{{$comment->body}}</p>
                         <span class="text-sm text-gray-600">
                            {{ $comment->created_at->diffForHumans() }} by {{ $comment->user->name}}
                         </span>
                    </li>
                    @endforeach
                </ul>

                <div class="mt-2">
                    {{ $comments->fragment('comments')->links()}}
                </div>

            </div>
        </div>

</x-app-layout>
