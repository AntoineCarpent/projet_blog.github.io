<x-app-layout>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="max-w-xl">
      <section>
        <header>
          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Ajouter une category
          </h2>
        </header>
        <form action="{{ route('categories') }}" method="post">
          @csrf
          @method('post')
            <div class="form-group">
              <input type="text"  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="name" name="name" required>
            </div>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
              Poster
            </button>
        </form> 
          @foreach ($categories as $category)
            <p >{{$category->name}}</p>
            <a href="{{ route('categoryedit', $category->id) }}"
              class="btn btn-primary btn-sm">
              Edit
            </a>
            <form action="{{ route('categorydestroy', $category->id) }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">
                  Delete
              </button>
            </form>
          @endforeach
      </section>
    </div>
  </div>
</x-app-layout>