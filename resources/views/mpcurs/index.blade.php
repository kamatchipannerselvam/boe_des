<!--- Page layout design --->
<x-app-layout>
    <!-- page title description ---->
<x-slot name="title">
    Currency Management
</x-slot>
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
    <div class="card-header">
        <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-1/4 pr-0 lg:pr-1">
            <h2>Currency Management</h2>
        </div>
        <div class="w-full lg:w-1/4 pr-0 lg:pr-1">
        <a class="btn btn-success" href="{{ route('mpcurs.create') }}"> Create New Currency</a>
        </div>
        <div class="w-full lg:w-1/4 pr-0 lg:pr-1">
        <a class="btn btn-info" href="{{ route('mpcurs.file-import-export') }}"> Import File</a>
        </div>
        <div class="w-full lg:w-1/4 pr-0 lg:pr-1">
        <a class="btn btn-danger" href="{{ route('mpcurs.file-export') }}">Export data</a>
        </div>
        </div>
    </div>
<!-- Body Content start  here-->                
<div class="card-body">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-sm table-bordered table-striped">
       <tr class="bg-primary text-white font-weight-bolder ">
       <th>No</th>
       <th>Short Code</th>
       <th>Name</th>
       <th width="280px">Action</th>
     </tr>
     @foreach ($mpcurs as $mpcur)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $mpcur->short_code }}</td>
        <td>{{ $mpcur->name }}</td>
        <td>
           <a class="btn btn-primary" href="{{ route('mpcurs.edit',$mpcur->curid) }}">Edit</a>
           
            {!! Form::open(['method' => 'DELETE','route' => ['mpcurs.destroy', $mpcur->curid],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
      </tr>
     @endforeach
    </table>
    {!! $mpcurs->render() !!}
</div>
<!-- Body Content end here-->                
</div>
</div>
@endsection
</x-app-layout>