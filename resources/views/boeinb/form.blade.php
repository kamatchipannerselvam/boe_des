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
    <div class="text-1xl mb-6 text-center bg-primary text-white">BOE Document Details</div>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        <div>
            <div class="form-group">
                <label class="block required">Document Date</label>
                <input type="date" class="form-input pt-1 pb-1 pl-1 pr-1 w-auto" name="boedate" id="boedate" required/>
            </div>
            <div class="form-group">
                <label class="block required">Transfer from(Vendor Name)</label>
                <select class="form-select  pt-1 pb-1 pl-1 pr-1 w-auto"  name="boevendorname" id="boevendorname" required>
                    <option>-- Select Vendor Name--</option>
                </select>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label class="block required">Document No#</label>
                <input type="text"  class="form-input  pt-1 pb-1 pl-1 pr-1 w-auto"  name="boeno" id="boeno" required/>
            </div>
            <div class="form-group">
                <label class="block required">Currency ($)</label>
                <select class="form-select  pt-1 pb-1 pl-1 pr-1 w-auto"  name="inbcurrency" id="inbcurrency">
                    <option>-- Select Document Currency--</option>
                </select>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label class="block">Invoice Date</label>
                <input type="date"  class="form-input  pt-1 pb-1 pl-1 pr-1 w-auto" name="invoicedate" id="invoicedate"/>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label class="block">Invoice No#</label><input type="text"  class="form-input  pt-1 pb-1 pl-1 pr-1 w-auto" name="boedate" id="boedate"/>
            </div>
        </div>
    </div>
    <div class="text-1xl mb-6 text-center bg-primary text-white">BOE Item Details</div>
    <div class="item-lists pb-4">
        <div id="itemgrid-0" class="border-2 border-dark p-4 itemgrid" data-row-id="0">
            <div class="grid grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="subitem">
                <div class="form-group">
                <label class="block required">Mode No#</label>
                <select class="form-select pt-1 pb-1 pl-1 pr-1 w-100 selectmodelno" name="model_no[]" id="model_no-item-0" >
                <option>-- Select Model No--</option>
                </select>
                </div>
                </div>
                <div class="subitem">
                <div class="form-group">
                <label class="block required">HS Code</label>
                <input type="text" class="form-input pt-1 pb-1 pl-1 pr-1 w-100" name="hscode[]"  id="hscode-item-0"  placeholder="85171200" readonly/>
                </div>
                </div>
                <div class="subitem">
                <div class="form-group">
                <label class="block required">COO</label>
                <select class="form-select pt-1 pb-1 pl-1 pr-1 w-100 selectcoo" name="coo[]" id="coo-item-0" >
                <option>-- Select Country of Origin--</option>
                </select>
                </div>
                </div>
                <div class="subitem">
                <div class="form-group">
                <label class="block required">Qty</label>
                <input type="text" class="form-input  pt-1 pb-1 pl-1 pr-1 w-100 itemqty"  name="qty[]"  id="qty-item-0"  placeholder="0"/>
                </div>
                </div>
                <div class="subitem">
                <div class="form-group">
                <label class="block required">Unit Price</label>
                <input type="text" class="form-input  pt-1 pb-1 pl-1 pr-1 w-100 uprice"  name="uprice[]"  id="uprice-item-0" placeholder="0.00" />
                </div>
                </div>
                <div class="subitem">
                <div class="form-group">
                <label class="block required">Total Price</label>
                <input type="number" class="form-input  pt-1 pb-1 pl-1 pr-1 w-100 "  name="tprice[]"  id="tprice-item-0"  placeholder="0.00" readonly/>
                </div>
                </div>
            </div>
            <p class="float-left text-info text-bold itemdetails" id="text-container"><b>Category</b>: <span class="text-primary" id="cat-item-0">xxx</span>, <b>Brand</b>: <span class="text-primary" id="brand-item-0">xxx</span>, <b>Model name</b>: <span class="text-primary" id="modelname-item-0">xxx</span>, <b>Color</b>:  <span class="text-primary" id="color-item-0">xxx</span>  </p>
            <p class="float-right  text-info" id="addbtn-container"><a id="add-btn-0" href="javascript:;" class="text-link" onclick="addnewgrid(event)"><i class="fa fa-plus-circle"></i> Add Item</a></p>
            <p class="float-right pr-4 hidden  text-info" id="removebtn-container"><a id="remove-btn-0" href="javascript:;" class="text-link text-danger" onclick="dropgrid(event)"><i class="fa fa-minus-circle"></i> Remove Item</a></p>
        </div><!-- item-container-->
    </div><!-- item-list-container-->
    
  </div>
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
$('.selectmodelno').on("change", function(e) {
   // what you would like to happen
   var currentid=e.target.id;
   //target value (selected model no)
   var selectedItemId=$(this).val();
   var RowId=currentid.replace('model_no-item-','');
   getItemdetails(selectedItemId,RowId);
});

