<header style="background-color: white; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);">
    <div style="max-width: 1280px; margin-left: auto; margin-right: auto; padding: 0.5rem 1rem; display: flex; justify-content: space-between; align-items: center;">
        <div style="display: flex; align-items: center;">
            <svg style="width: 32px; height: 32px; margin-right: 0.5rem;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
            </svg>
            <div style="font-size: 2rem; font-weight: 700; color: #1a202c; font-family: Arial, sans-serif;">
                Forum
            </div>
        </div>
        <div style="display: flex; align-items: center;">
            
            <div style="display: flex; align-items: center;">
                <button style="color: #4a5568; font-weight: 600; margin-right: 1rem; background: none; border: none;">{{ Auth::user()->name }}</button>
                <button wire:click.prevent="logout()" style="background-color: #e53e3e; color: white; padding: 0.5rem 1rem; border: none; border-radius: 0.25rem; font-weight: 600; cursor: pointer;">Logout</button>
            </div>
        </div>
    </div>
</header>
