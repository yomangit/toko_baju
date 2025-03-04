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
                <x-text-input wire:model.live='harga_satuan' :error="$errors->get('harga_satuan')" type="number"
                    placeholder="Harga Satuan" />
                <x-input-error :messages="$errors->get('harga_satuan')" />
            </fieldset>
            <div class="flex items-end ">
                <fieldset class=" fieldset">
                    <x-lable-req>{{ __('Jumlah') }}</x-lable-req>
                    <div class="flex gap-1">
                        <div class="join">
                            <label {{ $count == 0 ? 'disabled = "disabled"' : '' }} wire:click="decrement"
                                class="join-item btn btn-xs btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="size-4">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm4-7a.75.75 0 0 0-.75-.75h-6.5a.75.75 0 0 0 0 1.5h6.5A.75.75 0 0 0 12 8Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </label>
                            <input type="text" wire:model='count'
                                class="w-16 input input-xs placeholder-slate-400 focus:outline-none focus:border-accent focus:ring-accent focus:ring-1">
                            <label wire:click="increment" class="join-item btn btn-xs btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="size-4">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm.75-10.25v2.5h2.5a.75.75 0 0 1 0 1.5h-2.5v2.5a.75.75 0 0 1-1.5 0v-2.5h-2.5a.75.75 0 0 1 0-1.5h2.5v-2.5a.75.75 0 0 1 1.5 0Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </label>
                        </div>
                        <div class=" join">
                            <span class="rounded-r-full btn join-item btn-xs btn-info"><svg fill="currentColor"
                                    class="size-4" viewBox="0 0 24 24" id="rupiah-2" data-name="Flat Line"
                                    xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path id="primary"
                                            d="M21,13.5h0A2.5,2.5,0,0,0,18.5,11H16v5h2.5A2.5,2.5,0,0,0,21,13.5ZM16,16v4"
                                            style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                        </path>
                                        <path id="primary-2" data-name="primary"
                                            d="M8,12H3V4H8a4,4,0,0,1,4,4h0A4,4,0,0,1,8,12ZM3,10v8m8,0L8,12"
                                            style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                        </path>
                                    </g>
                                </svg></span>
                            <input class="input join-item input-xs" placeholder="Email" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('harga_jual')" />
                </fieldset>

            </div>
        </fieldset>
        <div class="bg-orange-500">02</div>

    </div>
</div>
