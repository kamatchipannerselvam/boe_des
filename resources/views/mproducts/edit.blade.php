<!--- Page layout design --->
<x-app-layout>
    <!-- page title description ---->
<x-slot name="title">
    Edit Product details
</x-slot>
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
    <div class="card-header">
        <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
            <h2>Item Management - Edit Item</h2>
        </div>
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
        <a class="btn btn-primary" href="{{ route('mproducts.index') }}"> Back</a>
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
    
{!! Form::model($mproduct, ['method' => 'PATCH','route' => ['mproducts.update', $mproduct ]]) !!}
<div class="h-64 grid grid-rows-4 grid-flow-col gap-4">
    <div>
        <div class="form-group">
            <strong>Category:</strong>
            {!! Form::select('category', ['Mobile'=>'Mobile','Tablet'=>'Tablet','Accessories'=>'Accessories'], array('placeholder' => 'category','class' => 'form-control')) !!}
            @error('category')
                 <div class="invalid-feedback">{{ $message }}</div>
            @enderror           
        </div>
    </div>
    <div>
        <div class="form-group">
            <strong>Brand:</strong>
            {!! Form::text('brand', null, array('placeholder' => 'Brand','class' => 'form-control','required'=>true)) !!}
        </div>
    </div>
    <div>
        <div class="form-group">
            <strong>Model No#:</strong>
            {!! Form::text('model_no', null, array('placeholder' => 'Model No','class' => 'form-control','required'=>true)) !!}
        </div>
    </div>
    <div>
        <div class="form-group">
            <strong>Model Name:</strong>
            {!! Form::text('model_name', null, array('placeholder' => 'Model Name','class' => 'form-control','required'=>true)) !!}
        </div>
    </div>
    <div>
        <div class="form-group">
            <strong>Hscode:</strong>
            {!! Form::text('hscode', null, array('placeholder' => 'Hscode','class' => 'form-control','readonly'=>true)) !!}
        </div>
     </div>
    <div>
       <div class="form-group">
            <strong>Color:</strong>
            {!! Form::text('color', null, array('placeholder' => 'Color','class' => 'form-control')) !!}
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
