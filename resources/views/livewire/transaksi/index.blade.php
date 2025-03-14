<div>
    <x-notif />
    <div class="flex items-center justify-between">
        <div class="py-2">
            <x-btn-ref href="{{ route('transaksi.detail') }}" data-tip="Add Data" />
        </div>
        <label class=" floating-label">
            <x-text-cari wire:model.live='searching' type="text" placeholder="Pencarian" />
            <span>Pencarian</span>
        </label>
    </div>
    <div class=" drop-shadow-lg">
        <div class="overflow-y-auto overflow-x-auto bg-base-200 h-[75vh] ">
            <table class="table table-xs table-zebra ">
                <thead class="text-sm text-center capitalize">
                    <tr>
                        <th>#</th>
                        <th>
                            <x-label>{{ __('nama pakaian') }}</x-label>
                        </th>
                        <th>
                            <x-label>{{ __('harga satuan') }}</x-label>
                        </th>
                        <th>
                            <x-label>{{ __('quantity') }}</x-label>
                        </th>
                        <th>
                            <x-label>{{ __('total harga') }}</x-label>
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody class="capitalize">


                </tbody>
            </table>
        </div>
        <div class="bg-base-200 "></div>
    </div>
</div>
