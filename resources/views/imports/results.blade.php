<div>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        	<a href="{{ route('albums') }}">Manage album</a> - Import data - Results
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
		        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
				    <div class="px-6 py-4 text-2xl">
				    	<div class="font-bold text-lg mb-2">Import Results:</div>
				    </div>

				    	@foreach($new_albums as $album)
						<a href="/music/albums/{{$album->id}}" target="_blank">Album ({{$album->title}}) created</a>
						<br>
						@endforeach

						@foreach($new_artists as $artist)
						<br>
						<a href="/music/artists/{{$artist->id}}" target="_blank">Artist ({{$artist->name}}) created</a> - <a href="/music/artists/{{$artist->id}}/edit" target="_blank">Edit</a>
						@endforeach
						<br>

						@foreach($new_tracks as $track)
						<br> Track ({{$track->title}}) created
						@endforeach

				    <br>
				</div>
		    </div>
		</div>
	</div>
</x-app-layout>

</div>
