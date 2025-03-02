<div>
    <dialog class="modal {{ $modal }}">
        <div class="modal-box w-96">
            <form wire:submit.prevent='store'>
                <fieldset class="p-0 fieldset ">
                    <label class="-mb-2 fieldset-label">Tambah Ukuran</label>
                    <x-text-input wire:model.live='nama_warna' :error="$errors->get('nama_warna')" type="text" placeholder="tambah warna" />
                    <x-input-error :messages="$errors->get('nama_warna')" />
                </fieldset>
                <div class="modal-action">
                    <x-submit-btn>{{ __('Save') }}</x-submit-btn>
                    <x-close-btn wire:click="closeModal">{{ __('Close') }}</x-close-btn>
                </div>
            </form>
        </div>
    </dialog>
</div>
