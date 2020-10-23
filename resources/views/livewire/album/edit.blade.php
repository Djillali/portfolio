<div>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        	<a href="{{ route('albums') }}">Manage albums </a>- {{$header}}
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

				    <form wire:submit.prevent="submitForm" class="mb-6" method="POST" action="/music/albums">
					@csrf
						<div class="flex items-center w-full">
							<div class="flex flex-col mb-2 mr-3 ml-3 md:w-1/4">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="title">album title:</label>
								<input wire:model="title" class="border py-2 px-3 text-grey-darkest" type="text" name="title" id="title">
								@error('title')
								<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
								  <span class="block sm:inline">{{$message}}</span>
								</div>
								@enderror
							</div>
							<div class="flex flex-col mb-2 mr-3 ml-3 md:w-2/4">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest disable" for="picture">album picture:</label>
								<input wire:model="picture" class="border py-2 px-3 text-grey-darkest" type="text" name="picture" id="picture" value="{{$picture}}">
							</div>
							<div class="flex flex-col mb-2 mr-3 ml-3 md:w-1/4">
								<a href="https://www.google.com/search?q={{$title}}&tbm=isch" target="_blank"><button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none" type="button">Search google</button></a>
								<div x-data="{ open: true}">
									<button wire:model="btnState" wire:click="btnState" type="button" @click="open = true" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">{{$btnState}}</button>
									<div x-show="open" @click.away="open = false" class="mx-auto p-4 bg-white overflow-hidden">
										<div style="width: 200px">
											<img src="{{$picture}}" alt="Picture not loading :(" class="img-fluid">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="flex items-center w-full">
							<dir class="flex flex-col mb-2 md:w-1/4">
								<label for='release_date'>Release date: </label>
								<input wire:model="release_date" class="form-control" type="date" name="release_date" id="release_date"/>
							    <script>
							        $('#release_date').datepicker({
							            uiLibrary: 'bootstrap4'
							        });
							    </script>
							</dir>
						</div>


						<div class="flex flex-col mb-2 md:w-full">
							<label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for='description'>Description: </label>
							<textarea wire:model="description" class="border py-2 px-3 text-grey-darkest" id="description" name="description" rows="3"></textarea>
						</div>

						<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border block text-lg mx-auto p-4 rounded" type="submit">{{$submit_string}}</button>
				    </form>
				</div>
		    </div>
		</div>
	</div>
</x-app-layout>

</div>
