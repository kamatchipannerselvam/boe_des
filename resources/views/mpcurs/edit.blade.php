<!--- Page layout design --->
<x-app-layout>
    <!-- page title description ---->
<x-slot name="title">
    Edit Currency details
</x-slot>
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
    <div class="card-header">
        <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
            <h2>Currency Management - Edit Currency</h2>
        </div>
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
        <a class="btn btn-primary" href="{{ route('mpcurs.index') }}"> Back</a>
        </div>
        </div>
    </div>
<!-- Body Content start  here-->                
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
    
{!! Form::model($mpcur, ['method' => 'PATCH','route' => ['mpcurs.update', $mpcur ]]) !!}
<div class="h-64 grid grid-rows-4 grid-flow-col gap-4">
    <div>
        <div class="form-group">
            <strong>Short Code:</strong>
            {!! Form::text('short_code', null, array('placeholder' => 'Short Code','class' => 'form-control','required'=>true)) !!}
        </div>
    </div>
    <div>
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required'=>true)) !!}
        </div>
    </div>
    <div class="mt-4 h-10 btn-block">
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
</div>

<!-- Body Content end here-->                
</div>
</div>
@endsection
</x-app-layout>
