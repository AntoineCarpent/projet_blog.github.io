<x-app-layout>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  <div class="p-5 sm:p-5 bg-gray-200 dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="flex flex-col items-start gap-5 overflow-hidden rounded-lg bg-white p-4 m-8 shadow-lg shadow-black dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
      <section>
        <header>
          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 m-3">
            Modifié poste
          </h2>
        </header>
        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data" class="w-full max-w-80">
          @csrf
          @method('PUT')
            <div class="form-group">
              @foreach ($categories as $category)
              <input type="checkbox" name="category[]" value="{{ $category->id}}" 
                @if($posts->categories->contains($category->id))
                checked
                @endif
                > {{$category->name}}
              @endforeach
              <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 m-3" for="name">
                Titre
              </label>
              <input type="text"  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-80" id="title" name="title" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
              <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 m-3" for="email">
                Déscription
              </label> 
              <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 resize-none rounded-md shadow-sm mt-1 block w-full h-40" id="body" name="body" rows="3" required>{{ $post->body }}
              </textarea>
            </div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 m-3" for="email">
              Image:
            </label> 
            <img src="{{ asset('storage/'. $post->picture)}}" alt="">
            <br>
            <input type="file" name="picture" id="picture">
              <br>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 m-3">
              Poster
            </button>
        </form>
      </section>
    </div>
  </div>
</x-app-layout>

