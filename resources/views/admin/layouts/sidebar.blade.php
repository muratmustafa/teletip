  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin') }}" class="brand-link" style="text-align:center;font-size:2.5rem;">
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
          <a href="{{ url('/admin') }}" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                Randevular
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.appointments.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tüm Randevular</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.appointments.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Randevu Ekle</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Doktorlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.doctors.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tüm Doktorlar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.doctors.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Doktor Ekle</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-injured"></i>
              <p>
                Hastalar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tüm Hastalar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.users.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hasta Ekle</p>
                </a>
              </li>
            </ul>
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
