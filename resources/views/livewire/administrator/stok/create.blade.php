<div class="p-2 bg-base-200">

    <form wire:submit.prevent='store'>
        <div class="grid grid-cols-none gap-1 px-1 lg:grid-cols-2 ">
            <div>
                <fieldset class="pb-0.5 fieldset ">
                    <x-lable-req>{{ __('nama pakaian') }}</x-lable-req>
                    <x-text-input wire:model.live='nama_pakaian' :error="$errors->get('nama_pakaian')" type="text"
                        placeholder="Nama Pakaian" />
                    <x-input-error :messages="$errors->get('nama_pakaian')" />
                </fieldset>
                <fieldset class="pb-0.5 fieldset ">
                    <x-label>Warna</x-label>
                    <div class="flex gap-1">
                        <x-input-select :options='$Warna' :nama='$warna_parameter' wire:model.live='warna_id'
                            :error="$errors->get('warna_id')" />
                        <x-icon-btn-add data-tip="Tambah Warna" class="tooltip-left"
                            wire:click="$dispatch('tambah-warna')" />
                    </div>
                    <x-input-error :messages="$errors->get('warna_id')" />
                </fieldset>
                <fieldset class="pb-0.5 fieldset ">
                    <x-lable-req>{{ __('Kategori') }}</x-lable-req>
                    <div class="flex gap-1">
                        <x-input-select :options='$Kategori' :nama='$kategori_parameter' wire:model.live='kategori_pakaian'
                            :error="$errors->get('kategori_pakaian')" />
                        <x-icon-btn-add data-tip="Tambah Kategori" wire:click="$dispatch('tambah-kategori')" />
                    </div>
                    <x-input-error :messages="$errors->get('kategori_pakaian')" />
                </fieldset>
            </div>
            <fieldset class="px-4 border w-xs fieldset bg-base-200 border-base-300 rounded-box">
                <legend class="fieldset-legend">Ukuran</legend>
                <x-icon-btn-add class="tooltip-right" data-tip="Tambah Ukuran"
                    wire:click="$dispatch('tambah-ukuran')" />
                <div class="flex flex-row divide-x divide-dashed">
                    @foreach ($Ukuran as $index => $size)
                        <label class="px-1 fieldset-label">
                            <input type="checkbox" wire:model.live="ukuran_id" value="{{ $size->id }}"
                                class=" checkbox checkbox-xs focus:outline-none focus:border-accent focus:ring-accent focus:ring-1 @error('ukuran_id')   focus:border-rose-500 focus:ring-rose-500 focus:ring-1 border-rose-500 @enderror" />
                            {{ $size->ukuran_pakaian }}
                        </label>
                    @endforeach
                </div>
                <div class="flex flex-row ">
                    @foreach ($UkuranPakaian as $index => $size)
                        <fieldset class="pb-0.5 fieldset ">
                            <x-lable-req>{{ __('ukuran ') }}{{ $size->ukuran_pakaian }}</x-lable-req>
                            <x-text-size wire:ignore wire:model="filds.{{ $size->ukuran_pakaian }}" :error="$errors->get('filds.' . $size->ukuran_pakaian)"
                                type="number" placeholder="Stok" />
                            <x-input-error :messages="$errors->get('filds.' . $size->ukuran_pakaian)" />
                        </fieldset>
                    @endforeach
                </div>
                <x-input-error :messages="$errors->get('ukuran_id')" />
            </fieldset>
            <fieldset class="pb-0.5 fieldset ">
                <x-lable-req>{{ __('Harga Satuan') }}</x-lable-req>
                <x-text-input wire:model.live='harga_jual_rp' :error="$errors->get('harga_jual_rp')" id="harga-jual" type="text"
                    placeholder="Harga Jual" />
                <x-input-error :messages="$errors->get('harga_jual_rp')" />
            </fieldset>
            <fieldset class="pb-0.5 fieldset ">
                <x-lable-req>{{ __('Harga Pokok') }}</x-lable-req>
                <x-text-input wire:model.live='harga_pokok_rp' :error="$errors->get('harga_pokok_rp')" id="harga-pokok" type="text"
                    placeholder="Harga Pokok" />
                <x-input-error :messages="$errors->get('harga_pokok_rp')" />
            </fieldset>
            <fieldset class="pb-0.5 fieldset ">
                <x-label>Foto Pakaian</x-label>
                <x-file-input wire:model.live='photo' :error="$errors->get('photo')" type="file" placeholder="Harga Pokok" />
                <x-input-error :messages="$errors->get('photo')" />
            </fieldset>
            <div class="w-40 px-4 avatar justify-self-center drop-shadow-lg">
                <div class="rounded">

                    @if ($stok_id && $photo && $nama_foto)
                        @if (
                            $fileUpload === 'jpg' ||
                                $fileUpload === 'JPG' ||
                                $fileUpload === 'PNG' ||
                                $fileUpload === 'jpeg' ||
                                $fileUpload === 'png')
                            <img class="border-2 border-dashed border-accent" src="{{ $photo->temporaryUrl() }}">
                        @endif
                    @elseif ($stok_id && $nama_foto)
                        <img class="border-2 border-dashed border-accent"
                            src="{{ asset('/myfiles/img/' . $nama_foto) }}">
                    @elseif($photo)
                        @if (
                            $fileUpload === 'jpg' ||
                                $fileUpload === 'JPG' ||
                                $fileUpload === 'PNG' ||
                                $fileUpload === 'jpeg' ||
                                $fileUpload === 'png')
                            <img class="border-2 border-dashed border-accent" src="{{ $photo->temporaryUrl() }}">
                        @endif
                    @else
                        <img class="border-2 border-dashed border-accent"
                            src="{{ asset('assets/img/empty-image.png') }}" alt="Empty Image">
                    @endif
                </div>
            </div>
        </div>
        <div class="p-2 modal-action">

            <x-submit-btn>{{ __('Save') }}</x-submit-btn>
            <x-close-btn wire:click="$dispatch('closeModal')">{{ __('Close') }}</x-close-btn>

        </div>
    </form>
    <dialog class="modal {{ $modalOpen }}">
        <div class="modal-box">
            <p
                class="bg-gradient-to-r from-pink-500 to-violet-500 bg-clip-text text-5xl font-extrabold text-transparent ...">
                Menghapus data input sementara?
            </p>
            <div class="modal-action">
                <form method="dialog">
                    <x-yes-btn wire:click='KeepData'>{{ __('No') }}</x-yes-btn>
                    <x-no-btn wire:click='resetData'>{{ __('Yes') }}</x-no-btn>
                </form>
            </div>
        </div>
        <script>
            /* Dengan Rupiah */
            var harga_jual = document.getElementById('harga-jual');
            harga_jual.addEventListener('keyup', function(e) {
                harga_jual.value = formatRupiah(this.value, 'Rp. ');
            });
            /* Dengan Rupiah */
            var harga_pokok = document.getElementById('harga-pokok');
            harga_pokok.addEventListener('keyup', function(e) {
                harga_pokok.value = formatharga_pokok(this.value, 'Rp. ');
            });

            /* Fungsi Rupiah*/
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),

                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                console.log(number_string);
                @this.set('harga_jual', number_string)
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');



            }
            /* Fungsi harga_pokok*/
            function formatharga_pokok(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),

                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                console.log(number_string);

                @this.set('harga_pokok', number_string)
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');



            }
        </script>
    </dialog>
    <livewire:administrator.ukuran.create>
        <livewire:administrator.warna.create>
            <livewire:administrator.kategori.create>


</div>
