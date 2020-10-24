	@foreach($new_artists as $artist)
	<br>
	<a href="/music/artists/{{$artist->id}}" target="_blank">Artist ({{$artist->name}}) created</a>
	@endforeach

	<br>
	<a href="/music/albums/{{$album->id}}" target="_blank">Album ({{$album->title}}) created</a>

	@foreach($new_tracks as $track)
	<br> Track ({{$track->title}}) created
	@endforeach
