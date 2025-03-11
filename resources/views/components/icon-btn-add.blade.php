@props(['data_tip'])
<label {{ $attributes->merge([
    'class' => 'btn btn-square btn-xs btn-primary tooltip tooltip-primary',
]) }}>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"class="size-5  ml-[1px] mt-[1.5px]">
        <path fill-rule="evenodd"
            d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm.75-11.25a.75.75 0 0 0-1.5 0v2.5h-2.5a.75.75 0 0 0 0 1.5h2.5v2.5a.75.75 0 0 0 1.5 0v-2.5h2.5a.75.75 0 0 0 0-1.5h-2.5v-2.5Z"
            clip-rule="evenodd" />
    </svg>
    @isset($data_tip) data-tip="{{ $data_tip }}" @endif
</label>
