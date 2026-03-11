@props (['title', 'value', 'text'])

<div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
    <p class="text-sm font-medium text-gray-500 uppercase">{{ $title }}</p>
    <h2 class="mt-1 text-3xl font-bold text-black">{{ $value }}</h2>
    <p class="mt-2 text-xs text-gray-600">{{ $text }}</p>
</div>
