<div>


<x-guest-layout>

    <div class="py-4">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
		        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

				    <form wire:submit.prevent="submitForm" class="mb-6" method="POST" action="/music/tracks">
					@csrf
						<div class="flex items-center w-full">
		                  <div>
		                    <input wire:model="search" name="search" id="search" type="search" class="w-32 lg:w-64 px-4 py-3 leading-tight text-sm text-gray-700 bg-gray-100 rounded-md placeholder-gray-500 border border-transparent focus:outline-none focus:bg-white focus:shadow-outline focus:border-blue-400" placeholder="Search" aria-label="Search">
		                  </div>
						</div>
				    </form>
				</div>

				<div class="d-flex justify-content-center">
					{!! $albums->links() !!}
				</div>

			    <div class="  grid md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-2 m-5 mb-10">
			    @forelse($albums as $album)
			        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
			            <div class="bg-cover bg-center h-56 p-4"
			                style="background-image: url({{$album->picture}})">

			            </div>
			            <div class="m-2 text-sm">
			                <p class=" text-right  text-s">Release {{$album->release_date->diffForHumans()}}</p>
			                <h2 class="text-3xl p-0 text-grey-dark">{{$album->performers}} - {{$album->title}}</h2>

			                @forelse($album->tracks as $track)
			                <div class="m-2 text-justify text-sm">
			                	<p class="text-l m-1 text-grey-dark">{{$track->position}} - {{$track->title}}
			                		@forelse($track->performers as $performer)
			                			@if(strtolower($performer->type) != "main")
			                			 {{$performer->type}}: {{$performer->artist->name}}
			                			@endif
			                		@empty
				                		No performers added yet
				                	@endforelse
			                	</p>
			                </div>
			                @empty
			                No Track added yet.
			                @endforelse

			            </div>
			            <p class="text-indigo-600 text-right mt-10"> <a class="" href="#">View details...</a></p>
			        </div>
			    @empty
				<h2 class=" font-bold h-2 mb-5 text-center">0 album found.</h2>
				@endforelse
				</div>

				<div class="d-flex justify-content-center">
					{!! $albums->links() !!}
				</div>
			</div>
		</div>
	</div>
</x-app-layout>

</div>
