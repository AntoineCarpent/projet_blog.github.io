<x-app-layout>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  <div class="p-5 sm:p-5 bg-gray-200 dark:bg-gray-800 shadow sm:rounded-lg">
      <div class="flex flex-col items-start gap-5 overflow-hidden rounded-lg bg-white p-4 m-8 shadow-lg shadow-black dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
        <header>
          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Ajouter un poste
          </h2>
        </header>
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="w-full">
          @csrf
            <div class="form-group">
              @foreach ($categories as $category)
                <input type="checkbox" name="category[]" value="{{$category->id}}"> {{$category->name}}
              @endforeach
              <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 m-3" for="name">
                Titre:
              </label>
              <input type="text"  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-80" id="title" name="title" required>
            </div>
            <div class="form-group">
              <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 m-3" for="body">
                Déscription:
              </label> 
              <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 resize-none rounded-md shadow-sm mt-1 block w-full h-40" id="body" name="body" rows="3" required></textarea>
              <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="descritpion">
            </div>
            <div>
              <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 m-3" for="body">
                Image:
              </label> 
              <input type="file" name="picture" id="picture">
          </div>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 m-3">
              Poster
            </button>
        </form>
      </div>
  </div>
</x-app-layout>
