<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo text-center">
    <a href="{{ URL::to('/') }}" class="app-brand-link">
      <img class="w-75" src="{{ asset('assets/img/logo.png') }}">
    </a> 

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ strpos(Request::url(), 'dashboard') ? 'active' : '' }}">
      <a href="{{ URL::to('admin/dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <li class="menu-item {{ strpos(Request::url(), 'modules') ? 'active' : '' }}">
      <a href="{{ URL::to('admin/modules') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div data-i18n="Analytics">Modules</div>
      </a>
    </li>
    <li class="menu-item {{ strpos(Request::url(), 'booking') ? 'active' : '' }}">
      <a href="{{ URL::to('admin/booking') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-wallet"></i>
        <div data-i18n="Analytics">Booking</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ URL::to('logout') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-log-out"></i>
        <div data-i18n="Analytics">Logout</div>
      </a>
    </li>
  </ul>
</aside>
<!-- / Menu -->