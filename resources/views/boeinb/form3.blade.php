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
    <div class="grid grid-cols-1 md:grid-cols-1">
    <div class="text-1xl mb-6 bg-primary text-white float-left pl-10">Step 3: BOE Item Details &mdash; {{ $refno }} <a href="{{ route('boeinb.steptwo',['step'=>2,'refno'=>base64_encode($refno)]) }}" class="text-white float-right pr-10">Back</a></div>
    {!! Form::open(array('route' => 'boeinb.poststepthree', 'method'=>'POST')) !!}
    @csrf
    <div class="item-lists pb-4">
        @php ($totalvalue[0]=0)
        @php ($totalqty[0]=0)
        @foreach($gwinfo as $gkey=>$gwitem)
        @php ($totalvalue[$gkey]=$gwitem->tprice)
        @php ($totalqty[$gkey]=$gwitem->tqty)
        <div id="itemgrid-{{ $gkey }}" class="border-2 border-dark p-4 itemgrid" data-row-id="{{ $gkey }}">
            <div class="grid grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="subitem">
                <div class="form-group">
                <label class="block required">HS Code</label>
                <input type="text" class="form-input pt-1 pb-1 pl-1 pr-1 w-100" name="hscode[]"  id="hscode-item-{{ $gkey }}"  placeholder="85171200" value="{{ $gwitem->hscode }}" readonly/>
                </div>
                </div>
                <div class="subitem">
                <div class="form-group">
                <label class="block required">COO</label>
                <input type="text" class="form-input pt-1 pb-1 pl-1 pr-1 w-100 selectcoo" name="coo[]" id="coo-item-{{ $gkey }}" value="{{ $gwitem->coo_code }}" readonly>
                </div>
                </div>
                <div class="subitem">
                <div class="form-group">
                <label class="block required">Total Qty</label>
                <input type="text" class="form-input  pt-1 pb-1 pl-1 pr-1 w-100 itemqty"  name="qty[]"  id="qty-item-{{ $gkey }}" value="{{ $gwitem->tqty }}" readonly/>
                </div>
                </div>
                <div class="subitem">
                <div class="form-group">
                <label class="block required">Total Value</label>
                <input type="text" class="form-input  pt-1 pb-1 pl-1 pr-1 w-100 tprice"  name="tprice[]"  id="tprice-item-{{ $gkey }}" placeholder="0.00" value="{{ $gwitem->tprice }}" readonly/>
                </div>
                </div>
                <div class="subitem">
                <div class="form-group">
                <label class="block required">Gross Wight</label>
                <input type="number" class="form-input  pt-1 pb-1 pl-1 pr-1 w-100 tgw"  name="tgw[]"  id="tgw-item-{{ $gkey }}"  placeholder="0.00" min="1" required/>
                </div>
                </div>
                <div class="subitem">
                <div class="form-group">
                <label class="block required">GW/PU</label>
                <input type="number" class="form-input  pt-1 pb-1 pl-1 pr-1 w-100 "  name="pu_gw[]"  id="pugw-item-{{ $gkey }}"  placeholder="0.00" readonly />
                </div>
                </div>
            </div>
        </div><!-- item-container-->
            @endforeach
    </div><!-- item-list-container-->
    <input type="hidden" name="refno"  value="{{ $refno  }}" />
    <input type="hidden" name="inbdocinfoid"  value="{{ $inbdocinfoid }}" />
    <input type="hidden" name="process-step" value="step2"/>
    <div class="form-group">
    <a href="{{ route('boeinb.steptwo',['step'=>2,'refno'=>base64_encode($refno)]) }}" class="btn-primary text-white float-left p-1">Back</a>
    <input type="submit" class="btn btn-primary pt-1 pb-1 pl-2 pr-2 w-auto float-right" name="submit" value="Submit"/>
    <p class="pl-100 text-center text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Qty: {{ number_format(array_sum($totalqty),3) }}  &nbsp;&nbsp;&nbsp;Total Value : {{ number_format(array_sum($totalvalue),3) }} </p>
    </div>
  {!! Form::close() !!}
  </div>
</div> <!-- Body Content end here-->
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
$('.tgw').keypress(function (event) {
    return isNumber(event, this)
});
        
$(".tgw").on("change",function(e){
    var tgId=$(this).attr('id');
    var Rowid=tgId.replace("tgw-item-","");
    var rowQty=$("#qty-item-"+Rowid).val();
    var uPrz=$("#tgw-item-"+Rowid).val();
    var uPrzfloatvl=parseFloat(uPrz).toFixed(3);
    var tPrz=parseFloat(parseFloat(uPrzfloatvl)/parseInt(rowQty)).toFixed(3);
    $("#pugw-item-"+Rowid).val(tPrz);
});
});

function isNumber(evt, element) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57) && !(charCode == 46 || charCode == 8)){
    return false;
  }else {
    var len = $(element).val().length;
    var index = $(element).val().indexOf('.');
    if (index > 0 && charCode == 46) {
      return false;
    }
    if (index > 0) {
      var CharAfterdot = (len + 1) - index;
      if (CharAfterdot > 4) {
        return false;
      }
    }

  }
  return true;
}
</script>
</x-slot>
</x-app-layout>