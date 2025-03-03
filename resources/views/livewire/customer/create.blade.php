<div class="shadow-sm bg-base-200 ">
    <form wire:submit.prevent='store'>
        <fieldset class="px-2 border fieldset bg-base-200 border-base-300 ">
            <legend class="fieldset-legend">Tambah Kostumer</legend>
            <x-lable-req>{{ __('nama') }}</x-lable-req>
            <x-text-input wire:model.live='name' :error="$errors->get('name')" type="text" placeholder="Nama Pakaian" />
            <x-input-error :messages="$errors->get('name')" />
            <x-lable-req>{{ __('no. telepon') }}</x-lable-req>
            <label for="" class="input">
                <span class="label">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd"
                            d="m3.855 7.286 1.067-.534a1 1 0 0 0 .542-1.046l-.44-2.858A1 1 0 0 0 4.036 2H3a1 1 0 0 0-1 1v2c0 .709.082 1.4.238 2.062a9.012 9.012 0 0 0 6.7 6.7A9.024 9.024 0 0 0 11 14h2a1 1 0 0 0 1-1v-1.036a1 1 0 0 0-.848-.988l-2.858-.44a1 1 0 0 0-1.046.542l-.534 1.067a7.52 7.52 0 0 1-4.86-4.859Z"
                            clip-rule="evenodd" />
                    </svg>

                </span>
                <x-text-input wire:model.live='phone_number' :error="$errors->get('phone_number')" type="number" placeholder="Phone Number"
                    placeholder="No. Telepon" />
            </label>
            <x-input-error :messages="$errors->get('phone_number')" />
            <x-lable-req>{{ __('alamat') }}</x-lable-req>
            <x-text-input wire:model.live='address' :error="$errors->get('address')" type="text" placeholder="alamat" />
            <x-input-error :messages="$errors->get('address')" />
            <x-lable-req>{{ __('jenis kelamin') }}</x-lable-req>
            <select wire:model.live='gender'
                class="select validator select-xs border-slate-300 focus:outline-none focus:border-accent focus:ring-accent focus:ring-1' @error($gender)
                select validator select-xs border-slate-300   outline-none border-rose-500 ring-rose-500 ring-1
            @enderror">
                <option value="">Pilih:</option>
                <option value="Laki - laki">Laki - laki (L)</option>
                <option value="Perempuan">Perempuan (P)</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" />
            <div class="p-2 modal-action">
                <x-submit-btn>{{ __('Save') }}</x-submit-btn>
                <x-close-btn wire:click="$dispatch('closeModal')">{{ __('Close') }}</x-close-btn>
            </div>
        </fieldset>
    </form>
</div>
