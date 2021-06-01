<!--- Page layout design --->
<x-app-layout>
    <!-- page title description ---->
<x-slot name="title">
    Show role
</x-slot>
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
<!-- Card header start  here-->                
    <div class="card-header">
        <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
            <h2>Role Management - view details </h2>
        </div>
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
        </div>
    </div>
<!-- Card Body Content start  here-->                
<div class="card-body">
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
           @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
           @endforeach
        </ul>
      </div>
    @endif

<div class="h-64 grid grid-rows-4 grid-flow-col gap-4">
    <div  class="flex-col">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div  class="flex-col">
        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
</div>
<!-- Body Content end here-->                
</div>
</div>
@endsection
</x-app-layout>
