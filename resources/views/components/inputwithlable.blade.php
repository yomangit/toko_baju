@props(['error', 'type', 'disabled' => false])
{{-- <label for="" @disabled($disabled)
    {{ $attributes->class([
        'block px-3 font-semibold border shadow-sm input input-bordered input-xs placeholder-slate-400 focus:outline-none focus:border-accent focus:ring-accent focus:ring-1',
        'block px-3 font-semibold border shadow-sm input input-bordered input-xs placeholder-slate-400 outline-none border-rose-500 ring-rose-500 ring-1' => $error,
    ]) }}>
    <span class="label">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
            <path fill-rule="evenodd"
                d="m3.855 7.286 1.067-.534a1 1 0 0 0 .542-1.046l-.44-2.858A1 1 0 0 0 4.036 2H3a1 1 0 0 0-1 1v2c0 .709.082 1.4.238 2.062a9.012 9.012 0 0 0 6.7 6.7A9.024 9.024 0 0 0 11 14h2a1 1 0 0 0 1-1v-1.036a1 1 0 0 0-.848-.988l-2.858-.44a1 1 0 0 0-1.046.542l-.534 1.067a7.52 7.52 0 0 1-4.86-4.859Z"
                clip-rule="evenodd" />
        </svg>

    </span>
    <input type="text" placeholder="URL" />
</label> --}}
{{-- <x-text-input wire:model.live='phone_number' :error="$errors->get('phone_number')" type="number" placeholder="Phone Number" --}}
<label class="input">
    <span class="label">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
            <path fill-rule="evenodd"
                d="m3.855 7.286 1.067-.534a1 1 0 0 0 .542-1.046l-.44-2.858A1 1 0 0 0 4.036 2H3a1 1 0 0 0-1 1v2c0 .709.082 1.4.238 2.062a9.012 9.012 0 0 0 6.7 6.7A9.024 9.024 0 0 0 11 14h2a1 1 0 0 0 1-1v-1.036a1 1 0 0 0-.848-.988l-2.858-.44a1 1 0 0 0-1.046.542l-.534 1.067a7.52 7.52 0 0 1-4.86-4.859Z"
                clip-rule="evenodd" />
        </svg>
    </span>
    <input type="text" placeholder="URL" />
</label>
