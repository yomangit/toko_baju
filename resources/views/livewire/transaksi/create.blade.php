<div>

    <div class="flex justify-between ...">
        <fieldset class="p-4 border shadow-md fieldset w-xs bg-base-200 border-base-300 rounded-box">
            <legend class="fieldset-legend">Page details</legend>
            <div class="relative flex items-center">
                <input id="11" type="text"
                    class="relative w-full h-10 pl-20 pr-4 font-thin transition-all duration-200 ease-in-out rounded-md outline-none peer bg-gray-50 drop-shadow-sm focus:bg-white focus:drop-shadow-lg" />
                <button
                    class="absolute w-16 text-xs font-semibold text-white transition-all duration-200 ease-in-out bg-blue-200 rounded-md left-2 h-7 group-focus-within:bg-blue-400 group-focus-within:hover:bg-blue-600">Send</button>
            </div>
            <fieldset class="pb-0.5 fieldset ">
                <x-lable-req>{{ __('nama pakaian') }}</x-lable-req>
                <x-text-input wire:model.live='nama_pakaian' :error="$errors->get('nama_pakaian')" type="text"
                    placeholder="Nama Pakaian" />
                <x-input-error :messages="$errors->get('nama_pakaian')" />
            </fieldset>

            <label class="fieldset-label">Slug</label>
            <input type="text" class="input" placeholder="my-awesome-page" />

            <label class="fieldset-label">Author</label>
            <input type="text" class="input" placeholder="Name" />
        </fieldset>
        <div class="bg-orange-500">02</div>

    </div>
</div>
