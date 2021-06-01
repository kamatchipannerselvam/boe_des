<!--- Page layout design --->
<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>     <!-- page title description ---->
 <?php $__env->slot('title'); ?> 
    Inbound Management
 <?php $__env->endSlot(); ?>
<?php $__env->startSection('content'); ?>
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
    <div class="card-header text-center">Receive BOE Inbound</div>
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
    <div class="text-1xl mb-6 text-center bg-primary text-white">Step 1 &mdash; BOE Document Details - <?php echo e(($docinfo)?$docinfo->refno:""); ?></div>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        <div>
            <div class="form-group">
                <label class="block required">BOE Date</label>
                <input type="date" class="form-input pt-1 pb-1 pl-1 pr-1 w-auto" name="boe_date" id="boedate" value="<?php echo e(($docinfo)?$docinfo->boe_date:""); ?>" required/>
            </div>
            <div class="form-group">
                <label class="block required">Transfer from(Vendor Name)</label>
                <select class="form-select  pt-1 pb-1 pl-1 pr-1 w-auto" name="vendor_name" id="boevendorname" required>
                    <option value="">-- Select Vendor Name--</option>
                    <?php if($docinfo): ?>
                    <option selected> <?php echo e($docinfo->vendor_name); ?> </option>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label class="block required">BOE No#</label>
                <input type="text"  class="form-input  pt-1 pb-1 pl-1 pr-1 w-auto"  name="boe_number" id="boeno" value="<?php echo e(($docinfo)?$docinfo->boe_number:""); ?>" required/>
            </div>
            <div class="form-group">
                <label class="block required">Currency ($)</label>
                <select class="form-select  pt-1 pb-1 pl-1 pr-1 w-auto" name="currency" id="inbcurrency">
                    <option value="">-- Select Document Currency--</option>
                    <?php if($docinfo): ?>
                    <option selected> <?php echo e($docinfo->currency); ?> </option>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label class="block">Invoice Date</label>
                <input type="date"  class="form-input  pt-1 pb-1 pl-1 pr-1 w-auto" name="invoice_date"  value="<?php echo e(($docinfo)?$docinfo->invoice_date:""); ?>"  id="invoicedate"/>
            </div>
            <div class="form-group">
                <label class="block"><br></label><input type="submit" class="btn btn-primary pt-1 pb-1 pl-2 pr-2 w-auto" name="submit" value="Next"/>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label class="block">Invoice No#</label><input type="text"  class="form-input  pt-1 pb-1 pl-1 pr-1 w-auto" name="invoice_no" id="invno"  value="<?php echo e(($docinfo)?$docinfo->invoice_no:""); ?>"  />
            </div>
        </div>
    </div>
  </div>
    <input type="hidden" name="refno"  value="<?php echo e(($docinfo)?$docinfo->refno:""); ?>" />
    <input type="hidden" name="inbdocinfoid"  value="<?php echo e((($docinfo))?$docinfo->inbdocinfoid:""); ?>" />
    <input type="hidden" name="process-step" value="step1"/>
  <?php echo Form::close(); ?>

</div>
<!-- Body Content end here-->                
</div>
</div>
<?php $__env->stopSection(); ?>
 <?php $__env->slot('scripts'); ?> 
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
 
});
</script>
 <?php $__env->endSlot(); ?>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH E:\xampp5\htdocs\boe_des\resources\views/boeinb/form1.blade.php ENDPATH**/ ?>