<div>
    @if ($paginator->hasPages())
        <div class="flex items-center justify-between px-4 py-2 sm:px-6">
            {{-- Mobile view. --}}
            <div class="flex justify-between flex-1 sm:hidden" id="mobile">
                @if ($paginator->onFirstPage())
                    <button disabled
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 bg-gray-200 border rounded-md cursor-not-allowed border-base-300 focus:outline-none"
                        id="mobile-prev">
                        Previous
                    </button>
                @else
                    <button wire:click="previousPage" type="button"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out border rounded-md bg-base-200 border-base-300 hover:text-primary-content focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-base-200 active:text-gray-700">
                        Previous
                    </button>
                @endif
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" type="button"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out border rounded-md bg-base-200 border-base-300 hover:text-primary-content focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-base-200 active:text-gray-700"
                        id="mobile-next">
                        Next
                    </button>
                @else
                    <button disabled
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 bg-gray-200 border rounded-md cursor-not-allowed border-base-300 focus:outline-none ">
                        Next
                    </button>
                @endif
            </div>
            {{-- End mobile view. --}}

            {{-- Desktop view --}}
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm leading-5 text-gray-700">
                        Showing
                        <span id="first" class="font-medium">{{ $paginator->firstItem() }}</span>
                        to
                        <span id="last" class="font-medium">{{ $paginator->lastItem() }}</span>
                        of
                        <span id="total" class="font-medium">{{ $paginator->total() }}</span>
                        results
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex shadow-sm">
                        @if ($paginator->onFirstPage())
                            <button disabled
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 border cursor-not-allowed bg-base-200 text-primary-content border-base-300 btn-sm rounded-l-md focus:z-10 focus:outline-none">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        @else
                            <button wire:click="previousPage" type="button"
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 transition duration-150 ease-in-out border text-primary-content bg-base-200 border-base-300 btn-sm rounded-l-md hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-base-200 active:text-primary-content"
                                aria-label="Previous" id="desktop-prev">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 border bg-base-200 border-base-300 btn-sm">
                                    ...
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <button disabled
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 border cursor-not-allowed border-base-300 text-primary-content btn-sm bg-primary focus:outline-none">
                                            {{ $page }}
                                        </button>
                                    @else
                                        <button wire:click="gotoPage({{ $page }})" type="button"
                                            class="relative items-center hidden px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out border bg-base-200 border-base-300 btn-sm md:inline-flex hover:text-primary-content focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-base-200 active:text-gray-700"
                                            id="{{ $page }}">
                                            {{ $page }}
                                        </button>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @if ($paginator->hasMorePages())
                            <button wire:click="nextPage" type="button"
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 transition duration-150 ease-in-out border text-primary-content bg-base-200 border-base-300 btn-sm rounded-r-md hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-base-200 active:text-primary-content"
                                aria-label="Next" id="desktop-next">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        @else
                            <button disabled
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 border cursor-not-allowed text-primary-content bg-base-200 border-base-300 btn-sm disabled rounded-r-md focus:z-10 focus:outline-none">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif
                    </nav>
                </div>
            </div>
            {{-- End desktop view --}}
        </div>
    @endif
</div>
