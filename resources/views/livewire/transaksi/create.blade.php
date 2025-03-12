<div>
    <x-notif />
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 h-[75vh]">
        <div class="justify-self-center md:justify-self-start">
            <fieldset class="items-stretch px-4 border shadow-md card w-xs bg-base-200 border-base-300 rounded-box">
                <legend class="fieldset-legend">Data Barang</legend>
                <fieldset class="pb-0.5 fieldset ">
                    <div class="relative flex items-center">
                        <input id="11" wire:model.live='search' type="text" placeholder="cari kode pakaian"
                            class="'relative block pl-8 pr-4 font-semibold border shadow-sm input input-bordered input-xs placeholder-slate-400 focus:outline-none focus:border-accent focus:ring-accent focus:ring-1'" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="absolute ml-3 size-4">
                            <path fill-rule="evenodd"
                                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </fieldset>
                <form wire:submit.prevent='store'>
                    <fieldset class="pb-0.5 fieldset ">
                        <x-lable-req>{{ __('nama pakaian') }} </x-lable-req>
                        <x-text-input wire:model.live='nama_pakaian' :error="$errors->get('nama_pakaian')" type="text"
                            placeholder="Nama Pakaian" />
                        <x-input-error :messages="$errors->get('nama_pakaian')" />

                        <x-lable-req>{{ __('Stok') }}</x-lable-req>
                        <x-text-input wire:model.live='stok' :error="$errors->get('stok')" readonly type="number"
                            placeholder="Harga Satuan" />
                        <x-input-error :messages="$errors->get('stok')" />

                        <x-lable-req>{{ __('Harga Satuan') }}</x-lable-req>
                        <x-text-input wire:model.live='harga_satuan' :error="$errors->get('harga_satuan')" readonly type="number"
                            placeholder="Harga Satuan" />
                        <x-input-error :messages="$errors->get('harga_satuan')" />
                    </fieldset>
                    <div class="flex gap-4">
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
                                    <input type="text" wire:model.live='count'
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
                            </div>
                            <x-input-error :messages="$errors->get('harga_jual')" />
                        </fieldset>
                        <fieldset class=" fieldset">
                            <x-label>{{ __('Total') }}</x-label>
                            <div class=" join">
                                <span class="bg-transparent rounded-l-full btn btn-xs join-item btn-ghost"><svg
                                        fill="currentColor" class="size-4" viewBox="0 0 24 24" id="rupiah-2"
                                        data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
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
                                <input wire:model='total_harga' readonly
                                    class="bg-transparent input join-item input-xs input-ghost focus:outline-none ring-none"
                                    placeholder="total harga" />
                            </div>
                        </fieldset>
                    </div>
                    <div class="py-2 modal-action">
                        <x-btn-tambah>{{ __('Tambah') }}</x-btn-tambah>
                    </div>
                </form>
            </fieldset>
        </div>

        <div class="col-span-2">
            <fieldset class="p-4 border shadow-md fieldset rounded-box card grow bg-base-200 border-base-300">
                <legend class="fieldset-legend">Keranjang</legend>
                <div class="overflow-x-auto border rounded-sm rounded-box border-base-content/5">
                    <table class="table text-center table-xs">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name Pakaian</th>
                                <th>Harga Satuan</th>
                                <th>Quantity</th>
                                <th>Total Harga</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($source as $index => $item)
                                <tr>
                                    <th>{{ $source->firstItem() + $index }}</th>
                                    <td>{{ $item->stokPakaian->nama_pakaian }}</td>
                                    <td>{{ $item->stokPakaian->harga_satuan }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>
                                        <x-icon-btn-delete data-tip="Hapus" data-tip="delete"
                                            wire:click="destroy('{{ $item->product_id }}')"
                                            wire:confirm.prompt="Are you sure delete {{ $item->stokPakaian->nama_pakaian }}?\n\nType DELETE to confirm|DELETE" />
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
                <div class="h-32">
                    <fieldset class="pb-0.5 fieldset h-32">
                        <x-label>{{ __('Total Belanja') }} </x-label>
                        <x-text-input-ghost wire:model.live='total_price' readonly :error="$errors->get('nama_pakaian')" type="number"
                            placeholder="0" />
                        <x-lable-req>{{ __('Dibayarkan') }}</x-lable-req>
                        <x-text-input-ghost wire:model.live='payment' :error="$errors->get('stok')" type="number"
                            placeholder="Jumlah pembayaran" />
                        <x-label>{{ __('Uang kembali') }}</x-label>
                        <x-text-input-ghost wire:model.live='cashback' disabled :error="$errors->get('harga_satuan')" readonly
                            type="number" placeholder="0" />
                    </fieldset>
                </div>
            </fieldset>
        </div>
    </div>
</div>
