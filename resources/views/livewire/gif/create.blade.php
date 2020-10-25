<div>


<x-guest-layout>

    <div class="py-4">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-400 overflow-hidden shadow-xl sm:rounded-lg">
            	<div class="m-8 font-semibold">
					Add a gif:
				</div>
				<div class="ml-8">
					<form wire:submit.prevent="submitForm" class="mb-6" method="POST" action="">
					@csrf
						<div class="flex items-center w-full">
							<div class="flex flex-col mb-2 mr-3 ml-3 md:w-1/8">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="title">Title:</label>
								<input wire:model="title" class="border py-2 px-3 text-grey-darkest" type="text" name="title" id="title">
								@error('title')
								<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
								  <span class="block sm:inline">{{$message}}</span>
								</div>
								@enderror
							</div>
							<div class="flex flex-col mb-2 mr-3 ml-3 md:w-2/4">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest disable" for="url">url:</label>
								<input wire:model="url" class="border py-2 px-3 text-grey-darkest" type="text" name="url" id="url">
								@error('url')
								<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
								  <span class="block sm:inline">{{$message}}</span>
								</div>
								@enderror
							</div>
							<div class="flex flex-col mb-2 mr-3 ml-3 md:w-2/4">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest disable" for="tags">tags:</label>
								<input wire:model="tags" class="border py-2 px-3 text-grey-darkest" type="text" name="tags" id="tags">
								@error('tags')
								<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
								  <span class="block sm:inline">{{$message}}</span>
								</div>
								@enderror
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
