<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li>
            <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-fire"></i>Dashboard</a>
        </li>
        <li class="menu-header">Starter</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('hotel.index') }}">Data Hotel</a></li>
            <li><a class="nav-link" href="{{ route('room.index') }}">Data Room</a></li>
          </ul>
        </li>
        <li>
            <a class="nav-link" href="#"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a>
        </li>
      </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>
    </aside>
  </div>
