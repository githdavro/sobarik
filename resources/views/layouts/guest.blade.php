<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIBAKRI') }}</title>
    <link rel="icon" type="image/x-icon" href="storage/logo/sibakri.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900" style="background-color: #fafafa;">
    <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0">
        <!-- Back Button -->
        <div class="absolute top-4 left-4">
            <a href="{{ route('welcome') }}"
                class="inline-flex items-center px-4 py-2 text-lg text-gray-900 border-gray-300 rounded-md shadow-sm dark:text-gray-900 hover:text-gray-900 dark:hover:text-gray-100 dark:border-gray-600 ">
                &larr;Back
            </a>
        </div>

        <div>
            <a href="/">
                <x-application-logo />
            </a>
        </div>

        <div
            class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
