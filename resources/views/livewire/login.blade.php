<div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 ">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold mb-4">Login</h2>
            <button wire:click.prevent="closelogin()" id="closeLoginModalBtn" class="text-gray-600">&times;</button>
        </div>
        <form id="loginForm">
            <div class="mb-4">
                <label for="emailLogin" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="emailLogin" name="emailLogin" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                <span class="error" id="emailLoginError"></span>
            </div>
            <div class="mb-4">
                <label for="passwordLogin" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="passwordLogin" name="passwordLogin" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                <span class="error" id="passwordLoginError"></span>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 w-full">Login</button>
        </form>
    </div>
</div>
