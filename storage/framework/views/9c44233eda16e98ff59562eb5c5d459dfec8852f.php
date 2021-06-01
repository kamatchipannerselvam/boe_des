<!--- Page layout design --->
<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <!-- page title description ---->
 <?php $__env->slot('title'); ?> 
    Item Management
 <?php $__env->endSlot(); ?>
<?php $__env->startSection('content'); ?>
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
    <div class="card-header">
        <div class="flex flex-wrap mt-2 h-5">
        <div class="w-full lg:w-1/4 pr-0 lg:pr-1">
            <h2>Stock Panel</h2>
        </div>
        <div class="w-full lg:w-1/4 pr-0 lg:pr-1">
        <a class="btn btn-danger" href="<?php echo e(route('mproducts.file-export')); ?>">Export data</a>
        </div>
        </div>
    </div>
<!-- Body Content start  here-->                
<div class="card-body">
<table id="datatable_fixed_column" class="table table-condensed table-bordered table-striped text-primary" width="100%" style="font-size: 10px; width: 100%;" role="grid" aria-describedby="datatable_fixed_column_info">
<thead>
<tr role="row">
<th class="hasinput" rowspan="1" colspan="1"><input type="text" class="form-input" placeholder="BOE NO"></th>
<th class="hasinput" rowspan="1" colspan="1"><input type="text" class="form-input" placeholder="Customer"></th>
<th class="hasinput" rowspan="1" colspan="1"><input type="text" class="form-input" placeholder="Category"></th>
<th class="hasinput" rowspan="1" colspan="1"><input type="text" class="form-input" placeholder="Brand"></th>
<th class="hasinput" rowspan="1" colspan="1"> <input type="text" class="form-input " placeholder="Model No"></th>
<th class="hasinput" rowspan="1" colspan="1"><input type="text" class="form-input" placeholder="Model Name"></th>
<th class="hasinput" rowspan="1" colspan="1"> <input type="text" class="form-input" placeholder="Hscode"></th>
<th class="hasinput" rowspan="1" colspan="1"> <input type="text" class="form-input" placeholder="Made In"></th>
<th colspan="4" class="hasinput p-0" rowspan="1">
<table width="100%" border="0" >
<tr class="bg-warning text-primary p-0">
<td colspan="2" class="w-100 text-center">Total Stock Qty:<br><font color="#00CC00" class="font-weight-bolder"><span id="avltotalqtyspan" style="font-size: 15px;font-weight: bolder;">0</span></font></td>
<td><br><span style="text-align:right"><button onclick="refreshdiv()" class="btn btn-labeled btn-info" style="font-size:9px; font-weight:bold"> <span class="btn-label"><i class="glyphicon glyphicon-refresh"></i></span>REFRESH</button> </span></td>
<td><br><span style="text-align:right"><a class="btn btn-labeled btn-success bold" style="font-size:9px; font-weight:bold" href="<?php echo e(route('obstockreq.send-order')); ?>"><span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>SEND ORDER</a></span></td>
</tr>
</table>
</th>
</tr>
<tr valign="middle" role="row">
<th class="sorting_asc" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">BOE NUMBER</th>
<th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending">Customer</th>
<th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Category</th>
<th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Brand: activate to sort column ascending">Brand</th>
<th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Model No: activate to sort column ascending">Model No</th>
<th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Model Name.: activate to sort column ascending">Model Name.</th>
<th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Hscode: activate to sort column ascending">Hscode</th>
<th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="COO: activate to sort column ascending">Made In</th>
<th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Color: activate to sort column ascending">Color</th>
<th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Quantity: activate to sort column ascending">Qty</th>
<th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Qty_R: activate to sort column ascending">Qty_R</th>
<th data-hide="Request" class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Request: activate to sort column ascending">Request</th>
</tr>
</thead>
<tbody>
    <?php if(count($finalarray)>0): ?>
    <?php $__currentLoopData = $finalarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skey=>$stitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($stitem['boe_number']); ?></td>
        <td><?php echo e($stitem['vendor_name']); ?></td>
        <td><?php echo e($stitem['category']); ?></td>
        <td><?php echo e($stitem['brand']); ?></td>
        <td><?php echo e($stitem['model_no']); ?></td>
        <td><?php echo e($stitem['model_name']); ?></td>
        <td><?php echo e($stitem['hscode']); ?></td>
        <td><?php echo e($stitem['coo_code']); ?></td>
        <td><?php echo e($stitem['color']); ?></td>
        <td>
        <div id="after_action">
        <span style="font-size:12px" class="inpqty" id="qty_available_<?php echo e($stitem['inbstockinfoid']); ?>" data-value="<?php echo e($stitem['inbstockinfoid']); ?>"><?php echo e(number_format($stitem['qty'],2)); ?></span>
        <?php if($stitem['rqty']>0): ?>
        <span class="btn btn-danger btn-circle btn-sm" style="font-size:10px;" id="qty_Order<?php echo e($stitem['inbstockinfoid']); ?>" data-value="<?php echo e($stitem['rqty']); ?>"><?php echo e($stitem['rqty']); ?></span>
        <?php else: ?>
        <span class="btn btn-danger btn-circle btn-sm" style="font-size:10px; display:none" id="qty_Order<?php echo e($stitem['inbstockinfoid']); ?>" data-value="0"></span>
        <?php endif; ?>
        </div>
        </td>
        <td class="w-10">
        <?php if($stitem['rqty']>0): ?>
        <input type="text" class="form-input w-15" autocomplete="off" id="qty_<?php echo e($stitem['inbstockinfoid']); ?>" readonly/>
        <?php else: ?>
        <input type="text" class="form-input w-15" autocomplete="off" id="qty_<?php echo e($stitem['inbstockinfoid']); ?>"/>
        <?php endif; ?>                
        </td>
        <td>
        <div class="btn-group">
        <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
        <ol class="dropdown-menu">
        <li><a href="javascript:void(0);" class="btn btn-link" onclick="action_button(<?php echo e($stitem['inbstockinfoid']); ?>, 'Order')">Order</a></li>
        <li><a href="javascript:void(0);" class="btn btn-link" onclick="action_button(<?php echo e($stitem['inbstockinfoid']); ?>, 'Delete')">Delete</a></li>
        </ol>
        </div>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php endif; ?>
