 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link" target="_blank">
      {{-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Detral</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.blogs') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Blogs
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('leads') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Leads
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('contacts') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Contacts
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('team.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Our Team
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
