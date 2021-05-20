<div>


<x-guest-layout>

    <div class="py-4">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-400 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="text-black m-12 justify-center">
                    <div class="text-center">
                        <p class="text-indigo-500 font-semibold text-xl">Hi, I'm Djillali. Welcome to my online portfolio!</p>
                    </div>
                    <br>
                    <p>This website is a collection of personal projects that I've made during the years and re-created using the PHP framework Laravel 8. The entire source code is publically available on GitHub here: <a class="text-blue-600" target="_blank" href="https://github.com/Djillali/portfolio">Djillali/portfolio</a></p>
                    <br>
                    <br>
                    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                      <div class="md:flex">
                        <div class="p-8">
                          <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Music Library</div>
                          <a href="{{ url('/music/albums/library') }}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Fully configurable and searchable music library</a>
                          <p class="mt-2 text-gray-700">Public users can search the music library and display album details.<br>
                            Registered users will have access to the administration panel from which they can customize everything related to the music library (albums, artists, tracks, performers).<br>
                            On top of being able to add all the information related to an album manually from the administration panel users will also be able to import albums metadata directly from the Discogs.com api.<br>
                            Finally, registered users will also be able to export different pieces of the database into .json files that can be re-imported at a later date in order to safely restore the database.</p>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                      <div class="md:flex">
                        <div class="p-8">
                          <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Gif Organizer</div>
                          <a href="{{ url('/gif/library') }}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Save your favorite Gifs into a searchable library</a>
                          <p class="mt-2 text-gray-700">Users can save their favorite animated gifs and organize them using different searchable tags.</p>
                        </div>
                      </div>
                    </div>
                    <br>
                    <p>Feel free to contact me regarding any projects or if you have any questions via the <a href="{{ url('/contact') }}">contact page</a></p>
                    <br>
                    <br>
                    <br>
                    <p class="text-right">Website made by Djillali C. using the php framework <a class="text-blue-600" href="https://laravel.com/">Laravel (Build v{{ Illuminate\Foundation\Application::VERSION }})</a> as well as <a class="text-blue-600" href="https://tailwindcss.com/">Tailwindcss</a>.</p>
                </div>
        </div>
    </div>
</x-app-layout>

</div>
