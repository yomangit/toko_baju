<div class="sticky top-0 z-10 shadow-lg navbar bg-base-100">
    <div class="hidden lg:block navbar-start">
        <label class=" btn btn-sm btn-square swap swap-rotate bg-base-100">
            <!-- this hidden checkbox controls the state -->
            <input onclick="getValue()" id="menu_open" type="checkbox" />

            <!-- hamburger icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                class="fill-current size-4 swap-off">
                <path fill-rule="evenodd"
                    d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"
                    clip-rule="evenodd" />
            </svg>


            <!-- close icon -->

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                class="fill-current size-4 swap-on">
                <path fill-rule="evenodd"
                    d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
            </svg>


        </label>
    </div>
    <div class="block lg:hidden navbar-start">
        <label for="my-drawer"  class=" btn btn-sm btn-square swap swap-rotate bg-base-100">
            <!-- this hidden checkbox controls the state -->
            <input  type="checkbox" />

            <!-- hamburger icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                class="fill-current size-4 swap-off">
                <path fill-rule="evenodd"
                    d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"
                    clip-rule="evenodd" />
            </svg>


            <!-- close icon -->

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                class="fill-current size-4 swap-on">
                <path fill-rule="evenodd"
                    d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
            </svg>


        </label>
    </div>
    <div class="navbar-center">
        <a class="text-xl btn btn-ghost">daisyUI</a>
    </div>
    <div class="navbar-end">
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Log in</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">Register</a>
        @endif
    </div>
</div>
