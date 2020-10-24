<div>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        	<a href="{{ route('albums') }}">Manage album</a> - <a href="">Album detail</a> - Manually add a track
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
		        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
				    <div class="px-6 py-4 text-2xl">
				    	<div class="font-bold text-lg mb-2">New track information</div>
				    </div>

				    <br>

				    <form wire:submit.prevent="submitForm" class="mb-6" method="POST" action="/music/tracks">
					@csrf
						<div class="flex items-center w-full">
							<div class="flex flex-col mb-2 mr-3 ml-3 md:w-2/4">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="title">Track title:</label>
								<input wire:model="title" class="border py-2 px-3 text-grey-darkest" type="text" name="title" id="title">
								@error('title')
								<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
								  <span class="block sm:inline">{{$message}}</span>
								</div>
								@enderror
							</div>
							<div class="flex flex-col mb-2 md:w-1/4">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="duration">Track duration:</label>
								<input wire:model="duration" class="border py-2 px-3 text-grey-darkest" type="text" name="duration" id="duration">
							</div>
						</div>
						<div class="flex items-center w-full">
							<div class="flex flex-col mb-2 md:w-1/4">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="position">Track position:</label>
								<input wire:model="position" class="border py-2 px-3 text-grey-darkest" type="number" name="position" id="position">
							</div>
							<div class="flex flex-col mb-2 md:w-1/4">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="disc_number">Track disc_number:</label>
								<input wire:model="disc_number" class="border py-2 px-3 text-grey-darkest" type="number" name="disc_number" id="disc_number">
							</div>
						</div>
						<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border block text-lg mx-auto p-4 rounded" type="submit">{{$submit_string}}</button>
				    </form>
				</div>
		    </div>
		</div>
	</div>
</x-app-layout>

</div>
