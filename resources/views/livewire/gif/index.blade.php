<div>


<x-guest-layout>

    <div class="py-4">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-400 overflow-hidden shadow-xl sm:rounded-lg">
            	<div class="m-8 font-semibold">
					Gif organizer:
				</div>

				<div class="p-6 sm:px-20 bg-gray-400 border-b border-gray-200">
				    <form wire:submit.prevent="submitForm" class="mb-6" method="POST" action="/admin/music/tracks">
					@csrf
						<div class="flex items-center w-full">
		                  <div>
		                    <input wire:model="search" name="search" id="search" type="search" class="w-32 lg:w-64 px-4 py-3 leading-tight text-sm text-gray-700 bg-gray-100 rounded-md placeholder-gray-500 border border-transparent focus:outline-none focus:bg-white focus:shadow-outline focus:border-blue-400" placeholder="Search" aria-label="Search">
		                  </div>
						</div>
				    </form>
				</div>

				<div class="ml-8">
					@guest
						<a href="/gif/create">Register/Login in order to be able to add new gifs.</a>
					@endguest
					@auth
						<a href="/gif/create">
							<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Add a new gif</button>
						</a>
					@endauth
				</div>

				@forelse($gifs as $gif)
				{{$gif->title}}
				@auth
					<a href="/gif/{{$gif->id}}/edit">
						<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</button>
					</a>
					<a href="/gif/{{$gif->id}}/delete">
						<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Delete</button>
					</a>
				@endauth
				<br>
				@empty
				No gif found.
				@endforelse
			</div>
		</div>
	</div>
</x-app-layout>

</div>
