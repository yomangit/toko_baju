<div class="shadow-sm bg-base-200 ">
    <form wire:submit.prevent='store'>
        <fieldset class="px-2 border fieldset bg-base-200 border-base-300 ">
            <legend class="fieldset-legend">Tambah Kostumer</legend>
            <x-lable-req>{{ __('nama') }}</x-lable-req>
            <x-text-input wire:model.live='name' :error="$errors->get('name')" type="text" placeholder="Nama Pakaian" />
            <x-input-error :messages="$errors->get('name')" />
            <x-lable-req>{{ __('no. telepon') }}</x-lable-req>
            <x-text-input wire:model.live='phone_number' :error="$errors->get('phone_number')" type="text" placeholder="No. Telepon" />
            <x-input-error :messages="$errors->get('phone_number')" />
            <x-lable-req>{{ __('alamat') }}</x-lable-req>
            <x-text-input wire:model.live='address' :error="$errors->get('address')" type="text" placeholder="alamat" />
            <x-input-error :messages="$errors->get('address')" />
            <x-lable-req>{{ __('jenis kelamin') }}</x-lable-req>
            <select wire:model.live='gender' class="select validator select-xs border-slate-300 focus:outline-none focus:border-accent focus:ring-accent focus:ring-1' @error($gender)
                select validator select-xs border-slate-300   outline-none border-rose-500 ring-rose-500 ring-1
            @enderror" >
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
