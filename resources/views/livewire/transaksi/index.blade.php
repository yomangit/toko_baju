<div>
    <x-notif />
    <div class="flex items-center justify-between">
        <div class="py-2">
            <x-icon-btn-add data-tip="Tambah Kustomer" class="tooltip-right"
                wire:click="$dispatch('openModal', { component: 'customer.create' })" />
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
                            <x-lable-req>{{ __('nama pakaian') }}</x-lable-req>
                        </th>
                        <th>
                            <x-lable-req>{{ __('harga satuan') }}</x-lable-req>
                        </th>
                        <th>
                            <x-lable-req>{{ __('quantity') }}</x-lable-req>
                        </th>
                        <th>
                            <x-lable-req>{{ __('total harga') }}</x-lable-req>
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody class="capitalize">


                </tbody>
            </table>
        </div>
        <div class="bg-base-200 ">{{ $Customers->links() }}</div>
    </div>
</div>
