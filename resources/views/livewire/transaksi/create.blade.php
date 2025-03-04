<div>

    <div class="flex justify-between ...">
        <fieldset class="p-4 border shadow-md fieldset w-xs bg-base-200 border-base-300 rounded-box">
            <legend class="fieldset-legend">Page details</legend>
            <label class="input">
                <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                        stroke="currentColor">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </g>
                </svg>
                <input type="search" class="grow" placeholder="Search" />

            </label>
            <fieldset class="pb-0.5 fieldset ">
                <x-lable-req>{{ __('nama pakaian') }}</x-lable-req>
                <x-text-input wire:model.live='nama_pakaian' :error="$errors->get('nama_pakaian')" type="text"
                    placeholder="Nama Pakaian" />
                <x-input-error :messages="$errors->get('nama_pakaian')" />
            </fieldset>

            <label class="fieldset-label">Slug</label>
            <input type="text" class="input" placeholder="my-awesome-page" />

            <label class="fieldset-label">Author</label>
            <input type="text" class="input" placeholder="Name" />
        </fieldset>
        <div class="bg-orange-500">02</div>

    </div>
</div>
