<!--- Page layout design --->
<x-app-layout>
    <!-- page title description ---->
<x-slot name="title">
    Users Management
</x-slot>
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
    <div class="card-header">
        <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
            <h2>User Management</h2>
        </div>
        <div class="w-full lg:w-2/4 pr-0 lg:pr-2">
        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
       <th>Name</th>
       <th>Email</th>
       <th>Roles</th>
       <th width="280px">Action</th>
     </tr>
     @foreach ($data as $key => $user)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
               <label class="badge badge-success">{{ $v }}</label>
            @endforeach
          @endif
        </td>
        <td>
           <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
           <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
      </tr>
     @endforeach
    </table>
    {!! $data->render() !!}
</div>
<!-- Body Content end here-->                
</div>
</div>
@endsection
</x-app-layout>
