@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'flex items-start p-2 text-sm text-red-600 bg-red-50 border border-red-300 rounded-lg dark:bg-red-900 dark:text-red-400 dark:border-red-800']) }}>

        <svg class="flex-shrink-0 w-5 h-1" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet"><circle fill="#BE1931" cx="18" cy="32" r="3"></circle><path fill="#BE1931" d="M21 24a3 3 0 0 1-6 0V5a3 3 0 1 1 6 0v19z"></path></svg>

        <!-- Error Messages -->
        <ul class="space-y-1">
            @foreach ((array) $messages as $message)
                <li>{{ str_replace('The ', '', $message) }}</li>
            @endforeach
        </ul>
    </div>
@endif
