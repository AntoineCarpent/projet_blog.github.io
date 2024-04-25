
<x-app-layout>
@vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="py-12 bg-gray-200">
        <div class="bg-gray-200 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 text-black/50 dark:bg-black dark:text-white/50">
                <div class="p-2 text-gray-900 dark:text-gray-100">
               
                    
                    @foreach ($posts as $post)
                    @if($post->user_id === Auth::id())
                            <a href="{{ route('posts.show', $post->id)}}"id="article">

                                <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 m-8 shadow-lg shadow-black dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">

                                <p class="text-sm/relaxed">{{$post->user->name}}</p>
                                
                                <h2 class="text-xl font-semibold text-black dark:text-white ">{{$post->title}}</h2>
                                
                                    <p class="text-sm/relaxed">
                                        {{$post->body}}
                                    </p>
                                    <a href="{{ route('posts.edit', $post->id) }}">

                                        <button class="h-10 px-6 font-semibold rounded-md bg-black text-white ">Edit</button>
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="h-10 px-6 font-semibold rounded-md border border-slate-200 text-slate-900" type="submit">
                                        Delete
                                        </button>
                                    </form>
                                </div>
                            </a>
                            @elseif (Auth::user()->role === 1)
                            <a href="{{ route('posts.show', $post->id)}}"id="article">

                                <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 m-8 shadow-lg shadow-black dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">

                                <h2 class="text-xl font-semibold text-black dark:text-white">{{$post->title}}</h2>
                                
                                    <p class="text-sm/relaxed">
                                        {{$post->body}}
                                    </p>
                                    <a href="{{ route('posts.edit', $post->id) }}">

                                        <button class="h-10 px-6 font-semibold rounded-md bg-black text-white ">Edit</button>
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="h-10 px-6 font-semibold rounded-md border border-slate-200 text-slate-900" type="submit">
                                        Delete
                                        </button>
                                    </form>
                                </div>
                            </a>
                        @endif
                    @endforeach 
                
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
