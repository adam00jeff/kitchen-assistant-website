<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
    <div class="flex justify-between h-16 mb-4">
        <div class="flex mt-3 mb-4 ">
            <!-- Logo -->
            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('stock')" :active="request()->routeIs('stock')">
                    {{ __('All Stock') }}
                </x-nav-link>
                <x-nav-link :href="route('create_stock')" :active="request()->routeIs('create_stock')">
                    {{ __('Add Stock') }}
                </x-nav-link>
                <x-nav-link :href="route('suppliers')" :active="request()->routeIs('suppliers')">
                    {{ __('Suppliers') }}
                </x-nav-link>
                <x-nav-link :href="route('stock')" {{--:active="request()->routeIs('stock')"--}}>
                    {{ __('Other') }}
                </x-nav-link>

            </div>
        </div>
    </div>
</div>
