<div class="p-4 flex-1">
    <h2 class="text-2xl font-bold mb-4">Welcome to WebDeveloper.com!</h2>
    @if($hidecentent == false)
        <!-- Threads content -->
        <div class="space-y-4">
            @foreach($threads as $thread)
                <div class="relative p-6 bg-white rounded-lg shadow-md border border-gray-200">
                    @if(!$loginpage)
                    @if($newicons == false || $authid != $thread->id)
                        <button class="absolute top-0 right-0 mt-2 mr-2 focus:outline-none" wire:click.prevent="faction({{ $thread->id }})">
                            <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </button>
                    @endif
                    @if($newicons == true && $authid == $thread->id)
                        <button class="absolute top-0 right-0 mt-2 mr-2 focus:outline-none" wire:click.prevent="fdaction({{ $thread->id }})">
                            <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </button>
                    @endif
                    @endif

                    @if($thread->author_id == auth()->id() && $authid == $thread->id)
                        <div id="options-{{ $thread->id }}" class="absolute top-0 right-0 mt-10 mr-2 bg-white border border-gray-200 rounded-md shadow-lg">
                            <button wire:click.prevent="edit()" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none">
                                <svg class="h-5 w-5 inline-block mr-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M13.707 3.293a1 1 0 010 1.414L8.414 10l5.293 5.293a1 1 0 11-1.414 1.414l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Edit
                            </button>
                            <button wire:click.prevent="destroy()" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100 focus:outline-none">
                                <svg class="h-5 w-5 inline-block mr-2 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2H3V4zm14 3v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7h14zm-4-3V4h-6v1h6zM7 11a1 1 0 011-1h1a1 1 0 110 2H8a1 1 0 01-1-1zm4 0a1 1 0 011-1h1a1 1 0 110 2h-1a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                                Delete
                            </button>
                        </div>
                    @endif

                    @if($thread->author_id != auth()->id() && $authid == $thread->id)
                        <button class="absolute top-0 right-0 mt-10 mr-2 bg-white border border-gray-200 rounded-md shadow-lg px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none">
                            <svg class="h-5 w-5 inline-block mr-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 8a2 2 0 013.464-1.232l6.536 6.536a2 2 0 11-2.828 2.828l-6.536-6.536A2 2 0 016 8zm2-6a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd" />
                            </svg>
                            Report Spam
                        </button>
                    @endif

                    <!-- Align view count and title on the same line -->
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xl font-semibold text-gray-800 uppercase">
                            <a href="" wire:click.prevent="handleThreadClick({{ $thread->id }})">
                                <strong>{{ strtoupper($thread->title) }}</strong>
                            </a>
                        </h3>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-gray-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354c-3.196 0-5.9 2.686-5.9 6.006s2.704 6.006 5.9 6.006 5.9-2.686 5.9-6.006-2.704-6.006-5.9-6.006zM12 15.363a3.582 3.582 0 01-3.6-3.6 3.582 3.582 0 013.6-3.6 3.582 3.582 0 013.6 3.6 3.582 3.582 0 01-3.6 3.6zM12 2.2a1.5 1.5 0 011.5 1.5v.5a1.5 1.5 0 01-3 0v-.5A1.5 1.5 0 0112 2.2zM4.928 7.357a1.5 1.5 0 010 2.121L3.393 11.8a1.5 1.5 0 01-2.122-2.121l1.535-1.535a1.5 1.5 0 012.122 0zM20.707 8.978a1.5 1.5 0 010 2.121l-1.535 1.535a1.5 1.5 0 01-2.121-2.121l1.535-1.535a1.5 1.5 0 012.121 0z" />
                            </svg>
                            <p class="text-sm text-gray-600">Views: {{ $thread->view_count }}</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-blue-800 uppercase font-bold">{{ $thread->author_name }}</span>
                    </div>
                    <p class="text-gray-600 leading-normal break-words" style="word-break: break-all;">
                        {{ $thread->body }}
                    </p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $thread->created_at->diffForHumans() }} 
                        @if($showform == true)
                        <button wire:click.prevent="replaytread('{{ $thread->author_name }}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Reply</button>
                        @endif
                        </span>
                        <span class="text-sm font-medium text-blue-600 bg-blue-100 rounded-full px-3 py-1">{{ $thread->category_name }}</span>
                    </div>
                </div>

                @if($replayform == true)
                    <form>
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 font-bold mb-2">Your Reply</label>
                            <textarea wire:model="post" id="content" name="content" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Write your reply here..."></textarea>
                        </div>
                        <div class="flex items-center justify-between">
                            <button wire:click.prevent="storepost('{{ $thread->id }}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                Submit
                            </button>
                        </div>
                    </form>
                @endif

                @if($repliesform == true)
                    <div class="bg-gray-100 p-4 rounded-lg">
                        @foreach($replies as $reply)
                            <div class="mb-4 p-4 bg-white rounded shadow">
                                <p class="text-gray-600 font-bold">{{$reply->user_name}}</p>
                                <p class="text-gray-800 mb-2">{{$reply->content}}</p>
                                <span class="text-sm text-gray-500">{{$reply->created_at->diffForHumans()}}</span>
                                <button wire:click.prevent="replaypost('{{ $reply->user_name }}','{{$reply->id}}')" class="bg-blue-300 hover:bg-blue-700 text-white px-1 rounded">Reply</button>
                            </div>
                            @if($showform == true && $authids == $reply->id)
                                <form>
                                    <div class="mb-4">
                                        <label for="content" class="block text-gray-700 font-bold mb-2">Your Reply</label>
                                        <textarea wire:model="post" id="content" name="content" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Write your reply here..."></textarea>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <button wire:click.prevent="storepost('{{ $thread->id }}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <!-- Categories content -->
        <div class="space-y-4">
            @foreach($categories as $category)
                <a href="" wire:click.prevent="showtcats({{ $category->id }})">
                    <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200 mb-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2 uppercase">
                            {{ strtoupper($category->name) }}
                        </h3>
                        <p class="text-gray-600 leading-normal">
                            {{ $category->description }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
