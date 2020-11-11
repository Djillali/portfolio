<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage gifs
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
		        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
				    <div class="px-6 py-4 text-2xl">
				    	<div class="font-bold text-xl mb-2">List all gifs from database:</div>
				    </div>

				    <div class="d-flex justify-content-center">
						{!! $gifs->links() !!}
					</div>

				    @if (count($gifs) < 1)
				    	<div class="text-l mb-2">No gif found.</div>
				    @else
					    <table class="min-w-full">
							<thead>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 gifing-wider">Title</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 gifing-wider">URL</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 gifing-wider">Uploader</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 gifing-wider">Actions</th>
							</thead>
							<tbody class="bg-white">
								@foreach($gifs as $gif)
								<tr>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{$gif->title}}</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{$gif->url}}</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{$gif->user->name}}</td>
									<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
										<a class="btn btn-outline-primary" role="button" href="/gif/{{$gif->id}}/edit">
										<button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Modify</button>
										</a>
										<a class="btn btn-outline-primary" role="button" href="/gif/{{$gif->id}}/delete">
										<button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Delete</button>
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>

						<div class="d-flex justify-content-center">
							{!! $gifs->links() !!}
						</div>
				    @endif

				    <br>

					<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 mb-4 border border-blue-500 hover:border-transparent rounded">
						<a href="/gif/create">Add a new gif manually</a>
					</button>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>

