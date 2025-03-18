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
                    <tr class="text-center ">
                        <th>#</th>
                        <th class="flex items-center">
                            <x-label>{{ __('Nama Customer') }}</x-label>
                        </th>
                        <th class="flex items-center">
                            <x-label>{{ __('Nama Kasir') }}</x-label>
                        </th>
                        <th class="flex items-center">
                            <x-label>{{ __('quantity') }}</x-label>
                        </th>
                        <th class="flex items-center">
                            <x-label>{{ __('total harga') }}</x-label>
                        </th>
                        <th class="flex items-center">
                            <x-label>{{ __('pembayaran') }}</x-label>
                        </th>
                        <th class="flex items-center">
                            <x-label>{{ __('kembalian') }}</x-label>
                        </th>
                        <th class="flex items-center">

                        </th>
                    </tr>
                </thead>
                <tbody class="capitalize">

                    @foreach ($transaksi as $item)
                        <tr class="text-center">
                            <td></td>
                            <td>{{ $item->customer->name }}</td>
                            <td>{{ $item->kasir->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ 'Rp. ' . number_format($item->total_price, 0, ',', '.') }}</td>
                            <td>{{ 'Rp. ' . number_format($item->payment, 0, ',', '.') }}</td>
                            <td>{{ $item->cashback ? 'Rp. ' . number_format($item->cashback, 0, ',', '.') : '-' }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="bg-base-200 "></div>
    </div>
</div>
