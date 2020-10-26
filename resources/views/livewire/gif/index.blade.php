
<div>


<x-guest-layout>

    <div class="py-4">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-400 overflow-hidden shadow-xl sm:rounded-lg">
				<div class="p-6 sm:px-20 bg-gray-400 border-b border-gray-200">

				    <form wire:submit.prevent="submitForm" class="mb-6" method="POST" action="/music/tracks">
					@csrf
						<div class="flex items-center w-full">
		                  <div class="mr-6">
		                    <input wire:model="search" name="search" id="search" type="search" class="w-32 lg:w-64 px-4 py-3 leading-tight text-sm text-gray-700 bg-gray-100 rounded-md placeholder-gray-500 border border-transparent focus:outline-none focus:bg-white focus:shadow-outline focus:border-blue-400" placeholder="Search" aria-label="Search">
		                  </div>
		                 	@guest
								<a href="/gif/create">Register/Login in order to be able to add new gifs.</a>
							@endguest
							@auth
								<a href="/gif/create">
									<button type="button" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Add a new gif</button>
								</a>
							@endauth
						</div>
				    </form>
				</div>

				<div class="d-flex justify-content-center">
					{!! $gifs->links() !!}
				</div>

			    <div class="  grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2 m-5 mb-10">
			    @forelse($gifs as $gif)
			        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
			            <div class="bg-cover bg-center h-56 p-4"
			                style="background-image: url({{$gif->url}})">

			            </div>
			            <div class="m-2 text-sm">
			                <p class=" text-right  text-s">Added {{$gif->created_at->diffForHumans()}}  by {{$gif->user->name}}</p>
			                <h2 class="text-3xl p-0 text-grey-dark">{{$gif->title}}</h2>
			                Tags:
			                <div class="grid grid-cols-4 gap-2">
			                	@forelse($gif->gifTags as $gifTag)
				                	<a href="#" class="items-center p-4 bg-blue-200 rounded-lg shadow-xs cursor-pointer hover:bg-blue-500 hover:text-gray-100 mr-2">
				                	{{$gifTag->tag->tag}}
				                	</a>
			                	@empty
				               	 No tags added yet.
				                @endforelse
			                </div>
			            </div>
			          	@auth
						<a href="/gif/{{$gif->id}}/edit">
							<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mb-2">Edit</button>
						</a>
						<a href="/gif/{{$gif->id}}/delete">
							<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Delete</button>
						</a>
						@endauth
			        </div>
			    @empty
				<h2 class=" font-bold h-2 mb-5 text-center">0 gif found.</h2>
				@endforelse
				</div>

				<div class="d-flex justify-content-center">
					{!! $gifs->links() !!}
				</div>


				<div class="m-6">
					<a href="/gif/export">
						<button type="button" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Export gifs to .json</button>
					</a>
				</div>


				<form method="POST" action="/gif/import" enctype="multipart/form-data">
					@csrf
					<div class="input-group">
						<div class="file_input">
							<label class="image_input_button md1-button md1-js-button md1-button--fab">
								<i class="material-icons">Upload gifs .json file: </i>
								<input type="file" name="filename" id="filename" class="none">
							</label>
							<button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 mb-4 border border-blue-500 hover:border-transparent rounded">Import gifs from .json</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</x-app-layout>

</div>
