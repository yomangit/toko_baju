<div class="fixed inset-y-0 sidebar hidden lg:block bg-base-200 shadow-md  w-[18%] z-10">
    <header class="shadow-lg relative align-items-center bg-base-100 h-[52px] ">
        <div id="avatar" class="absolute inset-0 flex items-center gap-2 px-2 py-1 avatar">
            <div class="rounded size-12 ">
                <img src="{{ url('assets/img/toko_baju.webp') }}" alt="logo">
            </div>

            <label id="text_avatar"
                class="text-[24px] bg-gradient-to-r from-pink-500 to-violet-500 bg-clip-text text-5xl font-extrabold text-transparent font-baskerville">Pink
                Store</label>

        </div>

    </header>

    <div class="h-[70vh] overflow-y-auto ">
        <ul class="w-full menu menu-md bg-base-200">
            @include('layouts.menu')
        </ul>
    </div>
    <div class=" theme_control">
        <div class="absolute bottom-0 left-0 flex flex-row items-center w-full gap-2 p-1 inset-shadow-xs bg-base-200">
            <label class="text-xs font-semibold">Theme Control:</label>
            <input type="checkbox" value="dark" class="toggle theme-controller checkbox-sm" />
        </div>
    </div>
</div>
