<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/home') }}" class="brand-link navbar-info">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">{{ str_replace('_', ' ', strtoupper(config('app.name'))) }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="javascript:void(0);" class="d-block">{{ ucwords(isset(Auth::user()->name) ? Auth::user()->name : 'CAL' ) }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">MAIN MENU</li>
        <li class="nav-item has-treeview">
          <a href="javascript:void(0);" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Setting
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('setting/user') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User</p>
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