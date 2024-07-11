<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion Forum</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="mt-16">
    <div id="sidebar-content" class="bg-gray-200 w-64 p-4 flex flex-col space-y-4 lg:block hidden">
        <button id="newDiscussionBtn" class="mt-2 bg-blue-500 text-white p-2 rounded hover:bg-blue-600 w-full">New Discussion</button>
        
        <div class="mt-4">
            <button class="mt-2 bg-green-500 text-white p-2 rounded hover:bg-green-600 w-full">Add Category</button>
        </div>
        
        <nav class="space-y-2">
            <a href="#" class="block p-2 bg-white rounded hover:bg-gray-100 text-center">My Question</a>
            <a href="#" class="block p-2 bg-white rounded hover:bg-gray-100 text-center">My Answer</a>
            <a href="#" class="block p-2 bg-white rounded hover:bg-gray-100 text-center">Category</a>
        </nav>
    </div>
</div>

<!-- Modal for New Discussion Form -->
<div id="newDiscussionModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold mb-4">New Discussion</h2>
            <button id="closeModalBtn" class="text-gray-600">&times;</button>
        </div>
        <form id="discussionForm">
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" name="category" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Select a category</option>
                    <option value="Category1">Category 1</option>
                    <option value="Category2">Category 2</option>
                    <option value="Category3">Category 3</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="thread" class="block text-sm font-medium text-gray-700">Thread</label>
                <input type="text" id="thread" name="thread" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                <textarea id="body" name="body" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 w-full">Submit</button>
        </form>
    </div>
</div>

<script>
    // Get elements
    var newDiscussionBtn = document.getElementById('newDiscussionBtn');
    var newDiscussionModal = document.getElementById('newDiscussionModal');
    var closeModalBtn = document.getElementById('closeModalBtn');

    // Show modal
    newDiscussionBtn.onclick = function() {
        newDiscussionModal.classList.remove('hidden');
    }

    // Hide modal
    closeModalBtn.onclick = function() {
        newDiscussionModal.classList.add('hidden');
    }

    // Hide modal when clicking outside of the modal content
    window.onclick = function(event) {
        if (event.target == newDiscussionModal) {
            newDiscussionModal.classList.add('hidden');
        }
    }

    // Handle form submission
    document.getElementById('discussionForm').onsubmit = function(event) {
        event.preventDefault();
        // Handle form submission logic here
        newDiscussionModal.classList.add('hidden');
        alert('Form submitted!');
    }
</script>
</body>
</html>
