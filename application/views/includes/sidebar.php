<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo asset_url('images/userimage.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Arman</span>
  </a>

  <!-- Sidebar -->


  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="true">
      <li class="nav-item has-treeview ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Routers
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo site_url('routers/add'); ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Router</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('routers/lists'); ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>List Routers</p>
            </a>
          </li>

        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>