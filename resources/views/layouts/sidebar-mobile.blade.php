<div class="z-20 drawer-side lg:hidden">
    <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
    <div class="min-h-full shadow-md bg-base-200">
        <header class="shadow-md  align-items-center bg-base-100 h-[54px] sticky top-0 shadow-primary z-30">
            <div id="avatar" class="absolute inset-0 flex items-center gap-2 px-2 py-1 avatar">
                <div class="rounded size-12 ">
                    <img src="{{ url('assets/img/toko_baju.webp') }}" alt="logo">
                </div>

                <label id="text_avatar"
                    class="text-[24px] bg-gradient-to-r from-pink-500 to-violet-500 bg-clip-text text-5xl font-extrabold text-transparent font-baskerville">Pink
                    Store</label>

            </div>

        </header>
        <ul class="p-4 overflow-y-auto menu text-base-content w-60">
            <!-- Sidebar content here -->
            @include('layouts.menu')
        </ul>
    </div>
</div>
