<div>
    <!-- component -->
<div class="flex flex-wrap mb-2">
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
        <div class="bg-green-600 border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pl-1 pr-4"><i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                <div class="flex-1 text-right">
                    <h5 class="text-white">Total Users</h5>
                    <h3 class="text-white text-3xl">{{$nbrUsers}}<span class="text-green-400"><i class="fas fa-caret-down"></i></span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
    	<a href="/music/albums">
	        <div class="bg-blue-600 border rounded shadow p-2">
	            <div class="flex flex-row items-center">
	                <div class="flex-shrink pl-1 pr-4"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
	                <div class="flex-1 text-right">
	                    <h5 class="text-white">Total Albums</h5>
	                    <h3 class="text-white text-3xl">
	                    	<span class="text-blue-400"><i class="fas fa-caret-up">
	                    	</i></span>{{$nbrAlbums}}
	                    </h3>
	                </div>
	            </div>
	        </div>
        </a>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2 xl:pr-3 xl:pl-1">
    	<a href="/music/artists">
	        <div class="bg-orange-600 border rounded shadow p-2">
	            <div class="flex flex-row items-center">
	                <div class="flex-shrink pl-1 pr-4"><i class="fas fa-user-plus fa-2x fa-fw fa-inverse"></i></div>
	                <div class="flex-1 text-right pr-1">
	                    <h5 class="text-white">Total Artists</h5>
	                    <h3 class="text-white text-3xl">{{$nbrArtists}}<span class="text-orange-400"><i class="fas fa-caret-up"></i></span></h3>
	                </div>
	            </div>
	        </div>
        </a>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2 xl:pl-3 xl:pr-2">
        <a href="/music/tracks">
            <div class="bg-purple-600 border rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pl-1 pr-4"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
                    <div class="flex-1 text-right">
                        <h5 class="text-white">Total Tracks</h5>
                        <h3 class="text-white text-3xl">{{$nbrTracks}}</h3>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2 xl:pl-2 xl:pr-3">
        <a href="/gif">
            <div class="bg-red-600 border rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pl-1 pr-4"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
                    <div class="flex-1 text-right">
                        <h5 class="text-white">Total Gifs</h5>
                        <h3 class="text-white text-3xl">{{$nbrGifs}}</h3>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2 xl:pl-1">
        <a href="/tags">
            <div class="bg-pink-600 border rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pl-1 pr-4"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
                    <div class="flex-1 text-right">
                        <h5 class="text-white">Total Tags</h5>
                        <h3 class="text-white text-3xl">{{$nbrTags}}<span class="text-pink-400"><i class="fas fa-caret-up"></i></span></h3>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
</div>
