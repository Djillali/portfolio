<div>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        	<a href="{{ route('artists') }}">Manage artists </a>- Add new artist
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
		        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
				    <div class="px-6 py-4 text-2xl">
				    	<div class="font-bold text-lg mb-2">New artist information</div>
				    </div>

				    <br>

				    <form wire:submit.prevent="submitForm" class="mb-6" method="POST" action="/music/artists">
					@csrf
						<div class="flex items-center w-full">
							<div class="flex flex-col mb-2 mr-3 ml-3 md:w-1/4">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="name">Artist name:</label>
								<input wire:model="name" class="border py-2 px-3 text-grey-darkest" type="text" name="name" id="name">
								@error('name')
								<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
								  <span class="block sm:inline">{{$message}}</span>
								</div>
								@enderror
							</div>
							<div class="flex flex-col mb-2 mr-3 ml-3 md:w-2/4">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest disable" for="picture">Artist picture:</label>
								<input wire:model="picture" class="border py-2 px-3 text-grey-darkest" type="text" name="picture" id="picture" value="{{$picture}}">
							</div>
							<div class="flex flex-col mb-2 mr-3 ml-3 md:w-1/4">
								<a href="https://www.google.com/search?q={{$name}}&tbm=isch" target="_blank"><button wire:click="search" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none" type="button">Search google</button></a>
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
							<div class="flex flex-col mb-2 md:w-1/4">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="country">Artist country:</label>
								<input wire:model="country" class="border py-2 px-3 text-grey-darkest" type="text" name="country" id="country">
							</div>

							<dir class="flex flex-col mb-2 md:w-1/4">
								<label for='date_of_birth'>Date of birth: </label>
								<input wire:model="date_of_birth" class="form-control" type="date" name="date_of_birth" id="date_of_birth"/>
							    <script>
							        $('#date_of_birth').datepicker({
							            uiLibrary: 'bootstrap4'
							        });
							    </script>
							</dir>

							<dir class="flex flex-col mb-2 md:w-1/4">
								<label for='date_of_death'>Date of death: </label>
								<input wire:model="date_of_death" class="form-control" type="date" name="date_of_death" id="date_of_death"/>
							    <script>
							        $('#date_of_death').datepicker({
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
