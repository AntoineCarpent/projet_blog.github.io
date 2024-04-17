
<x-app-layout>
@vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900 dark:text-gray-100">
               
                    
                    @foreach ($user as $users)
                   
                            <a href="{{ route('user.show', $users->id) }}"id="article"
                            class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-3 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <h2 class="text-xl font-semibold text-black dark:text-white">{{$users->name}}</h2>
                                
                                    <p class="text-sm/relaxed">
                                        {{$users->email}}
                                    </p>          
                            </a>
                    @endforeach 
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