</tbody>
</table>
</div>
<!-- Body Content end here-->                
</div>
</div>
<?php $__env->stopSection(); ?>
 <?php $__env->slot('scripts'); ?> 
<style>
table.dataTable thead th, table.dataTable thead td {
    padding: 10px 10px;
    border-bottom: 1px solid #111;
}    
.form-input{
    width: 100%;
    font-size: 12px;
    color: #000;
    padding: 2px;
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
    width: 10% !important;
}
.dataTables_filter, .dataTables_info { display: none; }
</style>
<script type="text/javascript">
var Otable;
function drawdatatable(){
Otable = $('#datatable_fixed_column').DataTable({
        "autoWidth" : true,
        "responsive":true,
        "pageLength": 50,
        'fixedHeader': true,
        "lengthMenu": [[50, 100, 250, 500, -1], [50, 100, 250, 500, "All"]],
        "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        if(typeof i === 'string'){
                        var $str=$(i);
                        var inpval=$str.find("span").eq(0).text();
                        var inpint=$.trim(inpval.replace(/,/g, ""));
                        var inpint1=inpint==""?0:inpint;
                            return parseInt(inpint1);
                        }
                        else{
                            return parseInt(i);   
                        }
                    };

                    // Total over all pages
                    total = api
                        .column( 9 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 9, { page: 'current'}  )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    //console.log(pageTotal);
                    $("#avltotalqtyspan").html(pageTotal);
                }

    });

    // Apply the filter
    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
        Otable
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );
    /* END COLUMN FILTER */   

    /* COLUMN SHOW - HIDE */
    $('#datatable_col_reorder').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
                            "t"+
                            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
            "autoWidth" : true,
    });
    /* END COLUMN SHOW - HIDE */
    
}   
$(document).ready(function(){
drawdatatable();
});
/***
 * 
 * @param  {type} e
 * @param  {type} id_stock
 * @returns  {undefined}
 */
function validateinputqty(e,id_stock){
    var qty_available=parseInt($('#qty_available_'+id_stock).attr('data-value'));
    var inpval=parseInt(e.target.value);
    //console.log(inpval);
    if(inpval>qty_available){
        e.target.value='';
        e.target.focus();
        alert("you are allowed to order only available qty "+qty_available);
    }
}

/**
 * 
 * @param  {type} id_stock
 * @param  {type} req_type
 * @param  {type} available_qty
 * @returns  {Boolean}
 */
function action_button(id_stock,req_type){
var qty_order=0;    
if(req_type=='Order'){
   if($('#qty_'+id_stock).val()==""){
       $('#qty_'+id_stock).focus();
       alert("please enter qty you want to add");
       return false;
}
$('#qty_'+id_stock).attr('readonly',true);
qty_order=$('#qty_'+id_stock).val();
}
else if(req_type=='Delete'){
qty_order=$('#qty_Order'+id_stock).attr('data-value');
}
$('#spinner_'+id_stock).show();
$.post("<?php echo e(url('obstockreq/create-order')); ?>", {"_token": "<?php echo e(csrf_token()); ?>", 'req':'action','qty':qty_order,'stock_id':id_stock,'req_type':req_type},
function(response) {
// Log the response to the console
var obj = JSON.parse(response);
if(obj.status=='success'){
    if(req_type=='Order'){//qty available element span
    $('#qty_available_'+id_stock).text(obj.remainqty);
    $('#qty_available_'+id_stock).attr('data-value',obj.remainqty);
    //qty order input field
    $('#qty_'+id_stock).val('');
    //qty ordered element span
    $('#qty_Order'+id_stock).attr('data-value',qty_order);
    $('#qty_Order'+id_stock).text(qty_order);
    $('#qty_Order'+id_stock).show();
    $('#spinner_'+id_stock).hide();
    }
    if(req_type=='Delete'){
    $('#qty_available_'+id_stock).text(obj.remainqty);
    $('#qty_available_'+id_stock).attr('data-value',obj.remainqty);
    //qty order input field
    $('#qty_'+id_stock).val('');
    $('#qty_'+id_stock).attr('readonly',false);
    //qty ordered element
    $('#qty_Order'+id_stock).attr('data-value',0);
    $('#qty_Order'+id_stock).text('');
    $('#qty_Order'+id_stock).hide();
    $('#spinner_'+id_stock).hide();
    }
}
else{
    $('#qty_'+id_stock).removeAttr('readonly');
    alert(obj.message);
    $('#spinner_'+id_stock).hide();
}
refreshdiv();
});
}

function refreshdiv(){
  var sum = 0;
  $(".inpqty").each(function(){
    sum += parseFloat($(this).text());
  });
  $("#avltotalqtyspan").html(sum);
}

</script>
 <?php $__env->endSlot(); ?>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH E:\xampp5\htdocs\boe_des\resources\views/boeinb/index.blade.php ENDPATH**/ ?>