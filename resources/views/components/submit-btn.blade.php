<button {{ $attributes->merge(['type' => 'submit',
    'class' => 'btn btn-dash btn-success btn-xs']) }}>
    {{-- <svg viewBox="0 0 20 20" fill="currentColor" class="size-5" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <title>save</title>
            <path d="M12.188 4.469v4.656h2.438l-4.875 5.875-4.875-5.875h2.563v-4.656h4.75zM16.313 12l2.844 4.5c0.156 0.375 0.344 1.094 0.344 1.531v8.656c0 0.469-0.375 0.813-0.813 0.813h-17.844c-0.469 0-0.844-0.344-0.844-0.813v-8.656c0-0.438 0.156-1.156 0.313-1.531l2.844-4.5c0.156-0.406 0.719-0.75 1.125-0.75h1.281l1.313 1.594h-2.625l-2.531 4.625c-0.031 0-0.031 0.031-0.031 0.063 0 0.063 0 0.094-0.031 0.125h16.156v-0.125c0-0.031-0.031-0.063-0.031-0.094l-2.531-4.594h-2.625l1.313-1.594h1.25c0.438 0 0.969 0.344 1.125 0.75zM7.469 21.031h4.594c0.406 0 0.781-0.375 0.781-0.813 0-0.406-0.375-0.781-0.781-0.781h-4.594c-0.438 0-0.813 0.375-0.813 0.781 0 0.438 0.375 0.813 0.813 0.813z"></path>
        </g>
    </svg> --}}

    <svg viewBox="0 0 20 20" fill="currentColor" class="size-4" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path d="M8 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H9M8 20V14C8 13.4477 8.44772 13 9 13H15C15.5523 13 16 13.4477 16 14V20M8 20H16M16 20H18C19.1046 20 20 19.1046 20 18V8.82843C20 8.29799 19.7893 7.78929 19.4142 7.41421L16.5858 4.58579C16.2107 4.21071 15.702 4 15.1716 4H15M15 4V7C15 7.55228 14.5523 8 14 8H10C9.44772 8 9 7.55228 9 7V4M15 4H9" stroke="#c8cacb" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
    </svg>

    {{ $slot }}
</button>
