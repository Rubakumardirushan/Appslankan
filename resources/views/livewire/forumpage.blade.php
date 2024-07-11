<div>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebDeveloper.com</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media (max-width: 1024px) {
            #sidebar-content {
                display: none;
            }
            #sidebar-content.show {
                display: block;
            }
        }
        
        /* New styles for dropdown list in mobile view */
        @media (max-width: 1024px) {
            #mobile-dropdown {
                appearance: none;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 24 24' stroke='white'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
                background-repeat: no-repeat;
                background-position: right 0.5rem center;
                background-size: 1.5em 1.5em;
                padding-right: 2.5rem;
            }
            
            #mobile-dropdown option {
                background-color: #1f2937;
                color: white;
            }
        }

        /* Ensure the body can scroll when the dropdown is open */
        body {
            overflow-y: auto;
        }

        /* Additional styling for select dropdown */
        #mobile-dropdown {
            display: block;
            width: 100%;
            padding: 0.75rem;
            line-height: 1.25;
            border-radius: 0.375rem;
            border-width: 1px;
            background-color: #fff;
            background-clip: padding-box;
            border-color: #d1d5db;
            color: #4b5563;
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    @if($loginpage)
    @include('forum-flex::livewire.authheader')
    
    @else
    @include('forum-flex::livewire.header')
    @endif
    
    <!-- Mobile dropdown -->
    <div class="lg:hidden fixed top-0 left-0 right-0 z-50 bg-white text-black p-2 flex flex-1 lg:mt-0 mt-16">
        <select name="" id="mobile-dropdown" class="w-full bg-white text-black border border-gray-300 rounded px-2 py-1">
            <option value="">New Discussion</option>
            <option value="">Add Category</option>
            <option value="">My Question</option>
            <option value="">My Answer</option>
            <option value="">Category</option>
        </select>
    </div>

    <div class="flex flex-1 lg:mt-0 mt-16">
        <aside class="hidden lg:block">
            @include('forum-flex::livewire.sidebar')
        </aside>
        <main class="flex-1 w-full">
            @include('forum-flex::livewire.content')
        </main>
    </div>
</body>
</html>

</div>