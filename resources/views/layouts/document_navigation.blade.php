<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
    <div class="flex justify-center h-16 mb-4">
        <div class="flex mt-3 mb-4 ">
            <!-- Logo -->
            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('documents')" :active="request()->routeIs('documents')">
                    {{ __('All Documents') }}
                </x-nav-link>
                <x-nav-link :href="route('create_document')" :active="request()->routeIs('create_document')">
                    {{ __('Add Document') }}
                </x-nav-link>
                <x-nav-link :href="route('documents')" :active="request()->routeIs('documents')">
                    {{ __('Renewal Schedule') }}
                </x-nav-link>
                <x-nav-link :href="route('documents')" :active="request()->routeIs('documents')">
                    {{ __('Other') }}
                </x-nav-link>
            </div>
        </div>
    </div>
</div>
