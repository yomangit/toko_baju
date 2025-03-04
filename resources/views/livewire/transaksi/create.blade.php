<div>

    <div class="flex justify-between ...">
        <fieldset class="p-4 border shadow-md fieldset w-xs bg-base-200 border-base-300 rounded-box">
            <legend class="fieldset-legend">Page details</legend>
            <x-inputwithlable type="text" placeholder="Nama Pakaian" />
            <fieldset class="pb-0.5 fieldset ">
                <x-lable-req>{{ __('nama pakaian') }}</x-lable-req>
                <x-text-input wire:model.live='nama_pakaian' :error="$errors->get('nama_pakaian')" type="text"
                    placeholder="cari kode pakaian" />
                <x-input-error :messages="$errors->get('nama_pakaian')" />
            </fieldset>
            <fieldset class="pb-0.5 fieldset ">
                <x-lable-req>{{ __('Harga Satuan') }}</x-lable-req>
                <x-text-input wire:model.live='harga_jual' :error="$errors->get('harga_jual')" type="number" placeholder="Harga Jual" />
                <x-input-error :messages="$errors->get('harga_jual')" />
            </fieldset>
            <fieldset class="pb-0.5 fieldset ">
                <x-lable-req>{{ __('Jumlah') }}</x-lable-req>
                <div class="join">
                    <button class="join-item btn">«</button>
                    <x-text-input wire:model.live='harga_jual' class="join-item" :error="$errors->get('harga_jual')" type="number"
                        placeholder="Harga Jual" />
                    <button class="join-item btn">»</button>
                </div>
                <x-input-error :messages="$errors->get('harga_jual')" />
            </fieldset>

        </fieldset>
        <div class="bg-orange-500">02</div>

    </div>
</div>
