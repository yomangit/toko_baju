@props(['type', 'disabled' => false])

<div class="relative flex items-center">
    <input id="11" @isset($type) type="{{ $type }}" @endif
        {{ $attributes->class([
            'relative block pl-8 pr-4 font-semibold border shadow-sm input input-bordered input-xs placeholder-slate-400 focus:outline-none focus:border-accent focus:ring-accent focus:ring-1',
        ]) }} />

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="absolute ml-3 size-4">
        <path fill-rule="evenodd"
            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
            clip-rule="evenodd" />
    </svg>
</div>
