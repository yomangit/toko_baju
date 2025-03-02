<div>
    <x-notif />
    <div class="flex items-center justify-between">
        <div class="py-2">
            <x-icon-btn-add data-tip="Tambah Kustomer" class="tooltip-right" wire:click="$dispatch('openModal', { component: 'customer.create' })" />
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
                            nama
                        </th>
                        <th>
                            Alamat
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            gender
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="capitalize">
                    @foreach($Customers as $index => $customer)
                    <tr class="text-center">
                        <th>
                            {{ $Customers->firstItem() + $index }}
                        </th>
                        <td>
                            {{ $customer->name }}
                        </td>
                        <td>
                            {{ $customer->address }}
                        </td>
                        <td>
                            {{ $customer->phone_number }}
                        </td>
                        <td>
                            {{ $customer->gender }}
                        </td>
                        <td>
                            <x-icon-btn-delete data-tip="Hapus" data-tip="delete" wire:click='destroy({{$customer->id}})' wire:confirm.prompt="Are you sure delete {{ $customer->name }}?\n\nType DELETE to confirm|DELETE" />
                            <x-icon-btn-edit data-tip="edit" wire:click="$dispatch('openModal', { component: 'customer.create', arguments: { customer: {{ $customer->id }} }})" />
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="bg-base-200 ">{{ $Customers->links() }}</div>
    </div>
</div>
