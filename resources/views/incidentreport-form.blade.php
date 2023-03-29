<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}'s Compliance
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex justify-center items-center p-2">
            <!-- if to catch errors and report to user -->
            @if ($errors->any())
                <div class="bg-red-600 border-solid rounded-md border-2 border-red-700">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-lg text-gray-100">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- main form for new product -->
            <form method="POST" action="/incidentreports" class="" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <p class="text-gray-700 text-sm">
                        <label for="incident_date">Incident Date:</label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                               id="report_date" name="report_date" type="date" placeholder="Incident Date">
                    </p>
                    <p class="text-gray-700 text-sm">
                        <label for="incident_time">Incident Time:</label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                               id="report_time" name="report_time" type="time" placeholder="Incident Time">
                    </p>
                    <p class="text-gray-700 text-sm">
                        <label for="incident_type">Incident Type:</label>
                        <select name="incident_type" id="incident_type" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3">
                               <option value="">--- Please Select a Type ---</option>
                            <option value="Customer Incident">Customer Incident/Injury</option>
                            <option value="Staff Incident">Staff Incident/Injury</option>
                            <option value="Food Incident">Food/ Food Safety Incident</option>
                            <option value="Stock/ Supplier Incident">Stock/ Supplier Incident</option>
                            <option value="Workplace Incident">Workplace/ Environment Incident</option>
                            <option value="Other">Another type of Incident</option>
                        </select>
                    </p>
                    <p class="text-gray-700 text-sm">
                        <label for="severity">Severity:</label>
                        <select name="severity" id="severity" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3">
                            <option value="">--- Please Select ---</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </p>
                    <p class="text-gray-700 text-sm">
                        <label for="incident_location">Incident Location:</label>
                        <textarea id="incident_location" name="incident_location" placeholder="Front of House/ Back of House/ Supplier Address/ ect" rows="2" cols="50" class="appearance-none resize-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"></textarea>
                    </p>
                    <p class="text-gray-700 text-sm">
                        <label for="incident_description">Incident Description:</label>
                        <textarea id="incident_description" name="incident_description" placeholder="Include how the incident happened and who was involved. Include contact details if necessary" rows="4" cols="50" class="appearance-none resize-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"></textarea>
                    </p>
                    <p class="text-gray-700 text-sm">
                        <label for="action_taken">Action Taken:</label>
                        <textarea id="action_taken" name="action_taken" placeholder="Include any immediate or long-term remedial actions taken. Consider if future controls are required. Note any contacts made to Emergency Services, Suppliers or Compliance Agencies" rows="4" cols="50" class="appearance-none resize-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"></textarea>
                    </p>
                        <button type="submit"
                                class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">
                            Add New
                        </button>
                    </div>
                <br><br>
                <x-nav-link :href="route('compliance')" :active="request()->routeIs('compliance')">
                    {{ __('Back to Compliance') }}
                </x-nav-link>
            </form>
                </div>

        </div>
    </div>
</x-app-layout>
