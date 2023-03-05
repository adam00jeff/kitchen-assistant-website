<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
    <div class="flex justify-center h-16 mb-4">
        <div class="flex mt-3 mb-4 ">
            <!-- Logo -->
            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('recipes')" :active="request()->routeIs('recipes')">
                    {{ __('All Recipes') }}
                </x-nav-link>
                <x-nav-link :href="route('create_recipes')" :active="request()->routeIs('create_recipes')">
                    {{ __('Add Recipe') }}
                </x-nav-link>
                <x-nav-link :href="route('recipes')" :active="request()->routeIs('recipes')">
                    {{ __('Recipe Info') }}
                </x-nav-link>
            </div>
        </div>
    </div>
</div>
