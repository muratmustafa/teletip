  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/doctor') }}" class="brand-link" style="text-align:center;">
      <span class="brand-text font-weight-light">{{ config('app.name', 'TELETIP') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/')}}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/doctor') }}" class="d-block">{{ Auth::guard('doctor')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('doctor.appointments.index') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>Randevularım</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('doctor.users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-injured"></i>
              <p>Hastalarım</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="all-records.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Görüşmeler</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
