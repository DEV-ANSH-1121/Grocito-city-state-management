<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link mt-3 {{ Route::is('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Manage User
                </a>
                <a class="nav-link mt-1 {{ Route::is('admin.states.*') ? 'active' : '' }}" href="{{ route('admin.states.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Manage State
                </a>
                <a class="nav-link mt-1 {{ Route::is('admin.cities.*') ? 'active' : '' }}" href="{{ route('admin.cities.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Manage City
                </a>
                <a class="nav-link mt-1 {{ Route::is('admin.pinCodes.*') ? 'active' : '' }}" href="{{ route('admin.pinCodes.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                   Manage Pin Codes
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->name }}
        </div>
    </nav>
</div>
