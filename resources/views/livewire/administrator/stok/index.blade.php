<div>
    <x-notif />
    <div class="flex items-center justify-between">
        <div class="py-2"> <x-icon-btn-add data-tip="Tambah Stok" class="tooltip-right"
                wire:click="$dispatch('openModal', { component: 'administrator.stok.create' })" /></div>
        <label class=" floating-label">
            <x-text-cari wire:model.live='Pencarian' type="text" placeholder="Pencarian" />
            <span>Pencarian</span>
        </label>

    </div>
    <div class=" drop-shadow-lg">
        <div class="overflow-y-auto overflow-x-auto bg-base-200 h-[75vh]">
            <table class="table table-xs table-zebra ">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Kode Pakaian</th>
                        <th>Nama Pakaian</th>
                        <th>Kategori</th>
                        <th>Ukuran</th>
                        <th>Warna</th>
                        <th>Stok</th>
                        <th>Harga Satuan</th>
                        <th>Harga Pokok</th>
                        <th>Foto</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Stoks as $no => $stok)
                        <tr class="text-center ">
                            <th>{{ $Stoks->firstItem() + $no }}</th>
                            <td>{{ $stok->kode_pakaian }}</td>
                            <td>{{ $stok->nama_pakaian }}</td>
                            <td>{{ $stok->kategories->kategori_pakaian }}</td>
                            <td>{{ $stok->Ukuran->ukuran_pakaian }}</td>
                            <td>{{ $stok->warna->nama_warna }}</td>
                            <td>{{ $stok->jumlah_stok }}</td>
                            <td>Rp {{ number_format($stok->harga_jual, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($stok->harga_pokok, 0, ',', '.') }}</td>
                            <td>
                                <div class="avatar drop-shadow-lg">
                                    <div class="w-16 rounded">
                                        @if ($stok->photo)
                                            <img src="{{ Storage::url('public/myfiles/photos/' . $stok->photo) }}">
                                        @else
                                            <img src="{{ asset('assets/img/empty-image.png') }}">
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <x-icon-btn-delete data-tip="Hapus" data-tip="delete"
                                    wire:click='destroy({{ $stok->id }})'
                                    wire:confirm.prompt="Are you sure delete {{ $stok->photo }}?\n\nType DELETE to confirm|DELETE" />
                                <x-icon-btn-edit data-tip="edit"
                                    wire:click="$dispatch('openModal', { component: 'administrator.stok.create', arguments: { stok: {{ $stok->id }} }})" />
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <th colspan="9" class="text-error">data not found!!! </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="bg-base-200 ">{{ $Stoks->links() }}</div>
    </div>
</div>
