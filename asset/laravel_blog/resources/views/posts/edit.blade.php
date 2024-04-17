<x-app-layout>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="max-w-xl">
      <section>
        <header>
          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Modifié poste
          </h2>
        </header>
        <form action="{{ route('posts.update', $post->id) }}" method="post">
          @csrf
          @method('PUT')
            <div class="form-group">
              <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">
                Titre
              </label>
              <input type="text"  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="title" name="title" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
              <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                Déscription
              </label> 
              <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 resize-none rounded-md shadow-sm mt-1 block w-full" id="body" name="body" rows="3" required>{{ $post->body }}
              </textarea>
            </div>

            @foreach ($categories as $category)
                <input type="checkbox" name="category[]" value="{{ $category->id}}" 
                  @foreach ($posts->categories as $categorys)
                  @if($category->id === $categorys->id)
                  checked
                  @endif
                  @endforeach
                  > {{$category->name}}
            @endforeach

              <br>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
              Poster
            </button>
        </form>
      </section>
    </div>
  </div>
</x-app-layout>

