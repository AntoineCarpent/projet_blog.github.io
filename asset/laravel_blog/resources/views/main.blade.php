<main class="mt-6">                      
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
        <a href="{{ route('welcome')}}">All</a>
        @foreach ($categories as $category)
          <a href="{{ route('welcomecategory', $category->id) }}">{{$category->name}}</a>
         
          @endforeach
          
                @foreach($posts as $post) 
                    <a
                    href="{{ route('posts.show', $post->id)}}"
                    id="article"
                    class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >                           
                        <h2 class="text-xl font-semibold text-black dark:text-white">{{$post->title}}</h2>
                        
                        <p class="mt-4 text-sm/relaxed">
                            {{$post->body}}
                        </p>
                        <p class="text-sm/relaxed">{{$post->user->name}}</p>
                        @if($post->user_id === Auth::id())
                        <a href="{{ route('posts.edit', $post->id) }}"
                        class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                    @endif
                </a>  
                @endforeach
                
            </div>
            {{ $posts->links() }}
        </div>
    </div>
</main>