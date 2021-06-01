<!--- Page layout design --->
<x-app-layout>
    <!-- page title description ---->
<x-slot name="title">
    Customer Management
</x-slot>
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
    <div class="card-header">
        <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-1/4 pr-0 lg:pr-1">
            <h2>Customer Management</h2>
        </div>
        <div class="w-full lg:w-1/4 pr-0 lg:pr-1">
        <a class="btn btn-success" href="{{ route('mcustomers.create') }}"> Create New Customer</a>
        </div>
        <div class="w-full lg:w-1/4 pr-0 lg:pr-1">
        <a class="btn btn-info" href="{{ route('mcustomers.file-import-export') }}"> Import File</a>
        </div>
        <div class="w-full lg:w-1/4 pr-0 lg:pr-1">
        <a class="btn btn-danger" href="{{ route('mcustomers.file-export') }}">Export data</a>
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
    <table class="table table-sm table-bordered table-striped" id="mcusexample">
     <thead>
     <tr class="bg-primary text-white font-weight-bolder ">
       <th>No</th>
       <th>Customer Name</th>
       <th>Address1</th>
	   <th>Address2</th>
	   <th>Emirsal Code</th>
	   <th>City</th>
	   <th>Country</th>
       <th width="280px">Action</th>
     </tr>
     </thead>
     <tfoot>
     <tr class="bg-primary text-white font-weight-bolder ">
       <th></th>
       <th>Customer Name</th>
       <th>Address1</th>
        <th>Address2</th>
        <th>Emirsal Code</th>
        <th>City</th>
        <th>Country</th>
       <th></th>
     </tr>
     </tfoot>
     <tbody>
     @foreach ($mcustomers as $mcustomer)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $mcustomer->customer_name }}</td>
        <td>{{ $mcustomer->address1 }}</td>
		<td>{{ $mcustomer->address2 }}</td>
		<td>{{ $mcustomer->emirsal_code }}</td>
		<td>{{ $mcustomer->city }}</td>
		<td>{{ $mcustomer->country }}</td>
        <td>
           <a class="btn btn-primary" href="{{ route('mcustomers.edit',$mcustomer->customer_id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['mcustomers.destroy', $mcustomer->customer_id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
      </tr>
     @endforeach
     </tbody>
    </table>
</div>
<!-- Body Content end here-->                
</div>
</div>
@endsection
<x-slot name="scripts">
<style>
[type='text'], [type='email'], [type='url'], [type='password'], [type='number'], [type='date'], [type='datetime-local'], [type='month'], [type='search'], [type='tel'], [type='time'], [type='week'], [multiple], textarea, select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    color: #000;
    background-color: #FEFEFE;
    border-color: #6b7280;
    border-width: 1px;
    border-radius: 0px;
    padding-top: 0.5rem;
    padding-right: 0.75rem;
    padding-bottom: 0.5rem;
    padding-left: 0.75rem;
    font-size: 1rem;
    line-height: 1.5rem;
}    
tfoot,thead {
display: table-header-group;
}
tfoot input{
width: 100% !important;
height: 30px !important;
border-radius: 2px #ccc;
padding: 0px;
margin: 0px;
}
thead th:last-child{
    width: 15% !important;
}
.dataTables_filter, .dataTables_info { display: none; }
</style>
<script type="text/javascript">
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#mcusexample tfoot th').each( function () {
        var title = $(this).text();
        if($.trim(title)){
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        }
    } );
 
    // DataTable
    var table = $('#mcusexample').DataTable({
    'info':false,
    'lengthChange':false,
    "autoWidth" : true,
    "pageLength": 25,
    'fixedHeader': true,
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );    
</script>
</x-slot>
</x-app-layout>
