<!--- Page layout design --->
<x-app-layout>
    <!-- page title description ---->
<x-slot name="title">
    Edit Role
</x-slot>
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
<!-- Card header start  here-->                
    <div class="card-header">
        <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
            <h2>Role Management - Edit </h2>
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

{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="h-64 grid grid-rows-4 grid-flow-col gap-4">
    <div  class="flex-col">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div  class="flex-col">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}
    
</div>
<!-- Body Content end here-->                
</div>
</div>
@endsection
</x-app-layout>
