<label {{ $attributes->merge(['class' => 'btn btn-dash btn-error btn-xs ']) }}>
    <svg viewBox="0 0 20 20" fill="currentColor" class="size-4" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path d="M6 6L18 18M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
    </svg>
    {{ $slot }}
</label>
