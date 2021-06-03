@if (session()->get('id'))

    <li class="nav-item d-md-flex">
      {{ session()->get('company_name') }} :
    </li>
    <li class="nav-item {{ request()->is('admin/customer/profile') ? 'active' : '' }} d-md-flex">
      <a href="/admin/customer/profile" class="nav-link">
        <i class="mdi mdi-account"></i>Profile
      </a>
    </li>
    <li class="nav-item d-md-flex {{ request()->is('admin/customer/account') ? 'active' : '' }}">
      <a href="#" class="nav-link">
        <i class="mdi mdi-bank"></i>Account History</a>
    </li>
    <li class="nav-item d-md-flex {{ request()->is('admin/customer/emails') ? 'active' : '' }}">
      <a href="/admin/customer/emails" class="nav-link">
        <i class="mdi mdi-email-outline"></i>Emails</a>
    </li>
    <li class="nav-item d-md-flex {{ request()->is('admin/customer/recuring') ? 'active' : '' }}">
      <a href="#" class="nav-link">
        <i class="mdi mdi-history"></i>Recuring</a>
    </li>
    <li class="nav-item d-md-flex {{ request()->is('admin/customer/invoices') ? 'active' : '' }}">
      <a href="#" class="nav-link">
        <i class="mdi mdi-receipt"></i>Invoices</a>
    </li>
    <li class="nav-item dropdown d-md-flex">
      <a class="nav-link dropdown-toggle px-0" id="quickDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> Quick items </a>
      <div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-3" aria-labelledby="quickDropdown">
        <a href="#" class="dropdown-item">Schedule <span class="badge badge-primary ml-1">New</span></a>
        <a href="#" class="dropdown-item"><i class="mdi mdi-elevation-rise"></i>Reports</a>
        <a href="#" class="dropdown-item"><i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
      </div>
    </li>

@endif
