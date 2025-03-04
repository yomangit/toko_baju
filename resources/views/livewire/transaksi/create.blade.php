<div>

    <div class="flex justify-between ...">
        <fieldset class="p-4 border shadow-md fieldset w-xs bg-base-200 border-base-300 rounded-box">
            <legend class="fieldset-legend">Page details</legend>
            <label class="relative ">
                <span class="absolute inset-y-0 left-0 z-20 -top-1"><svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <x-text-input wire:model.live='nama_pakaian' class="pl-4" :error="$errors->get('nama_pakaian')" type="text"
                    placeholder="Nama Pakaian" />
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
