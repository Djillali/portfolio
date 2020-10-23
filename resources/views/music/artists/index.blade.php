<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage artists
        </h2>
    </x-slot>
		        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
				    <div class="px-6 py-4 text-2xl">
				    	<div class="font-bold text-xl mb-2">List all artists from database:</div>
				    </div>

				    @if (count($artists) < 1)
				    	<div class="text-l mb-2">No artists found.</div>
				    @else
					    <table class="min-w-full">
							<thead>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Picture</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Name</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Age</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Country</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Description</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Actions</th>
							</thead>
							<tbody class="bg-white">
								@foreach($artists as $artist)
								<tr>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
										<div style="width: 200px">
											<img src="{{$artist->picture}}" alt="Picture not loading :(" class="img-fluid">
										</div>

									</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{$artist->name}}</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{\App\Models\Artist::find($artist->id)->age}} years</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{$artist->country}}</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
										{{\Illuminate\Support\Str::limit($artist->description, 300, '(...)') }}
									</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
										<a class="btn btn-outline-primary" role="button" href="/music/artists/{{$artist->id}}/edit">
										<button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Modify</button>
										</a><br>

										<form method="post" action="/music/artists/{{$artist->id}}">
											@csrf
											@method('delete')
											<button type="button" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none" onclick="confirm('{{ __("Are you sure you want to delete this artist?") }}') ? this.parentElement.submit() : ''">
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
							{!! $artists->links() !!}
						</div>
				    @endif

				    <br>

					<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
						<a href="/music/artists/create">Add a new artist manually</a>
					</button>
				</div>
</x-app-layout>
