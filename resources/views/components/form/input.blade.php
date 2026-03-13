@props (['name', 'value', 'inputType'])

@if ($inputType == 'text')
    <div class="space-y-2">
        <label class="text-sm font-semibold text-gray-700 capitalize">{{ $name }}</label>
        <input
            type="text"
            readonly
            value="{{ $value }}"
            class="w-full rounded-lg border border-gray-300 px-4 py-2 transition outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500"
        />
    </div>
@elseif ($inputType == 'number')
    <div class="space-y-2">
        <label class="text-sm font-semibold text-gray-700 capitalize">{{ $name }}</label>
        <input
            type="text"
            readonly
            value="{{ $value ?? '' }}"
            class="w-full rounded-lg border border-gray-300 px-4 py-2 transition outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500"
        />
    </div>
@else

@endif
