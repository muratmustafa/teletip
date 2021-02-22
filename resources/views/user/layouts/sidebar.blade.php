  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link" style="text-align:center;font-size:2.5rem;">
      <span class="brand-text font-weight-light">TELE<b>TIP</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/')}}dist/img/blank-profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/profile') }}" class="d-block">{{ Auth::guard('user')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('user.appointments.index') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>Randevularım</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.reports.index') }}" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>Raporlarım</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.doctors.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>Doktorlarım</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="records" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Görüşmeler</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
