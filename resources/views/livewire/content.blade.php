<div class="p-4 flex-1">
    <h2 class="text-2xl font-bold mb-4">Welcome to WebDeveloper.com!</h2>
    <!-- Your content goes here -->
    <div class="space-y-4">
        @foreach($threads as $thread)
            <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $thread->title }}</h3>
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
