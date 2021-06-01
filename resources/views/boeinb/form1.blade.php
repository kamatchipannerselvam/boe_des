<!--- Page layout design --->
<x-app-layout>     <!-- page title description ---->
<x-slot name="title">
    Inbound Management
</x-slot>
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
    <div class="card-header text-center">Receive BOE Inbound</div>
<!-- Body Content start  here-->                
<div class="card-body">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif
    {!! Form::open(array('route' => 'boeinb.poststepone','method'=>'POST')) !!}
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-1">
    <div class="text-1xl mb-6 text-center bg-primary text-white">Step 1 &mdash; BOE Document Details - {{ ($docinfo)?$docinfo->refno:"" }}</div>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        <div>
            <div class="form-group">
                <label class="block required">BOE Date</label>
                <input type="date" class="form-input pt-1 pb-1 pl-1 pr-1 w-auto" name="boe_date" id="boedate" value="{{ ($docinfo)?$docinfo->boe_date:"" }}" required/>
            </div>
            <div class="form-group">
                <label class="block required">Transfer from(Vendor Name)</label>
                <select class="form-select  pt-1 pb-1 pl-1 pr-1 w-auto" name="vendor_name" id="boevendorname" required>
                    <option value="">-- Select Vendor Name--</option>
                    @if ($docinfo)
                    <option selected> {{ $docinfo->vendor_name }} </option>
                    @endif
                </select>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label class="block required">BOE No#</label>
                <input type="text"  class="form-input  pt-1 pb-1 pl-1 pr-1 w-auto"  name="boe_number" id="boeno" value="{{ ($docinfo)?$docinfo->boe_number:"" }}" required/>
            </div>
            <div class="form-group">
                <label class="block required">Currency ($)</label>
                <select class="form-select  pt-1 pb-1 pl-1 pr-1 w-auto" name="currency" id="inbcurrency">
                    <option value="">-- Select Document Currency--</option>
                    @if ($docinfo)
                    <option selected> {{ $docinfo->currency }} </option>
                    @endif
                </select>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label class="block">Invoice Date</label>
                <input type="date"  class="form-input  pt-1 pb-1 pl-1 pr-1 w-auto" name="invoice_date"  value="{{ ($docinfo)?$docinfo->invoice_date:"" }}"  id="invoicedate"/>
            </div>
            <div class="form-group">
                <label class="block"><br></label><input type="submit" class="btn btn-primary pt-1 pb-1 pl-2 pr-2 w-auto" name="submit" value="Next"/>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label class="block">Invoice No#</label><input type="text"  class="form-input  pt-1 pb-1 pl-1 pr-1 w-auto" name="invoice_no" id="invno"  value="{{ ($docinfo)?$docinfo->invoice_no:"" }}"  />
            </div>
        </div>
    </div>
  </div>
    <input type="hidden" name="refno"  value="{{ ($docinfo)?$docinfo->refno:"" }}" />
    <input type="hidden" name="inbdocinfoid"  value="{{ (($docinfo))?$docinfo->inbdocinfoid:"" }}" />
    <input type="hidden" name="process-step" value="step1"/>
  {!! Form::close() !!}
</div>
<!-- Body Content end here-->                
</div>
</div>
@endsection
<x-slot name="scripts">
<style>
.bg-light .itemdetails{
    color: #CC3363 !important;
}
.select2-results__options{
        font-size:13px !important;
}
.select2-selection__rendered {
    font-size: 13px !important;
    line-height: 31px !important;
}
.select2-container .select2-selection--single {
    height: 35px !important;
}
.select2-selection__arrow {
    height: 34px !important;
}
</style>
<script>
$(document).ready(function(){
$("#boevendorname").select2({
  ajax: {
   url: "{{ url('/mcustomers/listcustomer') }}",
   type: "GET",
   dataType: 'json',
   delay: 250,
   data: function (params) {
    return {
      searchTerm: params.term // search term
    };
   },
   processResults: function (response) {
     return {
        results: response
     };
   },
   cache: true
  }
});
 
 $("#inbcurrency").select2({
  ajax: {
   url: "{{ url('/mpcurs/listcurrency') }}",
   type: "GET",
   dataType: 'json',
   delay: 250,
   data: function (params) {
    return {
      searchTerm: params.term // search term
    };
   },
   processResults: function (response) {
     return {
        results: response
     };
   },
   cache: true
  }
 });
 
});
</script>
</x-slot>
</x-app-layout>