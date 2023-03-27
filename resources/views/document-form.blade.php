<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}'s Documents
        </h2>
    </x-slot>

    <div class="py-12">
        @include('layouts.document_navigation')
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
            <div class="container mt-5">
                <form action="{{route('store_document')}}" method="post" enctype="multipart/form-data">
                    <h3 class="text-center mb-5">Upload File</h3>
                    @csrf
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <p class="text-gray-700 mt-2 text-sm">
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                               id="name" name="name" type="text" placeholder="document name">
                    </p>
                    <p class="text-gray-700 mt-2 text-sm">
                        {{ Form::label('document type','Document Type')}}
                        {{ Form::select('animal', array(
                        'other' => 'Please Select a Type:',
                        'incident_report' => 'Incident Report',
                        'Compliance' => array('compliance_checks' => 'Check Sheets'),
                        'Staff training' => array('spaniel' => 'Spaniel'),
                        ),'Other', array('id'=> 'type', 'name' => 'type','class' => 'appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3'))}}
                    </p>
                    <p class="text-gray-700 mt-2 text-sm">
                        <label for="Document Date">Document Date</label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                               id="doc_date" name="doc_date" type="date" placeholder="document date">
                    </p>
                    <p class="text-gray-700 mt-2 text-sm">
                        <label for="Renewal Date">Renewal Date</label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                               id="renewal_date" name="renewal_date" type="date" placeholder="renewal date">
                    </p>
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="chooseFile">
                        <label class="custom-file-label" for="chooseFile">Select file</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                        Upload Files
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
