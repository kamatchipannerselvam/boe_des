<!--- Page layout design --->
<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <!-- page title description ---->
 <?php $__env->slot('title'); ?> 
    Send Order
 <?php $__env->endSlot(); ?>
<?php $__env->startSection('content'); ?>
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
    <div class="card-header">
        <div class="flex flex-wrap mt-2 h-5">
        <div class="w-full lg:w-1/4 pr-0 lg:pr-1">
            Send Order
        </div>
        </div>
    </div>
<!-- Body Content start  here-->                
<div class="card-body">
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
  <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>
<?php echo Form::open(array('route' => 'boeinb.poststepone','method'=>'POST')); ?>

<?php echo csrf_field(); ?>
<div class="grid grid-cols-1 md:grid-cols-1">
<table class="table table-bordered bg-warning border w-100">
<tbody>
<tr>
<td class="pl-100">Batch NO.:</td>
<td class="pl-100">Batch Date.:</td>
<td>
<label class="required pl-10">Currency</label>
<select class="form-select  pt-1 pb-1 pl-1 pr-1 w-auto" name="currency" id="inbcurrency">
<option value="">-- Select Currency--</option>
</select>
</td>
</tr>
<tr class="bg-primary text-white">
<td>Customer Name</td>
<td>Transfer To</td>
<td>BOE ref no</td>
</tr>
<tr>
<td>
<select class="form-select  pt-1 pb-1 pl-1 pr-1" name="vendor_name" id="boevendorname" required>
<option value="">-- Customer Name --</option>
</select>
</td>
<td>
<div class="form-group">
<input class="form-control font-weight-bolder" placeholder="Transfer To" type="text" name="delivery_to" id="delivery_to" list="list2">
<datalist id="list2"></datalist>
</div>
</td>
<td>
<textarea cols="10" rows="3" class="form-input text-1xl "></textarea>
</td>
</tr>
</tbody>
</table>
</div>
<div id="pwait" style="display: none"><p class="text-danger">System processing...</p></div>
<div class="grid grid-cols-1 md:grid-cols-1">
<table class="table table-bordered bg-primary text-white" width="100%">
<tbody><tr class="bg-danger">
<td style="width:10px">No.</td>
<td>Category</td>
<td>Brand</td>
<td>Model No</td>
<td>Model Name.</td>
<td>Hscode</td>
<td>COO</td>
<td>Qty</td>
<td>GW</td>
<td>Selling Price</td>
<td>Line Total</td>
<td>Action</td>
</tr>
</tbody>
<tbody id="pricecalculator">
    
<!--<tr>
<td colspan="12" align="left">No Orders to confirm</td>
</tr>-->
</tbody>
</table>
</div>
<?php echo Form::close(); ?>

</div>
<!-- Body Content end here-->                
</div>
</div>
<?php $__env->stopSection(); ?>
 <?php $__env->slot('scripts'); ?> 
<style>
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
<script type="text/javascript">
$("#boevendorname").select2({
  ajax: {
   url: "<?php echo e(url('/mcustomers/listcustomer')); ?>",
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
   url: "<?php echo e(url('/mpcurs/listcurrency')); ?>",
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
</script>
 <?php $__env->endSlot(); ?>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH E:\xampp5\htdocs\boe_des\resources\views/boeoutb/sendorder.blade.php ENDPATH**/ ?>