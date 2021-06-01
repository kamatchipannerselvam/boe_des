<!--- Page layout design --->
<x-app-layout>
    <!-- page title description ---->
<x-slot name="title">
    Product Imports
</x-slot>
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
    <div class="card-header">
        <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
            <h2>Item Management - Import files</h2>
        </div>
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
        <a class="btn btn-primary" href="{{ route('mproducts.index') }}"> Back</a>
        </div>
        </div>
    </div>
<!-- Body Content start  here-->                
<div class="card-body">
<form action="{{ route('mproducts.file-import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Please <a class="btn-link text-danger" href="{{ asset('download/sample-item-upload-template.xlsx') }}" download>Click Here</a> to download sample coo upload template</p>
        <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-2/4 pr-5 lg:pr-4">
                <div class="form-group mb-4">
                    <div class="custom-file text-left">
                        <input type="file" name="file" class="custom-file-input" id="customFile" accept=".xlsx">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
        </div>
        <div class="w-full lg:w-2/4 mt-2 pr-5 lg:pr-2">
            <button class="btn btn-primary">Import data</button>
        </div>
        </div>
        </form>    
</div>

<!-- Body Content end here-->                
</div>
</div>
@endsection
</x-app-layout>
