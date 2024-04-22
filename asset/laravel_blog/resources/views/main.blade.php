<main class="mt-6"> 
    @vite(['resources/css/app.css', 'resources/js/app.js'])  
                       
    <div class="h-10 flex items-center gap-6 overflow-hidden rounded-lg bg-white p-3 mb-8 shadow-md shadow-black dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
    <a href="{{ route('welcome')}}">All</a>
    @foreach ($categories as $category)
            <a href="{{ route('welcomecategory', $category->id) }}">| {{$category->name}}</a>
            @endforeach
        </div>

            @foreach($posts as $post) 
            
                <a href="{{ route('posts.show', $post->id)}}" id="article" > 
                    <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 m-8 shadow-lg shadow-black dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        
                        <p class="text-sm/relaxed">{{$post->user->name}}</p>
                        
                        <h2 class="text-xl font-semibold text-black dark:text-white">{{$post->title}}</h2>

                        <p class="text mt-4 text-sm/relaxed">{{$post->body}}</p>
                        
                        <div class="flex-auto flex space-x-4 ">
                            @if($post->user_id === Auth::id())
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
                            @endif
                        </div>
                    </div>                          
                </a>  
            @endforeach
        </a>
        <div class="mr-8">
            {{$posts->withQueryString()->links()}}
        </div>               
</main>