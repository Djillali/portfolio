<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage tracks
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
		        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
				    <div class="px-6 py-4 text-2xl">
				    	<div class="font-bold text-xl mb-2">List all tracks from database:</div>
				    </div>

				    <div class="d-flex justify-content-center">
						{!! $tracks->links() !!}
					</div>

				    @if (count($tracks) < 1)
				    	<div class="text-l mb-2">No track found.</div>
				    @else
					    <table class="min-w-full">
							<thead>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Album</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Title</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Disc Number</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Position</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">duration</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Actions</th>
							</thead>
							<tbody class="bg-white">
								@foreach($tracks as $track)
								<tr>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{$track->album->title}}</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{$track->title}}</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{$track->disc_number}}</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{$track->position}}</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{$track->duration}}</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
										<a class="btn btn-outline-primary" role="button" href="/music/tracks/{{$track->id}}/edit">
										<button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Modify</button>
										</a>
										<form method="post" action="/music/tracks/{{$track->id}}">
											@csrf
											@method('delete')
											<button type="button" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none" onclick="confirm('{{ __("Are you sure you want to delete this track?") }}') ? this.parentElement.submit() : ''">
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
							{!! $tracks->links() !!}
						</div>
				    @endif

				    <br>

					<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 mb-4 border border-blue-500 hover:border-transparent rounded">
						<a href="/music/tracks/create">Add a new track manually</a>
					</button>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
