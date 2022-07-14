<!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{ auth()->user()->name ?? '' }}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      @can('is-admin')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              
              <p>
                Sys Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>User Management</p>
                </a>
              </li>

            </ul>  
          </ul>
        @endcan
        @can('is-finance')
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              
              <p>
                Finance
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('finance.index') }}" class="nav-link">
                  <i class="fas fa-coins nav-icon"></i>
                  <p>Account Top Up</p>
                </a>
              </li>

            </ul>  
          </ul>
        @endcan
        @can('is-staff')
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              
              <p>
                Incentives
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sms') }}" class="nav-link">
                  <i class="fas fa-signal nav-icon"></i>
                  <p>SMS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('create_project') }}" class="nav-link">
                  <i class="fas fa-sim-card nav-icon"></i>
                  <p>Airtime</p>
                </a>
              </li>
            </ul>
            </ul>
          @endcan
          @can('is-staff')
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link active">
                
                <p>
                  User Guide
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('guide.index') }}" class="nav-link">
                    <i class="fas fa-file-alt nav-icon"></i>
                    <p>User Guide</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          @endcan
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->