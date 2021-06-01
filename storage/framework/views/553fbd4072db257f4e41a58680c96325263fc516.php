<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>BOE Data Entry System - <?php echo e($title); ?></title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!--- basic app requirement start -->
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <link href="<?php echo e(asset('fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo e(asset('css/sbadmin2.css')); ?>">
        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
	<script type="text/javascript" language="javascript" src="<?php echo e(asset('jquery-ui/1.11.4/ui/jquery-ui.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>" defer></script>
        <script src="<?php echo e(asset('fontawesome-free\js\all.min.js')); ?>"></script>
        <!--- basic app requirement end -->
        
        <!--- Datatable requirement start -->
        <link rel="stylesheet" href="<?php echo e(asset('select2/css/select2.css')); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Datatables/media/css/jquery.dataTables.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Datatables/resources/syntax/shCore.css')); ?>">
        
<!--        <script type="text/javascript" language="javascript" src="<?php echo e(asset('js/jquery-1.12.4.js')); ?>"></script>-->
        
	<script type="text/javascript" language="javascript" src="<?php echo e(asset('Datatables/media/js/jquery.dataTables.js')); ?>"></script>
	<script type="text/javascript" language="javascript" src="<?php echo e(asset('Datatables/resources/syntax/shCore.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('select2/js/select2.js')); ?>"></script>
    </head>
    <body class="bg-gray-100 font-family-karla flex">
        <!-- sidebar navigation part started -->
    <?php echo $__env->make('layouts.leftsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="w-full flex flex-col min-h-screen overflow-y-hidden">
        <!-- TOP navigation part started -->
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <!-- Dynamic body content part -->
            <main class="w-full flex-grow flex-col p-2 min-vh-100">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
            <!-- footer navigation part started -->
            <footer class="w-full flex-col bg-white text-center" style="position: static; bottom: 10px;" >
                 Copyright &copy; <?php echo e(date('Y')); ?> Comtelworld. All Rights Reserved
            </footer>
        </div>
    </div>
    <!-- AlpineJS -->

    <?php echo e($scripts ?? ''); ?>


    </body>
</html>
<?php /**PATH E:\xampp5\htdocs\boe_des\resources\views/layouts/app.blade.php ENDPATH**/ ?>