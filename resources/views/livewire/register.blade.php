<div id="" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 ">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold mb-4">Register</h2>
            <button wire:click.prevent="closeregister()" id="closeRegisterModalBtn" class="text-gray-600">&times;</button>
        </div>
        <form id="registerForm" >
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input wire:model="email" type="email" id="email" name="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input wire:model="username" type="text" id="username" name="username" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input wire:model="password" type="password" id="password" name="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                
            </div>
            <div class="mb-4">
                <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input wire:model="password_confirmation" type="password" id="confirmPassword" name="confirmPassword" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
               
            </div>
            <button wire:click.prevent="registerd()" type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 w-full">Register</button>
        </form>
    </div>
</div>