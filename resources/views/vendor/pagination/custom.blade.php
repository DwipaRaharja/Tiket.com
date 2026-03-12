@if ($paginator->hasPages())

<div
    class="flex items-center justify-between border-t border-gray-100 bg-gray-50 px-6 py-4"
>

    {{-- INFO --}}
    <span class="text-xs text-gray-500">
        Menampilkan {{ $paginator->firstItem() }}
        sampai {{ $paginator->lastItem() }}
        dari {{ $paginator->total() }} data
    </span>

    {{-- BUTTON --}}
    <div class="flex space-x-2">

        {{-- PREV --}}
        @if ($paginator->onFirstPage())
            <span class="rounded border border-gray-300 px-3 py-1 text-xs text-gray-400">
                Prev
            </span>
        @else
            <a
                href="{{ $paginator->previousPageUrl() }}"
                class="rounded border border-gray-300 px-3 py-1 text-xs hover:bg-white"
            >
                Prev
            </a>
        @endif


        {{-- NUMBER --}}
        @foreach ($elements as $element)

            @if (is_array($element))

                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())

                        <span
                            class="rounded border border-indigo-200 bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-600"
                        >
                            {{ $page }}
                        </span>

                    @else

                        <a
                            href="{{ $url }}"
                            class="rounded border border-gray-300 px-3 py-1 text-xs hover:bg-white"
                        >
                            {{ $page }}
                        </a>

                    @endif

                @endforeach

            @endif

        @endforeach


        {{-- NEXT --}}
        @if ($paginator->hasMorePages())
            <a
                href="{{ $paginator->nextPageUrl() }}"
                class="rounded border border-gray-300 px-3 py-1 text-xs hover:bg-white"
            >
                Next
            </a>
        @else
            <span class="rounded border border-gray-300 px-3 py-1 text-xs text-gray-400">
                Next
            </span>
        @endif

    </div>

</div>

@endif