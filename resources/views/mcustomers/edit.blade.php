<!--- Page layout design --->
<x-app-layout>
    <!-- page title description ---->
<x-slot name="title">
    Edit Customer details
</x-slot>
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
    <div class="card-header">
        <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
            <h2>Customer Management - Edit Customer</h2>
        </div>
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
        <a class="btn btn-primary" href="{{ route('mcustomers.index') }}"> Back</a>
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
    
{!! Form::model($mcustomers, ['method' => 'PATCH','route' => ['mcustomers.update', $mcustomers ]]) !!}
<div class="h-64 grid grid-rows-4 grid-flow-col gap-4">
    <div>
        <div class="form-group">
            <strong>Customer Name:</strong>
            {!! Form::text('customer_name', null, array('placeholder' => 'Customer Name','class' => 'form-control','required'=>true)) !!}
        </div>
    </div>
    <div>
        <div class="form-group">
            <strong>Address1:</strong>
            {!! Form::text('address1', null, array('placeholder' => 'Address1','class' => 'form-control','required'=>true)) !!}
        </div>
    </div>
    <div>
        <div class="form-group">
            <strong>Address2:</strong>
            {!! Form::text('address2', null, array('placeholder' => 'Address2','class' => 'form-control','required'=>true)) !!}
        </div>
    </div>
    <div>
        <div class="form-group">
            <strong>Emirsal Code:</strong>
            {!! Form::text('emirsal_code', null, array('placeholder' => 'Emirsal Code','class' => 'form-control','required'=>true)) !!}
        </div>
    </div>
    <div>
        <div class="form-group">
            <strong>City:</strong>
            {!! Form::text('city', null, array('placeholder' => 'City','class' => 'form-control','required'=>true)) !!}
        </div>
    </div>
    <div>
        <div class="form-group">
            <strong>Country:</strong>
            {!! Form::text('country', null, array('placeholder' => 'Country','class' => 'form-control','required'=>true)) !!}
        </div>
    </div>
    <div class="mt-4 h-10 btn-block">
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
</div> <!-- Body Content end here-->                
</div>
</div>
@endsection
</x-app-layout>