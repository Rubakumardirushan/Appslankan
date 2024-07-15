<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion Forum</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col h-screen">
<!-- Mobile menu button -->
<button id="mobileMenuButton" class="lg:hidden p-4 bg-blue-500 text-white">Menu</button>

<div class="flex flex-1">
    <div id="sidebar-content" class="bg-gray-200 w-64 p-4 flex flex-col space-y-4 lg:block hidden">
        <button wire:click.prevent="showthreadpage()" id="newDiscussionBtn" class="mt-2 bg-blue-500 text-white p-2 rounded hover:bg-blue-600 w-full">New Discussion</button>
        
        <div class="mt-4">
            <button wire:click.prevent="showcatgoerypage()" id="addCategoryBtn" class="mt-2 bg-green-500 text-white p-2 rounded hover:bg-green-600 w-full">Add Category</button>
        </div>
        
        <nav class="space-y-2">
            <a href="#" class="block p-2 bg-white rounded hover:bg-gray-100 text-center">My Question</a>
            <a href="#" class="block p-2 bg-white rounded hover:bg-gray-100 text-center">My Answer</a>
            <a href="#" class="block p-2 bg-white rounded hover:bg-gray-100 text-center">Category</a>
        </nav>
    </div>
    <div class="flex-1">
        <!-- Main content goes here -->
    </div>
</div>

<!-- Modal for New Discussion Form -->
@if($threadpage)
<div id="newDiscussionModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold mb-4">New Discussion</h2>
            <button wire:click.prevent="hidethreadpage()" id="closeNewDiscussionModalBtn" class="text-gray-600">&times;</button>
        </div>
        <form id="discussionForm" wire:submit.prevent="store()">
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select wire:model="category" id="category" name="category" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                   <option value="">Select Category</option>
                   @foreach($categories as $cat)
                       <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                   @endforeach
                </select>
               
            </div>
            <div class="mb-4">
                <label for="thread" class="block text-sm font-medium text-gray-700">Thread</label>
                <input type="text" wire:model="thread" id="thread" name="thread" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                
            </div>
            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                <textarea id="body" wire:model="body" name="body" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
              
            </div>
            <button  wire:loading.attr="disabled"  type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 w-full">Submit</button>
        </form>
    </div>
</div>
@endif

<!-- Modal for Add Category Form -->
@if($catgoerypage)
<div id="addCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold mb-4">Add Category</h2>
            <button wire:click.prevent="hidecatgoerypage()" id="closeAddCategoryModalBtn" class="text-gray-600">&times;</button>
        </div>
        <form id="categoryForm">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model="name" id="name" name="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('name') <span class="error bg-red ">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" wire:model="description" name="description" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button wire:click.prevent="addCategory()" type="submit" class="bg-green-500 text-white p-2 rounded hover:bg-green-600 w-full">Submit</button>
        </form>
    </div>
</div>
@endif
@if($editpage==true)
<div id="newDiscussionModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold mb-4">New Discussion</h2>
            <button wire:click.prevent="hidethreadpage()" id="closeNewDiscussionModalBtn" class="text-gray-600">&times;</button>
        </div>
        <form id="discussionForm" wire:submit.prevent="update()">
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select wire:model="category" id="category" name="category" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                   <option value="">Select Category</option>
                   @foreach($categories as $cat)
                       <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                   @endforeach
                </select>
               
            </div>
            <div class="mb-4">
                <label for="thread" class="block text-sm font-medium text-gray-700">Thread</label>
                <input type="text" wire:model="thread" id="thread" name="thread" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                
            </div>
            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                <textarea id="body" wire:model="body" name="body" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
              
            </div>
            <button  wire:loading.attr="disabled"  type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 w-full">Submit</button>
        </form>
    </div>
</div>

@endif





<script>
    document.getElementById('mobileMenuButton').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar-content');
        sidebar.classList.toggle('hidden');
    });
</script>
</body>
</html>
