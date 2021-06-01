      <!-- sidebar navigation part started -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion flex flex-col pt-4" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon mx-4"><img class="img-fluid" src="<?php echo e(asset('image/logo.png')); ?>"/></div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link flex items-center text-Indigo-900 py-2 pl-4 nav-item" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        BOE Transactions
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link flex items-center text-Indigo-900 py-2 pl-4 nav-item collapsed" href="#" data-toggle="collapse" data-target="#collapseInbound" aria-expanded="true" aria-controls="collapseInbound">
          <i class="fas fa-fw fa-folder"></i>
          <span>Inbound</span>
        </a>
        <div id="collapseInbound" class="collapse" aria-labelledby="headingInbound" data-parent="#accordionSidebar">
          <div class="bg-gray-500 py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transactions:</h6>
            <a class="collapse-item flex items-center text-Indigo-900 py-2 pl-4 nav-item" href="<?php echo e(route('boeinb.stepone')); ?>">Receive Inventory</a>
            <a class="collapse-item flex items-center text-Indigo-900 py-2 pl-4 nav-item" href="register.html">Manage Inventory</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Pending Documents:</h6>
            <a class="collapse-item flex items-center text-Indigo-900 py-2 pl-4 nav-item" href="404.html">Document Submission</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Reports:</h6>
            <a class="collapse-item flex items-center text-Indigo-900 py-2 pl-4 nav-item" href="404.html">Inventory Receipt</a>
            <a class="collapse-item flex items-center text-Indigo-900 py-2 pl-4 nav-item" href="blank.html">Balance Stock Report</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link flex items-center text-Indigo-900 py-2 pl-4 nav-item collapsed" href="#" data-toggle="collapse" data-target="#collapseOutbound" aria-expanded="true" aria-controls="collapseOutbound">
          <i class="fas fa-fw fa-folder"></i>
          <span>Outbound</span>
        </a>
        <div id="collapseOutbound" class="collapse" aria-labelledby="headingOutbound" data-parent="#accordionSidebar">
          <div class="bg-gray-500 py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transactions:</h6>
            <a class="collapse-item flex items-center text-Indigo-900 py-2 pl-4 nav-item" href="<?php echo e(route('boeinb.index')); ?>">Available Stocks</a>
            <a class="collapse-item flex items-center text-Indigo-900 py-2 pl-4 nav-item" href="register.html">Order Pending</a>
            <a class="collapse-item flex items-center text-Indigo-900 py-2 pl-4 nav-item" href="forgot-password.html">Mange Order</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Pending Documents</h6>
            <a class="collapse-item flex items-center text-Indigo-900 py-2 pl-4 nav-item" href="404.html">POD Pending</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Reports:</h6>
            <a class="collapse-item flex items-center text-Indigo-900 py-2 pl-4 nav-item" href="404.html">Order Report</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        BOE Masters & Details
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseItemmaster" aria-expanded="true" aria-controls="collapseItemmaster">
          <i class="fas fa-fw fa-folder"></i>
          <span>BOE Master</span>
        </a>
        <div id="collapseItemmaster" class="collapse" aria-labelledby="headingItemmaster" data-parent="#accordionSidebar">
          <div class="bg-gray-500 py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Details:</h6>
            <a class="collapse-item" href="<?php echo e(route('mproducts.index')); ?>">Manage Items</a>
            <a class="collapse-item" href="<?php echo e(route('mpcoos.index')); ?>">Manage COO</a>
            <a class="collapse-item" href="<?php echo e(route('mpcurs.index')); ?>">Manage Currency</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Customer Details:</h6>
            <a class="collapse-item" href="<?php echo e(route('mcustomers.index')); ?>">Manage Customers</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
</ul><?php /**PATH E:\xampp5\htdocs\boe_des\resources\views/layouts/leftsidebar.blade.php ENDPATH**/ ?>