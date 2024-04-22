
<x-app-layout>
@vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12 bg-gray-200">
        <div class="bg-gray-200 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 text-black/50 dark:bg-black dark:text-white/50">
                <div class="p-2 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 m-8 shadow-lg shadow-black dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <h2 class="text-xl font-semibold text-black dark:text-white">{{$user->name}}</h2>
                        
                        <p class="text-sm/relaxed">
                            {{$user->email}}
                        </p>
                        <form action="{{ route('userupdate', $user->id) }}" method='post'>
                            @csrf
                            @method('PUT')

                            <select name="role" id=""  class="h-10 px-6 font-semibold rounded-md border border-slate-500 text-slate-900">

                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        <div class="flex-auto flex justify-end space-x-2 m-3">

                            <button class="h-10 px-6 font-semibold rounded-md bg-black text-white ">Edit</button>
                            </form>

                            <form action="{{ route('userdestroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="h-10 px-6 font-semibold rounded-md border border-slate-200 text-slate-900" type="submit">
                                    Delete
                                    </button>
                            </form>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
