<label {{ $attributes->merge(['type' => 'submit',
    'class' => 'btn btn-dash btn-error btn-xs']) }}>
    <svg viewBox="0 0 20 20" fill="currentColor" class="size-4"  xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path d="M5 5L19 19M5 19L19 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
    </svg>

    {{ $slot }}
</label>
