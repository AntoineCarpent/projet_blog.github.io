
<x-app-layout>
@vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <div class="py-12 bg-gray-200">
        <div class="bg-gray-200 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 text-black/50 dark:bg-black dark:text-white/50">
                <div class="p-2 text-gray-900 dark:text-gray-100">
               
                    
                    @foreach ($user as $users)
                        <div class="m-3">
                            <a href="{{ route('user.show', $users->id) }}"id="article"
                            class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 m-8 shadow-lg shadow-black dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                            
                                <h2 class="text-xl font-semibold text-black dark:text-white">{{$users->name}}</h2>
                                
                                    <p class="text-sm/relaxed">
                                        {{$users->email}}
                                    </p>          
                            </a>
                        </div>
                    @endforeach 
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
