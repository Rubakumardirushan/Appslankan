<div class="p-4 flex-1">
    <h2 class="text-2xl font-bold mb-4">Welcome to WebDeveloper.com!</h2>
    <!-- Your content goes here -->
    <div class="space-y-4">
        @foreach($threads as $thread)
            <div class="relative p-6 bg-white rounded-lg shadow-md border border-gray-200">
                <!-- Three dots icon button -->
                @if(!$loginpage)
                    <button class="absolute top-0 right-0 mt-2 mr-2 focus:outline-none" wire:click.prevent="faction({{ $thread->id }})">
                        <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </button>
                @endif

                <!-- Conditional Edit and Delete options -->
                @if($act && $thread->author_id == auth()->id() && $authid == $thread->id)
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

                @if($spam && $thread->author_id != auth()->id() && $authid == $thread->id)
                    <!-- Report Spam button -->
                    <button class="absolute top-0 right-0 mt-10 mr-2 bg-white border border-gray-200 rounded-md shadow-lg px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none">
                        <svg class="h-5 w-5 inline-block mr-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 8a2 2 0 013.464-1.232l6.536 6.536a2 2 0 11-2.828 2.828l-6.536-6.536A2 2 0 016 8zm2-6a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd" />
                        </svg>
                        Report Spam
                    </button>
                @endif

                <!-- Thread content -->
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $thread->title }}</h3>
                    <div class="flex items-center">
                        <span class="text-sm text-blue-800 uppercase">{{ $thread->author_name }}</span>
                        @if($thread->is_verified)
                            <svg class="h-5 w-5 ml-1 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 19l-9-9 1.414-1.414L10 16.172l8.586-8.586L19 10l-9 9z" clip-rule="evenodd" />
                            </svg>
                        @endif
                    </div>
                </div>
                <p class="text-gray-600 leading-normal break-words" style="word-break: break-all;">
                    {{ $thread->body }}
                </p>
                <div class="mt-4 flex justify-between items-center">
                    <span class="text-sm text-gray-500">{{ $thread->created_at->diffForHumans() }}</span>
                    <span class="text-sm font-medium text-blue-600 bg-blue-100 rounded-full px-3 py-1">{{ $thread->category_name }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
