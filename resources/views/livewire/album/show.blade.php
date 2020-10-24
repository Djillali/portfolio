<div>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        	<a href="{{ route('albums') }}">Manage albums </a>- Album details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
		        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
				    <div class="px-6 py-4 text-2xl">
				    	<div class="font-bold text-lg mb-2">Album information</div>
				    </div>
				    <br>
				    <div class="grid grid-cols-2 grid-flow-col gap-4">
				    	<div>
				    		<div style="width: 600px">
								<img src="{{$album->picture}}" alt="Picture not loading :(" class="img-fluid">
							</div>
				    	</div>
				    	<div>
				    		<p class=" text-lg mb-2">Title: {{$album->title}}</p>
				    		<p class=" text-lg mb-2">Release date: {{$album->release_date}}</p>
				    		<p wire:model="description" class=" text-lg mb-2">Notes: {{ $description }}
				    			@if(\Illuminate\Support\Str::length($description)>1024)
				    			<a wire:click="read_more">{{$read_state}}</a>
				    			@endif
				    		</p>
				    	</div>
				    </div>
				    <br>
				    <div class="grid">
				    	<p class=" text-lg mb-2">Tracklist:</p>
				    	@if($album->tracks->isEmpty())
				    	<p class=" text-lg mb-2">No tracks associated with this album yet.</p>
				    	@endif


				    	<table class="min-w-full">
				    		<thead>
				    			<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Track</th>
				    			<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Performers</th>
				    			<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Actions</th>
				    		</thead>
				    		<tbody class="bg-white">
				    			@foreach($album->tracks->sortBy('position')->sortBy('disc_number') as $track)

				    			<tr>
				    				<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">Disc:{{$track->disc_number}} #{{$track->position}} - {{$track->title}} ({{$track->duration}})</td>
				    				<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">None</td>
				    				<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
				    					<a role="button" href="/music/tracks/{{$track->id}}/edit">
											<button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Modify</button>
										</a>
										<form method="post" action="/music/tracks/{{$track->id}}">
										@csrf
										@method('delete')
											<button type="button" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none" onclick="confirm('{{ __("Are you sure you want to delete this album?") }}') ? this.parentElement.submit() : ''">
												<i class="material-icons">Delete</i>
												<div class="ripple-container"></div>
											</button>
										</form>
				    				</td>
				    			</tr>
				    			@endforeach
				    		</tbody>
				    	</table>

						</a>
				    	<br>

				    	<a role="button" href="/music/albums/{{$album->id}}/tracks/create">
						<button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Add a track to this album</button>
						</a>
				    </div>
				</div>
		    </div>
		</div>
	</div>
</x-app-layout>

</div>
