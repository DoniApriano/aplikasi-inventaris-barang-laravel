<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            <h3 class="app-brand-text menu-text fw-bolder ms-2">Inventaris</h3>
        </a>

        <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    @php
        $role = Auth::user()->role->name;
    @endphp

    <ul class="menu-inner py-1">
        <li
            class="menu-item {{ ($role == 'Admin' && Request::is('admin/dashboard')) || ($role == 'Owner' && Request::is('owner/dashboard')) || ($role == 'Employee' && Request::is('employee/dashboard')) ? 'active' : '' }}">
            <a href="{{ $role == 'Admin' ? route('Admin.index') : route('Owner.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        @if ($role == 'Admin')
            <li
                class="menu-item {{ Request::is('admin/employee') ? 'active' : '' }}">
                <a href="{{ $role == 'Admin' ? route('Admin.employeePage') : route('Owner.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-circle"></i>
                    <div data-i18n="Analytics">Pegawai</div>
                </a>
            </li>
        @endif
    </ul>
</aside>
