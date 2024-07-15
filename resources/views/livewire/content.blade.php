<div class="p-4 flex-1">
    <h2 class="text-2xl font-bold mb-4">Welcome to WebDeveloper.com!</h2>
    <!-- Your content goes here -->
    <div class="space-y-4">
        @foreach($threads as $thread)
            <div class="relative p-6 bg-white rounded-lg shadow-md border border-gray-200">
                <!-- Three dots button -->
                <button class="absolute top-0 right-0 mt-2 mr-2 focus:outline-none" wire:click.prevent="faction({{ $thread->id }})">
                  ...
                </button>

                <!-- Edit and Delete options -->
                 @if($act== true && $thread->author_id == auth()->id() && $authid == $thread->id)
                <div id="options-{{ $thread->id }}" class=" absolute top-0 right-0 mt-10 mr-2 bg-white border border-gray-200 rounded-md shadow-lg">
                    <button wire:click.prevent="edit()" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none" >Edit</button>
                    <button wire:click.prevent="destory()" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100 focus:outline-none ">Delete</button>
                </div>
            
                @endif
                <!-- Thread content -->
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $thread->title }}</h3>
                    <span class="text-sm text-gray-500 text-green-600">{{ $thread->author_name }}</span>
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