$(".selectcoo").select2({
    placeholder: 'Select COO',
  ajax: {
   url: "{{ 'mpcoos/listcoo' }}",
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
$(".selectmodelno").select2({
    placeholder: 'Select Model No',
  ajax: {
   url: "{{ 'mproducts/listitems' }}",
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

$("#boevendorname").select2({
  ajax: { 
   url: "{{ 'mcustomers/listcustomer/' }}",
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
   url: "{{ 'mpcurs/listcurrency/' }}",
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
 
$('.itemqty, .uprice').keypress(function (event) {
    return isNumber(event, this)
});
        
$(".uprice").on("change",function(e){
    var tgId=$(this).attr('id');
    var Rowid=tgId.replace("uprice-item-","");
    var rowQty=$("#qty-item-"+Rowid).val();
    var uPrz=$("#uprice-item-"+Rowid).val();
    var uPrzfloatvl=parseFloat(uPrz).toFixed(3);
    var tPrz=parseInt(rowQty)*parseFloat(uPrzfloatvl);
    $("#uprice-item-"+Rowid).val(uPrzfloatvl);
    $("#tprice-item-"+Rowid).val(tPrz);
});

});


/**
 * 
 * @param {type} selecteditem
 * @param {type} RowId
 * @returns {undefined}
 */
function getItemdetails(selecteditem,RowId){
$.ajax({
   url: "{{ 'mproducts/itemdetails' }}",
   type: "GET",
   dataType: 'json',
   delay: 250,
   data: {'itemId':selecteditem},
   success: function (response) {
       if(response.status=='success'){
        var JObj=response.data;
        $("#hscode-item-"+RowId).val(JObj.hscode);
        $("#cat-item-"+RowId).html(JObj.category);
        $("#brand-item-"+RowId).html(JObj.brand);
        $("#modelname-item-"+RowId).html(JObj.model_name);
        $("#color-item-"+RowId).html(JObj.color);
       }
   },
   cache: true
  });
}

function loadmodelno(){
    $.ajax({
       url: "{{ 'mproducts/listitems/' }}",
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
      });
}
 
var CloneCount=0;

function maxItemId(){
    const $all = $('[id^="itemgrid-"]');
    const maxID = Math.max.apply(Math, $all.map((i, el) => +el.id.match(/\d+$/g)[0]).get());
    const nextId = maxID + 1;
    return nextId;
}

function addnewgrid(e){
    var targetElem=e.target.id;
    var prdivId=$("#"+targetElem).closest('div').attr('id');
    var row = $("#"+prdivId);
    $('.selectmodelno').select2("destroy");
    $('.selectcoo').select2("destroy");
    var cloneObj=row.clone(true);
    CloneCount=maxItemId();
    row.find("#addbtn-container").removeClass("visible").addClass("hidden");
    row.find("#removebtn-container").removeClass("hidden").addClass("visible");
    var cloneObjprocessed=renameCloneIdsAndNames(cloneObj);
    $(".item-lists").append(cloneObjprocessed);
    $("#itemgrid-"+CloneCount).find("#removebtn-container").removeClass("hidden").addClass("visible");
    $(".selectmodelno").select2({
    placeholder: 'Select Model No',
  ajax: { 
   url: "{{ 'mproducts/listitems' }}",
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
    $(".selectcoo").select2({
    placeholder: 'Select COO',
  ajax: {
   url: "{{ 'mpcoos/listcoo' }}",
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
}

function renameCloneIdsAndNames( objClone ) {
    if( !objClone.attr( 'data-row-id' ) ) {
        console.error( 'Cloned object must have \'data-row-id\' attribute.' );
    }

    if( objClone.hasClass( 'border-dark' ) ) {
        objClone.addClass ('bg-light');
        objClone.removeClass ('border-dark');
        objClone.addClass ('border-gray');
    }
    else {
        objClone.addClass ('border-dark');
        objClone.removeClass ('border-gray');
        objClone.removeClass ('bg-light');
    }
    
    if( objClone.attr( 'id' ) ) {
        CloneobjId=objClone.attr( 'id' );
        objClone.attr( 'id', objClone.attr( 'id' ).replace( /\d+$/, CloneCount  ) );
    }
    
    objClone.attr( 'data-row-id', objClone.attr( 'data-row-id' ).replace( /\d+$/, CloneCount) );

    objClone.find( '[id]' ).each( function() {

        var strNewId = $( this ).attr( 'id' ).replace( /\d+$/, CloneCount );
        
        $( this ).attr( 'id', strNewId );
        
        if( $( this ).attr( 'name' ) ) {
            var strNewName  = $( this ).attr( 'name' ).replace( /\[\d+\]/g, CloneCount );
            $( this ).attr( 'name', strNewName );
            $( this ).val('');
        }
    });

    return objClone;
}

function dropgrid(e){
    var targetElem=e.target.id;
    var prdivId=$("#"+targetElem).closest('div').attr('id');
    $("#"+prdivId).remove();
    var titemlist=$(".itemgrid").length;
    var nextId=maxItemId();
    nextId--;
    if(titemlist==1){
    $("#itemgrid-"+nextId).find("#removebtn-container").removeClass("visible").addClass("hidden");
    $("#itemgrid-"+nextId).find("#addbtn-container").removeClass("hidden").addClass("visible");
    $(".itemgrid").attr('id',"itemgrid-0");
    $(".itemgrid").attr('data-row-id',"0");
        $(".itemgrid").find( '[id]' ).each( function() {

            var strNewId = $( this ).attr( 'id' ).replace( /\d+$/, 0 );

            $( this ).attr( 'id', strNewId );

            if( $( this ).attr( 'name' ) ) {
                var strNewName  = $( this ).attr( 'name' ).replace( /\[\d+\]/g, 0 );
                $( this ).attr( 'name', strNewName );
            }
        });
    }
    else{
    $("#itemgrid-"+nextId).find("#addbtn-container").removeClass("hidden").addClass("visible");
    }
}
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