<div>
	<x-app-layout>
	    <x-slot name="header">
	        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
	        	<a href="{{ route('albums') }}">Manage albums </a>- Album details
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
					    <div class="grid grid-cols-2 grid-flow-col gap-4">
					    	<div>
					    		<div style="width: 600px">
									<img src="{{$album->picture}}" alt="Picture not loading :(" class="img-fluid">
								</div>
					    	</div>
					    	<div>
					    		<p class=" text-lg mb-2">Title: {{$album->title}}</p>
					    		<p class=" text-lg mb-2">Release date: {{$album->release_date}}</p>
					    		<p wire:model="description" class=" text-lg mb-2">Notes: {{ $description }}
					    			@if(\Illuminate\Support\Str::length($description)>1024)
					    			<a wire:click="read_more">{{$read_state}}</a>
					    			@endif
					    		</p>
					    	</div>
					    </div>
					</div>
			    </div>
			</div>
		</div>
	</x-app-layout>
</div>
