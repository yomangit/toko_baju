<div>
    <x-notif />
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 h-[75vh]">
        <div class="justify-self-center md:justify-self-start">
            <fieldset class="items-stretch px-4 border shadow-md card w-xs bg-base-200 border-base-300 rounded-box">
                <legend class="fieldset-legend">Data Pakaian</legend>
                <fieldset class="pb-0.5 fieldset ">
                    <div class="dropdown dropdown-center">
                        <div class="relative flex items-center">
                            <input id="11" wire:model.live='customer_name' type="text" tabindex="0"
                                role="button" placeholder="nama customer"
                                class="'relative block pl-8 pr-4 font-semibold border shadow-sm input input-bordered input-xs placeholder-slate-400 focus:outline-none focus:border-accent focus:ring-accent focus:ring-1'" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="absolute ml-3 size-4">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                            </svg>

                        </div>
                        <ul tabindex="0" class="p-2 shadow-sm menu dropdown-content bg-base-100 rounded-box z-1 w-52">
                            <fieldset class="h-40 overflow-y-auto fieldset">
                                @foreach ($customers as $customer)
                                    <li wire:click="setNamaCustomer({{ $customer->id }},'{{ $customer->name }}')"
                                        class="cursor-pointer menu-title hover:bg-secondary-content">
                                        {{ $customer->name }}
                                    </li>
                                @endforeach

                            </fieldset>
                        </ul>
                    </div>
                </fieldset>
                <fieldset class="pb-0.5 fieldset ">
                    <div class="dropdown dropdown-center">
                        <div class="relative flex items-center">
                            <input id="11" wire:model.live='search' type="text" tabindex="0" role="button"
                                placeholder="cari kode pakaian"
                                class="'relative block pl-8 pr-4 font-semibold border shadow-sm input input-bordered input-xs placeholder-slate-400 focus:outline-none focus:border-accent focus:ring-accent focus:ring-1'" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="absolute ml-3 size-4">
                                <path fill-rule="evenodd"
                                    d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <ul tabindex="0" class="p-2 shadow-sm menu dropdown-content bg-base-100 rounded-box z-1 w-52">
                            <fieldset class="h-40 overflow-y-auto fieldset">
                                @foreach ($products as $product)
                                    {{-- <li wire:click="setKodePakaian('{{ $product->kode_pakaian }}')"
                                        class="menu-title">
                                        {{ $product->kode_pakaian }}
                                    </li> --}}

                                    <x-text-input-ghost wire:click="setKodePakaian('{{ $product->kode_pakaian }}')"
                                        :error="$errors->get('payment_rp')" value=' {{ $product->kode_pakaian }}' readonly type="text"
                                        placeholder="Kode Pakaian" />
                                @endforeach

                            </fieldset>
                        </ul>
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
                        <x-text-input wire:model.live='harga_satuan' :error="$errors->get('harga_satuan')" readonly type="text"
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
                            <x-text-input-ghost wire:model.live='total_harga_rp' :error="$errors->get('total_harga_rp')" type='text'
                                placeholder="total harga" />

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
                <legend class="fieldset-legend">Keranjang {{ $transaksi_id }}</legend>
                <div
                    class="overflow-x-auto overflow-y-auto border rounded-sm  h-[40vh] rounded-box border-base-content/5">
                    <table class="table text-center table-xs table-pin-rows">
                        <thead>
                            <tr>
                                <th> <x-label>{{ __('No.') }} </x-label> </th>
                                <th> <x-label>{{ __('Name Pakaian') }} </x-label> </th>
                                <th> <x-label>{{ __('Harga Satuan') }} </x-label> </th>
                                <th> <x-label>{{ __('size') }} </x-label> </th>
                                <th> <x-label>{{ __('Quantity') }} </x-label> </th>
                                <th> <x-label>{{ __('Total Harga') }} </x-label> </th>
                                <th> <x-label>{{ __('Foto') }} </x-label> </th>
                                <th> <x-label>{{ __('Status') }} </x-label> </th>
                                <th> <x-label>{{ __('#') }} </x-label> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($source as $index => $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ App\Models\StokPakaian::whereId($item->new_data['product_id'])->first()->nama_pakaian }}
                                    </td>
                                    <td>Rp
                                        {{ number_format(App\Models\StokPakaian::whereId($item->new_data['product_id'])->first()->harga_jual, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        {{ App\Models\StokPakaian::whereId($item->new_data['product_id'])->first()->Ukuran->ukuran_pakaian }}
                                    </td>
                                    <td>{{ $item->new_data['quantity'] }}</td>
                                    <td>Rp
                                        {{ number_format($item->new_data['price'], 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <div class="avatar drop-shadow-lg">
                                            <div class="w-8 rounded">
                                                @if (App\Models\StokPakaian::whereId($item->new_data['product_id'])->first()->photo)
                                                    <img
                                                        src="{{ asset('/myfiles/img/' . App\Models\StokPakaian::whereId($item->new_data['product_id'])->first()->photo) }}">
                                                @else
                                                    <img src="{{ asset('assets/img/empty-image.png') }}">
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-error badge-xs">{{ $item->state }}</span>
                                    </td>
                                    <td>
                                        <x-icon-btn-delete data-tip="Hapus" data-tip="delete"
                                            wire:click="destroy({{ $item->id }})"
                                            wire:confirm.prompt="Are you sure delete {{ App\Models\StokPakaian::whereId($item->new_data['product_id'])->first()->nama_pakaian }}?\n\nType DELETE to confirm|DELETE" />
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
                <div class="relative max-h-32 ">
                    <form wire:submit.prevent='selesai'>
                        <fieldset class="pb-0.5 fieldset ">
                            <x-label>{{ __('Total Belanja') }} </x-label>
                            <x-text-input-ghost wire:model.live='total_price' readonly :error="$errors->get('nama_pakaian')"
                                type="text" placeholder="0" />
                            <x-lable-req>{{ __('Dibayarkan') }}</x-lable-req>
                            <x-text-input-ghost id="rupiah" wire:model.live='payment_rp' :error="$errors->get('payment_rp')"
                                type='text' placeholder="Jumlah pembayaran" />
                            <x-input-error :messages="$errors->get('payment_rp')" />

                            <fieldset class="pb-0.5 fieldset ">
                                <x-label>{{ __('Uang kembali') }}</x-label>
                                <x-text-input-ghost id="kembalian" wire:model.live='cashback_rp' disabled
                                    :error="$errors->get('harga_satuan')" readonlytype="number" placeholder="0" />
                            </fieldset>
                        </fieldset>
                        <x-btn-selesai class="absolute bottom-0 right-0"
                            wire:click=''>{{ __('Beli Sekarang') }}</x-btn-selesai>
                </div>
                </form>

            </fieldset>
        </div>
    </div>
    <script>
        var tanpa_rupiah = document.getElementById('kembalian');
        tanpa_rupiah.addEventListener('keyup', function(e) {
            tanpa_rupiah.value = formatRupiah(this.value);
        });
        /* Dengan Rupiah */
        var dengan_rupiah = document.getElementById('rupiah');
        dengan_rupiah.addEventListener('keyup', function(e) {
            dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),

                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            @this.set('payment', number_string)
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');



        }
    </script>
</div>
