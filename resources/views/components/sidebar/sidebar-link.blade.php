@props (['name', 'link'])
<li
    class="group flex items-center justify-start p-0.5 pl-2 transition-all duration-300 hover:bg-mist-600"
>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="size-5 stroke-white stroke-2">{{ $slot  }}</svg>
    <a href="{{ $link }}" class="block p-2 text-base font-medium text-white capitalize">{{ $name }}</a>
</li>
