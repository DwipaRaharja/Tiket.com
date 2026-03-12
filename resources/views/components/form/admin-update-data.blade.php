@props ([
    'typeInput',
    'name',
    'nameRequest',
    'placeholder' => null,
    'selectOptions'=>[],
    'value' => null,
])

@switch ($typeInput)
    @case ('text')
        <div class="space-y-2">
            <label
                for="{{ $nameRequest }}"
                class="text-sm font-semibold text-gray-700 capitalize"
                >{{ $name }}</label
            >
            <input
                type="text"
                id="{{ $nameRequest }}"
                name="{{ $nameRequest }}"
                placeholder="{{ $placeholder }}"
                value="{{ old($nameRequest, $value) }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-2 transition outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500"
            />
            @error ($nameRequest)
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        @break
    @case ('textHidden')
        <div>
            <input
                type="text"
                name="{{ $nameRequest }}"
                value="{{ session('bus_id') }}"
                class="hidden w-full rounded-lg border border-gray-300 px-4 py-2 transition outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500"
            />
        </div>
        @break
    @case ('time')
        <div class="space-y-2">
            <label
                for="{{ $nameRequest }}"
                class="text-sm font-semibold text-gray-700"
                >{{ $name }}</label
            >
            <input
                type="time"
                id="{{ $nameRequest }}"
                name="{{ $nameRequest }}"
                placeholder="{{ $placeholder }}"
                value="{{ old($nameRequest, $value) }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-2 transition outline-none focus:ring-2 focus:ring-indigo-500"
            />
            @error ($nameRequest)
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        @break
    @case ('number')
        <div class="space-y-2">
            <label
                for="{{ $nameRequest }}"
                class="text-sm font-semibold text-gray-700"
                >{{ $name }}</label
            >
            <input
                type="number"
                id="{{ $nameRequest }}"
                name="{{ $nameRequest }}"
                placeholder="{{ $placeholder }}"
                value="{{ old($nameRequest, $value) }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-2 transition outline-none focus:ring-2 focus:ring-indigo-500"
            />
        </div>
        @break
    @case ('date')
        <div class="space-y-2">
            <label
                for="{{ $nameRequest }}"
                class="text-sm font-semibold text-gray-700"
                >{{ $name }}</label
            >
            <input
                type="date"
                id="{{ $nameRequest }}"
                name="{{ $nameRequest }}"
                value="{{ old($nameRequest, $value) }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-2 transition outline-none focus:ring-2 focus:ring-indigo-500"
            />
        </div>
        @break
    @case ('select')
        <div class="space-y-2">
            <label
                for="{{ $nameRequest }}"
                class="text-sm font-semibold text-gray-700 capitalize"
                >{{ $name }}</label
            >
            <select
                id="{{ $nameRequest }}"
                name="{{ $nameRequest }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-2 transition outline-none focus:ring-2 focus:ring-indigo-500"
            >
                <option value="">Pilih</option>

                @foreach ($selectOptions as $option)
                    <option
                        value="{{ $option }}"
                        class="capitalize"
                        @selected (old($nameRequest, $value) == $option)
                        >{{ $option }}
                    </option>
                @endforeach
            </select>
        </div>
        @break

@endswitch
