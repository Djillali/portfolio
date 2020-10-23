<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage albums
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
		        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
				    <div class="px-6 py-4 text-2xl">
				    	<div class="font-bold text-xl mb-2">List all albums from database:</div>
				    </div>

				    @if (count($albums) < 1)
				    	<div class="text-l mb-2">No album found.</div>
				    @else
					    <table class="min-w-full">
							<thead>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Picture</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Title</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Release Date</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Description</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Actions</th>
							</thead>
							<tbody class="bg-white">
								@foreach($albums as $album)
								<tr>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
										<div style="width: 200px">
											<img src="{{$album->picture}}" alt="Picture not loading :(" class="img-fluid">
										</div>
									</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{$album->title}}</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{$album->release_date}}</td>
									<td class="px-6 py-4 border-b border-gray-500">
										{{\Illuminate\Support\Str::limit($album->description, 300, '(...)') }}
									</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
										<a class="btn btn-outline-primary" role="button" href="/music/albums/{{$album->id}}">
										<button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Show</button>
										</a>

										<br>

										<a class="btn btn-outline-primary" role="button" href="/music/albums/{{$album->id}}/edit">
										<button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Modify</button>
										</a>

										<br>

										<form method="post" action="/music/albums/{{$album->id}}">
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

						<div class="d-flex justify-content-center">
							{!! $albums->links() !!}
						</div>
				    @endif

				    <br>

					<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 mb-4 border border-blue-500 hover:border-transparent rounded">
						<a href="/music/albums/create">Add a new album manually</a>
					</button>

					<form method="POST" action="/music/albums/import" enctype="multipart/form-data">
						@csrf
						<div class="input-group">
							<div class="file_input">
								<label class="image_input_button md1-button md1-js-button md1-button--fab">
									<i class="material-icons">Upload albums .json file: </i>
									<input type="file" name="filename" id="filename" class="none">
								</label>
								<button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 mb-4 border border-blue-500 hover:border-transparent rounded">Import albums from .json</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>

